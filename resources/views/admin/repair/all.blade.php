@component('admin.section.content',['title'=>'لیست خرابی ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  خرابی ها</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">       بارکد</h3>
{{--                            <div class="card-tools">--}}
{{--                                <div class="btn-group-sm">--}}
{{--                                    <a class="btn btn-info" href="{{route('barcode.create')}}">  بارکد جدید</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="card-tools"  >
                                <form action="{{route('repair.index')}}" method="get">
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

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>id</th>
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
                                        <td>{{$barcode->id}}</td>
                                        <td>{{$barcode->code}}</td>

                                        <td>{{isset($barcode->product)?$barcode->product->name:''}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->produce)}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->deliver)}}</td>
                                        <td>  {{implode(', ',$barcode->colores->pluck('name')->toArray())}}</td>
                                        <td>{{isset($barcode->version)?$barcode->version->name:'---'}}</td>
                                        <td>{{isset($barcode->customer)?$barcode->customer->name.' '.$barcode->customer->family:'---'}}</td>
                                        <td>@foreach($barcode->operators as $operator)
                                                {{$operator->name}}
                                                {{$operator->family}} -
                                            @endforeach
                                        </td>
                                        <td>{{$barcode->info}}</td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{request()->fullUrlWithQuery(['code'=>$barcode->id])}}">مشاهده</a>
{{--                                            <form action="{{route('barcode.destroy',$barcode->id)}}" style="display: inline-block" method="post">--}}
{{--                                                @method('delete')--}}
{{--                                                @csrf--}}
{{--                                                <input type="submit"  onclick="return confirm('Are you sure?')" value="حذف" class="btn btn-danger">--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endcomponent

