@component('admin.section.content',['title'=>'لیست خدمات'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  خدمات</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    خدمات</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                              <a class="btn btn-info" href="{{route('service.create')}}">  خدمات جدید</a>
                                </div>
                            </div>
                            <div class="card-tools">

                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>تایتل </th>
                                    <th>متن </th>
                                    <th>ویدئو </th>
                                    <th>اقدام </th>
                                </tr>
                                @foreach(\App\Models\Service::all() as $service)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$service->title}}</td>
                                        <td>{{$service->content}}</td>
                                        <td>
                                            <div id="modal_{{$service->id}}" class="modal">
                                                <video width="100%" height="auto" controls>
                                                    <source src="{{asset('/src/service/'.$service->video)}}" type="video/mp4">
                                                    <source  src="{{asset('/src/service/'.$service->video)}}" type="video/ogg">
                                                    No video support.
                                                </video>
                                            </div>

                                            <span class="btn trigger  btn-outline-secondary  "  data-id="{{$service->id}}">
                                                                مشاهده ویدئو
                                            </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('service.edit',$service->id)}}">ویرایش</a>
                                            <form action="{{route('service.destroy',$service->id)}}" style="display: inline-block" method="post">
                                                @method('delete')
                                                @csrf
                                                <input type="submit" value="حذف" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endcomponent

