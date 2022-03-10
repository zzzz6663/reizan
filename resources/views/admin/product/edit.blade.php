@component('admin.section.content',['title'=>'  به روز رسانی  دسته بندی'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">ایجاد  دسته بندی</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  فرم  محصول</h3>
                        </div>
                        <!-- /.card-header -->
                    @include('error')

                    <!-- form start -->
                        <form role="form" action="{{route('products.update',$product->id)}}" method="post" >
                            @csrf
                            @method('Patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">نام محصول</label>
                                    <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control" id="exampleInputEmail1" placeholder="نام را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="color">رنگ  </label>
                                    <select class="form-control select2" name="colores[]" multiple id="color">
                                        <option value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Color::all() as $color)
                                            <option  {{in_array($color->id,old('colores',$product->colores->pluck('id')->toArray()))?'selected':''}} value="{{$color->id}}">{{$color->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cat">دسته بندی  </label>
                                    <select class="form-control" name="cat_id" id="cat">
                                        <option value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Cat::all() as $cat)
                                            <option {{old('cat_id',$product->cat_id)==$cat->id?'selected':''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="version">  ورژن  </label>
                                    <select class="form-control select2" name="versions[]" multiple id="version">
                                        <option value="" >یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Version::all() as $version)
                                            <option {{in_array($version->id,old('versions',$product->versions()->pluck('id')->toArray()))?'selected':''}} value="{{$version->id}}">{{$version->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="part">  قطعات  </label>
                                    <select class="form-control select2" name="part[]" id="part" multiple>
                                        <option value="">یک مورد را انتخاب کنید</option>
                                        @foreach(\App\Models\Part::all() as $part)
                                            <option {{in_array($part->id,old('part',$product->parts()->pluck('id')->toArray()))?'selected':''}} value="{{$part->id}}">{{$part->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="current">جریان  </label>
                                    <input type="number" name="current" value="{{old('current',$product->current)}}" class="form-control" id="current" placeholder="جریان را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="guaranty">  تعداد ماه گارانتی</label>
                                    <input type="number" name="guaranty" value="{{old('guaranty',$product->guaranty)}}" class="form-control" id="guaranty" placeholder="تعداد ماه را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="link">      لینک محصول</label>
                                    <input type="text" name="link" value="{{old('link',$product->link)}}" class="form-control" id="link" placeholder="        لینک محصول">
                                </div>
                                <div class="form-group">
                                    <label  >   تصویر شاخص </label>

                                    <div class="input-group">
                                        <input type="text" id="image_label" class="form-control" name="thumb" value="{{old('thumb',$product->thumb)}}"
                                               aria-label="Image" aria-describedby="button-image">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
                                        </div>
                                    </div>


                                </div>

                                <div class=" form-group">
                                    <h3 class="card-titlse">
                                        توضیحات محصول
                                    </h3>
                                    <script></script>
                                    <!-- /.card-header -->
                                    <div class="msb-3">
                                        <textarea name="info" id="payam" data-de="{!! old('info',$product->info) !!}"  placeholder="لطفا متن خود را وارد کنید"  > </textarea>
                                    </div>

                                </div>

                                <div class=" form-group">
                                    <h3 class="card-titlse">
                                        ویژگی محصول
                                    </h3>
                                    <!-- /.card-header -->
                                    <div id="attributes_section">
                                        @foreach($product->attributes as $attribute)
                                        <div class="row  " id="attributes-{{$loop->index}}">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label  >عنوان وِیژگی</label>
                                                    <select name="attributes[{{$loop->index}}][name]" onchange="changeAttr(event,{{$loop->index}});" class="attr_select2 form-control">
                                                        <option value="">انتخاب کنید</option>
                                                       @foreach(\App\Models\Attribute::all() as $attr)
                                                            <option value="{{$attr->name}}" {{$attr->name== $attribute->name?'selected':''}}>{{$attr->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">مقدار</label>
                                                    <select name="attributes[{{$loop->index}}][value]"   class="attr_select2 form-control">
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach($attribute->values as $value)
                                                            <option value="{{$value->value}}" {{$value->id==$attribute->pivot->value_id?'selected':''}}>{{$value->value}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="cat">بخش</label>
                                                    <select name="attributes[{{$loop->index}}][cat]" class="form-control" id="cat">
                                                        <option value="">انتخاب کنید </option>
                                                        <option {{"tag"== $attribute->cat?'selected':''}} value="tag">تجهیزات</option>
                                                        <option {{"fan"== $attribute->cat?'selected':''}} value="fan">فنی</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label for="">اقدامات</label>
                                                <div>
                                                    <button class="btn btn-sm btn-warning" type="button" onclick="document.getElementById('attributes-{{$loop->index}}').remove()">حذف</button>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm" id="add_product_attribute">ویژگی جدید</button>

                                </div>

                                <div class=" form-group">
                                    <h3 class="card-titlse">
                                        دیتا لاگر
                                    </h3>
                                    <!-- /.card-header -->
                                    <div id="loggers_section">
                                        @foreach($product->dls as $dls)

                                            <div class="row  " id="loggers-{{$loop->index}}">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label  >عنوان لاگر</label>
                                                        <select name="loggers[]" onchange="changelogger(event,{{$loop->index}});" class="attr_select2 form-control">
                                                            <option value="">انتخاب کنید</option>
                                                            @foreach(\App\Models\Dl::all() as $dl)
                                                                <option {{$dl->id==$dls->id?'selected':''}} value="{{$dl->name}}">{{$dl->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-2">
                                                    <label for="">اقدامات</label>
                                                    <div>
                                                        <button class="btn btn-sm btn-warning" type="button" onclick="document.getElementById('loggers-{{$loop->index}}').remove()">حذف</button>
                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-danger btn-sm" id="add_product_logger">دیتا جدید</button>

                                </div>



                            </div>
                            <!-- /.card-body -->


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('products.index')}}">برگشت</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>

    @slot('script')
        <script>
            $('.attr_select2').select2({tags:true})
            let createNewAttr=({attributes,id})=>{
                return `
              <div class="row  " id="attributes-${id}">
        <div class="col-3">
            <div class="form-group">
                <label  >عنوان وِیژگی</label>
               <select name="attributes[${id}][name]" onchange="changeAttr(event,${id});" class="attr_select2 form-control">
               <option value="">انتخاب کنید</option>
                ${
                    attributes.map(function (item){
                        return `
                        <option  value="${item}">${item}</option>
                        `
                    })
                }
                </select>
            </div>

        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="">مقدار</label>
                  <select name="attributes[${id}][value]"   class="attr_select2 form-control">
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cat">بخش</label>
                 <select name="attributes[${id}][cat]" class="form-control" id="cat">
                    <option value="">انتخاب کنید </option>
                    <option value="tag">تجهیزات</option>
                    <option value="fan">فنی</option>
                </select>
            </div>
        </div>
        <div class="col-2">
                <label for="">اقدامات</label>
                <div>
                    <button class="btn btn-sm btn-warning" type="button" onclick="document.getElementById('attributes-${id}').remove()">حذف</button>
                </div>

        </div>
    </div>

            `
            }
            $('#add_product_attribute').click(function (e) {
                let attributes =$('#attributes').data('attr')
                console.log(attributes)
                let attrsection=$('#attributes_section')
                let id= attrsection.children().length
                attrsection.append(
                    createNewAttr({
                        attributes ,
                        id
                    })
                )
                $('.attr_select2').select2({tags:true})

            })

            let  changeAttr=(event ,id)=>{
                let valueBox=$(`select[name='attributes[${id}][value]']`)
                console.log(valueBox)
                $.ajaxSetup({
                    'headers':{
                        'X-CSRF-TOKEN':document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type':'application/json'
                    }
                })
                $.ajax({
                    type: 'post',
                    url:'{{route('attributes.value')}}',
                    data:JSON.stringify({
                        name:event.target.value
                    }),
                    success:function (res){

                        valueBox.html(`
                           <option value="">انتخاب کنید</option>
                        ${res.data.map(function (item){
                            return `<option  value="${item}">${item}</option>`
                        })
                        }
                        `)
                    }
                })
            }








            let createNewlogger=({loggers,id})=>{
                console.log(22)
                return `
              <div class="row  " id="loggers-${id}">
               <div class="col-3">
               <div class="form-group">
                <label  >عنوان لاگر</label>
               <select name="loggers[]" onchange="changelogger(event,${id});" class="attr_select2 form-control">
               <option value="">انتخاب کنید</option>
                ${
                    loggers.map(function (item){
                        return `
                        <option  value="${item}">${item}</option>
                        `
                    })
                }
                    </select>
                </div>

                </div>

            <div class="col-2">
                    <label for="">اقدامات</label>
                    <div>
                        <button class="btn btn-sm btn-warning" type="button" onclick="document.getElementById('loggers-${id}').remove()">حذف</button>
                    </div>

                </div>
        </div>

            `
            }
            $('#add_product_logger').click(function (e) {
                let loggers =$('#loggers').data('attr')

                let attrsection=$('#loggers_section')
                let id= attrsection.children().length
                console.log('1')
                console.log(id)
                attrsection.append(
                    createNewlogger({
                        loggers ,
                        id
                    })
                )
                $('.attr_select2').select2({tags:true})

            })

        </script>
    @endslot
    <div id="attributes" data-attr="{{json_encode(\App\Models\Attribute::all()->pluck('name'))}}"></div>
    <div id="loggers" data-attr="{{json_encode(\App\Models\Dl::all()->pluck('name'))}}"></div>
@endcomponent

