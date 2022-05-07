@component('admin.section.content',['title'=>'  ایجاد    خرابی'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد    خرابی</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  ثبت خرابی جدید برای بار کد
                            {{$barcode->code}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('repair.store')}}" method="post"  enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('post')
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">    اطلاعات اولیه     </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInpustEmail1">    تاریخ ارجاع</label>
                                                    <h5>
                                                        {{\Morilog\Jalali\Jalalian::now()}}
                                                    </h5>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">نام   کاربر</label>
                                                    <input type="text" name="name" value="{{old('name',$name)}}" class="form-control" id="name" placeholder="نام را وارد کنید">
                                                    <input type="text" name="barcode" hidden value="{{request('barcode')}}" >

                                                </div>
                                                <div class="form-group">
                                                    <label for="tell">تلفن</label>
                                                    <input type="number" name="tell" value="{{old('tell',$mobile)}}" class="form-control" id="tell" placeholder="تلفن را وارد کنید">
                                                </div>
                                                <div class="form-group">
                                                    <label for="shipping">کرایه حمل</label>
                                                    <input type="number" name="shipping" value="{{old('shipping')}}" class="form-control" id="shipping" placeholder="کرایه حمل را وارد کنید">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">    آدرس</label>
                                                    <textarea name="address" id="address" class="form-control" cols="30" rows="5">{{old('address',$address)}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">    اظهارات مشتری</label>
                                                    <textarea name="comment" id="comment" class="form-control" cols="30" rows="5">{{old('comment')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInpustEmail1">      وضعیت گارانتی </label>
                                                    <h5>
                                                        به مدت
                                                        <span class="text-primary">{{$barcode->product->guaranty}}</span>
                                                        ماه

                                                        از
                                                        <span class="text-success">     {{\Morilog\Jalali\Jalalian::forge($barcode->deliver)->format('d-m-Y')}}</span>
                                                        تا
                                                        <span class="text-danger">
                                                                                                    {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::parse($barcode->deliver)->addMonths($barcode->guaranty))->format('d-m-Y')}}
                                                            (
                                                                    @if(      !\Carbon\Carbon::parse($barcode->deliver)->addMonths($barcode->guaranty)->gt(\Carbon\Carbon::now())
                                                                    )
                                                                        پایان گارانتی
                                                                    @else
                                                                    دارای گارانتی
                                                                    @endif
                                                            )


                                                </span>

                                                    </h5>
                                                </div>
                                                <div class="form-group">
                                                    <label for="img1">  انتخاب عکس
                                                        1
                                                    </label>
                                                    <input type="file" accept="image/*" name="img1"  class="form-control" id="img1" placeholder="عکس را  انتخاب کنید">
                                                </div>
                                                <div class="form-group">
                                                    <label for="img2">   انتخاب عکس
                                                        2
                                                    </label>
                                                    <input type="file" accept="image/*" name="img2"  class="form-control" id="img2" placeholder="عکس را  انتخاب کنید">
                                                </div>
                                                <div class="form-group">
                                                    <label for="img3">    انتخاب عکس
                                                        3
                                                    </label>
                                                    <input type="file" accept="image/*" name="img3"  class="form-control" id="img3" placeholder="عکس را  انتخاب کنید">
                                                </div>
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="bar">  بار متصل به دستگاه</label>--}}
{{--                                                    <input type="text" name="bar" value="{{old('bar',$bar)}}" class="form-control" id="bar" placeholder=" بار   را وارد کنید">--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <label for="defect">      نقص دستگاه</label>
                                                    <input type="text" name="defect" value="{{old('defect')}}" class="form-control" id="defect" placeholder="نقص   را وارد کنید">
                                                </div>
                                                <div class="form-group">
                                                    <label for="report">گزارش اولیه    </label>
                                                    <textarea name="report" id="report" class="form-control" cols="30" rows="5">{{old('report')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">بار متصل به دستگاه</h3>
                                </div>
                                <input type="checkbox" name="bar" hidden  value="none"  >

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar',$bar)=='home'?'checked':''}} name="bar" id="home" class="form-check-inline"  value="home" >
                                                    <label class="form-check-inline" for="home">
                                                        خانه
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar',$bar)=='vila'?'checked':''}} name="bar" id="vila" class="form-check-inline"  value="vila" >
                                                    <label class="form-check-inline" for="vila">
                                                        ویلا
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar',$bar)=='cnc'?'checked':''}} name="bar" id="cnc" class="form-check-inline"  value="cnc" >
                                                    <label class="form-check-inline" for="cnc">
                                                        خانواده ماشین های cnc

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar',$bar)=='medical'?'checked':''}} name="bar" id="medical" class="form-check-inline"  value="medical" >
                                                    <label class="form-check-inline" for="medical">
                                                        خانواده لیزرهای پزشکی

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar',$bar)=='server'?'checked':''}} name="bar" id="server" class="form-check-inline"  value="server" >
                                                    <label class="form-check-inline" for="server">
                                                        سرور و کامپیوتر
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar',$bar)=='miner'?'checked':''}} name="bar" id="miner" class="form-check-inline"  value="miner" >
                                                    <label class="form-check-inline" for="miner">
                                                        ماینر
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar')=='wpomp'?'checked':''}} name="bar" id="wpomp" class="form-check-inline"  value="wpomp" >
                                                    <label class="form-check-inline" for="wpomp">
                                                        پمپ آب

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="radio" {{old('bar')=='otheru'?'checked':''}} name="bar" id="otheru" class="form-check-inline"  value="otheru" >
                                                    <label class="form-check-inline" for="otheru">
                                                        سایر مصارف

                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">    آسیب ها     </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" name="dewater" hidden  value="0"  >
                                                    <input type="checkbox" {{old('dewater')=='1'?'checked':''}} name="dewater" id="dewater" class="form-check-inline"  value="1" >
                                                    <label class="form-check-inline" for="dewater">آبخوردگی
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" name="dehit" hidden  value="0"  >
                                                    <input type="checkbox" {{old('dehit')=='1'?'checked':''}} name="dehit" id="dehit" class="form-check-inline"  value="1" >
                                                    <label class="form-check-inline" for="dehit">ضربه خوردگی
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" name="debar" hidden  value="0"  >
                                                    <input type="checkbox" {{old('debar')=='1'?'checked':''}} name="debar" id="debar" class="form-check-inline"  value="1" >
                                                    <label class="form-check-inline" for="debar">اضافه بار
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" name="detemp" hidden  value="0"  >
                                                    <input type="checkbox" {{old('detemp')=='1'?'checked':''}} name="detemp" id="detemp" class="form-check-inline"  value="1" >
                                                    <label class="form-check-inline" for="detemp">اضافه حرارت محیط
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" name="deopen" hidden  value="0"  >
                                                    <input type="checkbox" {{old('deopen')=='1'?'checked':''}} name="deopen" id="deopen" class="form-check-inline"  value="1" >
                                                    <label class="form-check-inline" for="deopen">    باز شدن پلمپ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" name="demulti" hidden  value="0"  >
                                                    <input type="checkbox" {{old('demulti')=='1'?'checked':''}} name="demulti" id="demulti" class="form-check-inline"  value="1" >
                                                    <label class="form-check-inline" for="demulti">
                                                        دستکاری مولتی ترن
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">    تعمیرات     </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="card-body">
                                                <div class="form-group">
{{--                                                   @php(dump(old('part')))--}}
                                                    <label for="parts">قطعات </label>
                                                    <select name="plist[]"  class="form-control select2" id="parts" multiple >
{{--                                                        @foreach(old('plist',$barcode->product->parts) as $part)--}}
{{--                                                            <option value="{{$part->id}}">{{$part->name}}</option>--}}
{{--                                                        @endforeach--}}
                                                        @foreach($barcode->product->parts as $part)
                                                            <option value="{{$part->id}}" {{in_array($part->id,old('plist',[]))?'selected':''}}>{{$part->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group row" id="part_section" >
                                                    @foreach(old('part',[]) as $pa)
                                                        <div class="col-lg-6 part_op" id="parts-{{$pa['id']}}">

                                                            <div >
                                                                <div class="row">
                                                                    <div class="col-lg-5">
                                                                        <label for="tell">    <br>    </label>
                                                                        <input type="text" name="part[{{$pa['id']}}][name]" value="{{$pa['name']}}" readonly class="form-control" id="tell"  >
                                                                        <input type="text" name="part[{{$pa['id']}}][id]" hidden value="{{$pa['id']}}" readonly    >

                                                                    </div>
                                                                    <div class="col-lg-5">
                                                                        <br>
                                                                        <div class="mt-4 form-group">
                                                                            <input type="text"  class=" " hidden name="part[{{$pa['id']}}][status]"  value="">
                                                                            <input type="radio" {{\Carbon\Carbon::parse($barcode->sell)->addMonths($barcode->guaranty)->greaterThan(\Carbon\Carbon::now()?'':'disabled')}} class="form-chessck-input minimal ch{{$pa['id']}} " {{$pa['status']=='guaranty'?'checked':''}} name="part[{{$pa['id']}}][status]" id="ga{{{$pa['id']}}}" value="guaranty">
                                                                            <label class="mr-2" for="ga{{{$pa['id']}}}"> گارانتی    </label>
                                                                            <input type="radio"  class="  ch{{$pa['id']}}  mr-4"  name="part[{{$pa['id']}}][status]" {{$pa['status']=='customer'?'checked':''}} id="cu{{{$pa['id']}}}" value="customer">
                                                                            <label class="mr-2" for="cu{{{$pa['id']}}}">    مشتری    </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        <div class=" form-group">
                                                                            <span style="position:relative; top: 45px"  class="btn btn-warning remove_r form-control" data-val="{{$pa['id']}}" data-cl="ch{{$pa['id']}}" data-ids="{{$pa['id']}}"  data-id="part[{{$pa['id']}}][status]">حذف</span>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">

                                            <div class="card-body row">
                                                <div class="form-group col-lg-3">
                                                    <label for="redate">  تاریخ تعمیر</label>
                                                    <input type="text" name="redate" value="{{old('redate')}}" class="form-control persian3" id="redate" placeholder="تاریخ تعمیر را وارد کنید">
                                                </div>
                                                <div class="form-group  col-lg-3">
                                                    <label for="wage">  دستمزد  </label>
                                                    <input type="number" name="wage" value="{{old('wage')}}" class="form-control " id="wage" placeholder="دستمزد  را وارد کنید">
                                                </div>
                                                <div class="form-group  col-lg-3">
                                                    <label for="customer_wage">  دستمزد سهم مشتری  </label>
                                                    <input type="number" name="customer_wage" value="{{old('customer_wage')}}" class="form-control " id="customer_wage" placeholder="دستمزد  را وارد کنید">
                                                </div>

                                                <div class="form-group  col-lg-3">
                                                    <label for="explain">      توضیحات</label>
                                                    <textarea name="explain" id="explain" class="form-control" cols="30" rows="5">{{old('explain')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">     دیتا لاگر    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="row" style="text-align: center; margin-bottom: 10px; ">
                                        <div class="col-lg-3">
                                            پارامتر
                                        </div>
                                        <div class="col-lg-3">
                                            مقدار

                                        </div>
                                        <div class="col-lg-3">
                                            چک باکس

                                        </div>
                                        <div class="col-lg-3">
                                            توضیحات
                                        </div>

                                    </div>
                                    @foreach( old('d',$barcode->product->dls) as $dls)
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="card-body" style="padding:0">
                                                <div class="form-group">
                                                    <input type="text" name="d[{{$loop->index}}][name]" value="{{$dls['name']}}" class="form-control " readonly id="wage" placeholder="نام  را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card-body" style="padding:0">
                                                <div class="form-group">
                                                    <input type="number" name="d[{{$loop->index}}][value]" value="{{$dls['value']}}" class="form-control " id="wage" placeholder="مقدار  را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card-body" style="padding:0">
                                                <div class="form-group">
                                                    <input type="text" name="d[{{$loop->index}}][over]"   value="0" class="form-control "  hidden >
                                                    <input type="checkbox" name="d[{{$loop->index}}][over]" {{$dls['over']==1?'checked':''}} value="1" class="form-control " id="wage"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="card-body" style="padding:0">
                                                <div class="form-group">
                                                    <input type="text" name="d[{{$loop->index}}][info]" value="{{$dls['info']}}" class="form-control " id="wage" placeholder="توضیحات  را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">       تحویل    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" name="dewater" hidden="" value="0">
                                                    <input type="checkbox" name="send_sms" value="1" checked class="form-check-inline" >
                                                    <label for="dename" class="form-check-inline">ارسال پیامک      </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="dename">نام   تحویل گیرنده</label>
                                                    <input type="text" name="dename" value="{{old('dename')}}" class="form-control" id="dename" placeholder="نام را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="dedate">    تاریخ تحویل   </label>
                                                    <input type="text" name="dedate" value="{{old('dedate')}}" class="form-control persian" id="dedate" placeholder="نام را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>







                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('repair.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @slot('script')
        <script>

            let createNewPart=({obj_a,id,last})=>{
                var list;
                var i=id;

                  `
                ${
                    $.each(obj_a, function(index, value){
                        console.log(858585)
                        console.log(last)
                        list =  `
                             <div class="col-lg-6 col-md-12  part_op" id="parts-${last}">
                                <div>
                                   <div class="row">
                                    <div class="col-lg-5">
                                        <label for=""> <br></label>
                                        <input type="text" name="part[${last}][name]" value="${value}" readonly class="form-control" id="tell"  >
                                        <input type="text" name="part[${last}][id]" hidden value="${last}" readonly    >
                                    </div>
                                    <div class="col-lg-5">
                                        <br>
                                        <div class="mt-4 form-group">
                                            <input type="text"  class="form-chessck-input minimal " hidden name="part[${last}][status]"   value="">
                                            <input type="radio"  class="form-chessck-input minimal ch${last}" name="part[${last}][status]" id="ga${last}" value="guaranty">
                                            <label class="mr-2" for="ga${last}"> گارانتی    </label>
                                            <input type="radio"  class=" ch${last}   mr-4"  name="part[${last}][status]" id="ch${last}" value="customer">
                                            <label class="mr-2" for="ch${last}">    مشتری    </label>
                                        </div>
                                      </div>
                                    <div class="col-lg-2">
                                        <div class=" form-group">
                                            <span style="position:relative; top: 37px" data-val="${last}" class="btn btn-warning remove_r form-control" data-cl="ch${last}"  data-ids="${last}" data-id="part[${i}][status]">حذف</span>
                                        </div>
                                    </div>
                                 </div>
                                </div>

                           </div>
                          `
                        // i++;

                    })
                    }

            `
                return list;
            }

            // $("select").on("select2:unselect", function (e) {
            //     var value=   e.params.data.id;
            //     alert(value);
            // });
            $('#parts').on("select2:unselect", function(e){
                var el=$(this)
                let last=e.params.data.id
                let ids='parts-'+last
                // var elem = document.querySelector('#'+id);
                // elem.style.display = 'none';
                $('.part_op').each(function() {
                   let el=$(this)
                    let id=el.attr('id')
                    if (ids==id){
                        el.remove()
                    }
                    console.log(323223)
                    console.log(id)
                })
            }).trigger('change');
            $('#parts').on('select2:select', function(e) {
            // $(document.body).on("change","#parts",function(e){

                let parts=$('#parts').val()
                let last=e.params.data.id
                var obj_a = {};
                obj_a[last]= $('#parts option[value='+last+']').text();

                // parts.forEach(function(val, i) {
                //    var text= $('#parts option[value='+val+']').text();
                //     obj_a[val] = text;
                //
                // });

                let ps=$('#part_section')
                let id= ps.children().length
                // ps.append(
                // '<br>'
                // )
                ps.append(
                    createNewPart({
                        obj_a,id,last
                    })
                )
                // $('.attr_select2').select2({tags:true})
            });
            $(document).on('click', '.remove_r', function (event) {
                var el = $(this);
                var ids = el.data('ids');
                var val = el.data('val');
                var id = el.data('id');
                var cl = el.data('cl');
                $('#parts option[value='+val+']').prop("selected", false)     // deselect the option
                    .parent().trigger("change");
                $('#' + 'parts-'+val).remove();
                $('.' + cl).attr('checked', false);
                $('.' + cl).prop('checked', false); // $('input[name='+id+']').prop('checked', false);
            });
            // if ($('#parts').length){
            //     let parts=$('#parts').val()
            //     var obj_a = {};
            //     parts.forEach(function(val, i) {
            //         var text= $('#parts option[value='+val+']').text();
            //         obj_a[val] = text;
            //
            //     });
            //     let ps=$('#part_section')
            //     let id= ps.children().length
            //     ps.html(
            //         '<br>'
            //     )
            //     ps.html(
            //         createNewPart({
            //             obj_a ,
            //             id
            //         })
            //     )
            //
            // }

        </script>
        @endslot
@endcomponent

