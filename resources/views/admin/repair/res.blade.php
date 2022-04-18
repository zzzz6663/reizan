@component('admin.section.content',['title'=>'     مشاهده بار کد و ثبت خرابی'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   مشاهده بار کد و ثبت خرابی


        </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  اطلاعات
                                {{$barcode->code}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                 <h5>
                                       <span class="text-danger">
                                               محصول:
                                       </span>
                                          @if($barcode->product)

                                     {{$barcode->product->name}}
                                     @endif
                                 </h5>
                                </div>

                                <div class="col-3">
                                    <h5>
                                       <span class="text-danger">
                                            تاریخ تولید:
                                       </span>
                                        {{\Morilog\Jalali\Jalalian::forge($barcode->produce)->format('h-m-Y')}}

                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-danger">
                                                   تاریخ خروج:

                                       </span>
                                      {{\Morilog\Jalali\Jalalian::forge($barcode->deliver)->format('h-m-Y')}}

                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-danger">
                                           ورژن:
                                       </span>
                                       {{implode(', ',$barcode->versions->pluck('name')->toArray())}}

                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-danger">
                                          رنگ:
                                       </span>

                                        {{implode(', ',$barcode->colores->pluck('name')->toArray())}}
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-danger">
                                              مشتری:
                                       </span>
                                       @if ($barcode->customer)
                                       {{$barcode->customer->name}}
                                       {{$barcode->customer->family}}
                                       @endif


                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-danger">
                                              اپراتور:
                                       </span>
                                        @foreach($barcode->operators as $operator)
                                            {{$operator->name}}
                                            {{$operator->family}} -
                                        @endforeach
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-danger">
                                               توضیحات:
                                       </span>

                                        {{$barcode->info }}
                                    </h5>
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">     تاریخچه
                                {{$barcode->code}}
                            </h3>
                        </div>
                        <!-- /.card-header -->

                      @include('error')
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{route('repair.index')}}" class="btn btn-secondary">برگشت</a>
                                        <a href="{{route('repair.create',['barcode'=>$barcode->id])}}" class="btn btn-danger">ثبت خرابی جدید</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                             <h1>
                                 لیست خرابی ها
                             </h1>
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>همراه </th>
                                    <th>وضعیت </th>
                                    <th>اپراتور </th>
                                    <th>تاریخ </th>

                                    <th>اقدام </th>
                                </tr>
                                @foreach($barcode->repairs()->latest()->get() as $repair)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$repair->name}}</td>
                                        <td>{{$repair->tell}}</td>
                                        <td>{{__('arr.'.$repair->status)}}</td>
                                        <td>
                                            @if ($repair->user)
                                            {{$repair->user->name}}

                                            {{$repair->user->family}}
                                            @endif

                                        </td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($repair->created_at)}}</td>

                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('repair.edit',$repair->id)}}">ویرایش</a>
{{--                                            <a class="btn btn-outline-success" href="{{route('repair.print.customer',$repair->id)}}">رسید مشتری</a>--}}
                                            <a class="btn btn-outline-danger" href="{{route('repair.add.images',$repair->id)}}">  تصاویر</a>
                                            <a class="btn btn-outline-danger" href="{{route('repair.print.factor',$repair->id)}}">رسید ها</a>
                                            <a class="btn btn-outline-warning" href="{{route('repair.ready.sms',$repair->id)}}">  ارسال پیامک مراجعه</a>
                                            <a class="btn btn-outline-success" href="{{route('repair.deliver.sms',$repair->id)}}">  ارسال پیامک تحویل</a>
                                            <form action="{{route('repair.destroy',$repair->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit"  onclick="return confirm('Are you sure?')" value="حذف" class="btn btn-danger">
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->



                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

