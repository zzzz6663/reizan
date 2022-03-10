@component('admin.section.content',['title'=>'  ایجاد  بارکد'])
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
                        <form role="form" action="{{route('barcode.store')}}" method="post" >
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> بارکد</label>
                                    <input type="number" name="code" value="{{old('code' ,\App\Models\Barcode::latest()->first()? \App\Models\Barcode::latest()->first()->code+1:1)}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="product">محصول  </label>
                                    <select class="form-control" name="product_id" id="product">
                                        <option value="" disabled >یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Product::all() as $product)
                                            <option  {{old('product_id')==$product->id?'selected':''}} value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="produce">  تاریخ تولید</label>
                                    <input type="text" name="produce" value="{{old('produce')}}" class="form-control persian" id="produce" placeholder="تاریخ تولید را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="deliver">  تاریخ خروج</label>
                                    <input type="text" name="deliver" value="{{old('deliver')}}" class="form-control persian3" id="deliver" placeholder="تاریخ خروج را وارد کنید">
                                </div>
                                <div   >
                                    <div class="form-group ">
                                        <input type="checkbox" {{(old('deliver') || old('customer_id'))?'checked':''}} value="1" style="  display:inline-block;   width: inherit; margin-left: 12px;"  class="form-control " id="deliverd" placeholder="تاریخ خروج را وارد کنید">
                                        <label for="deliverd">    نمایش تاریخ  خروج</label>
                                    </div>
                                </div>
                                <div class="dateh {{old('deliver')?'':'disnon'}}"  >
                                    <div class="form-group ">
                                        <label for="deliver">  تاریخ خروج</label>
                                        <input type="text" name="deliver" value="{{old('deliver')}}" class="form-control persian3" id="deliver" placeholder="تاریخ خروج را وارد کنید">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="version">  ورژن  </label>
                                    <select class="form-control select2" multiple name="versions[]" id="version">
                                        <option value="" disabled>یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Version::all() as $version)
                                            {{-- <option {{old('version_id')==$version->id?'selected':''}} value="{{$version->id}}">{{$version->name}}</option> --}}
                                            <option  {{in_array($version->id,old('versions',[]))?'selected':''}} value="{{$version->id}}">{{$version->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="color">رنگ  </label>
                                    <select class="form-control select2" multiple name="colores[]" id="color">
                                        <option value="" disabled>یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Color::all() as $color)
                                            <option  {{in_array($color->id,old('colores',[]))?'selected':''}} value="{{$color->id}}">{{$color->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="dateh  {{old('customer_id')?'':'disnon'}}" >
                                    <div class="form-group">
                                        <label for="color">مشتری  </label>
                                        <select class="form-control" name="customer_id" id="customer">
                                            <option  value=""  >یک مورد را انتخاب کنید</option>
                                            @foreach(\App\Models\User::whereLevel('customer')->get() as $customer)
                                                <option  {{old('customer_id')==$customer->id?'selected':''}} value="{{$customer->id}}">{{$customer->name}} {{$customer->family}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  </div>

                                <div class="form-group">
                                    <label for="color">مونتاژ کار  </label>
                                    <select class="form-control select2" name="operators[]" id="operator" multiple>
                                        @foreach(\App\Models\User::whereLevel('operator')->get()  as $operator)
                                            <option  {{in_array($operator->id,old('operators',[]))?'selected':''}} value="{{$operator->id}}">{{$operator->name}} {{$operator->family}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="info">توضیحات بارکد</label>
                                    <textarea name="info" id="info" class="form-control" cols="30" rows="10">{{old('info')}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('barcode.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

