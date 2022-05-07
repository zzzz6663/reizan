@component('admin.section.content',['title'=>'  ایجاد  انتقال'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد    انتقال</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم    انتقال
                            {{$barcode->code}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('transfer.store')}}" method="post" >
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="color">مقصد  </label>
                                    <input type="text" name="barcode_id" value="{{$barcode->id}}" hidden>
                                    <select class="form-control" name="to_id" id="customer">
                                        <option   value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\User::whereIn('level',['operator','qc','accountant','service','producer'])->get() as $goal)
                                        <option value="{{$goal->id}}">
                                        {{$goal->name}}
                                        {{$goal->family}}
                                       ( {{__('arr.'.$goal->level)}})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">توضیحات    </label>
                                    <textarea name="info_from" id="" class="form-control" cols="30" rows="10">{{old('info_from')}}</textarea>
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

