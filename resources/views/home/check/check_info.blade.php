@extends('master.home')




                @section('main_body')
                    @include('home.section.header_home')



                    <div id="main" class="rows">
                        <div class="container">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="main-title">
								<span class="icon">
									<svg width="23" height="23" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M15.6199 5.94741C15.1042 5.85214 14.6306 6.18125 14.5324 6.68466C14.4342 7.18806 14.7644 7.67956 15.2661 7.77807C16.7765 8.07254 17.9428 9.24173 18.2384 10.7574V10.7584C18.3226 11.1947 18.7067 11.5119 19.149 11.5119C19.2083 11.5119 19.2677 11.5065 19.3281 11.4957C19.8298 11.395 20.1599 10.9046 20.0618 10.4001C19.6205 8.13641 17.8781 6.38803 15.6199 5.94741" fill="currentColor"/>
										<path d="M15.5525 2.17528C15.3108 2.14063 15.0681 2.21209 14.875 2.36581C14.6764 2.52171 14.5524 2.74689 14.5254 2.99913C14.4682 3.50903 14.8361 3.97021 15.3453 4.02759C18.8571 4.41949 21.5867 7.15519 21.9816 10.6779C22.0345 11.1499 22.4304 11.5061 22.903 11.5061C22.9386 11.5061 22.9731 11.504 23.0087 11.4996C23.2558 11.4726 23.4759 11.3502 23.6313 11.1554C23.7855 10.9605 23.8557 10.718 23.8276 10.4701C23.3356 6.07477 19.9339 2.66353 15.5525 2.17528" fill="currentColor"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9511 14.0534C16.2726 18.3737 17.253 13.3756 20.0045 16.1252C22.6572 18.7772 24.1818 19.3085 20.8209 22.6685C20.3999 23.0068 17.7252 27.0771 8.32507 17.6796C-1.07619 8.281 2.9918 5.60348 3.33022 5.18261C6.69927 1.81333 7.22143 3.34683 9.87411 5.99877C12.6256 8.74954 7.62963 9.73312 11.9511 14.0534Z" fill="currentColor"/>
									</svg>

								</span>
                                            <h3>
                                                نظر سنجی
                                             </h3>
                                            <span class="after-title">نظر سنجی در بار محصولات</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>
                            <div id="contact">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div>
                                            @include('error')

                                            <div class="boxy">
                                                <form id="fm2" action="{{route('home.check.info',$poll->id)}}" method="get">
                                                    <h1>
                                                        مرحله چهار از چهار
                                                    </h1>
                                                    @csrf
                                                    @method('get')
{{--                                                    <div class="col-md-12">--}}

{{--                                                    </div>--}}

                                                    <div class="row">
                                                        <div class="col-lg-6 ra">
                                                            <div>
                                                                <label for="name">نام</label>
                                                                <input type="text" id="name" name="name" placeholder="نام را وارد کنید">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 ra">
                                                            <div>
                                                                <label for="family">نام خانوادگی</label>
                                                                <input type="text" id="family" name="family" placeholder="نام خانوادگی را وارد کنید">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="how_reizan">چگونه با ریزان الکتریک آشنا شیدید ؟
                                                                </label>
                                                                <input type="text" id="how_reizan" name="how_reizan">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="visit">
                                                                      پیش از خرید وبسایت شرکت را بازدید کرده اید ؟
                                                                </label>
                                                                <input type="checkbox" id="visit" name="visit">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="how_web">کیفیت وبسایت را چکونه ارزیابی میکنید ؟
                                                                </label>
                                                                <input type="text" id="how_web" name="how_web">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6 ra">
                                                            <div>
                                                                <label for="introduction">
                                                                    پیش از خرید کسی محصولات ریزان را به شما معرفی کرده بود ؟

                                                                </label>
                                                                <input type="text" id="introduction" name="introduction">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 ra">
                                                            <div>
                                                                <label for="guidance">
                                                                    اگر از نمایندگان رسمی خرید کرده اید برخورد و راهنمایی های ایشان چگونه بود ؟

                                                                </label>
                                                                <input type="text" id="guidance" name="guidance">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="other">
                                                                    در لحظه خرید چه چیز باعث شد دیگران را انتخاب نکنید ؟

                                                                </label>
                                                                <input type="text" id="other" name="other">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="why">
                                                                    چرا محصول ریزان الکتریک را انتخاب کرده اید ؟

                                                                </label>
                                                                <input type="text" id="why" name="why">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="service">
                                                                    پس از خرید کاال خدمات نصب به موقع انجام شد ؟
                                                                </label>
                                                                <input type="text" id="service" name="service">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="follow_up">
                                                                    آیا نیازمند پیگیری مجدد برای حضور نصاب بود ؟
                                                                </label>
                                                                <input type="text" id="follow_up" name="follow_up">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="installation_collision">
                                                                    برخورد نصاب چگونه بود ؟
                                                                </label>
                                                                <input type="text" id="installation_collision" name="installation_collision">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="wage">
                                                                      آیا در خواست دستمزد از شما داشتند ؟

                                                                </label>
                                                                <input type="text" id="wage" name="wage">
                                                            </div>
                                                        </div>




{{--                                                        <div class="col-lg-4 ra">--}}
{{--                                                            <div>--}}
{{--                                                                <label for="introduction">--}}
{{--                                                                </label>--}}
{{--                                                                <input type="text" id="introduction" name="introduction">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}



                                                    </div>
                                                    <div class="row">
                                                        <h1>   بار مصرفی محصول چیست ؟</h1>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="home">
                                                                    خانه
                                                                </label>
                                                                <input type="radio" class="r_c" id="home" value="home" name="bar">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="vila">
                                                                    ویلا
                                                                </label>
                                                                <input type="radio" class="r_c" id="vila" value="vila" name="bar">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="cnc">
                                                                    خانواده ماشین های cnc
                                                                </label>
                                                                <input type="radio" class="r_c" id="cnc" value="cnc" name="bar">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="medical">
                                                                    خانواده لیزرهای پزشکی
                                                                </label>
                                                                <input type="radio" class="r_c" id="medical" value="medical" name="bar">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="server">
                                                                    سرور و کامپیوتر
                                                                </label>
                                                                <input type="radio" class="r_c" id="server" value="server" name="bar">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="miner">
                                                                    ماینر
                                                                </label>
                                                                <input type="radio" class="r_c" id="miner" value="miner" name="bar">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="wpomp">
                                                                    پمپ آب
                                                                </label>
                                                                <input type="radio" class="r_c" id="wpomp" value="wpomp" name="bar">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-8 ra">
                                                            <div>
                                                                <label for="otheru">
                                                                    سایر مصارف
                                                                </label>
                                                                <input type="radio" class="r_c" id="otheru" value="otheru" name="bar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">


                                                    <h1>
                                                        از عملکرد دستگاه رضایت دارید ؟

                                                    </h1>
                                                        <div class="col-lg-12 ra">
                                                            <div>
                                                                <table>
                                                                    <tr>
                                                                        <th>سنجه  </th>
                                                                        <th>نمره  </th>
                                                                        <th>توضیحات</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            بسته بندی
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="packing" min="0" max="20" placeholder="0-20">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"    name="info_packing" placeholder="توضیحات">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            ظاهر محصول
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="appearance" min="0" max="20" placeholder="0-20">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"    name="info_appearance" placeholder="توضیحات">
                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td>
                                                                            امکانات محصول
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="possi" min="0" max="20" placeholder="0-20">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"    name="info_possi" placeholder="توضیحات">
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            وزن و ابعاد
                                                                            محصول
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="wa" min="0" max="20" placeholder="0-20">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"    name="info_wa" placeholder="توضیحات">
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            رنگ بندی

                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="color" min="0" max="20" placeholder="0-20">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"    name="info_color" placeholder="توضیحات">
                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td>
                                                                            کیفیت عمومی

                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="qua" min="0" max="20" placeholder="0-20">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"    name="info_qua" placeholder="توضیحات">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                          ارزش خرید کالا
                                                                        </td>
                                                                        <td>
                                                                            <input type="number" name="value" min="0" max="20" placeholder="0-20">
                                                                        </td>
                                                                        <td>
                                                                            <input type="text"    name="info_value" placeholder="توضیحات">
                                                                        </td>
                                                                    </tr>


                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="worst">
                                                                    بدترین مورد که نیاز به اصلاح دارد :

                                                                </label>
                                                                <input type="text" id="worst" name="worst">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="best">
                                                                    بهترین موردی که تقویت آن الزم است :

                                                                </label>
                                                                <input type="text" id="best" name="best">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="rebuy">
                                                                    آیا مجددا محصوالت ریزان الکتریک را خریداری میکنید ؟

                                                                </label>
                                                                <input type="text" id="rebuy" name="rebuy">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-8 ra">
                                                            <div>
                                                                <label for="offer">
                                                                    آیا خرید محصوالت ریزان الکتریک را به دیگران توصیه میکنید ؟

                                                                </label>
                                                                <input type="text" id="offer" name="offer">
                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 ra">
                                                            <div>
                                                                <label for="finish">
                                                                    توصیه پایانی به تولید کننده :
                                                                </label>
                                                                <input type="text" id="finish" name="finish">
                                                            </div>
                                                        </div>







                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <button  class="bt1" style="position: relative; top: 40px">ثبت</button>
                                                            </div>
                                                        </div>
                                                    </div>




                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                @endsection







