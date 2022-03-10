@component('admin.section.content',['title'=>' تنظیمات  '])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"> تنظیمات     </li>
    @endslot
    <?php

//    $setting = new \App\Models\Setting();
//    dd($setting->set('password'));
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  تنظیمات ورود</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
{{--                        @if($errors->any())--}}
{{--                            {!! implode('', $errors->all('<div class="text-danger">:message</div>'))  !!}--}}
{{--                        @endif--}}
                        <form role="form" method="post" action=" ">
                            @method('post')
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Username     </label>
{{--                                    <input type="text" value="{{old('username',$setting->set('username'))}}"   name="username" class="form-control" id="exampleInputEmail1" placeholder="    Username  ">--}}
                                    @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
{{--                                    <input type="password"  value="{{old('password',\Illuminate\Support\Facades\Crypt::decryptString($setting->set('password')) )}}"   name="password" class="form-control" id="exampleInputPassword1" placeholder=" Password">--}}
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <!-- left column -->

                <!--/.col (left) -->
                <!-- right column -->

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->


    </section>

@endcomponent

