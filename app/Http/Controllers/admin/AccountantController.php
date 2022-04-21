<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use Illuminate\Http\Request;
use NumberFormatter;

class AccountantController extends Controller
{

  public function all(Request $request){

      $barcodes=Barcode::query();  
//      $barcodes=$barcodes->where('customer_id',null);

      if ($request->filter){
         if ($request->from){
             $request->from=$this->convert_date($request->from);
             $barcodes->where('deliver','>',$request->from);
         }
          if ($request->to){
          $request->to=$this->convert_date($request->to);
          $barcodes->where('deliver','<',$request->to);
          }
          if ($request->customer_id){
              $barcodes->where('customer_id',$request->customer_id);
          }
          if ($request->df ){
              $barcodes->where('discount','>',$request->df);
          }
          if ($request->dt ){
              $barcodes->where('discount','<',$request->dt);
          }
          if ($request->status){
              switch ($request->status){
                  case 'all': break;
                  case 'cleared':
                      $barcodes->where('cleared','1');
                      break;
                  case 'uncleared':
                      $barcodes->where('cleared','0');
                      break;
              }
          }
      }
      if ($request->search){
          $search=$request->search;
          $barcodes = $barcodes->where('code','LIKE',"%{$search}%");

          $barcodes = $barcodes->OrwhereHas('color',function ($query) use ($request, $search){

              $query->where('name','LIKE',"%{$search}%");
          });
          $barcodes = $barcodes->OrwhereHas('product',function ($query) use ($request, $search){
              $query->where('name','LIKE',"%{$search}%");
          });
          $barcodes = $barcodes->OrwhereHas('version',function ($query) use ($request, $search){
              $query->where('name','LIKE',"%{$search}%");
          });
          $barcodes = $barcodes->OrwhereHas('customer',function ($query) use ($request, $search){
              $query->where('name','LIKE',"%{$search}%")
              ->OrWhere('family','LIKE',"%{$search}%");
          });

          $barcodes = $barcodes->OrwhereHas('operators',function ($query) use ($request, $search){
              $query->where('name','LIKE',"%{$search}%")
                  ->OrWhere('family','LIKE',"%{$search}%");
          });

      }
      session()->put('url',$request->getRequestUri());

      $barcodes=  $barcodes->paginate(10) ;
      return view('admin.accountant.all',compact('barcodes'));
  }

    public function edit(Barcode $barcode)
    {
        return view('admin.accountant.edit',compact('barcode'));
  }
    public function update(Request $request, Barcode $barcode)
    {
       $data=$request->validate([
           'discount'=>'required|numeric|min:0|max:100',
           'cleared'=>'required',
           'customer_id'=>'required',
           'deliver'=>'required',
       ]);
        $data['deliver']=$this->convert_date($data['deliver']);
        $barcode->update($data);

        alert()->success('بار کد با موفقیت به روز شد ');
        return redirect(session()->get('url'));
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
}
