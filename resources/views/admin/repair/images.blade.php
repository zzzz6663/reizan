@component('admin.section.content',['title'=>'      اضافه کردن عکس خرابی ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   اضافه کردن عکس خرابی ها
        </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">

                            </h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')
                        <div class="card-body">
                            <div class="row">
                                    <form action="{{route('repair.add.images',$repair->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <label for="images">عکس های دستگاه </label>
                                        <input type="file" id="images" accept="image/*" multiple="true" name="images[]"   >
                                        <input class="btn btn-primary" type="submit" value="ثبت"  class="btn btn-primary"  >
                                    </form>
                                    <a class="btn btn-danger" href="{{route('repair.index',['code'=>$repair->barcode->id])}}">
                                        برگشت
                                    </a>
                            </div>
                        </div>


                    </div>

                </div>
                <div id="qr-reader" style="width: 600px"></div>
                {{-- <h1>تصاویر  خرابی</h1>
                <br> --}}

                {{-- @foreach ($repair->images as $image)
                <div class="col-lg-2">
                    <a   href="{{$image->img()}}" data-lightbox="roadtrip">
                    <img src="{{$image->img()}}" height="100%" width="100%" alt=""></a>
                </div>
                @endforeach --}}






            </div>
        </div>
    </div>
@endcomponent

