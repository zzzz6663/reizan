@component('admin.section.content',['title'=>'      اسکن بار کد'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">   اسکن بار کد
        </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">

                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div id="qr-reader" style="max-width: 600px"></div>
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
                        <script>

                        </script>

                        <input type="file" accept="audio/*" capture >
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                          <h3 class="card-title">فرم    ثبت دستی بار کد</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('repair.index')}}" method="get">
@csrf
@method('get')
                          <div class="card-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">بار کد</label>

                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="code2"  id="inputEmail3" placeholder=" بارکد را وارد کنید">
                              </div>
                            </div>


                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <input type="submit" class="btn btn-info" value="ثبت">
                          </div>
                          <!-- /.card-footer -->
                        </form>
                      </div>
                </div>
                {{-- <h1>تصاویر  خرابی</h1>
                <br> --}}








            </div>
        </div>
    </div>
@endcomponent

