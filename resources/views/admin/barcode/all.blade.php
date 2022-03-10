@component('admin.section.content',['title'=>'لیست بارکد'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  بارکد</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @can('is_admin')
                            <div class="card-body">
                                <h1>
                                    وضعیت
                                </h1>
                                <div class="row">
                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">        ثبت اولیه </h4>

                                        <div class="color-palette-set text-center">
                                            <a href="{{route('repair.list',['status'=>'submit'])}}" class="bg-danger disabled color-palette p-1"><span>{{\App\Models\Repair::whereStatus('submit')->count()}} عدد</span></a>
                                            {{--                                        <div class="bg-primary color-palette"><span>#۳c۸dbc</span></div>--}}
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">        ثبت نهایی </h4>

                                        <div class="color-palette-set text-center">
                                            <a href="{{route('repair.list',['status'=>'saves'])}}" class="bg-primary disabled color-palette p-1"><span>{{\App\Models\Repair::whereStatus('saves')->count()}} عدد</span></a>
                                            {{--                                        <div class="bg-primary color-palette"><span>#۳c۸dbc</span></div>--}}
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">        تحویل   </h4>

                                        <div class="color-palette-set text-center">
                                            <a href="{{route('repair.list',['status'=>'delivered'])}}" class="bg-warning disabled color-palette p-1"><span>{{\App\Models\Repair::whereStatus('delivered')->count()}} عدد</span></a>
                                            {{--                                        <div class="bg-primary color-palette"><span>#۳c۸dbc</span></div>--}}
                                        </div>
                                    </div>
                                </div>
                                <h1>
                                    برگشتی
                                </h1>
                                <div class="row">
                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">    مجموع برگشتی ها</h4>

                                        <div class="color-palette-set">
                                            <div class="bg-primary disabled color-palette p-1">
                                                    <a href="{{route('barcode.index',['status'=>'all_back'])}}">
                                                        <span>{{\App\Models\Barcode::has('repairs','>',0)->count()}} عدد</span>

                                                    </a>

                                            </div>
                                            {{--                                        <div class="bg-primary color-palette"><span>#۳c۸dbc</span></div>--}}
                                        </div>
                                    </div>


                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">  روز گذشته  </h4>
                                        <div class="color-palette-set">
                                            <div class="bg-success disabled color-palette p-1">
                                                <a href="{{route('barcode.index',['status'=>'day_past_back'])}}">
                                                    <span>{{\App\Models\Barcode::has('repairs','>',0)->where('created_at','<',\Carbon\Carbon::now()->subDay())->count()}} عدد</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">  هفته گذشته  </h4>
                                        <div class="color-palette-set">
                                            <div class="bg-danger disabled color-palette p-1">
                                                <a href="{{route('barcode.index',['status'=>'week_past_back'])}}">
                                                    <span>{{\App\Models\Barcode::has('repairs','>',0)->where('created_at','<',\Carbon\Carbon::now()->subDay(7))->count()}} عدد</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">  ماه گذشته  </h4>
                                        <div class="color-palette-set">
                                            <div class="bg-gray disabled color-palette p-1">
                                                <a href="{{route('barcode.index',['status'=>'month_past_back'])}}">
                                                    <span>{{\App\Models\Barcode::has('repairs','>',0)->where('created_at','<',\Carbon\Carbon::now()->subMonth())->count()}} عدد</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            {{--                            <!-- /.row -->--}}
                            {{--                            <div class="row">--}}
                            {{--                                <!-- /.col -->--}}
                            {{--                                <div class="col-sm-4 col-md-2">--}}
                            {{--                                    <h4 class="text-center">Black</h4>--}}

                            {{--                                    <div class="color-palette-set">--}}
                            {{--                                        <div class="bg-black disabled color-palette"><span>Disabled</span></div>--}}
                            {{--                                        <div class="bg-black color-palette"><span>#۱۱۱۱۱۱</span></div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <!-- /.col -->--}}
                            {{--                            </div>--}}
                            <!-- /.row -->
                            </div>
                        <div class="card-body">
                            <h1>
                                انبار
                            </h1>
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <h4 class="text-center">موجودی   انبار</h4>

                                    <div class="color-palette-set">
                                        <div class="bg-primary disabled color-palette p-1">
                                            <a href="{{route('barcode.index',['status'=>'store'])}}">
                                                <span>{{\App\Models\Barcode::where('customer_id',null)->count()}} عدد</span>
                                            </a>

                                        </div>
                                        {{--                                        <div class="bg-primary color-palette"><span>#۳c۸dbc</span></div>--}}
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <h4 class="text-center">  مجموع تولید    </h4>
                                    <div class="color-palette-set">
                                        <div class="bg-success disabled color-palette p-1">
                                            <a href="{{route('barcode.index',['status'=>'produce'])}}">
                                                <span>{{\App\Models\Barcode::where('created_at','<',\Carbon\Carbon::now())->count()}} عدد</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <h4 class="text-center">  هفته گذشته  </h4>
                                    <div class="color-palette-set">
                                        <div class="bg-danger disabled color-palette p-1">
                                            <a href="{{route('barcode.index',['status'=>'week_produce'])}}">
                                                <span>{{\App\Models\Barcode::where('created_at','<',\Carbon\Carbon::now()->subDays(7))->count()}} عدد</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <h4 class="text-center">  ماه گذشته  </h4>
                                    <div class="color-palette-set">
                                        <div class="bg-gray disabled color-palette p-1">
                                            <a href="{{route('barcode.index',['status'=>'month_produce'])}}">
                                                <span>{{\App\Models\Barcode::where('created_at','<',\Carbon\Carbon::now()->subMonth())->count()}} عدد</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <h4 class="text-center">    فروش رفته  </h4>
                                    <div class="color-palette-set">
                                        <div class="bg-warning disabled color-palette p-1">
                                            <a href="{{route('barcode.index',['status'=>'sold'])}}">
                                                <span>{{\App\Models\Barcode::where('customer_id','!=',null)->count()}} عدد</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
{{--                            <!-- /.row -->--}}
{{--                            <div class="row">--}}
{{--                                <!-- /.col -->--}}
{{--                                <div class="col-sm-4 col-md-2">--}}
{{--                                    <h4 class="text-center">Black</h4>--}}

{{--                                    <div class="color-palette-set">--}}
{{--                                        <div class="bg-black disabled color-palette"><span>Disabled</span></div>--}}
{{--                                        <div class="bg-black color-palette"><span>#۱۱۱۱۱۱</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                            </div>--}}
                            <!-- /.row -->
                        </div>
                            <div class="card-body">
                                <h1>
                                    آمار
                                </h1>
                                <div class="row">
                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">    مجموع  تولید </h4>

                                        <div class="color-palette-set">
                                            <div class="bg-primary disabled color-palette p-1">
                                                <a href="{{route('barcode.index',['status'=>'all_produce'])}}">
                                                    <span>{{\App\Models\Barcode::whereDate('created_at', \Carbon\Carbon::today())->count()}} عدد</span>
                                                </a>
                                                {{-- <span><?php echo e(\App\Models\Barcode::whereDate('created_at', \Carbon\Carbon::today())->count()); ?> عدد</span> --}}

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">  مجموع خدمات  </h4>
                                        <div class="color-palette-set">
                                            <div class="bg-success disabled color-palette p-1">
                                                {{-- <span><?php echo e(\App\Models\Repair:: whereDate('created_at', \Carbon\Carbon::today())->count()); ?> عدد</span> --}}
                                                <a href="{{route('barcode.index',['status'=>'all_service'])}}">
                                                    <span>{{\App\Models\Barcode::whereDate('created_at', \Carbon\Carbon::today())->count()}} عدد</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-2">
                                        <h4 class="text-center">  مجموع فروش  </h4>
                                        <div class="color-palette-set">
                                            <div class="bg-danger disabled color-palette p-1">
                                                <a href="{{route('barcode.index',['status'=>'all_sell'])}}">
                                                    <span>{{\App\Models\Barcode::whereDate('sell', \Carbon\Carbon::today())->count()}} عدد</span>
                                                </a>
                                                {{-- <span><?php echo e(\App\Models\Barcode::whereDate('sell', \Carbon\Carbon::today())->count()); ?> عدد</span> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <!--                                    <div class="col-sm-4 col-md-2">-->
                                    <!--                                        <h4 class="text-center">  ماه گذشته  </h4>-->
                                    <!--                                        <div class="color-palette-set">-->
                                    <!--                                            <div class="bg-gray disabled color-palette p-1"><span>--><?php //echo e(\App\Models\Barcode::where('created_at','<',\Carbon\Carbon::now()->subMonth())->count()); ?><!-- عدد</span></div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->

                                </div>













                                <!-- /.row -->
                            </div>
                        @endcan

                        <div class="card-header">
                            <h3 class="card-title">  لیست    بارکد

                               <span style="color:green;font-size:28px">
                                {{$barcodes->total()}}
                                عدد
                               </span>
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                                    <a class="btn btn-warning" href="{{route('barcode.index',['all'=>1])}}">  نمایش موجودی  </a>
                                </div>
                            </div>
                            <div class="card-tools"  style="left:  9rem">
                                <div class="btn-group-sm">
                                    <a class="btn btn-info" href="{{route('barcode.create')}}">  بارکد جدید</a>
                                </div>
                            </div>
                            <div class="card-tools" style="left: 16rem">


                                <form action="{{route('barcode.index')}}" method="GET">
                                {{-- <form action="{{action('barcode.index',['status'=>'all_sell'])}}" method="get"> --}}
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        @method('get')
                                        @csrf
                                        @if (request('status'))
                                        <input type="text" hidden  name="status" value="{{request('status')}}" class="form-control float-right" >
                                        @endif
                                        <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder="جستجو">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>کد </th>
                                    <th>محصول </th>
                                    <th>تاریخ تولید </th>
                                    <th>تاریخ خروج </th>
                                    <th>  رنگ </th>
                                    <th>  ورژن </th>
                                    <th>  مشتری </th>
                                    <th>  اپراتور </th>
                                    <th>  توضیحات </th>
                                    <th>  اقدامات </th>
                                </tr>
                                @foreach($barcodes as $barcode)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$barcode->code}}</td>

                                        <td>{{isset($barcode->product)?$barcode->product->name:''}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->produce)}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->deliver)}}</td>
                                        <td>  {{implode(', ',$barcode->colores->pluck('name')->toArray())}}</td>
                                        <td>  {{implode(', ',$barcode->versions->pluck('name')->toArray())}}</td>
                                        {{-- <td>{{isset($barcode->version)?$barcode->version->name:'----'}}</td> --}}
                                        <td>{{isset($barcode->customer)?$barcode->customer->name.' ' .$barcode->customer->family:'----'}}</td>
                                        <td>@foreach($barcode->operators as $operator)
                                                {{$operator->name}}
                                                {{$operator->family}} -
                                            @endforeach
                                        </td>
                                        <td>{{$barcode->info}}</td>
                                        <td>
                                            @can('is_admin')
                                            <a class="btn btn-outline-secondary" href="{{route('barcode.show',$barcode->id)}}">مشاهده</a>
                                            @endcan
                                            <a class="btn btn-outline-primary" href="{{route('barcode.edit',$barcode->id)}}">ویرایش</a>
                                            <form action="{{route('barcode.destroy',$barcode->id)}}" style="display: inline-block" method="post">
                                                @method('delete')
                                                @csrf
                                                <input type="submit" value="حذف" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">

                            <div class="pagi">

                                {{ $barcodes->appends(Request::all())->links('admin.pagination') }}
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endcomponent

