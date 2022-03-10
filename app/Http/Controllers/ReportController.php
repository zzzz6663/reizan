<?php

namespace App\Http\Controllers;

use App\Models\Dl;
use NumberFormatter;
use App\Models\Repair;
use App\Models\Barcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ReportController extends Controller
{
    public function print_factor(Request $request, Repair $repair)
    {
        return view('admin.report.factor', compact('repair'));
    }
    //    public function print_customer(Request $request , Repair $repair){
    //        return view('admin.report.factor',compact('repair'));
    //    }
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
    public function form(Request $request)
    {


        // Artisan::call('optimize');
        // dd(3);
        //        dd(Dl::find(16));
        $barcodes = Barcode::query();
        if ($request->produce_from) {
            $produce_from=$this->convert_date($request->produce_from);
            // $request->from=$this->convert_date($request->from);
            $barcodes->where('produce', '>=', $produce_from);
        }
        if ($request->produce_till) {
            $produce_till=$this->convert_date($request->produce_till);
            $barcodes->where('produce', '<', $produce_till);
        }
        if ($request->deliver_from) {
            $deliver_from=$this->convert_date($request->deliver_from);
            // $request->from=$this->convert_date($request->from);
            $barcodes->where('deliver', '>=', $deliver_from);
        }
        if ($request->deliver_till) {
            $deliver_till=$this->convert_date($request->deliver_till);
            $barcodes->where('deliver', '<', $deliver_till);
        }
        if ($request->dls) {
            foreach ($request->dls as $ke => $va) {

                if ($va['max'] && $va['min']) {
                    $barcodes->whereHas('repairs', function ($query) use ($ke, $va) {
                        $query->whereHas('loggers', function ($query2) use ($ke, $va) {
                            $dls = Dl::find($ke);
                            if ($dls) {
                                if ($va['min']) {
                                    $query2->where('name', $dls->name)->where('value', '>=', $va['min']);
                                }
                                if ($va['max']) {
                                    $query2->where('name', $dls->name)->where('value', '<=', $va['max']);
                                }
                            }
                        });
                    });
                }
            }
        }
        if ($request->part) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $part = $request->part;
                $query->whereHas('parts', function ($query2) use ($part) {
                    $part = (int) $part;
                    $query2->where('id', $part);
                });
            });
        }
        if ($request->product_id) {
            $barcodes->whereHas('product', function ($query) use ($request) {
                $product = $request->product_id;
                $query->where('id', $product);
            });
        }
        if ($request->version_id) {
            $barcodes->whereHas('versions', function ($query) use ($request) {
                $version = $request->version_id;
                $query->where('id', $version);
            });
        }
        if ($request->color) {
            $barcodes->whereHas('colores', function ($query) use ($request) {
                $color = $request->color;
                $query->whereIn('id', $color);
            });
        }
        if ($request->customer_id) {
            $barcodes->whereHas('customer', function ($query) use ($request) {
                $customer = $request->customer_id;
                $query->where('id', $customer);
            });
        }
        if ($request->ostan_id) {
            $barcodes->whereHas('customer', function ($query) use ($request) {
                $query->whereHas('ostan', function ($query) use ($request) {
                    $ostan = $request->ostan_id;
                    $query->where('id', $ostan);
                });
            });
        }
        if ($request->dewater) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $query->where('dewater', 1);
            });
        }
        if ($request->dehit) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $query->where('dehit', 1);
            });
        }
        if ($request->debar) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $query->where('debar', 1);
            });
        }
        if ($request->detemp) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $query->where('detemp', 1);
            });
        }
        if ($request->deopen) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $query->where('deopen', 1);
            });
        }
        if ($request->demulti) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $query->where('demulti', 1);
            });
        }
        if ($request->wage) {
            $barcodes->whereHas('repairs', function ($query) use ($request) {
                $query->where('wage', '>', 0);
            });
        }
        if ($request->rcount) {
            $barcodes->has('repairs', '=', $request->rcount);
        }



        //        if ($request->version){
        //            $barcodes = $barcodes->whereHas('version',function ($query) use ($request){
        //                $version=$request->version;
        //                $query->Where('name','LIKE',"%{$version}%");
        //            });
        //        }
        //        if ($request->operators){
        //            $barcodes = $barcodes->whereHas('operators',function ($query) use ($request){
        //                $operators=$request->operators;
        //                $query->Where('name','LIKE',"%{$operators}%")
        //                    ->OrWhere('family','LIKE',"%{$operators}%");
        //            });
        //        }
        //        if ($request->color){
        //            $barcodes = $barcodes->whereHas('color',function ($query) use ($request){
        //                $color=$request->color;
        //                $query->Where('name','LIKE',"%{$color}%");
        //            });
        //        }


        //        $barcodes=  $barcodes->get();

        $barcodes =  $barcodes->latest()->paginate(10);

        return view('admin.report.form', compact(['barcodes']));
    }
}