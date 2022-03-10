@component('admin.section.content',['title'=>'لیست اسلایدر'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  اسلایدر</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    اسلایدر</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                              <a class="btn btn-info" href="{{route('slider.create')}}">  اسلایدر جدید</a>
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
                                    <th>نام </th>
                                    <th>اقدام </th>
                                </tr>
                                @foreach(\App\Models\Slider::all() as $slider)
                                    <tr>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->content}}</td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('slider.edit',$slider->id)}}">ویرایش

                                            </a>
                                            <form action="{{route('slider.destroy',$slider->id)}}" style="display: inline-block" method="post">
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

