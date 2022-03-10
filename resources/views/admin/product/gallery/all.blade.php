@component('admin.section.content',['title'=>'لیست گالری'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  گالری</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست    گالری</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                                    <a class="btn btn-info" href="{{route('products.gallery.create',[ $product->id])}}">  تصویر  جدید</a>
                                </div>
                            </div>
                            <div class="card-tools">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <div class="row">
                            @foreach($images as $image)
                              <div class="col-sm-2">
                                  <a href="{{url($image['image'])}}">
                                      <img src="{{url($image['image'])}}" width="200" height="100" class="img-fluid mb-2" alt="{{$image['alt']}}">
                                  </a>
                                  <form action="{{route('products.gallery.destroy',[$product->id,$image->id])}}" id="image-{{$image->id}}" method="post">
                                      @method('delete')
                                      @csrf
                                  </form>
                                  <a class="btn btn-primary" href="{{route('products.gallery.edit',[$product->id,$image->id])}}">ویرایش</a>
                                  <a class="btn btn-danger" href="#" onclick="document.getElementById('image-{{$image->id}}').submit()">حذف</a>

                              </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endcomponent

