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
                        <div class="card-body">
                            <div class="row">
                                <div id="qr-reader" style="width: 600px"></div>
                                <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

                                <script>
                                    function onScanSuccess(decodedText, decodedResult) {
                                console.log(`Code scanned = ${decodedText}`, decodedResult);
                                window.location.href = '/repair?code='+decodedText
                            }
                            var html5QrcodeScanner = new Html5QrcodeScanner(
                                "qr-reader", { fps: 10, qrbox: 250 });
                            html5QrcodeScanner.render(onScanSuccess);
                                </script>
                                    <a class="btn btn-danger">
                                        برگشت
                                    </a>
                            </div>
                        </div>


                    </div>

                </div>

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

