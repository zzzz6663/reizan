@component('admin.section.content',['title'=>'      رسید مشتری'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">    رسید مشتری


        </li>
    @endslot

    <div class="row" id="receipt">


 

           <div class="col-lg-6">
            <section class="content " style="width: 595px" >
              <div class="canvas_div_pdf3">
                  <div class="container-fluid">

                      <div class="row">
                          <div class="col-12">
                              {{-- <div class="callout callout-success">
                                  <h5>

                                      {{$repair->barcode->code}}

                                  </h5>

                              </div> --}}


                              <!-- Main content -->

                              <div class="invoice p-3 mb-3">
                                  <!-- title row -->
                                  <div class="row">
                                      <div class="col-12">
                                        <h1 style="text-align:center; font-weight:bold">
                                            با احتیاط حمل کنید
                                            <br>
                                           <i>
                                            شکستنی است
                                          </i>
                                       </h1>
                                      </div>
                                      <div class="col-12">
                                          <div class="boc">
                                              <div class="rad">
                                                    <ul>
                                                        <li>
                                                            فرستنده: شرکت شاخص توازن تیراژه -ریزان الکترونیک
                                                        </li>
                                                        <li>
                                                         آدرس : شرکت      تهران جاجرود سعید آباد میدان ساعت کوچه دانش پلاک 32

                                                        </li>
                                                        <li>
                                                            تلفن:
                                                            77292895 *** 77293149
                                                        </li>

                                                    </ul>
                                              </div>
                                          </div>
                                      </div>
                                      {{-- <div class="col-12">
                                          <h6>
                                              <i class="fa fa-globe"></i>  شرکت ریزان
                                              <small class="float-left">تاریخ :
                                                  {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now())->format('d / m /  Y')}}
                                              </small>


                                          </h6>
                                      </div> --}}
                                      <!-- /.col -->
                                  </div>
                                  <!-- info row -->
                                  <div class="rad">
                                    <div class="row invoice-info boc">
                                        <div class="col-lg-6 mb-2">
                                            <span>
                                                نام مالک:
                                            </span>
                                            <span>{{$repair->name}}</span>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <span>
                                                تلفن :
                                            </span>
                                            <span>{{$repair->tell}}</span>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <span>
                                                آدرس :
                                            </span>
                                            <span>{{$repair->address}}</span>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <span>

                                           ثبت کننده :
                                            </span>
                                            @if ($repair->user)
                                            <span>{{$repair->user->name}}</span>
                                            <span>{{$repair->user->family}}</span>
                                            @endif

                                        </div>
                                        <div class="col-lg-6 mb2">
                                            <span>

                                       تاریخ خروج :
                                            </span>
                                            <span>  {{\Morilog\Jalali\Jalalian::forge($repair->barcode->deliver)->format('d / m /  Y')}}</span>
                                        </div>

                                  </div>
                                  </div>
                                  <!-- /.row -->

                                  <!-- Table row -->



                                  <!-- /.row -->

                                  <!-- /.row -->
                                  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
                                  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

                                  <script>
                                      function getPDF2(){

                                          var HTML_Width = $(".canvas_div_pdf3").width();
                                          var HTML_Height = $(".canvas_div_pdf3").height();
                                          var top_left_margin = -0;
                                          var PDF_Width = 595;
                                          var PDF_Height = 842;
                                          var canvas_image_width = HTML_Width;
                                          var canvas_image_height = HTML_Height;

                                          var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
                                          html2canvas($(".canvas_div_pdf3")[0],{
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

