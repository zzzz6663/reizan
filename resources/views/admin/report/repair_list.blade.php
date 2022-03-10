@component('admin.section.content',['title'=>'لیست خرابی ها '])
    @slot('bread')

        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">  لیست  خرابی ها  </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
{{--                <div class="col-lg-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header no-border">--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <h3 class="card-title">  جستو جو</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-tools"  >--}}
{{--                            <form action="{{route('admin.accountant.all')}}" method="get">--}}
{{--                                <div class="input-group input-group-sm" style="width: 250px;">--}}
{{--                                    @method('get')--}}
{{--                                    @csrf--}}
{{--                                    <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder=" جستجو بارکد">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <!-- /.col-md-6 -->--}}

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    خرابی ها

                            </h3>
                            <br>
                            <form action="{{route('repair.list')}}" method="get" autocomplete="off">
                                @csrf
                                @method('post')
                                <h1>
                                    تاریخ مراجعه
                                </h1>
                            <div class="row">


                                <div class="col-lg-3">
                                    <label for="from">
                                        از تاریخ
                                    </label>
                                    <input type="text" hidden name="filter"  value="1" class="persian3" placeholder="از تاریخ">
                                    <input type="text" name="from" id="from" value="{{request('from')}}" class="persian3" placeholder="از تاریخ">
                                </div>
                                <div class="col-lg-3">
                                    <label for="to">
                                        تا تاریخ
                                    </label>
                                    <input type="text" name="to" id="to" value="{{request('to')}}" class="persian3" placeholder="تا تاریخ">
                                </div>
{{--                                <div class="col-lg-3">--}}
{{--                                    <label for="customer_id">--}}
{{--                                           مشتری--}}
{{--                                    </label>--}}
{{--                                    <select name="customer_id" id="customer_id">--}}
{{--                                        <option value="">یکی را انتخاب کنید</option>--}}
{{--                                        @foreach(\App\Models\User::whereLevel('customer')->latest()->get() as $customer)--}}
{{--                                            <option {{request('customer_id')==$customer->id?'selected':''}} value="{{$customer->id}}">{{$customer->name. ' ' . $customer->family}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                            </div>
                            <br>

                                <h1>
                                    تاریخ تولید
                                </h1>
                                <div class="row">


                                    <div class="col-lg-3">
                                        <label for="pfrom">
                                            از تاریخ
                                        </label>
                                        <input type="text" name="pfrom" id="pfrom" value="{{request('pfrom')}}" class="persian3" placeholder="از تاریخ">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="pto">
                                            تا تاریخ
                                        </label>
                                        <input type="text" name="pto" id="pto" value="{{request('pto')}}" class="persian3" placeholder="تا تاریخ">
                                    </div>
                                </div>
                                <br>

                                <h1>
                                    تاریخ فروش
                                </h1>
                                <div class="row">


                                    <div class="col-lg-3">
                                        <label for="sfrom">
                                            از تاریخ
                                        </label>
                                        <input type="text" name="sfrom" id="sfrom" value="{{request('sfrom')}}" class="persian3" placeholder="از تاریخ">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="sto">
                                            تا تاریخ
                                        </label>
                                        <input type="text" name="sto" id="sto" value="{{request('sto')}}" class="persian3" placeholder="تا تاریخ">
                                    </div>
                                </div>
                                <br>
                            <div class="row">
{{--                                <div class="col-lg-9">--}}

{{--                                    <label for="all">--}}
{{--                                        همه--}}
{{--                                    </label>--}}
{{--                                    <input {{request('status')=='all'?'checked':''}} type="radio" name="status" id="all" class="  ml-4" value="all">--}}
{{--                                    <label for="poll">--}}
{{--                                       نظر سنجی--}}
{{--                                    </label>--}}
{{--                                    <input {{request('status')=='poll'?'checked':''}} type="radio" name="status" id="all" class="   ml-4" value="poll">--}}
{{--                                    <label for="system">--}}
{{--                                       سیستم--}}
{{--                                    </label>--}}
{{--                                    <input {{request('status')=='system'?'checked':''}} type="radio" name="status" id="all" class="   ml-4" value="system">--}}

{{--                                </div>--}}
                                <div class="col-lg-12">
                                    <label for="submit"></label>
                                    <input type="submit" id="submit" value="جست و جو">
                                    @if($repairs->count()>0)
                                    <input type="submit" id="submit" name="excel" value="  excel  ">
                                    @endif
                                </div>
                            </div>


                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>کد </th>
                                    <th> همراه مصرف کننده </th>
                                    <th>مالک </th>
                                    <th>وضعیت </th>
                                    <th>محصول </th>
                                    <th>تاریخ تولید </th>
                                    <th>تاریخ خروج </th>
                                    <th>  رنگ </th>
                                    <th>  ورژن </th>
                                    <th>   تاریخ ثبت خرابی </th>
                                </tr>
                                @foreach($repairs as $repair)

                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('repair.index',['code'=>$repair->barcode->id])}}">
                                                {{$repair->barcode->code}}
                                            </a>
                                        </td>
                                        <td>{{$repair->tell }}</td>
                                        <td>{{$repair->name }}</td>
                                        <td>{{__('arr.'.$repair->status) }}</td>
                                        <td>{{isset($repair->barcode->product->name)?$repair->barcode->product->name:''}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($repair->barcode->produce)}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($repair->barcode->deliver)}}</td>
                                        <td>  {{implode(', ',$repair->barcode->colores->pluck('name')->toArray())}}</td>
                                        <td>{{isset($repair->barcode->version->name)?$repair->barcode->version->name:''}}</td>
                                        <td>
                                            {{\Morilog\Jalali\Jalalian::forge($repair->created_at)}}
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">

                            <div class="pagi">
                                {{ $repairs->appends(Request::all())->links('admin.pagination') }}
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

