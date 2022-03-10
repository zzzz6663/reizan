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
                                <path d="M15.6199 5.94741C15.1042 5.85214 14.6306 6.18125 14.5324 6.68466C14.4342 7.18806 14.7644 7.67956 15.2661 7.77807C16.7765 8.07254 17.9428 9.24173 18.2384 10.7574V10.7584C18.3226 11.1947 18.7067 11.5119 19.149 11.5119C19.2083 11.5119 19.2677 11.5065 19.3281 11.4957C19.8298 11.395 20.1599 10.9046 20.0618 10.4001C19.6205 8.13641 17.8781 6.38803 15.6199 5.94741" fill="currentColor" />
                                <path d="M15.5525 2.17528C15.3108 2.14063 15.0681 2.21209 14.875 2.36581C14.6764 2.52171 14.5524 2.74689 14.5254 2.99913C14.4682 3.50903 14.8361 3.97021 15.3453 4.02759C18.8571 4.41949 21.5867 7.15519 21.9816 10.6779C22.0345 11.1499 22.4304 11.5061 22.903 11.5061C22.9386 11.5061 22.9731 11.504 23.0087 11.4996C23.2558 11.4726 23.4759 11.3502 23.6313 11.1554C23.7855 10.9605 23.8557 10.718 23.8276 10.4701C23.3356 6.07477 19.9339 2.66353 15.5525 2.17528" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9511 14.0534C16.2726 18.3737 17.253 13.3756 20.0045 16.1252C22.6572 18.7772 24.1818 19.3085 20.8209 22.6685C20.3999 23.0068 17.7252 27.0771 8.32507 17.6796C-1.07619 8.281 2.9918 5.60348 3.33022 5.18261C6.69927 1.81333 7.22143 3.34683 9.87411 5.99877C12.6256 8.74954 7.62963 9.73312 11.9511 14.0534Z" fill="currentColor" />
                            </svg>

                        </span>
                        <h3>
                            تماس با ما
                        </h3>
                        <span class="after-title">از راه های زیر میتوانید با ما تماس بگیرید</span>
                    </div>
                </div>
            </div>
        </div>

        <div id="contact">


            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div>

                        <div class="single-office">
                            <span class="icon">
                                <svg width="25" height="34" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.833252 14.1962C0.833252 6.52978 7.23972 0.333298 14.989 0.333298C22.7601 0.333298 29.1666 6.52978 29.1666 14.1962C29.1666 18.0594 27.7616 21.646 25.4491 24.6859C22.8979 28.0392 19.7535 30.9607 16.2142 33.254C15.4041 33.784 14.673 33.824 13.784 33.254C10.2245 30.9607 7.08006 28.0392 4.55075 24.6859C2.23656 21.646 0.833252 18.0594 0.833252 14.1962ZM10.3236 14.6279C10.3236 17.1962 12.4193 19.2161 14.989 19.2161C17.5603 19.2161 19.6762 17.1962 19.6762 14.6279C19.6762 12.0797 17.5603 9.9614 14.989 9.9614C12.4193 9.9614 10.3236 12.0797 10.3236 14.6279Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">دفتر مرکزی  </span>
                                <div class="bot">
                                    <span class="val">

                                        تهران تهرانپارس خیابان جشنواره شماره 129 طبقه 4 واحد 13

                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="single-office">
                            <span class="icon">
                                <svg width="25" height="34" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.833252 14.1962C0.833252 6.52978 7.23972 0.333298 14.989 0.333298C22.7601 0.333298 29.1666 6.52978 29.1666 14.1962C29.1666 18.0594 27.7616 21.646 25.4491 24.6859C22.8979 28.0392 19.7535 30.9607 16.2142 33.254C15.4041 33.784 14.673 33.824 13.784 33.254C10.2245 30.9607 7.08006 28.0392 4.55075 24.6859C2.23656 21.646 0.833252 18.0594 0.833252 14.1962ZM10.3236 14.6279C10.3236 17.1962 12.4193 19.2161 14.989 19.2161C17.5603 19.2161 19.6762 17.1962 19.6762 14.6279C19.6762 12.0797 17.5603 9.9614 14.989 9.9614C12.4193 9.9614 10.3236 12.0797 10.3236 14.6279Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">کارگاه</span>
                                <div class="bot">
                                    <span class="val">بلوار کشاورز ، تقاطع نادری، جنب بانک سامان ، پلاک ۰۸۱ واحد ۹</span>
                                </div>
                            </div>
                        </div> --}}

                        <div class="single-office phone">
                            <span class="icon">
                                <svg width="26" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.467 16.5396C20.7831 22.8539 22.2159 15.549 26.2374 19.5676C30.1144 23.4435 32.3426 24.2201 27.4305 29.1308C26.8153 29.6253 22.906 35.5742 9.16737 21.8395C-4.57293 8.103 1.37259 4.1897 1.8672 3.57459C6.7912 -1.34974 7.55436 0.891523 11.4314 4.76744C15.4528 8.78779 8.15096 10.2253 14.467 16.5396Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">تلفن های تماس</span>
                                <div class="bot">
                                    <span class="val">021-77292895 </span>
                                    <span class="val"> 021-77293149</span>
                                </div>
                            </div>
                        </div>

                        <div class="single-office hour">
                            <span class="icon">
                                <svg width="27" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0001 31.8335C7.26008 31.8335 0.166748 24.756 0.166748 16.0001C0.166748 7.26014 7.26008 0.166809 16.0001 0.166809C24.7559 0.166809 31.8334 7.26014 31.8334 16.0001C31.8334 24.756 24.7559 31.8335 16.0001 31.8335ZM21.0509 21.8743C21.2409 21.9851 21.4467 22.0485 21.6684 22.0485C22.0642 22.0485 22.4601 21.8426 22.6817 21.4626C23.0142 20.9085 22.8401 20.1801 22.2701 19.8318L16.6334 16.4751V9.16014C16.6334 8.49514 16.0951 7.97264 15.4459 7.97264C14.7967 7.97264 14.2584 8.49514 14.2584 9.16014V17.156C14.2584 17.5676 14.4801 17.9476 14.8442 18.1693L21.0509 21.8743Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">ساعات کاری</span>
                                <div class="bot">
                                    <span class="val">     از ساعت 9 تا 18 </span>
                                    {{-- <span class="val">شنبه تا چهارشنبه 16/8</span> --}}
                                </div>
                            </div>
                        </div>

                        <div class="single-office last">
                            <span class="icon">
                                <svg width="28" height="30" viewBox="0 0 34 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.2323 0C27.4673 0 29.6173 0.883333 31.199 2.46833C32.7823 4.05 33.6673 6.18333 33.6673 8.41667V21.5833C33.6673 26.2333 29.884 30 25.2323 30H8.76732C4.11565 30 0.333984 26.2333 0.333984 21.5833V8.41667C0.333984 3.76667 4.09898 0 8.76732 0H25.2323ZM27.8839 10.9L28.0173 10.7667C28.4156 10.2833 28.4156 9.58333 27.9989 9.09999C27.7673 8.85166 27.4489 8.7 27.1173 8.66666C26.7673 8.64833 26.4339 8.76666 26.1823 8.99999L18.6673 15C17.7006 15.8017 16.3156 15.8017 15.3339 15L7.83394 8.99999C7.3156 8.61666 6.59894 8.66666 6.16727 9.11666C5.71727 9.56666 5.66727 10.2833 6.04894 10.7833L6.26727 11L13.8506 16.9167C14.7839 17.65 15.9156 18.05 17.1006 18.05C18.2823 18.05 19.4339 17.65 20.3656 16.9167L27.8839 10.9Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">ایمیل پشتیبانی</span>
                                <div class="bot">
                                    <span class="val">info@reizan.ir</span>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
                <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>
                {{-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyC6w5WXE0USRvrqSg4TlXHRIaxGUc2p9tk&sensor=true"></script>--}}
                <div class="col-lg-6 col-md-12">
                    <div>

                        <div id="map" style="width: 100%; height: 450px; background: #eee; border: 2px solid #aaa;"></div>

                        <script type="text/javascript">
                            var myMap = new L.Map('map', {
                                key: 'web.RGcOLl7H7iw24EcC3dFhkr3QkcbvP0eA6JwqI3SD'
                                , maptype: 'dreamy'
                                , poi: true
                                , traffic: false
                                , center: [35.7340453, 51.5374258]
                                , zoom: 20
                            , });
                            L.marker([35.7340453, 51.5374258]).addTo(myMap);

                        </script>
                    </div>
                </div>
            </div>

            <div class="clr"></div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div>

                        {{-- <div class="single-office">
                            <span class="icon">
                                <svg width="25" height="34" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.833252 14.1962C0.833252 6.52978 7.23972 0.333298 14.989 0.333298C22.7601 0.333298 29.1666 6.52978 29.1666 14.1962C29.1666 18.0594 27.7616 21.646 25.4491 24.6859C22.8979 28.0392 19.7535 30.9607 16.2142 33.254C15.4041 33.784 14.673 33.824 13.784 33.254C10.2245 30.9607 7.08006 28.0392 4.55075 24.6859C2.23656 21.646 0.833252 18.0594 0.833252 14.1962ZM10.3236 14.6279C10.3236 17.1962 12.4193 19.2161 14.989 19.2161C17.5603 19.2161 19.6762 17.1962 19.6762 14.6279C19.6762 12.0797 17.5603 9.9614 14.989 9.9614C12.4193 9.9614 10.3236 12.0797 10.3236 14.6279Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">دفتر فروش</span>
                                <div class="bot">
                                    <span class="val">
                                        تهران تهرانپارس خیابان جشنواره شماره 129 طبقه 4 واحد 13
                                    </span>
                                </div>
                            </div>
                        </div> --}}

                        <div class="single-office">
                            <span class="icon">
                                <svg width="25" height="34" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.833252 14.1962C0.833252 6.52978 7.23972 0.333298 14.989 0.333298C22.7601 0.333298 29.1666 6.52978 29.1666 14.1962C29.1666 18.0594 27.7616 21.646 25.4491 24.6859C22.8979 28.0392 19.7535 30.9607 16.2142 33.254C15.4041 33.784 14.673 33.824 13.784 33.254C10.2245 30.9607 7.08006 28.0392 4.55075 24.6859C2.23656 21.646 0.833252 18.0594 0.833252 14.1962ZM10.3236 14.6279C10.3236 17.1962 12.4193 19.2161 14.989 19.2161C17.5603 19.2161 19.6762 17.1962 19.6762 14.6279C19.6762 12.0797 17.5603 9.9614 14.989 9.9614C12.4193 9.9614 10.3236 12.0797 10.3236 14.6279Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">  مرکز خدمات مشتریان</span>
                                <div class="bot">
                                    <span class="val">
                                        تهران جاجرود سعید آباد میدان ساعت کوچه دانش پلاک 32
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="single-office phone">
                            <span class="icon">
                                <svg width="26" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.467 16.5396C20.7831 22.8539 22.2159 15.549 26.2374 19.5676C30.1144 23.4435 32.3426 24.2201 27.4305 29.1308C26.8153 29.6253 22.906 35.5742 9.16737 21.8395C-4.57293 8.103 1.37259 4.1897 1.8672 3.57459C6.7912 -1.34974 7.55436 0.891523 11.4314 4.76744C15.4528 8.78779 8.15096 10.2253 14.467 16.5396Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">تلفن های تماس</span>
                                <div class="bot">
                                    <span class="val">021-77292895 </span>
                                    <span class="val"> 021-77293149</span>
                                </div>
                            </div>
                        </div>

                        <div class="single-office hour">
                            <span class="icon">
                                <svg width="27" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0001 31.8335C7.26008 31.8335 0.166748 24.756 0.166748 16.0001C0.166748 7.26014 7.26008 0.166809 16.0001 0.166809C24.7559 0.166809 31.8334 7.26014 31.8334 16.0001C31.8334 24.756 24.7559 31.8335 16.0001 31.8335ZM21.0509 21.8743C21.2409 21.9851 21.4467 22.0485 21.6684 22.0485C22.0642 22.0485 22.4601 21.8426 22.6817 21.4626C23.0142 20.9085 22.8401 20.1801 22.2701 19.8318L16.6334 16.4751V9.16014C16.6334 8.49514 16.0951 7.97264 15.4459 7.97264C14.7967 7.97264 14.2584 8.49514 14.2584 9.16014V17.156C14.2584 17.5676 14.4801 17.9476 14.8442 18.1693L21.0509 21.8743Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">ساعات کاری</span>
                                <div class="bot">
                                    <span class="val">     از ساعت 9 تا 18 </span>
                                </div>
                            </div>
                        </div>

                        <div class="single-office last">
                            <span class="icon">
                                <svg width="28" height="30" viewBox="0 0 34 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.2323 0C27.4673 0 29.6173 0.883333 31.199 2.46833C32.7823 4.05 33.6673 6.18333 33.6673 8.41667V21.5833C33.6673 26.2333 29.884 30 25.2323 30H8.76732C4.11565 30 0.333984 26.2333 0.333984 21.5833V8.41667C0.333984 3.76667 4.09898 0 8.76732 0H25.2323ZM27.8839 10.9L28.0173 10.7667C28.4156 10.2833 28.4156 9.58333 27.9989 9.09999C27.7673 8.85166 27.4489 8.7 27.1173 8.66666C26.7673 8.64833 26.4339 8.76666 26.1823 8.99999L18.6673 15C17.7006 15.8017 16.3156 15.8017 15.3339 15L7.83394 8.99999C7.3156 8.61666 6.59894 8.66666 6.16727 9.11666C5.71727 9.56666 5.66727 10.2833 6.04894 10.7833L6.26727 11L13.8506 16.9167C14.7839 17.65 15.9156 18.05 17.1006 18.05C18.2823 18.05 19.4339 17.65 20.3656 16.9167L27.8839 10.9Z" fill="currentColor" />
                                </svg>
                            </span>
                            <div class="left">
                                <span class="top">ایمیل پشتیبانی</span>
                                <div class="bot">
                                    <span class="val">info@reizan.ir</span>
                                </div>
                            </div>
                        </div>

                        <div class="social">
                            <ul>
                                <li>
                                    <a href="#" class="twitter">
                                        <svg width="20" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.534 5.113C22.51 4.42 23.331 3.555 24 2.559V2.558C23.107 2.949 22.157 3.209 21.165 3.335C22.185 2.726 22.964 1.769 23.33 0.616C22.379 1.183 21.329 1.583 20.21 1.807C19.307 0.845 18.02 0.25 16.616 0.25C13.892 0.25 11.699 2.461 11.699 5.171C11.699 5.561 11.732 5.936 11.813 6.293C7.723 6.093 4.103 4.133 1.671 1.146C1.247 1.883 0.997 2.726 0.997 3.633C0.997 5.337 1.874 6.847 3.183 7.722C2.392 7.707 1.617 7.477 0.96 7.116V7.17C0.96 9.561 2.665 11.547 4.902 12.005C4.501 12.115 4.065 12.167 3.612 12.167C3.297 12.167 2.979 12.149 2.681 12.083C3.318 14.031 5.128 15.464 7.278 15.511C5.604 16.82 3.478 17.609 1.177 17.609C0.774 17.609 0.387 17.591 0 17.542C2.18 18.947 4.762 19.75 7.548 19.75C16.231 19.75 21.89 12.506 21.534 5.113Z" fill="currentColor" />
                                        </svg>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="insta">
                                        <svg width="20" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.2362 24C12.1568 24 12.0773 24 11.9973 23.9996C10.1161 24.0042 8.37783 23.9564 6.6874 23.8535C5.13759 23.7592 3.72291 23.2236 2.59608 22.3048C1.50879 21.4182 0.766299 20.2194 0.389283 18.7421C0.0611574 17.456 0.0437623 16.1935 0.0270997 14.9723C0.0150147 14.0962 0.00256348 13.058 0 12.0022C0.00256348 10.942 0.0150147 9.90377 0.0270997 9.02761C0.0437623 7.80666 0.0611574 6.54414 0.389283 5.25782C0.766299 3.78052 1.50879 2.58173 2.59608 1.69513C3.72291 0.776302 5.13759 0.240717 6.68758 0.146417C8.37801 0.043695 10.1166 -0.00427877 12.0019 0.000298881C13.8836 -0.00372945 15.6213 0.043695 17.3118 0.146417C18.8616 0.240717 20.2762 0.776302 21.4031 1.69513C22.4905 2.58173 23.2329 3.78052 23.6099 5.25782C23.938 6.54396 23.9554 7.80666 23.9721 9.02761C23.9841 9.90377 23.9968 10.942 23.9992 11.9978V12.0022C23.9968 13.058 23.9841 14.0962 23.9721 14.9723C23.9554 16.1933 23.9382 17.4558 23.6099 18.7421C23.2329 20.2194 22.4905 21.4182 21.4031 22.3048C20.2762 23.2236 18.8616 23.7592 17.3118 23.8535C15.6929 23.952 14.0299 24 12.2362 24ZM11.9973 22.1246C13.8479 22.129 15.5472 22.0823 17.1979 21.982C18.3697 21.9108 19.3858 21.5304 20.2182 20.8517C20.9876 20.2242 21.5175 19.3584 21.7931 18.2785C22.0663 17.2079 22.082 16.0583 22.0972 14.9467C22.1091 14.0764 22.1216 13.0455 22.1241 12C22.1216 10.9542 22.1091 9.92354 22.0972 9.05324C22.082 7.94161 22.0663 6.79207 21.7931 5.72126C21.5175 4.6413 20.9876 3.77558 20.2182 3.14807C19.3858 2.46948 18.3697 2.08917 17.1979 2.01794C15.5472 1.91742 13.8479 1.87109 12.0017 1.87512C10.1514 1.87073 8.45199 1.91742 6.80129 2.01794C5.62941 2.08917 4.61336 2.46948 3.78096 3.14807C3.01154 3.77558 2.48164 4.6413 2.20606 5.72126C1.93287 6.79207 1.91712 7.94142 1.90192 9.05324C1.89002 9.92428 1.87757 10.9557 1.87501 12.0022C1.87757 13.044 1.89002 14.0757 1.90192 14.9467C1.91712 16.0583 1.93287 17.2079 2.20606 18.2785C2.48164 19.3584 3.01154 20.2242 3.78096 20.8517C4.61336 21.5303 5.62941 21.9106 6.80129 21.9818C8.45199 22.0823 10.1518 22.1292 11.9973 22.1246ZM11.9526 17.8594C8.72189 17.8594 6.09322 15.2309 6.09322 12C6.09322 8.76906 8.72189 6.14057 11.9526 6.14057C15.1835 6.14057 17.812 8.76906 17.812 12C17.812 15.2309 15.1835 17.8594 11.9526 17.8594ZM11.9526 8.01558C9.7557 8.01558 7.96822 9.80306 7.96822 12C7.96822 14.1969 9.7557 15.9844 11.9526 15.9844C14.1497 15.9844 15.937 14.1969 15.937 12C15.937 9.80306 14.1497 8.01558 11.9526 8.01558ZM18.4683 4.26557C17.6917 4.26557 17.062 4.89509 17.062 5.67182C17.062 6.44856 17.6917 7.07808 18.4683 7.07808C19.245 7.07808 19.8745 6.44856 19.8745 5.67182C19.8745 4.89509 19.245 4.26557 18.4683 4.26557Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="telegram">
                                        <svg width="20" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.6757 1.78499C23.4199 1.57349 23.0658 1.52922 22.7608 1.66202L0.858263 11.214C0.30246 11.455 -0.0320049 12.0059 0.00242533 12.6108C0.0368556 13.2158 0.435263 13.7224 1.01566 13.8946L6.41629 15.5276C6.88356 15.6702 7.38034 15.4046 7.51806 14.9373C7.65578 14.4701 7.39509 13.9733 6.92782 13.8356L2.40762 12.4682L19.5195 5.00667L9.42648 15.08C9.42156 15.0849 9.41664 15.0947 9.4068 15.0997C9.39205 15.1144 9.38221 15.1242 9.36745 15.139C9.35762 15.1488 9.34778 15.1636 9.34286 15.1734C9.33794 15.1833 9.3281 15.1931 9.32319 15.2029C9.31827 15.2079 9.31827 15.2128 9.31827 15.2128C9.30843 15.2226 9.30351 15.2374 9.29367 15.2472C9.28384 15.262 9.27892 15.2767 9.26908 15.2915C9.26416 15.3013 9.25924 15.3161 9.25433 15.3259C9.24449 15.3407 9.23957 15.3603 9.22973 15.3751C9.22481 15.3849 9.2199 15.3948 9.2199 15.4046C9.21498 15.4243 9.20514 15.439 9.20022 15.4587C9.1953 15.4686 9.1953 15.4784 9.19038 15.4882C9.18546 15.5079 9.18055 15.5276 9.17563 15.5472C9.17563 15.5571 9.17071 15.5669 9.17071 15.5768C9.16579 15.5964 9.16579 15.6161 9.16579 15.6358C9.16579 15.6456 9.16579 15.6604 9.16579 15.6702C9.16579 15.6899 9.16579 15.7096 9.16579 15.7243C9.16579 15.7342 9.16579 15.7391 9.16579 15.7489L9.43139 20.7905C9.46091 21.3414 9.81505 21.8185 10.3364 22.0054C10.4889 22.0595 10.6414 22.0841 10.7938 22.0841C11.1726 22.0841 11.5415 21.9267 11.8071 21.6316L13.8286 19.3985L17.8127 22.1579C18.0586 22.3251 18.339 22.4136 18.6292 22.4136C18.8063 22.4136 18.9883 22.3792 19.1604 22.3103C19.608 22.1333 19.9326 21.7447 20.031 21.2774L23.9806 2.65558C24.0495 2.33095 23.9314 1.99649 23.6757 1.78499ZM11.1529 19.7281L11.0349 17.4606L12.3678 18.3853L11.1529 19.7281ZM18.4079 20.4118L11.4283 15.5768L21.5754 5.44935L18.4079 20.4118Z" fill="currentColor" />

                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="in">
                                        <svg width="19" height="22" enable-background="new 0 0 512 512" id="Layer_1" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g>
                                                <path d="M173.5,508.7c0-2.4,0-4.7,0-7c0-107.7,0-215.3,0-323c0-3-0.2-5.4,4.2-5.4c31.8,0.2,63.7,0.1,95.5,0.1   c0.8,0,1.6,0.2,2.9,0.4c0,14,0,27.8,0,41.7c0.4,0.1,0.7,0.3,1.1,0.4c4-5.2,7.8-10.6,12-15.7c12.2-15,27.5-26,45.5-32.6   c9.8-3.6,20.5-5.8,30.8-6.3c14.2-0.6,28.7-0.4,42.7,2c23,3.9,43.3,14.1,60.1,30.8c15.9,15.7,26.4,34.6,32.1,55.9   c3,11.3,4.9,22.9,6.7,34.4c1.2,8,1.8,16.2,1.8,24.2c0.1,65,0.1,130,0.1,195c0,1.6-0.1,3.2-0.2,5.3c-1.9,0-3.5,0-5.1,0   c-30.7,0-61.3-0.1-92,0.1c-5.1,0-6-1.7-6-6.3c0.1-59.8,0.3-119.7-0.1-179.5c-0.1-10.5-1.1-21.4-3.8-31.5   c-4.9-17.7-16.1-30.5-33.9-37c-15-5.5-30.2-6.5-45.6-2.6c-17,4.3-28.7,15.6-37.5,30.5c-6.8,11.5-8.1,24.2-8.2,36.9   c-0.4,60.7-0.2,121.3-0.2,182c0,2.3,0,4.6,0,7.1C241.9,508.7,208,508.7,173.5,508.7z" fill="currentColor" />
                                                <path d="M109.1,342.6c0,53.3-0.1,106.6,0.1,159.9c0,4.8-1,6.6-6.3,6.5c-30.5-0.3-61-0.3-91.5,0c-5,0-6.1-1.7-6.1-6.3   c0.1-107.1,0.1-214.3,0-321.4c0-4.3,1.2-5.8,5.6-5.8c30.8,0.2,61.6,0.2,92.5,0c4.8,0,5.7,1.8,5.7,6.1   C109.1,235.3,109.1,289,109.1,342.6z" fill="currentColor" />
                                                <path d="M56.1,4.8C89,4,108.7,27.9,108.8,57.2c0.1,30-20.9,52.4-53.9,52.3c-30.7,0-52.4-22-52.3-53.1C2.7,27.3,23.8,3.8,56.1,4.8z" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="facebook">
                                        <svg width="12" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.85868 24V13.0533H12.5316L13.0826 8.78588H8.85868V6.06176C8.85868 4.82664 9.20026 3.98492 10.9734 3.98492L13.2313 3.98399V0.167076C12.8408 0.116334 11.5005 0 9.9405 0C6.68298 0 4.45282 1.98836 4.45282 5.63912V8.78588H0.768799V13.0533H4.45282V24H8.85868Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div>
                        <div id="map2" style="width: 100%; height: 450px; background: #eee; border: 2px solid #aaa;"></div>

                        <script type="text/javascript">
                            var myMap2 = new L.Map('map2', {
                                key: 'web.RGcOLl7H7iw24EcC3dFhkr3QkcbvP0eA6JwqI3SD'
                                , maptype: 'dreamy'
                                , poi: true
                                , traffic: false
                                , center: [35.7409421, 51.6952101]
                                , zoom: 16
                            , });
                            L.marker([35.7409421, 51.6952101]).addTo(myMap2);

                        </script>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
