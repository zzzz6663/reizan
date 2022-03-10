@component('admin.section.content',['title'=>'لیست قطعه'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  قطعه</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    قطعه</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                              <a class="btn btn-info" href="{{route('part.create')}}">  قطعه جدید</a>
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
                                    <th>قیمت</th>
                                    <th>اقدام </th>
                                </tr>
                                @foreach(\App\Models\Part::all() as $part)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$part->name}}</td>
                                        <td>{{number_format($part->price)}} ریال</td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('part.edit',$part->id)}}">ویرایش</a>
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

