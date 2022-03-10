<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Product $product)
    {
         $images=$product->gallery()->latest()->get();
       return view('admin.product.gallery.all',compact(['product','images']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
      return  view('admin.product.gallery.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Product $product)
    {
      $data= $request->validate([
           'images.*.image'=>'required',
           'images.*.alt'=>'required',
       ]);
      collect($data['images'])->each(function ($image) use($product,$data){
          $product->gallery()->create($image);
      });
      alert()->success('تصاویر با موفقیت اضافه شد ');
      return  redirect(route('products.gallery.index',[$product->id]));
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
    public function edit(Product  $product ,ProductGallery $gallery)
    {
        return view('admin.product.gallery.edit',compact(['product','gallery']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product ,ProductGallery $gallery)
    {
        $data= $request->validate([
            'image'=>'required',
            'alt'=>'required',
        ]);
        $product->gallery()->update($data);
        alert()->success('تصویر با موفققیت به روز شد ');
        return  redirect(route('products.gallery.index',[$product->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product ,ProductGallery  $gallery)
    {
        $gallery->delete();
        alert()->success('تصویر با موفقیت حذف شد ');
        return  redirect(route('products.gallery.index',[$product->id]));
    }
}
