<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\Logger;
use App\Models\Repair;
use App\Notifications\SendKaveCode;
use App\Notifications\SendSms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use NumberFormatter;

class RepairController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('role:admin', ['only' => ['show']]);
        // $this->middleware('role:admin');

        // $this->middleware('role:producer')->except(['destroy']);
        // $this->middleware('role:service')->except(['destroy']);
        // $this->middleware('subscribed')->except('store');
    }
    /*
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barcodes = [];

            if ($request->code2) {
                $barcode = Barcode::whereCode($request->code2)->first();
                if( !$barcode){
                    alert()->error('بار کد یافت نشد');
                    return redirect()->route('repair.barcode');
                }

            return view('admin.barcode.scan', compact('barcode'));

            }
        if ($request->code) {
            if ($request->code) {
                $barcode = Barcode::find($request->code);
            }
            if ($request->code2) {
                $barcode = Barcode::whereCode($request->code2)->first();
                if (!$barcode) {
                    alert()->error('بار کد یافت نشد');
                    return back();
                }
                if ($barcode->repairs->count() > 0) {
                    return redirect(route('repair.add.images', $barcode->repairs()->latest()->first()->id));
                }
            }
            return view('admin.repair.res', compact('barcode'));
        }
        if ($request->search) {
            $barcodes = Barcode::query();
            $barcodes->with('repairs');
            //            ->orderBy('repair.id', 'asc')
            //            $barcodes=Barcode::where('customer_id','!=',null)->where( 'code','LIKE',"%{$request->search}%");

            $barcodes = $barcodes->where('customer_id', '!=', null)->where('code', 'LIKE', "%{$request->search}%")
                //                ->whereHas('repairs',function ($query) use ($request){
                ////                     $query->latest();
                //                    $query->orderBy('id', 'asc');
                //                 })
                ->get();
        }
        //        repairs

        return view('admin.repair.all', compact('barcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $barcode = Barcode::find($request->barcode);
        if (!Carbon::parse($barcode->deliver)->addMonths($barcode->guaranty)->gt(Carbon::now())) {
            alert()->error('گارانتی  این محصول به پایان رسیده است ');
        }
        $poll = $barcode->polls()->latest()->first();
        $repair = $barcode->repairs()->latest()->first();
        //        $poll=$barcode->polls()->first();
        //        dd($poll->user->name??$repair->name);
        $name = '';
        $mobile = '';
        $address = '';
        $bar = '';
        if (($repair || $poll)) {
            $name = $repair->name ?? $poll->user->name . '' . $poll->user->family;
            $mobile = $repair->tell ?? $poll->user->mobile;
            if ($repair->bar) {
                $bar = $repair->bar;
            } elseif ($poll) {
                $bar = $poll->bar;
            }
        }
        if ($repair) {
            $address = $repair->address;
        }
        return view('admin.repair.create', compact(['barcode', 'poll', 'repair', 'name', 'bar', 'address', 'mobile']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|max:255',
            'tell' => 'required|max:255',
            'shipping' => 'nullable|max:255',
            'address' => 'required|max:255',
            'comment' => 'nullable|max:255',
            'img1' => 'nullable',
            'img2' => 'nullable',
            'img3' => 'nullable',
            'bar' => 'nullable|max:255',
            'defect' => 'nullable|max:255',
            'report' => 'nullable|max:255',
            'dewater' => 'nullable',
            'dehit' => 'nullable',
            'debar' => 'nullable',
            'detemp' => 'nullable',
            'deopen' => 'nullable',
            'demulti' => 'nullable',
            'plist' => 'array|min:1',
            'part' => 'array|min:1',
            'redate' => 'nullable|max:255',
            'wage' => 'nullable',
            'customer_wage' => 'nullable',
            'explain' => 'nullable',
            'd' => 'array|min:1',


        ]);

        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('image1')) {
            $image = $request->file('image1');
            $name_img = 'image1_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/src/repair/'), $name_img);
            $data['image1'] = $name_img;
        }
        if ($request->hasFile('image2')) {
            $image = $request->file('image2');
            $name_img = 'image2_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/src/repair/'), $name_img);
            $data['image2'] = $name_img;
        }
        if ($request->hasFile('image3')) {
            $image = $request->file('image3');
            $name_img = 'image3_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/src/repair/'), $name_img);
            $data['image3'] = $name_img;
        }
        $barcode = Barcode::find($request->barcode);
        $repair = $barcode->repairs()->create($data);
        //
        if (isset($data['dedate'])) {
            $data['dedate'] = $this->convert_date($data['dedate']);
        } else {
            $data['dedate'] = Carbon::now();
        }
        if (isset($data['redate'])) {
            $data['redate'] = $this->convert_date($data['redate']);
        } else {
            $data['redate'] = Carbon::now();
        }
        if (!empty($data['part'])) {
            $repair->parts()->detach();
            foreach ($data['part'] as $key => $va) {
                if (isset($va['status'])) {
                    $repair->parts()->attach([
                        $va['id'] => ['status' => $va['status']],
                    ]);
                }
            }
        }

        if (isset($data['d'])) {
            $attributs = collect($data['d'])->each(function ($item) use ($repair) {
                if (is_null($item['name']) || is_null($item['value'])) return;
                $logger = Logger::firstOrCreate([
                    'name' => $item['name'],
                    'info' => $item['info'],
                    'value' => $item['value'],
                    'over' => $item['over'],
                ]);
                $repair->loggers()->attach($logger->id);
            });
        }
        if ($request->send_sms) {
            $this->submit_sms($repair->tell, $repair->name, $repair->barcode->product->name, $repair->barcode->product->current, $repair->barcode->code, Jalalian::now()->format('Y-m-d H:i:s'));
        }
        $user = auth()->user();
        // ثبت ورود
        $barcode->transfers()->create([
            'from_id' => $user->id,
            'repair_id' => $repair->id,
            'type' => 'repair_in',
            'status' => '1',
        ]);
        $barcode->update_store('1',$user->id);

        alert()->success('ثبت با موفقیت انجام شد');
        return  redirect(route('repair.index', ['code' => $repair->barcode->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {

        $barcode = $repair->barcode;
        if (!Carbon::parse($barcode->deliver)->addMonths($barcode->guaranty)->gt(Carbon::now())) {
            alert()->error('گارانتی  این محصول به پایان رسیده است ');
        }
        return view('admin.repair.edit', compact(['repair', 'barcode']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repair $repair)
    {
        //    dd($request->all());
        $user = auth()->user();
        $data = [];

        $data = $request->validate([
            'name' => 'required|max:255',
            'tell' => 'required|max:255',
            'shipping' => 'nullable|max:255',
            'address' => 'required|max:255',
            'comment' => 'nullable|max:255',
            'img1' => 'nullable',
            'img2' => 'nullable',
            'img3' => 'nullable',
            'bar' => 'required|max:255',
            'defect' => 'nullable|max:255',
            'report' => 'nullable|max:255',
            'dewater' => 'nullable',
            'dehit' => 'nullable',
            'debar' => 'nullable',
            'detemp' => 'nullable',
            'deopen' => 'nullable',
            'demulti' => 'nullable',
            'plist' => 'array|min:1',
            'part' => 'array|min:1',
            'redate' => 'nullable|max:255',
            'wage' => 'nullable',
            'customer_wage' => 'required',
            'explain' => 'required',
            'd' => 'array|min:1',
            //                'dename'=>'nullable|max:255',
            //                'dedate'=>'nullable|max:255',
            'created_at' => 'nullable'

        ]);

        if ($request->hasFile('img1')) {
            $img = $request->file('img1');
            $name_img = 'img1_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('/src/repair/'), $name_img);
            $data['img1'] = $name_img;
        }
        if ($request->hasFile('img2')) {
            $img = $request->file('img2');
            $name_img = 'img2_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('/src/repair/'), $name_img);
            $data['img2'] = $name_img;
        }
        if ($request->hasFile('img3')) {
            $img = $request->file('img3');
            $name_img = 'img3_' . time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('/src/repair/'), $name_img);
            $data['img3'] = $name_img;
        }
        if (!empty($data['part'])) {
            $repair->parts()->detach();
            foreach ($data['part'] as $key => $va) {
                if (isset($va['status'])) {
                    $repair->parts()->attach([
                        $va['id'] => ['status' => $va['status']],
                    ]);
                }
            }
        }

        if (isset($data['d'])) {
            $repair->loggers()->detach();
            $attributs = collect($data['d'])->each(function ($item) use ($repair) {
                if (is_null($item['name']) || is_null($item['value'])) return;
                $logger = Logger::firstOrCreate([
                    'name' => $item['name'],
                    'info' => $item['info'],
                    'value' => $item['value'],
                    'over' => $item['over'],
                ]);
                $repair->loggers()->attach($logger->id);
            });
        }


        // if ($request->status=='delivered'  && $user->level!='admin' ){
        //     alert()->error('قابلیت ویرایش در این وضعیت غیر فعال شده ');
        //     return back();
        // }


        if (isset($data['redate'])) {
            $data['redate'] = $this->convert_date($data['redate']);
        } else {
            $data['redate'] = Carbon::now();
        }
        if ($request->delivered) {
            $data = $request->validate([
                'dename' => 'required|max:255',
                'dedate' => ' nullable|max:255',
                'created_at' => 'nullable'
            ]);
            if (isset($data['dedate'])) {
                $data['dedate'] = $this->convert_date($data['dedate']);
            } else {
                $data['dedate'] = Carbon::now();
            }
            //            $data['redate']=$this->convert_date($data['redate']);
            //            $user->notify(new SendKaveCode( $repair->tell,'deliver-sms',$repair->name,$repair->barcode->product->name.' '.$repair->barcode->product->current.' AMP' ,$repair->barcode->code,Jalalian::now()->format('Y-m-d H:i:s') ));
            if ($request->send_sms) {
                $this->deliver_sms($repair->tell, $repair->name, $request->dename, $repair->barcode->product->current, $repair->barcode->code, Jalalian::now()->format('Y-m-d H:i:s'));
            }

            // ثبت خروج
            $repair->barcode->transfers()->create([
                'from_id' => $user->id,
                'repair_id' => $repair->id,
                'type' => 'repair_out',
                'status' => '1',
            ]);
            $repair->barcode->update_store('0',$user->id);
        }
        if ($request->submit) {
            if ($request->send_sms) {
                $this->submit_sms($repair->tell, $repair->name, $repair->barcode->product->name, $repair->barcode->product->current, $repair->barcode->code, Jalalian::now()->format('Y-m-d H:i:s'));
            }
        }
        if ($request->saves) {
            $data = $request->validate([
                'created_at' => 'nullable'
            ]);
            $data['sudate'] = Carbon::now();
            //            $user->notify(new SendKaveCode( '09373699317','submit-sms',$repair->name,$repair->barcode->product->name.' با جریان '.$repair->barcode->product->current.'Amp' ,$repair->barcode->code,Jalalian::now()->format('Y-m-d H:i:s') ));
            if ($request->send_sms) {
                $this->ready_sms($repair->tell, $repair->name, $repair->barcode->product->name, $repair->barcode->product->current, $repair->barcode->code, Jalalian::now()->format('Y-m-d H:i:s'));
            }
        }
        if (isset($data['created_at'])) {
            $data['created_at'] = $this->convert_date($data['created_at']);
            $repair->update(['created_at' => $data['created_at']]);
        }
        $barcode = Barcode::find($request->barcode);
        $data['status'] = 'submit';
        if ($request->delivered) {
            $data['status'] = 'delivered';
        }
        if ($request->saves) {
            $data['status'] = 'saves';
        }
        $repair->update($data);

        //
        alert()->success('به روز رسانی  با موفقیت انجام شد');
        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        $repair->delete();
        alert()->success('گزارش با موفقیت حذف شد ');
        return back();
    }
    public function deliver_submit(Request $request, Repair $repair)
    {
        $data = $request->validate([
            'dename' => 'required',
            'dedate' => 'required',
        ]);
        $data['status'] = 'delivered';
        $repair->update($data);
        alert()->success('ثبت با موفقیت انجام شد');
        return  redirect()->route('repair.index');
    }
    public function deliver_form(Repair $repair)
    {

        return view('admin.repair.deliver', compact(['repair']));
    }
    public function go_ready_sms(Repair $repair)
    {
        $this->ready_sms($repair->tell, $repair->name, $repair->barcode->product->name, $repair->barcode->product->current, $repair->barcode->code, Jalalian::now()->format('Y-m-d H:i:s'));
        alert()->success('پیامک با موفقیت ارسال شد ');
        return back();
    }
    public function go_deliver_sms(Repair $repair)
    {
        $this->deliver_sms($repair->tell, $repair->name, $repair->dename, $repair->barcode->product->current, $repair->barcode->code, Jalalian::now()->format('Y-m-d H:i:s'));

        alert()->success('پیامک با موفقیت ارسال شد ');
        return back();
    }
    public function submit_sms($mobile, $name, $product, $current, $barcode, $date)
    {
        //        $text="مشتری گرامی $name دستگاه $product با آمپر $current با بارکد  $barcode در تاریخ $date جهت بررسی فنی دریافت شد. \nنتایج متعاقبا از طریق همین سامانه به اطلاع خواهد رسید \nمرکز خدمات مشتریان ریزان الکتریک        " ;
        $user = auth()->user();
        $user->notify(new SendKaveCode($mobile, 'submit-sms', $name, $barcode, '', $product, $date));
        //        $user->notify(new SendSms( $text,$mobile));
    }

    public function ready_sms($mobile, $name, $product, $current, $barcode, $date)
    {
        //        $text="مشتری گرامی $name دستگاه $product با آمپر $current با بارکد  $barcode در تاریخ $date \n بررسی و رفع نقص شده .خواهشمند است نسبت به دریافت آن اقدام فرمایید . \n مرکز خدمات مشتریان ریزان الکتریک" ;
        $user = auth()->user();
        $user->notify(new SendKaveCode($mobile, 'ready-sms', $name, $barcode, '', $product, $date));
        //        $user->notify(new SendSms( $text,$mobile));
    }
    public function deliver_sms($mobile, $name, $product, $current, $barcode, $date)
    {
        //        $text="مشتری گرامی $name دستگاه $product با آمپر $current با بارکد  $barcode در تاریخ $date تحویل داده شد. \n مرکز خدمات مشتریان ریزان الکتریک" ;
        $user = auth()->user();
        $user->notify(new SendKaveCode($mobile, 'deliver-sms', $name, $barcode, '', $product, $date));

        //        $user->notify(new SendSms( $text,$mobile));
    }
    public function repair_barcode()
    {
        return view('admin.repair.barcode');
    }
    public function add_images(Request $request, Repair $repair)
    {
        $user = auth()->user();
        if ($request->isMethod('post')) {
            foreach ($request->file('images') as $image) {
                $count = $repair->images->count() + 1;
                $name_img = 'img_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/src/repair/'), $name_img);
                $repair->images()->create(['name' => $name_img, 'user_id' => $user->id]);
            }
            alert()->success('تصاویر با موفقیت ساخته شد ');
        }
        return view('admin.repair.images', compact(['repair']));
    }
    public function convert_date($from)
    {
        $date = explode('-', $from);
        $fmt = numfmt_create('fa', NumberFormatter::DECIMAL);
        $year = numfmt_parse($fmt, $date[0]);
        $month = numfmt_parse($fmt, $date[1]);
        $day = numfmt_parse($fmt, $date[2]);
        $from =  \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);
        return   $from = $from[0] . '-' . $from[1] . '-' . $from[2] . ' 00:00:00';
    }
}
