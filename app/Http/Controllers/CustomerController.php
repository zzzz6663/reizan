<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customers.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required| max:256',
            'image'=>'nullable'
        ]);
        if($request->has('image')) {
            $image = $request->file('image');
            $name_image = time() . '_customer_' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/src/customer'), $name_image);
            $data['image']=$name_image;
        }
        Customer::create($data);
        alert()->success('مشتری های ما با موفقیت اضافه شد ');
        return back();
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
    public function edit(  Customer $customer)
    {
        return view('admin.customers.edit' ,compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Customer $customer)
    {
        $data=$request->validate([
            'title'=>'required| max:256',
            'image'=>'nullable'
        ]);
        if($request->has('image')) {
            $image = $request->file('image');
            $name_image = time() . '_customer_' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/src/customer'), $name_image);
            $data['image']=$name_image;
        }
        $customer->update($data);
        alert()->success('مشتری های ما با موفقیت اضافه شد ');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        alert()->success('  مشتری باموفقیت حذف شد ');
        return back();
    }
}
