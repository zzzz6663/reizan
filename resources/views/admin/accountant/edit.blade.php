@component('admin.section.content',['title'=>'  به روز رسانی  بارکد (حسابداری)'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  بارکد (حسابداری)</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم ویرایش بارکد (حسابداری)
                            {{$barcode->code}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('admin.accountant.update', $barcode)}}" method="post" >
                            @csrf
                            @method('post')
                                <div class="form-group">
                                    <input type="text" name="url" value="{{ redirect()->back()->getTargetUrl() }}" hidden>
                                    <label for="discount">  درصد تخفیف  </label>
                                    <input type="number" name="discount" value="{{old('discount',$barcode->discount)}}" class="form-control" id="discount" placeholder="درصد را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="cleared">    تصفیه شده  </label>
                                    <input type="text" hidden name="cleared" value="0">
                                    <input type="checkbox" name="cleared" value="1" {{old('cleared',$barcode->cleared)==1?'checked':''}} class=" - " id="cleared" placeholder="نام را وارد کنید">
                                </div>
                            <!-- /.card-body -->
                                <div class="form-group">
                                    <label for="color">مشتری  </label>
                                    <select class="form-control" name="customer_id" id="customer">
                                        <option  value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\User::whereLevel('customer')->get() as $customer)
                                            <option  {{old('customer_id',$barcode->customer_id)==$customer->id?'selected':''}} value="{{$customer->id}}">{{$customer->name}} {{$customer->family}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="deliver">  تاریخ خروج</label>
                                <input type="text" name="deliver" value="{{old('deliver',$barcode->deliver)}}" class="form-control persian" id="deliver" placeholder="تاریخ خروج را وارد کنید">
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">به روز رسانی</button>
                                <a class="btn btn-success" href="{{   session()->get('url',redirect()->route('admin.accountant.all')) }}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

