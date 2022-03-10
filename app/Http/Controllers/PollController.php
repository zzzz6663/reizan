<?php

namespace App\Http\Controllers;

use App\Exports\PollNumberExport;
use App\Exports\RepairNumberExport;
use App\Models\Poll;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\Jalalian;
use NumberFormatter;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $polls=Poll::query();
        if ($request->filter){
            if ($request->from){
                $request->from=$this->convert_date($request->from);
                $polls->where('created_at','>',$request->from);
            }
            if ($request->to){
                $request->to=$this->convert_date($request->to);
                $polls->where('created_at','<',$request->to);
            }
            if ($request->pfrom){
                $pfrom=$this->convert_date($request->pfrom);
                $polls->whereHas('barcode',function ($query) use ($pfrom){
                    $query->where('produce','>',$pfrom);
                });
            }
            if ($request->pto){
                $pto=$this->convert_date($request->pto);
                $polls->whereHas('barcode',function ($query) use ($pto){
                    $query->where('produce','<',$pto);
                });
            }
            if ($request->sfrom){
                $sfrom=$this->convert_date($request->sfrom);
                $polls->whereHas('barcode',function ($query) use ($sfrom){
                    $query->where('sell','>',$sfrom);
                });
            }
            if ($request->sto){
                $sto=$this->convert_date($request->sto);
                $polls->whereHas('barcode',function ($query) use ($sto){
                    $query->where('sell','<',$sto);
                });
            }
        }
        if ($request->excel){
            if ($request->has('excel')){
                return Excel::download(new PollNumberExport($polls->get()), 'Poll_'.Jalalian::now().'.xlsx');
            }
        }
        $polls=$polls->latest()->paginate(10);
        return view('admin.poll.all',compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        return view('admin.poll.show' ,compact(['poll']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
