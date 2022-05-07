@component('admin.section.content',['title'=>'  تایید  انتقال'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">تایید    انتقال</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم    تایید انتقال
                            {{$transfer->barcode->code}}
                            ارسال از
                            {{$transfer->from->name}}
                            {{$transfer->from->family}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('transfer.update',$transfer->id)}}" method="post" enctype="multipart">
                            @csrf
                            @method('patch')

                            <div class="card-body">
                                <p>
                                    {{$transfer->info_from}}
                                </p>
                                <div class="form-group">
                                    <label for="color">وضعیت  </label>
                                    <select class="form-control" name="status" id="customer">
                                        <option   value="">یک مورد را انتخاب کنید</option>
                                        <option value="1">تایید</option>
                                        <option value="0">رد </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">توضیحات    </label>
                                    <textarea name="info_to" id="" class="form-control" cols="30" rows="10">{{old('info_to')}}</textarea>
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

