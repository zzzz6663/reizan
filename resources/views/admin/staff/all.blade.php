@component('admin.section.content',['title'=>'لیست کاربران'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست کاربران</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست   اشخاص ها</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                                <a class="btn btn-info" href="{{route('staff.create')}}">  کاربر جدید</a>
                                </div>
                            </div>
                            <div class="card-tools">

                            </div>
                        </div>-.

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>نام کاربری</th>
                                    <th>رمز عبور </th>
                                    <th>نوع کاربر</th>
                                    <th>  اقدام</th>
                                </tr>

                                @foreach(\App\Models\User::whereIn('level',['admin','operator','accountant','qc','service'])->latest()->get() as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}} {{$user->family}}   ({{$user->id}}) </td>
                                        <td>{{$user->username}}</td>
                                        <td>{{\Illuminate\Support\Facades\Crypt::decryptString($user->password)}}</td>
                                        <td>{{__('arr.'.$user->level)}}</td>
                                        <td><a class="btn  btn-outline-primary" href="{{route('staff.edit',$user->id)}}">ویرایش</a>
                                            <form action="{{route('staff.destroy',$user->id)}}" style="display: inline-block" method="post">
                                                @method('post')
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
        <div class="col-md-12">


        </div>
    </div>
@endcomponent

