@component('admin.section.content',['title'=>'  به روز رسانی  قطعه'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  قطعه</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم ویرایش قطعه</h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('part.update', $part->id)}}" method="post" >
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام قطعه</label>
                                    <input type="text" name="name" value="{{old('name',$part->name)}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">قیمت قطعه</label>
                                    <input type="number" name="price" value="{{old('price',$part->price)}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">به روز رسانی</button>
                                <a class="btn btn-success" href="{{route('part.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

