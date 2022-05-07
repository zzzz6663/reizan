<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use NumberFormatter;
use App\Models\Sound;
use App\Models\Barcode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;


class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barcodes=Barcode::query();


        if ($request->search){
        //  $barcodes->whereHas('colores',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });
        //  $barcodes->whereHas('product',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });
        //  $barcodes->whereHas('versions',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%");
        //     });

        //  $barcodes->whereHas('operators',function ($query) use ($request){
        //         $search=$request->search;
        //         $query->where('name','LIKE',"%{$search}%")
        //         ->OrWhere('family','LIKE',"%{$search}%");
        //     });
            $search=$request->search;
            $barcodes->where('code','LIKE',"%{$search}%");
        //  $barcodes->where(function($query) use ($request){
        //     $search=$request->search;
        //            $query->where('code','LIKE',"%{$search}%");
        //    });
        }
        if ($request->status){
            switch($request->status){
                case 'all_back':
                    $barcodes->has('repairs','>',0);
                    break;
                case 'day_past_back':
                    $barcodes->has('repairs','>',0)->where('created_at','<',\Carbon\Carbon::now()->subDay());
                    break;
                case 'week_past_back':
                    $barcodes->has('repairs','>',0)->where('created_at','<',\Carbon\Carbon::now()->subDays(7));
                    break;
                case 'month_past_back':
                    $barcodes->has('repairs','>',0)->where('created_at','<',\Carbon\Carbon::now()->subMonth());
                    break;
                case 'store':
                    $barcodes->where('customer_id',null)->get();
                    break;
                case 'produce':
                    $barcodes->where('created_at','<',\Carbon\Carbon::now())->get();
                    break;
                case 'week_produce':
                    $barcodes->where('created_at','<',\Carbon\Carbon::now()->subDays(7))->get();
                    break;
                case 'month_produce':
                    $barcodes->where('created_at','<',\Carbon\Carbon::now()->subMonth())->get();
                    break;
                case 'all_produce':
                    $barcodes->whereDate('created_at', \Carbon\Carbon::today())->get();
                    break;
                case 'all_service':
                    $barcodes->whereDate('created_at', \Carbon\Carbon::today())->get();
                    break;
                case 'all_sell':
                    $barcodes->whereDate('sell', \Carbon\Carbon::today())->get();
                    break;
                case 'sold':
                    $barcodes->where('customer_id','!=',null)->get();
                    break;
                case 'repair_count':
                    $barcodes->has('repairs','=',$request->count??0)->get();
                    break;
            }
        }
        if ($request->all){
            $barcodes->where('customer_id',null);
        }
        if ($request->has('store')){
            $barcodes->where('store','=',$request->store);
        }

        $barcodes=  $barcodes->sortable()->latest()->paginate(10);
        return view('admin.barcode.all',compact(['barcodes']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        return view('admin.barcode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data=$request->validate([
           'code'=>'required|max:256|unique:barcodes',
           'product_id'=>'required',
           'produce'=>'nullable',
           'deliver'=>'nullable',
           'versions'=>'nullable',
           'colores'=>'nullable',
           'customer_id'=>'nullable',
           'info'=>'nullable',
           'operators'=>'nullable|array|between:1,11'
           ]);
           if(  $data['produce']){
            $data['produce']=$this->convert_date($data['produce']);

        }
        if(  $data['deliver']){
            $data['deliver']=$this->convert_date($data['deliver']);

        }

       $user=auth()->user();

       $barcode= $user->ubarcodes()->create($data);
       if ($data['customer_id']){
           $barcode->update(['sell'=>Carbon::now()]);
           $barcode->transfers()->create([
            'from_id'=> $user->id,
            'type'=>'sell',
            'status'=>'1',

            ]);
            $barcode->update_store('0',$user->id);
       }else{
           $barcode->transfers()->create([
            'from_id'=> $user->id,
            'type'=>'produce',
            'status'=>'1',

            ]);
            $barcode->update_store('1',$user->id);
       }
        $barcode->update(['guaranty'=>$barcode->product->guaranty]);
        if(isset($data['operators'])){
            $barcode->operators()->sync($data['operators']);
        }
        if(isset($data['versions'])){
            $barcode->versions()->sync($data['versions']);

        }
        if(isset($data['colores'])){
            $barcode->colores()->sync($data['colores']);

        }



       alert()->success('  بارکد با موفقیت اضافه شد ');
       return redirect()->route('barcode.show',$barcode->id);
    }
    public function convert_date( $from){

        $date=explode('-',$from);
        $fmt = numfmt_create('fa', NumberFormatter::DECIMAL);
        $year= numfmt_parse($fmt, $date[0])  ;
        $month= numfmt_parse($fmt, $date[1])  ;
        $day= numfmt_parse($fmt, $date[2])  ;
        $from=  \Morilog\Jalali\CalendarUtils::toGregorian($year, $month, $day);
        return   $from=$from[0].'-'.$from[1].'-'.$from[2].' 00:00:00';
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Barcode $barcode)
    {
        return view('admin.barcode.show' ,compact('barcode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barcode $barcode)
    {
        return view('admin.barcode.edit' ,compact('barcode'));

    }
    public function sell(Barcode $barcode,Request $request)
    {
        if ($barcode->customer_id){
            alert()->error('این بارکد قبلا فروش رفته');
            return back();
        }
        if ($request->isMethod('post')) {
            $data=$request->validate([
                'deliver'=>'nullable',
                'customer_id'=>'required',
                ]);

             if(  $data['deliver']){
                 $data['deliver']=$this->convert_date($data['deliver']);

             }
            $user=auth()->user();
             $data['user_id'] =$user->id;
            $barcode->update($data);
            if ((!$barcode->customer_id) && $data['customer_id']){
                $barcode->update(['sell'=>Carbon::now()]);
                $barcode->transfers()->create([
                    'from_id'=> $user->id,
                    'type'=>'sell',
                    'status'=>'1',
                ]);
                $barcode->update_store('0',$user->id);
            }
            alert()->success('بار کد با موفقیت فروش رفت ');
            return redirect()->route('barcode.show',$barcode->id);
        }
        return view('admin.barcode.sell' ,compact('barcode'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barcode $barcode)
    {
        $data=$request->validate([
            'code'=>['required','max:256' ,Rule::unique('barcodes', 'code')->ignore($barcode->id)],
            'product_id'=>'required',
            'produce'=>'nullable',
            'deliver'=>'nullable',
            'versions'=>'nullable',
            'colores'=>'required|array|min:1',
            'customer_id'=>'nullable',
            'info'=>'nullable',
            'operators'=>'required|array|between:1,11',
        ]);
        if(  $data['produce']){
            $data['produce']=$this->convert_date($data['produce']);

        }
        if(  $data['deliver']){
            $data['deliver']=$this->convert_date($data['deliver']);

        }

        $user=auth()->user();

        if ((!$barcode->customer_id) && $data['customer_id']){
            $barcode->update(['sell'=>Carbon::now()]);
            $barcode->transfers()->create([
                'from_id'=> $user->id,
                'type'=>'sell',
                'status'=>'1',
            ]);
            $barcode->update_store('0',$user->id);
        }
        $barcode->update($data);
        if(isset($data['operators'])){
            $barcode->operators()->sync($data['operators']);
        }
        if(isset($data['versions'])){
            $barcode->versions()->sync($data['versions']);

        }
        if(isset($data['colores'])){
            $barcode->colores()->sync($data['colores']);

        }
        alert()->success('  بارکد با موفقیت به روز  شد ');
        return redirect()->route('barcode.show',$barcode->id);
    }
    public function record_voice(Request $request,Barcode $barcode){

        if ($request->hasFile('voice')) {
            $image = $request->file('voice');
            $name_img = 'voice' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/src/voice/'), $name_img);
            $data['voice'] = $name_img;
        }
        $user=auth()->user();
        $user->sounds()->create([
            'barcode_id'=>$barcode->id,
            'name'=>$data['voice'],
            'location'=>$request->location
        ]);
        return response()->json([
            'status' => '1',
            ]);
    }
    public function remove_voice(Request $request){
        $user=auth()->user();
        if($request->sound_id){
            $sound=Sound::find($request->sound_id);
            if (file_exists( $filename=public_path() . '/src/voice/' . $sound->name )) {
                File::delete($filename);
                $sound->delete();
                alert()->success('صدا با موفقیت حذف شد');
            }

        }else{

            alert()->error('فایل یافت نشد ');
        }
        return back();



    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barcode $barcode)
    {
        $barcode->operators()->detach();
        $barcode->colores()->detach();
        $barcode->versions()->detach();
        $barcode->repairs()->delete();
        $barcode->delete();
               alert()->success('  بارکد با موفقیت به  حذف  شد ');
        return back();
    }

}
