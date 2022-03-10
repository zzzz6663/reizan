@component('admin.section.content',['title'=>'لیست محصولات '])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  محصولات </li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    محصولات </h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                              <a class="btn btn-info" href="{{route('products.create' )}}">  محصولات  جدید</a>
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
                                    <th>دسته بندی </th>
                                    <th>جریان </th>
                                    <th>رنگ </th>
                                    <th>ورژن </th>
                                    <th>قیمت</th>

                                    <th>اقدام </th>
                                </tr>
                                @foreach(\App\Models\Product::all() as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->name}} ({{$product->id}})</td>
                                        <td>{{isset($product->cat)?$product->cat->name:''}}</td>
                                        <td>{{$product->current}}</td>
                                        <td>  {{implode(', ',$product->colores->pluck('name')->toArray())}}</td>
                                        <td>  {{implode(', ',$product->versions->pluck('name')->toArray())}}</td>
                                        <td>{{number_format($product->price())}}</td>
                                        <td>
{{--                                            <a class="btn btn-outline-success" href="{{route('products.edit',$product->id)}}">ویرایش</a>--}}
                                            <a class="btn btn-info" href="{{route('products.gallery.index',[ $product->id])}}">  گالری محصولات</a>
                                            <a class="btn btn-outline-primary" href="{{route('products.edit',$product->id)}}">ویرایش</a>
                                            <form action="{{route('products.destroy',$product->id)}}" style="display: inline-block" method="post">
                                                @method('delete')
                                                @csrf
                                                <input type="submit" value="حذف" class="btn btn-danger">
                                            </form>
                                            <a class="btn btn-outline-warning" href="{{route('copy.product',$product->id)}}">کپی</a>

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

