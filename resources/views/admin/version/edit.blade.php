@component('admin.section.content',['title'=>'  به روز رسانی  ورژن'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  ورژن</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                فرم ویرایش ورژن
                                {{$version->name}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('version.update', $version)}}" method="post" >
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام ورژن</label>
                                    <input type="text" name="name" value="{{old('name',$version->name)}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">به روز رسانی</button>
                                <a class="btn btn-success" href="{{route('version.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

