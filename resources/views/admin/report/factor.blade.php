@component('admin.section.content',['title'=>'      رسید مشتری'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">    رسید مشتری


        </li>
    @endslot

    <div class="row" id="factor">

        <div class="col-lg-6" >
            <section class="content " style="width: 595px" >
                <div class="canvas_div_pdf">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="callout callout-success">
                                    <h6> رسید مشتری
                                        برای بارکد
                                        {{$repair->barcode->code}}

                                    </h6>
                                    {{--                        این صفحه مناسب برای پرینت طراحی شده است برای تست روی دکمه پرینت کلیک کنید--}}
                                </div>

                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>
                                                <i class="fa fa-globe"></i>  شرکت ریزان
                                                <small class="float-left">تاریخ :
                                                    {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now())->format('d / m /  Y')}}
                                                </small>


                                            </h6>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-lg-6">
                             <span class="text-danger font-size-5 font-weight-bold">
                                    گزارش اولیه:
                                </span>
                                            {{$repair->report}}

                                        </div>
                                        <div class="col-lg-6">
                             <span class="text-danger font-size-5 font-weight-bold">
                               اظهارات مشتری :
                                </span>

                                            {{$repair->comment}}

                                        </div>
                                        <!-- /.col -->

                                        <div class="col-sm-12 invoice-col">
                                            <h5>
                                            {{$repair->dedate}}
{{--                                            @if($repair->dedate)--}}
{{--                                                تاریخ تحویل--}}
{{--                                                {{\Morilog\Jalali\Jalalian::forge($repair->dedate)->format('d / m /  Y')}}--}}
{{--                                                @endif--}}

                                            </h5>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        @if($repair->dewater==1)
                                            <div class="col-12">
                                                <h6 class="fs">
                                                    آبخوردگی :
                                                    دستگاه شما در مجاورت رطوبت بالا یا پاشش آب بوده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                                </h6>
                                            </div>
                                        @endif

                                        @if($repair->debar==1)
                                            <div class="col-12">
                                                <h6 class="fs">
                                                    اضافه بار:
                                                    دستگاه شما تحت بار بیشتر از نامی بوده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                                </h6>
                                            </div>
                                        @endif
                                        @if($repair->deopen==1)
                                            <div class="col-12">
                                                <h6 class="fs">
                                                    باز شدن پلمپ :
                                                    دستگاه شما  دستکاری شده و یا درب جعبه باز شده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                                </h6>
                                            </div>
                                        @endif
                                        @if($repair->demulti==1)
                                            <div class="col-12">
                                                <h6 class="fs">
                                                    دستکاری مولتی ترن:
                                                    از دستکاری پیچ های زیر نمایشگر خودداری فرمایید .  در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .                                          </h6>
                                            </div>
                                        @endif
                                        @if($repair->detemp==1)
                                            <div class="col-12">
                                                <h6 class="fs">
                                                    اضافه حرارت محیط:
                                                    دستگاه شما در مکان گرم نصب شده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                                </h6>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <h6>اطلاعات دیتا لاگر</h6>


                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ردیف</th>
                                                    <th>نام</th>
                                                    <th>مقدار</th>
                                                    <th>جزئیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($repair->loggers as $logger)
                                                    <tr style="background:{{$logger->over=='1'?'#000':''}}  ; color:{{$logger->over=='1'?'#fff':''}};">
                                                        <td style="padding: 2px; font-size: 10px">{{$loop->iteration}}</td>
                                                        <td  style="padding: 2px; font-size: 10px">{{$logger->name}}</td>
                                                        <td  style="padding: 2px; font-size: 10px">{{$logger->value}}</td>
                                                        <td  style="padding: 2px; font-size: 10px">{{$logger->info}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <h6>   لیست خرابی های قبلی  </h6>


                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ردیف</th>
                                                    <th>تاریخ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($repair->barcode->repairs as $re)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{\Morilog\Jalali\Jalalian::forge($re->created_at)}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>
                                                <h6 class="fs">
                                                    تهران جاجرود سعید آباد میدان ساعت کوچه دانش پلاک 32
                                                    77292895 *** 77293149
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
                                    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
                                    <script>
                                        function getPDF(){

                                            var HTML_Width = $(".canvas_div_pdf").width();
                                            var HTML_Height = $(".canvas_div_pdf").height();
                                            var top_left_margin = -0;
                                            var PDF_Width = 595;
                                            var PDF_Height = 842;
                                            var canvas_image_width = HTML_Width;
                                            var canvas_image_height = HTML_Height;

                                            var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


                                            html2canvas($(".canvas_div_pdf")[0],{
                                                allowTaint:true,
                                                quality: 10,
                                                scale: 3,

                                            }).then(function(canvas) {

                                                canvas.getContext('2d');
                                                canvas.setAttribute('dir','rtl');
                                                // console.log(canvas.height+"  "+canvas.width);


                                                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                                                console.log(imgData);
                                                var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
                                                pdf.addImage(imgData, 'JPG', -5, top_left_margin,canvas_image_width,canvas_image_height);


                                                for (var i = 1; i <= totalPDFPages; i++) {
                                                    pdf.addPage(PDF_Width, PDF_Height);
                                                    pdf.addImage(imgData, 'JPG', -5, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                                                }

                                                pdf.save("reizan1.pdf");
                                                // $('body').preloader('remove')
                                            });
                                        };
                                    </script>
                                    <!-- this row will not appear when printing -->

                                </div>
                                <!-- /.invoice -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{url()->previous()}}" class="btn btn-outline-danger">برگشت</a>
                        <button type="button"  onclick="getPDF()" class="btn btn-primary float-left ml-2" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> تولید PDF
                        </button>
                    </div>
                </div>
            </section>

        </div>

        <div class="col-lg-6">
            <section class="content " style="width: 595px" >
              <div class="canvas_div_pdf2">
                  <div class="container-fluid">

                      <div class="row">
                          <div class="col-12">
                              <div class="callout callout-success">
                                  <h5>
                                      فاکتور
                                      برای بارکد
                                      {{$repair->barcode->code}}

                                  </h5>
                                  {{--                        این صفحه مناسب برای پرینت طراحی شده است برای تست روی دکمه پرینت کلیک کنید--}}
                              </div>


                              <!-- Main content -->

                              <div class="invoice p-3 mb-3">
                                  <!-- title row -->
                                  <div class="row">
                                      <div class="col-12">
                                          <h6>
                                              <i class="fa fa-globe"></i>  شرکت ریزان
                                              <small class="float-left">تاریخ :
                                                  {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now())->format('d / m /  Y')}}
                                              </small>


                                          </h6>
                                      </div>
                                      <!-- /.col -->
                                  </div>
                                  <!-- info row -->
                                  <div class="row invoice-info">

                                      {{--                                    <div class="col-sm-12 invoice-col">--}}
                                      {{--                                        <h5>--}}
                                      {{--                                            تاریخ تحویل--}}
                                      {{--                                            {{\Morilog\Jalali\Jalalian::forge($repair->dedate)->format('d / m /  Y')}}--}}
                                      {{--                                        </h5>--}}
                                      {{--                                    </div>--}}
                                      <div class="col-lg-3">
                                          <h6>
                                              نام مالک:
                                          </h6>
                                          <span>{{$repair->name}}</span>
                                      </div>
                                      <div class="col-lg-3">
                                          <h6>
                                              تلفن :
                                          </h6>
                                          <span>{{$repair->tell}}</span>
                                      </div>
                                      <div class="col-lg-4">
                                          <h6>
                                              تاریخ ثبت نهایی:
                                          </h6>
                                          @if($repair->sudate)
                                              <span>{{\Morilog\Jalali\Jalalian::forge($repair->sudate)->format('Y-m-d')}}</span>
                                          @endif
                                      </div>

                                      <!-- /.col -->
                                  </div>
                                  <!-- /.row -->

                                  <!-- Table row -->

                                  <div class="row">
                                      <div class="col-12 table-responsive">
                                          <h6>لیست قطعات تعویض شده     </h6>


                                          <table class="table table-striped">
                                              <thead>
                                              <tr>
                                                  <th>ردیف</th>
                                                  <th>نام</th>
                                                  <th> سهم شرکت   </th>
                                                  <th> سهم مشتری   </th>
                                              </tr>
                                              </thead>
                                              <tbody>
                                              @php($customer=0)
                                              @php($reizan=0)
                                              @foreach($repair->parts as $part)
                                                  @if($part->pivot->status=='customer')
                                                      @php($customer+=$part->price)
                                                  @endif
                                                  @if($part->pivot->status=='guaranty')
                                                      @php($reizan+=$part->price)
                                                  @endif
                                                  <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                      <td>{{$part->name}}</td>
                                                      <td>
                                                          <span class="badge badge-danger">
                                                          {{$part->pivot->status=='guaranty'?number_format($part->price):''}}
                                                          </span>
                                                      </td>
                                                      <td>
                                                          <span class="badge badge-success">
                                                          {{$part->pivot->status=='customer'?number_format($part->price):''}}
                                                          </span>

                                                      </td>
                                                  </tr>



                                              @endforeach
                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                    <td colspan="2" style="border: none"></td>
                                                    <td>
                                                       جمع کل

                                                    </td>
                                                    <td>
                                                        {{number_format($customer)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border: none"></td>
                                                    <td>
                                                         کرایه حمل

                                                    </td>
                                                    <td>

                                                        {{number_format($repair->shipping)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border: none"></td>
                                                    <td>
                                                           دستمزد تعمیر

                                                    </td>
                                                    <td>

                                                        {{number_format($repair->customer_wage)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border: none; "></td>
                                                    <td style="font-size:20px; background:green; color:#fff">
                                                           مبلغ قابل پرداخت

                                                    </td>
                                                    <td  style="font-size:20px;">
                                                        {{number_format($repair->shipping+$repair->customer_wage+$customer)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="border: none; "></td>
                                                    <td style="font-size:20px; background:green; color:#fff">
                                                        سهم شرکت

                                                     </td>
                                                    <td  style="font-size:20px;">
                                                        {{number_format($reizan)}}
                                                    </td>
                                                </tr>
                                              </tfoot>
                                          </table>
                                      </div>
                                      {{-- {{number_format($reizan)}} --}}
{{--                                      <div class="row">--}}
{{--                                          <div class="col-lg-6">--}}
{{--                                            <h5 class="fs" >--}}
{{--                                                   دستمزد شرکت:--}}
{{--                                                {{number_format($repair->wage)}}--}}

{{--                                            </h5>--}}
{{--                                          </div>--}}
{{--                                          <div class="col-lg-6">--}}
{{--                                             <h5 class="fs">--}}
{{--                                                    دستمزد مشتری:--}}
{{--                                                 {{number_format($repair->customer_wage)}}--}}

{{--                                             </h5>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-4">--}}
{{--                                                <h6 class="fs">--}}
{{--                                                    سهم  تعمیر شرکت:--}}
{{--                                                    {{number_format($reizan)}}--}}

{{--                                                </h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <h6 class="fs">--}}
{{--                                                    سهم  تعمیر مشتری:--}}
{{--                                                    {{number_format($customer)}}--}}

{{--                                                </h6>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4">--}}
{{--                                                <h6 class="fs">--}}
{{--                                                    جمع هزینه تعمیر  :--}}

{{--                                                    {{number_format($customer+$reizan)}}--}}

{{--                                                </h6>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                      <!-- /.col -->--}}
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div id="chart"></div>
                                          <script src="/home/js/apexcharts.min.js"></script>
                                          <script>
                                              var options = {
                                                  series: [{{$reizan}}, {{$customer}} ],
                                                  chart: {
                                                      width: 280,
                                                      type: 'pie',
                                                  },
                                                  labels: ['سهم شرکت  ', 'سهم متشری'],
                                                  responsive: [{
                                                      breakpoint: 480,
                                                      options: {
                                                          chart: {
                                                              width: 200
                                                          },
                                                          legend: {
                                                              position: 'bottom'
                                                          }
                                                      }
                                                  }]
                                              };

                                              var chart = new ApexCharts(document.querySelector("#chart"), options);
                                              chart.render();
                                          </script>
                                      </div>
                                  </div>

                                  <div class="row">
                                        @if($repair->dewater==1)
                                      <div class="col-12">
                                          <h6 class="fs">
                                              آبخوردگی :
                                                 دستگاه شما در مجاورت رطوبت بالا یا پاشش آب بوده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                          </h6>
                                      </div>
                                      @endif

                                        @if($repair->debar==1)
                                      <div class="col-12">
                                          <h6 class="fs">
                                              اضافه بار:
                                              دستگاه شما تحت بار بیشتر از نامی بوده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                          </h6>
                                      </div>
                                            @endif
                                        @if($repair->deopen==1)
                                      <div class="col-12">
                                          <h6 class="fs">
                                              باز شدن پلمپ :
                                              دستگاه شما  دستکاری شده و یا درب جعبه باز شده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                          </h6>
                                      </div>
                                            @endif
                                        @if($repair->demulti==1)
                                      <div class="col-12">
                                          <h6 class="fs">
                                              دستکاری مولتی ترن:
                                              از دستکاری پیچ های زیر نمایشگر خودداری فرمایید .  در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .                                          </h6>
                                      </div>
                                            @endif
                                        @if($repair->detemp==1)
                                      <div class="col-12">
                                          <h6 class="fs">
                                              اضافه حرارت محیط:
                                              دستگاه شما در مکان گرم نصب شده است در این حالت دستگاه از تعهد ضمانت تولید کننده خارج میشود .
                                          </h6>
                                      </div>
                                            @endif
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div>
                                              <h6 class="fs">
                                                  تهران جاجرود سعید آباد میدان ساعت کوچه دانش پلاک 32
                                                  77292895 *** 77293149
                                              </h6>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- /.row -->

                                  <!-- /.row -->

                                  <script>
                                      function getPDF2(){

                                          var HTML_Width = $(".canvas_div_pdf2").width();
                                          var HTML_Height = $(".canvas_div_pdf2").height();
                                          var top_left_margin = -0;
                                          var PDF_Width = 595;
                                          var PDF_Height = 842;
                                          var canvas_image_width = HTML_Width;
                                          var canvas_image_height = HTML_Height;

                                          var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


                                          // html2canvas($(".canvas_div_pdf2")[0],{allowTaint:true}).then(function(canvas) {
                                          //     canvas.getContext('2d');
                                          //
                                          //     console.log(canvas.height+"  "+canvas.width);
                                          //
                                          //
                                          //     var imgData = canvas.toDataURL("image/jpeg", 1.0);
                                          //     console.log(imgData);
                                          //     var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
                                          //     pdf.addImage(imgData, 'JPG', -5, top_left_margin,canvas_image_width,canvas_image_height);
                                          //
                                          //
                                          //     for (var i = 1; i <= totalPDFPages; i++) {
                                          //         pdf.addPage(PDF_Width, PDF_Height);
                                          //         pdf.addImage(imgData, 'JPG', -5, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                                          //     }
                                          //
                                          //     pdf.save("HTML-Document.pdf");
                                          // });
                                          html2canvas($(".canvas_div_pdf2")[0],{
                                              allowTaint:true,
                                              quality: 10,
                                              scale: 3,

                                          }).then(function(canvas) {

                                              canvas.getContext('2d');
                                              canvas.setAttribute('dir','rtl');
                                              // console.log(canvas.height+"  "+canvas.width);


                                              var imgData = canvas.toDataURL("image/jpeg", 1.0);
                                              console.log(imgData);
                                              var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
                                              pdf.addImage(imgData, 'JPG', -5, top_left_margin,canvas_image_width,canvas_image_height);


                                              for (var i = 1; i <= totalPDFPages; i++) {
                                                  pdf.addPage(PDF_Width, PDF_Height);
                                                  pdf.addImage(imgData, 'JPG', -5, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
                                              }

                                              pdf.save("reizan.pdf");
                                              // $('body').preloader('remove')
                                          });
                                      };
                                  </script>
                                  <!-- this row will not appear when printing -->

                              </div>
                              <!-- /.invoice -->
                          </div><!-- /.col -->
                      </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
              </div>

                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{url()->previous()}}" class="btn btn-outline-danger">برگشت</a>
                        <button type="button"  onclick="getPDF2()" class="btn btn-primary float-left ml-2" style="margin-right: 5px;">
                            <i class="fa fa-download"></i> تولید PDF
                        </button>
                    </div>
                </div>
            </section>

        </div>
    </div>

@endcomponent

