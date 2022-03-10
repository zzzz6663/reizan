@extends('master.home')




                @section('main_body')
                    @include('home.section.header_home')

                    <div id="main" class="rows">
                        <div class="container">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="main-title">

                                            <h3>
                                                {{$service->title}}
                                            </h3>
                                            @if($service->play)
                                            <video width="100%"  height="auto" controls>
                                                <source src="{{asset('/src/service/'.$service->video)}}" type="video/mp4">
                                                <source  src="{{asset('/src/service/'.$service->video)}}" type="video/ogg">
                                                No video support.
                                            </video>
                                            @endif

                                            <span class="after-title">
                                                {!! $service->content !!}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>


                @endsection







