@component('admin.section.content',['title'=>'لیست مشتری ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست مشتری ها</li>
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
                                <a class="btn btn-info" href="{{route('customer.create')}}">  مشتری جدید</a>
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
                                    <th>استان </th>
                                    <th>شهر </th>
                                    <th>همراه </th>
                                    <th>تلفن </th>
                                    <th>ادرس </th>
                                    <th>تلگرام </th>
                                    <th>اینستاگرام </th>
                                    <th>  اقدام</th>
                                </tr>

                                @foreach(\App\Models\User::whereIn('level',['customer' ])->latest()->get() as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}} {{$user->family}}   ({{$user->id}})</td>
                                        <td>{{$user->ostan->name}} </td>
                                        <td>{{$user->shahr->name}} </td>
                                        <td>{{$user->mobile}} </td>
                                        <td>{{$user->tell}} </td>
                                        <td>{{$user->address}} </td>
                                        <td>{{$user->telegram}} </td>
                                        <td>{{$user->instagram}} </td>
                                        <td><a class="btn  btn-outline-primary" href="{{route('customer.edit',$user->id)}}">ویرایش</a>

                                            <form action="{{route('customer.destroy',$user->id)}}" style="display: inline-block" method="post">
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

