@component('admin.section.content',['title'=>'لیست مشتری های ما'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  مشتری های ما</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    مشتری های ما</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                              <a class="btn btn-info" href="{{route('customers.create')}}">  مشتری های ما جدید</a>
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
                                    <th>اقدام </th>
                                </tr>
                                @foreach(\App\Models\Customer::all() as $customer)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$customer->title}}</td>
                                        <td>
                                            <div id="modal_{{$customer->id}}" class="modal">
                                                <img src="{{asset('/src/customer/'.$customer->image)}}" alt="">

                                            </div>

                                            <span class="btn trigger  btn-outline-secondary  "  data-id="{{$customer->id}}">
                                                                مشاهده تصویر
                                            </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('customers.edit',$customer->id)}}">ویرایش</a>
                                            <form action="{{route('customers.destroy',$customer->id)}}" style="display: inline-block" method="post">
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

