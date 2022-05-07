@component('admin.section.content',['title'=>'  به روز رسانی    بارکد'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  بارکد</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  بارکد</h3>
                        </div>
                        <!-- /.card-header -->
                    @include('error')

                    <!-- form start -->
                        <form role="form" id="barcode_edit_form" action="{{route('barcode.sell',$barcode->id)}}" method="post" >
                            @csrf
                            @method('post')
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="deliver">  تاریخ خروج</label>
                                    <input type="text" name="deliver" value="{{old('deliver',$barcode->deliver)}}" class="form-control persian" id="deliver" placeholder="تاریخ خروج را وارد کنید">
                                </div>

                                <div class="form-group">
                                    <label for="color">مشتری  </label>
                                    <select class="form-control" name="customer_id" id="customer">
                                        <option   value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\User::whereLevel('customer')->get() as $customer)
                                            <option  {{old('customer_id',$barcode->customer_id)==$customer->id?'selected':''}} value="{{$customer->id}}">{{$customer->name}} {{$customer->family}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer " >
                                <button type="submit" id="ssubmit" class="btn disnon btn-primary">ارسال</button>
                                <span class="btn btn-primary trigger" data-id='1' id="show_msg" >ذخیره</span>
                                <div id="modal_1" class="modal" style="">
                                    <h1>موارد زیر را تایید میکنید؟</h1>
                                    <p>
                                        <span style="color:rgb(0, 0, 0);font-size:25px" class="title">    نام مشتری   :</span>
                                        <span  style="color:green;font-size:25px"  class="content" id="cname"></span>
                                    </p>
                                    <p>
                                        <span  style="color:rgb(0, 0, 0);font-size:25px"  class="title" >   تاریخ خروج :</span>
                                        <span  style="color:rgb(210, 57, 11);font-size:25px"  class="content" id="dtate"></span>
                                    </p>
                                    <span class="btn btn-dark " id="myes" >بله</span>
                                    <span class="btn btn-danger " id="mno" >خیر</span>


                                </div>

                                <a class="btn btn-success " href="{{route('barcode.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6" id="receipt">
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
                                                    <span  contenteditable="true">کلیک</span>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <span>
                                                        تلفن :
                                                    </span>
                                                    <span  contenteditable="true">کلیک</span>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <span>
                                                        آدرس :
                                                    </span>
                                                    <span  contenteditable="true">کلیک</span>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <span>

                                                   ثبت کننده :
                                                    </span>
                                                    <span  contenteditable="true">کلیک</span>

                                                </div>
                                                <div class="col-lg-6 mb2">
                                                    <span>
                                               تاریخ خروج :
                                                    </span>
                                                    <span  contenteditable="true">کلیک</span>
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
        </div>
    </div>
@endcomponent

