<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barcode;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barcodes = Barcode::query();
        $barcodes=$barcodes->where('last_id',auth()->user()->id)->where('store','1')->latest()->get();
        $transfers = Transfer::query();
        $user = auth()->user();
        if( $user ->level=='admin' ){
         $transfers->whereType('transfer');
        }else{
           $transfers->whereType('transfer')->where(function ($query) use ($user) {
                $query->where('from_id', $user->id)->orWhere('to_id', $user->id);});
        }

        $transfers =  $transfers ->   latest()->paginate(10);


        return view('admin.transfer.all', compact(['transfers','barcodes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $barcode = Barcode::find($request->barcode);
        if (!$barcode) {
            alert()->error('بارکد یافت نشد ');
            return back();
        }
        $user = auth()->user();
        if (($barcode->last_id) && $barcode->last_id != $user->id) {
            alert()->error('  این بارکد برای شما نیست    ');
            return back();
        }
        if ($barcode->store == '0') {
            alert()->error(' بارکد قبلا از انبار خارج شده است   ');
            return back();
        }
        if (!$barcode->customer_id) {
            alert()->error('این بار کد هنوز فروش نرفته  ');
            return back();
        }
        if (!$barcode->customer_id) {
            alert()->error('این بار کد هنوز فروش نرفته  ');
            return back();
        }
        if($repair=$barcode->repairs()->latest()->first()){
           if( $repair->status=='delivered'){
            alert()->error('کالا قبلا تحویل شده است  ');
            return back();
           }
        }

        return view('admin.transfer.create', compact(['barcode']));
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
            'to_id' => 'required| max:256',
            'info_from' => 'nullable',
            'barcode_id' => 'required'
        ]);
        $user = auth()->user();
        $data['from_id'] = $user->id;
        $data['type'] = 'transfer';
        $transfer = Transfer::create($data);
        alert()->success('  انتقال  با موفقیت اضافه شد ');
        return  redirect(route('transfer.index'));
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
    public function edit(Transfer $transfer, Request $request)
    {
        if ($transfer->to_id != auth()->user()->id) {
            alert()->error('این بار کد برای شما نیست ');
            return back();
        }
        if ($transfer->barcode == '0') {
            return Redirect::back()->withErrors(['پیام ' => 'بار کد خارج از انبار میباشد   ']);
        }

        if (!is_null($transfer->status)) {
            return Redirect::back()->withErrors(['پیام ' => 'این انتقال قبلا انجام شده است  ']);
        }
        return view('admin.transfer.edit', compact(['transfer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        $data = $request->validate([
            'status' => 'required| max:256',
            'info_to' => 'nullable',
        ]);
        $data['time'] = Carbon::now();
        $user = auth()->user();
        $transfer->update($data);
        if($data['status']){
            $transfer->barcode->update_store('1', $user->id);
        }
        alert()->success(' وضعیت انتقال با موفقیت به روز شد  ');
        return  redirect(route('transfer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {

        $user = auth()->user();
        if (($transfer->barcode->last_id) && $transfer->barcode->last_id != $user->id) {
            alert()->error('  این بارکد     در موجودی شما نیست     ');
            return back();
        }
        if ($transfer->barcode->store == '0') {
            alert()->error(' بارکد قبلا از انبار خارج شده است   ');
            return back();
        }
    }
}
