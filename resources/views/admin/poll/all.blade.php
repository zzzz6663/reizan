@component('admin.section.content',['title'=>'لیست نظرسنجی'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  نظرسنجی</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    نظرسنجی</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                                </div>
                            </div>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">  لیست    خرابی ها

                            </h3>
                            <br>
                            <form action="{{route('poll.index')}}" method="get" autocomplete="off">
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
                                        @if($polls->count()>0)
                                            <input type="submit" id="submit" name="excel" value="  excel  ">
                                        @endif
                                    </div>
                                </div>


                            </form>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>همراه </th>
                                    <th>بارکد </th>
                                    <th>محصول </th>
                                    <th>تاریخ  </th>
                                    <th>اقدام </th>
                                </tr>
                                @foreach($polls as $poll)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($poll->user)
                                            {{$poll->user->name}}
                                            @endif
                                            @if($poll->user)
                                            {{$poll->user->family}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($poll->user)
                                            {{$poll->user->mobile}}
                                            @endif
                                         </td>

                                        <td>
                                            @if($poll->barcode)
                                            {{-- {{implode(', ',$poll->barcode->code->pluck('name')->toArray())}} --}}
{{-- <td>{{$poll->barcode->code}}</td> --}}{{$poll->barcode->code}}
                                            @endif
                                            </td>

                                        <td>
                                            @if($poll->barcode)
                                            {{isset($poll->barcode->product)?$poll->barcode->product->name:''}}
                                            @endif
                                        </td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($poll->created_at)}}</td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('poll.show',$poll->id)}}">مشاهده</a>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            <div class="col-md-12">

                                <div class="pagi">
                                    {{ $polls->appends(Request::all())->links('admin.pagination') }}
                                </div>

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

