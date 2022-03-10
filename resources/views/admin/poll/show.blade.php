@component('admin.section.content',['title'=>'  مشاهده نظرسنجی'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">مشاهده    نظرسنجی</li>
    @endslot

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  جزئیات نظر سنجی       </h3>
                        </div>
                        <!-- /.card-header -->
                      <div class="row">
                          <div class="col-lg-12">
                              <h1>      اطلاعات عمومی
                              </h1>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> نام</h5>
                                      {{$poll->user->name}} {{$poll->user->family}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> چگونه با ریزان الکتریک آشنا شیدید ؟
                                      </h5>
                                      {{$poll->how_reizan}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> پیش از خرید وبسایت شرکت را بازدید کرده اید ؟
                                      </h5>
                                         {{$poll->visit=='on'?'بله':'خیر'}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> کیفیت وبسایت را چکونه ارزیابی میکنید ؟
                                      </h5>
                                         {{$poll->how_web}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> پیش از خرید کسی محصولات ریزان را به شما معرفی کرده بود ؟
                                      </h5>
                                         {{$poll->introduction}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> اگر از نمایندگان رسمی خرید کرده اید برخورد و راهنمایی های ایشان چگونه بود ؟
                                      </h5>
                                         {{$poll->guidance}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> در لحظه خرید چه چیز باعث شد دیگران را انتخاب نکنید ؟
                                      </h5>
                                         {{$poll->other}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> چرا محصول ریزان الکتریک را انتخاب کرده اید ؟
                                      </h5>
                                         {{$poll->why}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> پس از خرید کاال خدمات نصب به موقع انجام شد ؟
                                      </h5>
                                         {{$poll->service}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> آیا نیازمند پیگیری مجدد برای حضور نصاب بود ؟
                                      </h5>
                                         {{$poll->follow_up}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> برخورد نصاب چگونه بود ؟
                                      </h5>
                                         {{$poll->installation_collision}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                      <h5> آیا در خواست دستمزد از شما داشتند ؟
                                      </h5>
                                         {{$poll->wage}}
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="card-body">
                                  <h5>    بار مصرفی محصول چیست ؟</h5>
                                  {{__('arr.'.$poll->bar)}}
                              </div>
                          </div>

                      </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>از عملکرد دستگاه رضایت دارید ؟
                                </h1>
                            </div>

                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5> بسته بندی	</h5>
                                    ({{$poll->packing}})
                                     {{$poll->info_packing	}}

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5>   ظاهر محصول		</h5>
                                    ({{$poll->appearance}})
                                    {{$poll->info_appearance	}}

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5>   امکانات محصول		</h5>
                                    ({{$poll->possi}})
                                    {{$poll->info_possi	}}

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5>   وزن و ابعاد محصول		</h5>
                                    ({{$poll->wa}})
                                    {{$poll->info_wa	}}

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5>   رنگ بندی		</h5>
                                    ({{$poll->color}})
                                    {{$poll->info_color	}}

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5> کیفیت عمومی </h5>
                                    ({{$poll->qua}})
                                    {{$poll->info_qua	}}

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5>   ارزش خرید کالا		</h5>
                                    ({{$poll->value}})
                                    {{$poll->info_value	}}

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1>سایر
                                </h1>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5> بدترین مورد که نیاز به اصلاح دارد :
                                    </h5>
                                    {{$poll->worst}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5> بهترین موردی که تقویت آن الزم است :
                                    </h5>
                                    {{$poll->best}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5> آیا مجددا محصوالت ریزان الکتریک را خریداری میکنید ؟
                                    </h5>
                                    {{$poll->rebuy}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5> آیا خرید محصوالت ریزان الکتریک را به دیگران توصیه میکنید ؟
                                    </h5>
                                    {{$poll->offer}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <h5> توصیه پایانی به تولید کننده :
                                    </h5>
                                    {{$poll->finish}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-body">
                                    <a class="btn btn-warning" href="{{ url()->previous() }}">برگشت</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

