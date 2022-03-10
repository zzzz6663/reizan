@component('admin.section.content',['title'=>'لیست بار کد ها '])
    @slot('bread')

        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">(حسابداری)  لیست  بار کد ها  </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header no-border">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">  جستو جو</h3>
                            </div>
                        </div>
                        <div class="card-tools"  >
                            <form action="{{route('admin.accountant.all')}}" method="get">
                                <div class="input-group input-group-sm" style="width: 250px;">
                                    @method('get')
                                    @csrf
                                    <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder=" جستجو بارکد">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.col-md-6 -->

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">(حسابداری)  لیست    بار کد ها

                            </h3>
                            <br>
                            <form action="{{route('admin.accountant.all')}}" method="get" autocomplete="off">
                                @csrf
                                @method('post')
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
                                <div class="col-lg-3">
                                    <label for="customer_id">
                                           مشتری
                                    </label>
                                    <select name="customer_id" id="customer_id">
                                        <option value="">یکی را انتخاب کنید</option>
                                        @foreach(\App\Models\User::whereLevel('customer')->latest()->get() as $customer)
                                            <option {{request('customer_id')==$customer->id?'selected':''}} value="{{$customer->id}}">{{$customer->name. ' ' . $customer->family}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">

                                    <label for="all">
                                        همه
                                    </label>
                                    <input {{request('status')=='all'?'checked':''}} type="radio" name="status" id="all" class="  ml-4" value="all">
                                    <label for="cleared">
                                        تسویه شده
                                    </label>
                                    <input {{request('status')=='cleared'?'checked':''}} type="radio" name="status" id="all" class="   ml-4" value="cleared">
                                    <label for="uncleared">
                                        تسویه نشده
                                    </label>
                                    <input {{request('status')=='uncleared'?'checked':''}} type="radio" name="status" id="all" class="   ml-4" value="uncleared">

                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label for="df">
                                       درصد تخفیف از
                                    </label>
                                    <input type="number" name="df" id="df" class=" clr" value="{{request('df')}}"   min="0" max="100" placeholder="از  ">
                                </div>
                                <div class="col-lg-3">
                                    <label for="dt">
                                        درصد تخفیف
                                        تا
                                    </label>
                                    <input type="number" name="dt" id="dt" class="clr " value="{{request('dt')}}"    min="0" max="100" placeholder="تا   ">
                                </div>
                                <div class="col-lg-3">
                                    <label for="submit"></label>
                                    <input type="submit" id="submit" value="جست و جو">
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
                                    <th>محصول </th>
                                    <th>تاریخ تولید </th>
                                    <th>تاریخ خروج </th>
                                    <th>  رنگ </th>
                                    <th>  ورژن </th>
                                    <th>  مشتری </th>
                                    <th>  اپراتور </th>
                                    <th>  توضیحات </th>
                                    <th>  وضعیت  </th>
                                    <th>  تخفیف  </th>
                                    <th>  اقدامات </th>
                                </tr>
                                @foreach($barcodes as $barcode)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$barcode->code}}</td>

                                        <td>{{isset($barcode->product->name)?$barcode->product->name:''}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->produce)}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->deliver)}}</td>
                                        <td>  {{implode(', ',$barcode->colores->pluck('name')->toArray())}}</td>
                                        <td>{{isset($barcode->version->name)?$barcode->version->name:''}}</td>
                                        <td>{{isset($barcode->customer->name)?$barcode->customer->name .' '.$barcode->customer->family :''}}</td>
                                        <td>@foreach($barcode->operators as $operator)
                                                {{$operator->name}}
                                                {{$operator->family}} -
                                            @endforeach
                                        </td>
                                        <td>{{$barcode->info}}</td>

                                        <td>
                                            <span class="text-{{$barcode->cleared==1?'success':'danger'}}">
                                                {{$barcode->cleared==1?'تسویه شده':'تسویه نشده'}}
                                            </span>
                                        </td>
                                        <td>{{$barcode->discount}}</td>

                                        <td>
                                            <a class="btn btn-outline-primary"  href="{{route('admin.accountant.edit',$barcode->id)}}">ویرایش</a>
{{--                                            <form action="{{route('barcode.destroy',$barcode->id)}}" style="display: inline-block" method="post">--}}
{{--                                                @method('delete')--}}
{{--                                                @csrf--}}
{{--                                                <input type="submit" value="حذف" class="btn btn-danger">--}}
{{--                                            </form>--}}
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

