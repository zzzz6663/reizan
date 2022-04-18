<?php

namespace App\Http\Controllers\admin;

use App\Exports\RepairNumberExport;
use App\Exports\UsersFilterExport;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Ostan;
use App\Models\Product;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\Jalalian;
use NumberFormatter;

class AdminController extends Controller
{
    public function index(){
        return view('admin.staff.all');
    }
    public function setting(){
        return view('admin.setting');
    }



    public function staff_create (){
        return view('admin.staff.create');
    }
    public function staff_store (Request $request){
      $data=$request->validate([
          'name'=>'required|min:2',
          'family'=>'required|min:2',
          'password'=>'required|min:4',
          'username'=>'required|min:4|unique:users',
          'level'=>'required',
      ]);
        $data['password']=Crypt::encryptString($data['password']);
       User::create($data);
       alert()->success('کاربر با موفقیت ساخته شد ');
       return back();
    }
    public function staff_update (Request $request ,User $user){
      $data=$request->validate([
          'name'=>'required|min:2',
          'family'=>'required|min:2',
          'password'=>'required|min:4',
          'username'=>['required','min:4' ,Rule::unique('users', 'username')->ignore($user->id)],
          'level'=>'required',
      ]);
        $data['password']=Crypt::encryptString($data['password']);
        $user->update($data);
       alert()->success('کاربر با موفقیت ویرایش شد ');
       return back();
    }

    public function staff(){
        return view('admin.staff.all');
    }
    public function staff_edit(User $user){
        return view('admin.staff.edit' ,compact('user'));
    }
    public function staff_destroy(User $user){
        $user->delete();
        alert()->success('کاربر باموفقیت حذف شد ');
        return back();
    }
    public function customer_destroy(User $user){
        $user->delete();
        alert()->success('کاربر باموفقیت حذف شد ');
        return back();
    }




    public function customer_create (){
        return view('admin.customer.create');
    }
    public function customer_store (Request $request){
        $data=$request->validate([
            'name'=>'required|min:2',
            'family'=>'required|min:2',
            'mobile'=>'required|min:10|unique:users',
            'tel'=>'required',
            'address'=>'required|min:5',
            'ostan_id'=>'required',
            'shahr_id'=>'required',
            'telegram'=>'nullable',
            'instagram'=>'nullable',
            'active'=>'nullable',
        ]);
        $data['level']='customer';
        User::create($data);
        alert()->success('مشتری با موفقیت ساخته شد ');
        return back();
    }
    public function customer_update (Request $request ,User $user){

        $data=$request->validate([
            'name'=>'required|min:2',
            'family'=>'required|min:2',
            'mobile'=>['required','min:10' ,Rule::unique('users', 'mobile')->ignore($user->id)],

            'tel'=>'required',
            'address'=>'required|min:5',
            'ostan_id'=>'required',
            'shahr_id'=>'required',
            'telegram'=>'nullable',
            'instagram'=>'nullable',
            'active'=>'nullable',
        ]);
        $user->update($data);
        alert()->success('مشتری با موفقیت ویرایش شد ');
        return back();
    }

    public function repair_list(Request $request){





        $repairs=Repair::query();
        $repairs->with('barcode');
        // $repairs->with('barcode',function ($query) {
        //     $query->orderBy('deliver');
        // });



        if ($request->filter){
            if ($request->from){
                $request->from=$this->convert_date($request->from);
                $repairs->where('created_at','>',$request->from);
            }
            if ($request->to){
                $request->to=$this->convert_date($request->to);
                $repairs->where('created_at','<',$request->to);
            }
            if ($request->pfrom){
                $pfrom=$this->convert_date($request->pfrom);
                $repairs->whereHas('barcode',function ($query) use ($pfrom){
                    $query->where('produce','>',$pfrom);
               });
            }
            if ($request->pto){
                $pto=$this->convert_date($request->pto);
                $repairs->whereHas('barcode',function ($query) use ($pto){
                    $query->where('produce','<',$pto);
               });
            }
            if ($request->sfrom){
                $sfrom=$this->convert_date($request->sfrom);
                $repairs->whereHas('barcode',function ($query) use ($sfrom){
                    $query->where('sell','>',$sfrom);
               });
            }
            if ($request->sto){
                $sto=$this->convert_date($request->sto);
                $repairs->whereHas('barcode',function ($query) use ($sto){
                    $query->where('sell','<',$sto);
               });
            }
//            if ($request->customer_id){
//                $barcodes->where('customer_id',$request->customer_id);
//            }
//            if ($request->df ){
//                $barcodes->where('discount','>',$request->df);
//            }
//            if ($request->dt ){
//                $barcodes->where('discount','<',$request->dt);
//            }
//            if ($request->status){
//                switch ($request->status){
//                    case 'all': break;
//                    case 'cleared':
//                        $barcodes->where('cleared','1');
//                        break;
//                    case 'uncleared':
//                        $barcodes->where('cleared','0');
//                        break;
//                }
//            }

        }
        if ($request->excel){
            if ($request->has('excel')){
                return Excel::download(new RepairNumberExport($repairs->select('tell')->get()), 'Repair_'.Jalalian::now().'.xlsx');
            }
        }
        if($request->status){
          $status=$request->status;
          $repairs->whereStatus($status);
        }
        // $repairs=  $repairs     ->orderBy('deliver')->get() ;
        $repairs=  $repairs->sortable()->paginate(10) ;
        return view('admin.report.repair_list',compact('repairs'));
    }





    public function repair_list2(Request $request){
        $repairs = Repair::query();
        $repairs = $repairs->with('barcode')->orderBy('barcodes.deliver')->paginate(10) ;
        return view('admin.report.repair_list',compact('repairs'));
    }









    public function get_shahr(Ostan $ostan){
        return response()->json([
            'body' => view('admin.get_shahr', compact(['ostan' ]))->render(),
        ]);
    }
    public function get_part(Product $product){
        return response()->json([
            'body' => $product->parts,
        ]);
        // return response()->json([
        //     'body' => view('admin.get_part', compact(['product' ]))->render(),
        // ]);
    }
    public function get_logger(Product $product){

//    return    view('admin.get_logger', compact(['product' ]));

        return response()->json([
            'body' => view('admin.get_logger', compact(['product' ]))->render(),
        ]);
    }
    public function customer(){
        return view('admin.customer.all');
    }

    public function attributes_value(Request $request){
        $data=$request->validate([
            'name'=>'required'
        ]);
        $attr=Attribute::where('name',$data['name'])->first();
        if ($attr){
            return response(['data'=>$attr->values->pluck('value')]);

        }else{
            return response(['data'=>[]]);
        }
    }
    public function customer_edit(User $user){
        return view('admin.customer.edit' ,compact('user'));
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
    public function copy_product( Product $product){
        // $new = $product->duplicate();

alert()->success('محصول با موفقیت کپی شد ');
return back();
    }
//    public function cats (){
//        return view('admin.cats ');
//    }
}
