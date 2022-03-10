@component('admin.section.content',['title'=>'  ایجاد    مشتری'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  مشتری</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  مشتری</h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('customer.store')}}" method="post" >
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">نام    </label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="family">     نام خانوادگی</label>
                                    <input type="text" name="family" value="{{old('family')}}" class="form-control" id="family" placeholder=" نام خانوادگی را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="mobile">       همراه </label>
                                    <input type="number" name="mobile" value="{{old('mobile')}}" class="form-control" id="mobile" placeholder=" همراه   را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="tel">       ثابت </label>
                                    <input type="number" name="tel" value="{{old('tel')}}" class="form-control" id="tel" placeholder="   تلفن ثابت را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="ostan">       استان</label>
                                    <select class="form-control" name="ostan_id" id="ostan">
                                        <option  >استان را انتخاب کنید </option>
                                        @foreach(\App\Models\Ostan::all() as $ostan)
                                            <option {{old('ostan_id')==$ostan->id?'selecteddddd':''}} value="{{$ostan->id}}">{{$ostan->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shahr">       شهر</label>
                                    <select class="form-control" name="shahr_id" id="shahr">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">       ادرس</label>
                                    <input type="text" name="address" value="{{old('address')}}" class="form-control" id="address" placeholder="   ادرس      ">
                                </div>
                                <div class="form-group">
                                    <label for="telegram">       تلگرام</label>
                                    <input type="text" name="telegram" value="{{old('telegram')}}" class="form-control" id="telegram" placeholder="   تلگرام      ">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">       اینستاگرام</label>
                                    <input type="text" name="instagram" value="{{old('instagram')}}" class="form-control" id="instagram" placeholder="   تلگرام      ">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('admin.customer')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

