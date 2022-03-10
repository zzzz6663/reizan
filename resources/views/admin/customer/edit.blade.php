@component('admin.section.content',['title'=>'  ویرایش    کاربر'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">
            ویرایش  کاربر
        {{$user->name}}
        {{$user->family}}

        </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  کاربر</h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('customer.update',$user->id)}}" method="post" >
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">نام    </label>
                                    <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control" id="name" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="family">     نام خانوادگی</label>
                                    <input type="text" name="family" value="{{old('family',$user->family)}}" class="form-control" id="family" placeholder=" نام خانوادگی را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="mobile">       همراه </label>
                                    <input type="number" name="mobile" value="{{old('mobile',$user->mobile)}}" class="form-control" id="mobile" placeholder=" همراه   را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="tel">       ثابت </label>
                                    <input type="number" name="tel" value="{{old('tel',$user->tel)}}" class="form-control" id="tel" placeholder="   تلفن ثابت را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="ostan">       استان</label>
                                    <select class="form-control" name="ostan_id" id="ostan">
                                        <option  >استان را انتخاب کنید </option>
                                        @foreach(\App\Models\Ostan::all() as $ostan)
                                            <option {{old('ostan_id',$user->ostan->id)==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shahr">       شهر</label>
                                    <select class="form-control" name="shahr_id" id="shahr">
                                        <option value="{{$user->shahr->id}}">{{$user->shahr->name}}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">       ادرس</label>
                                    <input type="text" name="address" value="{{old('address',$user->address)}}" class="form-control" id="address" placeholder="   ادرس      ">
                                </div>
                                <div class="form-group">
                                    <label for="telegram">       تلگرام</label>
                                    <input type="text" name="telegram" value="{{old('telegram',$user->telegram)}}" class="form-control" id="telegram" placeholder="   تلگرام      ">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">       اینستاگرام</label>
                                    <input type="text" name="instagram" value="{{old('instagram',$user->instagram)}}" class="form-control" id="instagram" placeholder="   تلگرام      ">
                                </div>
                                <div class="form-group">
                                    <label for="active">       نمایش</label>
                                    <select name="active" class="form-control" id="active">
                                        <option {{old('active',$user->active)=='1'?'selected':''}} value="1">نمایش</option>
                                        <option {{old('active',$user->active)=='0'?'selected':''}} value="0">مخفی</option>
                                    </select>
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

