<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Cat;
use App\Models\Dl;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'name'=>'required| max:256',
            'colores'=>'required',
            'cat_id'=>'required',
            'versions'=>'required',
            'part'=>'required|array',
            'current'=>'required',
            'guaranty'=>'required',
            'thumb'=>'required',
            'info'=>'required',
            'link'=>'nullable',
            'attributes'=>'array',
            'loggers'=>'required|array',
        ]);

        $product=Product::create($data);
        $product->colores()->sync($data['colores']);
        foreach ($data['loggers'] as $ke =>$va){
          Dl::create([
              'name'=>$va,
              'product_id'=>$product->id
              ]
          );
        }

        $product->parts()->sync($data['part']);
        $product->versions()->sync($data['versions']);
        if (isset($data['attributes'])){
            $attributs = collect($data['attributes'])->each(function ($item) use ($product) {
                if (is_null($item['name']) || is_null($item['value']) || is_null($item['cat'])) return;
                $attr = Attribute::firstOrCreate([
                    'name' => $item['name'],
                    'cat' => $item['cat']
                ]);
                $attr_value = $attr->values()->firstOrCreate([
                    'value' => $item['value'],
                ]);
                $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
            });
        }

        alert()->success('محصول با موفقیت اضافه شد ');
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
    public function edit(Product $product)
    {

        return view('admin.product.edit' ,compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data=$request->validate([
            'name'=>'required| max:256',
            'colores'=>'required',
            'cat_id'=>'required',
            'versions'=>'required',
            'current'=>'required',
            'guaranty'=>'required',
            'part'=>'required|array',
            'thumb'=>'required',
            'info'=>'required',
            'link'=>'nullable',
            'attributes'=>'required',
            'loggers'=>'required|array',
        ]);
        $product->update($data);
        $product->colores()->sync($data['colores']);
        $product->parts()->sync($data['part']);
        $product->versions()->sync($data['versions']);
        $product->dls()->delete();
        if (isset($data['loggers'])){
            foreach ($data['loggers'] as $ke =>$va){
                if ($va){
                    $product->dls()->firstOrCreate(['name'=>$va]);
                }
            }
        }

        $product->attributes()->detach();
//        $this->attach_attributes_to_product($data['attributes'], $product);

        if (isset($data['attributes'])){
        $attributs = collect($data['attributes'])->each(function ($item) use ($product) {

            if (is_null($item['name']) || is_null($item['value']) || is_null($item['cat'])) return;
            $attr = Attribute::firstOrCreate([
                'name' => $item['name'],
                'cat' => $item['cat']
            ]);
            $attr_value = $attr->values()->firstOrCreate([
                'value' => $item['value'],
            ]);
            $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
        });
        }
        alert()->success('محصول با به روز رسانی اضافه شد ');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        alert()->success('محصول باموفقیت حذف شد ');
        return back();
    }

    /**
     * @param $attributes
     * @param Product $product
     */
    public function attach_attributes_to_product($attributes, Product $product): void
    {
        $attributs = collect($attributes)->each(function ($item) use ($product) {
            if (is_null($item['name']) || is_null($item['value']) || is_null($item['cat'])) return;
            $attr = Attribute::firstOrCreate([
                'name' => $item['name'],
                'cat' => $item['cat']
            ]);
            $attr_value = $attr->values()->firstOrCreate([
                'value' => $item['value'],
            ]);
            $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
        });
    }
}
