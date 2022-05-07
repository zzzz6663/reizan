@component('admin.section.content',['title'=>'لیست   انتقال و موجودی'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  انتقال و موجودی  </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    موجودی  </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>بارکد </th>
                                    <th>وضعیت فروش </th>
                                    <th>  تاریخ خروج </th>
                                    <th>  تاریخ خروج </th>

                                </tr>
                                @foreach($barcodes as $barcode)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$barcode->code}}
                                        </td>
                                        <td>
                                           {{$barcode->customer_id?$barcode->customer->name.' '.$barcode->customer->family: 'فروش نرفته'}}
                                        </td>

                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->deliver)}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->created_at)}}</td>

                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    انتقال  </h3>
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

                                    <th>تاریخ ثبت  </th>
                                    <th>تاریخ بررسی  </th>

                                </tr>
                                @foreach($transfers as $transfer)
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
                                            {{$transfer->to->name}}
                                            {{$transfer->to->family}}
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
                                        <td>{{\Morilog\Jalali\Jalalian::forge($transfer->created_at)}}</td>
                                        <td>
                                            @if ($transfer->time)
                                            {{\Morilog\Jalali\Jalalian::forge($transfer->time)}}
                                            @endif
                                        </td>
                                        <td>

                                           @if (is_null($transfer->status))
                                           @if ($transfer->to_id==auth()->user()->id )
                                           <a class="btn btn-outline-primary" href="{{route('transfer.edit',$transfer->id)}}">تایید</a>


                                           @endif
                                           @if ($transfer->from_id==auth()->user()->id )
                                           <form action="{{route('transfer.destroy',$transfer->id)}}" style="display: inline-block" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="submit"  onclick="return confirm('Are you sure?')" value="حذف" class="btn btn-danger">
                                              </form>


                                           @endif


                                           @endif
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->




                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endcomponent

