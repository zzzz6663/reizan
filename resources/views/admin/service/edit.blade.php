@component('admin.section.content',['title'=>'  ویرایش خدمات'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ویرایش خدمات

        </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                فرم ویرایش خدمات
                                {{$service->title}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                    @include('error')

                    <!-- form start -->
                        <form role="form" action="{{route('service.update',$service->id)}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام خدمات</label>
                                    <input type="text" name="title" value="{{old('title',$service->title)}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">  ویدئو خدمات</label>
                                    <input type="file" name="video"  class="form-control" accept="video/mp4" id="exampleInputEmail1" placeholder=" فایل خود را ارسال کنید ">
                                    <video width="200" height="150" controls>
                                        <source src="{{asset('/src/service/'.$service->video)}}" type="video/mp4">
                                        <source  src="{{asset('/src/service/'.$service->video)}}" type="video/ogg">
                                        No video support.
                                    </video>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">توضیحات خدمات</label>
                                    <textarea name="content" id="" class="form-control" cols="30" rows="10">{{old('content',$service->content)}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="play">  نمایش ویدئو</label>
                                    <select name="play" id="play" class="form-control">
                                        <option value=""> یک گزینه رو انتخاب کنید </option>
                                        <option {{old('play', $service->play)=='0'?'selected':''}} value="0">عدم نمایش</option>
                                        <option {{old('play', $service->play)=='1'?'selected':''}} value="1"> نمایش</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('service.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endcomponent

