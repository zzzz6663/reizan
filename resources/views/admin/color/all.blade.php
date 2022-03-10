@component('admin.section.content',['title'=>'لیست رنگ'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  رنگ</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    رنگ</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                              <a class="btn btn-info" href="{{route('color.create')}}">  رنگ جدید</a>
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
                                @foreach(\App\Models\Color::all() as $color)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('color.edit',$color->id)}}">ویرایش</a>
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

