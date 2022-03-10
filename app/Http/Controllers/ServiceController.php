<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'content'=>'required',
            'video'=>'nullable',
            'play'=>'nullable'
        ]);
        if($request->has('video')) {
            $video = $request->file('video');
            $name_video = time() . '_service_' . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('/src/service'), $name_video);
            $data['video']=$name_video;
        }
        Service::create($data);
        alert()->success('خدمات با موفقیت اضافه شد ');
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
    public function edit(Service $service)
    {
        return view('admin.service.edit' ,compact('service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $data=$request->validate([
            'title'=>'required| max:256',
            'content'=>'required',
            'video'=>'nullable',
            'play'=>'required'
        ]);
        if($request->has('video')) {
            $video = $request->file('video');
            $name_video = time() . '_service_' . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('/src/service'), $name_video);
            $data['video']=$name_video;
        }
        $service->update($data);
        alert()->success('خدمات با موفقیت به روز شد ');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        alert()->success('  خدمات ما باموفقیت حذف شد ');
        return back();
    }
}
