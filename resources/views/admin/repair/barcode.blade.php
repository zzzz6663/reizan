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


                            // var html5QrcodeScanner = new Html5QrcodeScanner(
                            //     "qr-reader", { fps: 10, qrbox: 250 });
                            // html5QrcodeScanner.render(onScanSuccess);


                            const html5QrCode = new Html5Qrcode("qr-reader");
const qrCodeSuccessCallback = (decodedText, decodedResult) => {
    console.log(`Code scanned = ${decodedText}`, decodedResult);
                                window.location.href = '/repair?code2='+decodedText
                                stopQR();
                                html5QrcodeScanner.clear()
};
const config = { fps: 10, qrbox: { width: 250, height: 250 } };

// If you want to prefer front camera

// If you want to prefer back camera
html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);


                            function stopQR() { html5QrCode.stop().then((ignore) => {  }).catch((err) => { }); }
                            function onScanSuccess(decodedText, decodedResult) {
                                console.log(`Code scanned = ${decodedText}`, decodedResult);
                                window.location.href = '/repair?code2='+decodedText
                                stopQR();
                                html5QrcodeScanner.clear()

                            }
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








            </div>
        </div>
    </div>
@endcomponent

