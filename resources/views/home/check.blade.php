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

                            <div id="contact">
                                <div class="row">
                                    <div class="col-lg-6 center-block">
                                        <div>
                                            @include('error')

                                            <div class="boxy">
                                                <form id="fm1" action="{{route('home.check')}}" method="get">
                                                    <h1>
                                                        مرحله یک از چهار
                                                        {{$check}}
                                                    </h1>
                                                    @csrf
                                                    @method('get')
{{--                                                    <div class="col-md-12">--}}

{{--                                                    </div>--}}

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <div class="ra">
                                                                    <label for="mobile">شماره همراه</label>
                                                                    <input type="text" name="check" value="{{$check}}"  hidden>
                                                                    <input type="number" name="mobile" value="{{old('mobile',request('mobile'))}}" placeholder="لطفا شماره همراه خود را وارد کنید">
                                                                </div>
                                                            </div>
                                                        </div>

{{--                                                        <div class="col-lg-6">--}}
{{--                                                            <div>--}}
{{--                                                                <div class="ra">--}}
{{--                                                                    <label for="product_id">  محصول </label>--}}
{{--                                                                    <select name="product_id" id="product_id">--}}
{{--                                                                        <option value=""></option>--}}
{{--                                                                        @foreach(\App\Models\Product::all() as $product)--}}
{{--                                                                            <option value="{{$product->id}}">{{$product->name}}</option>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-lg-6">--}}
{{--                                                            <div>--}}
{{--                                                                <div class="ra">--}}
{{--                                                                    <label for="barcode">شماره بارکد</label>--}}
{{--                                                                    <input type="number" name="barcode" value="{{old('barcode')}}" placeholder="لطفا  شماره بار کد خود را وارد کنید">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-lg-6">--}}
{{--                                                            <div>--}}
{{--                                                                <div class="ra">--}}
{{--                                                                    <label for="current">  جریان </label>--}}
{{--                                                                    <input type="number" name="current" value="{{old('current')}}" placeholder="لطفا جریان محصول خود را وارد کنید">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}


{{--                                                        <div class="col-lg-4">--}}
{{--                                                            <div>--}}
{{--                                                                <div class="ra">--}}
{{--                                                                    <label for="ostan">       استان</label>--}}
{{--                                                                    <select class=" " name="ostan_id" id="ostan">--}}
{{--                                                                        <option  >استان را انتخاب کنید </option>--}}
{{--                                                                        @foreach(\App\Models\Ostan::all() as $ostan)--}}
{{--                                                                            <option {{old('ostan_id' )==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}</option>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-lg-4">--}}
{{--                                                            <div>--}}
{{--                                                                <div class="ra">--}}
{{--                                                                    <label for="shahr">       شهر</label>--}}
{{--                                                                    <select class=" " name="shahr_id" id="shahr">--}}
{{--                                                                    </select>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

                                                        </div>

{{--                                                    <div class="ra">--}}
{{--                                                        <label for="address">       آدرس</label>--}}
{{--                                                        <textarea name="address" id="address" cols="30" rows="10"></textarea>--}}
{{--                                                    </div>--}}
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="csode">    من ربات نیستم </label>
                                                            {!! app('captcha')->display() !!}
                                                            @if ($errors->has('g-recaptcha-response'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                                           </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <span class="bt1" id="fm1bt" style="position: relative; top: 40px" >ثبت</span>
                                                        </div>
                                                    </div>
{{--                                                        @if($check==2)--}}
{{--                                                            <div class="col-lg-12">--}}
{{--                                                                <div>--}}
{{--                                                                    <button class="bt1">ثبت</button>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}

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







