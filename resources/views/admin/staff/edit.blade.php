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
                        <form role="form" action="{{route('staff.update',$user->id)}}" method="post" >
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
                                    <label for="username">  یوزر نیم </label>
                                    <input type="text" name="username" value="{{old('username',$user->username)}}" class="form-control" id="username" placeholder=" یوزر نیم را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="password">    رمز عبور </label>
                                    <input type="text" name="password" value="{{old('password',\Illuminate\Support\Facades\Crypt::decryptString($user->password))}}" class="form-control" id="password" placeholder=" یوزر نیم را وارد کنید">
{{--                                    <input type="text" name="password" value="{{old('password',$user->password)}}" class="form-control" id="password" placeholder=" یوزر نیم را وارد کنید">--}}
                                </div>
                                <div class="form-group">
                                    <label for="level">  نوع کابری   </label>
                                    <select name="level" id="level" class="form-control">
                                        <option  >یک مورد  را انتخاب کنید </option>
                                        <option {{old('level',$user->level)=='operator'?'selected':''}} value="operator">  اپراتور </option>
                                        <option {{old('level',$user->level)=='qc'?'selected':''}} value="qc">  کنترل کیفیت  </option>
                                        <option {{old('level',$user->level)=='accountant'?'selected':''}} value="accountant">    حسابداری  </option>
                                        <option {{old('level',$user->level)=='service'?'selected':''}} value="service">    خدمات پس از فروش  </option>
                                        <option {{old('level',$user->level)=='admin'?'selected':''}} value="admin">    ادمین  </option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('admin.staff')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

