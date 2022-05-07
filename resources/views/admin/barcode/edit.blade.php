@component('admin.section.content',['title'=>'  به روز رسانی    بارکد'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  بارکد</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  بارکد</h3>
                        </div>
                        <!-- /.card-header -->
                    @include('error')

                    <!-- form start -->
                        <form role="form" id="barcode_edit_form" action="{{route('barcode.update',$barcode->id)}}" method="post" >
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> بارکد</label>
                                    <input type="number" name="code" value="{{old('code',$barcode->code)}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="product">محصول  </label>
                                    <select class="form-control" name="product_id" id="product">
                                        <option disabled value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Product::all() as $product)
                                            <option  {{old('product_id',$barcode->product_id)==$product->id?'selected':''}} value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="produce">  تاریخ تولید</label>
                                    <input type="text" name="produce" value="{{old('produce',$barcode->produce)}}" class="form-control persian" id="produce" placeholder="تاریخ تولید را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="deliver">  تاریخ خروج</label>
                                    <input type="text" name="deliver" value="{{old('deliver',$barcode->deliver)}}" class="form-control persian" id="deliver" placeholder="تاریخ خروج را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="version">  ورژن  </label>
                                    <select class="form-control select2" multiple name="versions[]" id="version">
                                        <option disabled value="">یک مورد را انتخاب کنید</option>
                                        @if($barcode->product)

                                        @foreach($barcode->product->versions as $version)
                                            {{-- <option {{old('version_id',$barcode->version_id)==$version->id?'selected':''}} value="{{$version->id}}">{{$version->name}}</option> --}}
                                            <option  {{in_array($version->id,old('version',$barcode->versions->pluck('id')->toArray()))?'selected':''}} value="{{$version->id}}">{{$version->name}}</option>

                                        @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="color">رنگ  </label>
                                    <select class="form-control select2" multiple name="colores[]" id="color">
                                        <option disabled value="" >یک مورد را انتخاب کنید</option>
                                        @if($barcode->product)
                                        @foreach($barcode->product->colores as $color)
                                            <option  {{in_array($color->id,old('colores',$barcode->colores->pluck('id')->toArray()))?'selected':''}} value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="color">مشتری  </label>
                                    <select class="form-control" name="customer_id" id="customer">
                                        <option   value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\User::whereLevel('customer')->get() as $customer)
                                            <option  {{old('customer_id',$barcode->customer_id)==$customer->id?'selected':''}} value="{{$customer->id}}">{{$customer->name}} {{$customer->family}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="color">اپراتور  </label>
                                    <select class="form-control select2" name="operators[]" id="operator" multiple>
                                        <option disabled value="" >یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\User::whereLevel('operator')->get()  as $operator)
                                            <option  {{in_array($operator->id,old('operators',$barcode->operators()->pluck('id')->toArray()))?'selected':''}} value="{{$operator->id}}">{{$operator->name}} {{$operator->family}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">توضیحات بارکد</label>
                                    <textarea name="info" id="" class="form-control" cols="30" rows="10">{{old('info',$barcode->info)}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer " >
                                <button type="submit" id="ssubmit" class="btn disnon btn-primary">ارسال</button>
                                <span class="btn btn-primary trigger" data-id='1' id="show_msg" >ذخیره</span>
                                <div id="modal_1" class="modal" style="">
                                    <h1>موارد زیر را تایید میکنید؟</h1>
                                    <p>
                                        <span style="color:rgb(0, 0, 0);font-size:25px" class="title">    نام مشتری   :</span>
                                        <span  style="color:green;font-size:25px"  class="content" id="cname"></span>
                                    </p>
                                    <p>
                                        <span  style="color:rgb(0, 0, 0);font-size:25px"  class="title" >   تاریخ خروج :</span>
                                        <span  style="color:rgb(210, 57, 11);font-size:25px"  class="content" id="dtate"></span>
                                    </p>
                                    <span class="btn btn-dark " id="myes" >بله</span>
                                    <span class="btn btn-danger " id="mno" >خیر</span>


                                </div>

                                <a class="btn btn-success " href="{{route('barcode.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

