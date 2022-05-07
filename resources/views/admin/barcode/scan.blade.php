@component('admin.section.content',['title'=>' مدیریت بارکد'])
@slot('bread')
<li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
<li class="breadcrumb-item">مدیریت بارکد</li>
@endslot


<div class="row">
    <div class="col-md-12">
        <div class="row">


            <div class="col-md-6">


                <div class="card">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h1 class="card-title" style="font-size:30px; font-weight:bold">
                                {{$barcode->code}}
                            </h1>
                            <h1 class="card-title" style="font-size:30px; font-weight:bold">
                                {{$barcode->product->name}}
                            </h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg"> آخرین وضعیت </span>
                                <span>
                                    @if (!$barcode->customer)
                                    فروش نرفته
                                    -داخل انبار
                                    @else
                                    @switch($barcode->store)
                                    @case(null)
                                    تعیین نشده
                                    @break
                                    @case(1)
                                    فروش رفته
                                    @break
                                    @case(0)

                                    داخل انبار
                                    @break
                                    @endswitch
                                    @endif
                                </span>
                            </p>
                            {{-- <p class="mr-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fa fa-arrow-up"></i> ۱۲.۵%
                                </span>
                                <span class="text-muted">از هفته گذشته</span>
                            </p> --}}
                        </div>
                        @php
                        $repair =$barcode->repairs()->latest()->first();
                        @endphp

                        @if (!$barcode->customer)
                        <span data-url="{{route('barcode.sell',$barcode->id)}}" data-lo="sell" class="btn sendv btn-success">فروش</span>
                        @else

                          {{-- @if (($barcode->last_id) && $barcode->last_id == auth()->user()->id)
                          <a href="{{route('transfer.create',['barcode'=>$barcode->id])}}" class="btn btn-danger">انتقال</a>
                           @endif --}}
                        @switch($barcode->store)
                        @case(null)
                        @if ($repair)
                        <span  data-url="{{route('repair.edit',$repair->id)}}" data-lo="deliverd"  class="btn sendv btn-success">  تحویل</span>
                        @else
                        <span data-url="{{route('repair.index',['code'=>$barcode->id])}}"  data-lo="insert_repair"   class="btn sendv btn-success">ثبت خرابی</span>
                        <span data-url="{{route('repair.add.images',$repair->id)}}"  data-lo="images"   class="btn sendv btn-danger">  تصاویر</span>
                        @endif
                        @break

                        @case(1)
                        @if (  $repair)
                        <span  data-url="{{route('repair.edit',$repair->id)}}" data-lo="deliverd"  class="btn sendv btn-success">  تحویل</span>
                        @endif
                        @break

                        @case(0)
                        <span data-url="{{route('repair.index',['code'=>$barcode->id])}}"  data-lo="insert_repair"   class="btn sendv btn-success">ثبت خرابی</span>
                        <span data-url="{{route('repair.add.images',$repair->id)}}"  data-lo="images"   class="btn sendv btn-danger">  تصاویر</span>

                        @break
                        @endswitch
                        @include('admin.barcode.record',['barcode'=>$barcode,'show'=>false])
                        @endif


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


@endcomponent
