@component('admin.section.content',['title'=>'  ایجاد  دسته بندی'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  دسته بندی</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  دسته بندی</h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('cats.store')}}" method="post" >
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام دسته بندی</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">توضیحات دسته بندی</label>
                                    <textarea name="info" id="" class="form-control" cols="30" rows="10">{{old('info')}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('cats.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

