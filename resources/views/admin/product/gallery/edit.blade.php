@component('admin.section.content',['title'=>'  به روز رسانی  تصویر'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  تصویر</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم ویرایش تصویر</h3>
                        </div>
                        <!-- /.card-header -->
                      @include('error')

                        <!-- form start -->
                        <form role="form" action="{{route('products.gallery.update', [$product->id,$gallery->id])}}" method="post" >
                            @csrf
                            @method('patch')
                            <div class="row image-field"  >
                                <div class="col-5">
                                    <div class="form-group">
                                        <label  >تصویر</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control image_label" name="image" value="{{old('image',$gallery->image)}}"  aria-label="Image" aria-describedby="button-image">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary button-image" type="button">انتخاب</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="">عنوان</label>
                                        <input type="text" class="form-control  " name="alt" value="{{old('alt',$gallery->alt)}}">

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">به روز رسانی</button>
                                <a class="btn btn-success" href="{{route('products.gallery.index',$product->id)}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @slot('script')
        <script>
            let createNewPic=({id})=>{
                return `
              <div class="row image-field" id="image-${id}">
        <div class="col-5">
            <div class="form-group">
                <label  >تصویر</label>
               <div class="input-group">
                <input type="text" class="form-control image_label" name="images[${id}][image]"   aria-label="Image" aria-describedby="button-image">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary button-image" type="button">انتخاب</button>
                </div>
                    </div>
            </div>

        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="">عنوان</label>
                <input type="text" class="form-control  " name="images[${id}][alt]">

            </div>
        </div>
        <div class="col-2">
                <label for="">اقدامات</label>
                <div>
                    <button class="btn btn-sm btn-warning" type="button" onclick="document.getElementById('image-${id}').remove()">حذف</button>
                </div>

        </div>
    </div>

            `
            }
            $('#add_product_image').click(function (e) {
                let imagesection=$('#img_section')
                let id= imagesection.children().length
                imagesection.append(
                    createNewPic({id})
                )
            })
            let image;
            $('body').on('click','.button-image',(event)=>{
                event.preventDefault();
                image=$(event.target).closest('.image-field')
                window.open('/file-manager/fm-button','fm','width=1400 , height=800')
            })
            function fmSetLink($url) {
                image.find('.image_label').first().val($url)
            }
        </script>
    @endslot
@endcomponent

