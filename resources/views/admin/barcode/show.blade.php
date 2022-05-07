@component('admin.section.content',['title'=>'  مشاهده بارکد'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">مشاهده  جزئیات  بارکد</li>
    @endslot

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-title">  جزئیات   بارکد
                            {{$barcode->code}}
                            </h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                       <span class="text-primary">
                                               محصول:
                                       </span>
                                        @if(isset($barcode->product))
                                        {{$barcode->product->name}}
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                       <span class="text-primary">
                                               مشتری:
                                       </span>
                                        @if($barcode->customer)
                                        {{$barcode->customer->name}}
                                        {{$barcode->customer->family}}
                                            @endif
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                       <span class="text-primary">
                                            تخفیف
                                       </span>
                                        {{$barcode->discount}}%
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                       <span class="text-primary">
                                            وضعیت
                                       </span>
                                       <span class="text-{{$barcode->cleared==1?'success   ':'danger   '}} ">
                                            {{$barcode->cleared==1?'تسویه شده':'تسویه نشده'}}
                                       </span>
                                    </h5>
                                </div>

                                <div class="col-3">
                                    <h5>
                                       <span class="text-primary">
                                            تاریخ تولید:
                                       </span>
                                        {{\Morilog\Jalali\Jalalian::forge($barcode->produce)->format('d-m-Y')}}

                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                                   تاریخ خروج:

                                       </span>
                                        {{\Morilog\Jalali\Jalalian::forge($barcode->deliver)->format('d-m-Y')}}

                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                           ورژن:
                                       </span>

                                       {{implode(', ',$barcode->versions->pluck('name')->toArray())}}
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                          رنگ:
                                       </span>

                                        {{implode(', ',$barcode->colores->pluck('name')->toArray())}}
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                          گارانتی:
                                       </span>

                                        {{$barcode->guaranty}}
                                        ماه
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                              مشتری:
                                       </span>

                                        @if($barcode->customer)

                                        {{$barcode->customer->name}}
                                        {{$barcode->customer->family}}
                                            @endif
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                              استان:
                                       </span>
                                        @if($barcode->customer)

                                        {{$barcode->customer->ostan->name}}
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                            مونتاژ:
                                       </span>
                                        @foreach($barcode->operators as $operator)
                                            {{$operator->name }}
                                            {{$operator->family}} -
                                        @endforeach
                                    </h5>
                                </div>
                                <div class="col-3">
                                    <h5>
                                            <span class="text-primary">
                                               توضیحات:
                                       </span>

                                        {{$barcode->info }}
                                    </h5>
                                </div>



                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    <h5>
                                            <span class="text-primary">
                                             قطعات
                                       </span>
                                        @if(isset($barcode->product))
                                        {{implode('-',$barcode->product->parts->pluck('name')->toArray()  )}}
                                        @endif
                                    </h5>
                                </div>
                            </div> --}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <h5>--}}
{{--                                       <span class="text-primary">--}}
{{--                                             مونتاژ--}}
{{--                                       </span>--}}
{{--                                        {{implode('-',$barcode->operators->pluck(['name','family'])->toArray()  )}}--}}
{{--                                    </h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                             <div class="row">
                                 <div class="col-12">
                                     {{-- <a href="{{url()->previous()}}" class="btn btn-danger">برگشت</a> --}}
                                     <a href="{{route('barcode.index')}}" class="btn btn-warning">خروج</a>
                                     @role('admin')
                                     <a href="{{route('barcode.edit',$barcode->id)}}" class="btn btn-primary">ویرایش</a>
                                    @endrole
                             </div>
                        </div>


                    </div>



                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">        لیست خرابی ها
                                {{$barcode->code}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

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
                                @foreach($barcode->repairs as $repair)
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
                                            <a class="btn btn-outline-danger" href="{{route('repair.print.factor',$repair->id)}}">رسید ها</a>
                                            <a class="btn btn-outline-warning" href="{{route('repair.ready.sms',$repair->id)}}">  ارسال پیامک مراجعه</a>
                                            <a class="btn btn-outline-success" href="{{route('repair.deliver.sms',$repair->id)}}">  ارسال پیامک تحویل</a>

                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->



                    </div>




                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">            لیست   انتقال
                                {{$barcode->code}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>بارکد </th>
                                    <th>مبدا </th>
                                    <th>توضیحات مبدا </th>
                                    <th>مقصد </th>
                                    <th>توضیحات مقصد </th>
                                    <th>  وضعیت </th>
                                    <th>  نوع </th>

                                    <th>تاریخ ثبت  </th>
                                    <th>تاریخ بررسی  </th>

                                </tr>
                                @foreach($barcode->transfers()->latest()->get() as $transfer)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$transfer->barcode->code}}
                                        </td>
                                        <td>
                                            {{$transfer->from->name}}
                                            {{$transfer->from->family}}
                                        </td>
                                        <td>
                                            {{$transfer->info_from}}
                                        </td>
                                        <td>
                                            @if ($transfer->to)
                                            {{$transfer->to->name}}
                                            {{$transfer->to->family}}
                                            @endif

                                        </td>
                                        <td>
                                            {{$transfer->info_to}}
                                        </td>
                                        <td>
                                            @switch($transfer->status)
                                                @case(null)
                                            در دست بررسی
                                            @break
                                                @case(1)
                                            تایید شده
                                            @break
                                                @case(1)
                                              رد شده
                                            @break

                                                @default

                                            @endswitch
                                        </td>
                                        <td>
                                            @if ($transfer->type)
                                            {{__('arr.'.$transfer->type)}}
                                            @endif

                                        </td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($transfer->created_at)}}</td>
                                        <td>
                                            @if ($transfer->time)
                                            {{\Morilog\Jalali\Jalalian::forge($transfer->time)}}
                                            @endif
                                        </td>

                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->



                    </div>
                    @include('admin.barcode.record',['barcode'=>$barcode,'show'=>true])
                </div>

            </div>
        </div>
    </div>
@endcomponent

