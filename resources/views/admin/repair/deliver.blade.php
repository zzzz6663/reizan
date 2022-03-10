@component('admin.section.content',['title'=>'  تحویل کالا'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">    فرم تحویل کالا</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
{{--                    <div class="card-body">--}}
{{--                        <div class="alert alert-danger alert-dismissible">--}}
{{--                            <h5><i class="icon fa fa-ban"></i> توجه!</h5>--}}
{{--                            چنانچه وضعیت در حالت ثبت اولیه باشد قابلیت ویرایش همه اطالاعات  وجود دارد--}}
{{--                            <br>--}}
{{--                            در وضعیت ثبت نهایی فقط نام تحویل گیرنده و تاریخ تحویل قابل ثبت می باشد--}}
{{--                            <br>--}}
{{--                            در وضعیت تحویل کالا هیچ اطلاعاتی قابل ویرایش نیست--}}
{{--                         </div>--}}

{{--                    </div>--}}

                    <div class="card card-dark">

                        <!-- /.card-header -->
                    @include('error')

                    <!-- form start -->
                        <form role="form" action="{{route('repair.deliver.submit',$repair->id)}}" method="post"  enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('post')
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">       تحویل
                                    {{$repair->barcode->codes}}
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="dename">نام   تحویل گیرنده</label>
                                                    <input type="text" name="dename" value="{{old('dename',$repair->dename)}}" class="form-control" id="dename" placeholder="نام را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="dedate">    تاریخ تحویل   </label>
                                                    <input type="text" name="dedate" value="{{old('dedate',$repair->dedate)}}" class="form-control persian" id="dedate" placeholder="تاریخ را وارد کنید">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>







                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <a class="btn btn-success" href="{{route('repair.index')}}">برگشت</a>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @slot('script')
        <script>

            let createNewPart=({obj_a,id})=>{


                var list;
                var i=0;

                `
                ${

                    $.each(obj_a, function(index, value){



                        list +=  `
                             <div class="row  " id="parts-${i}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="report">  نام قطعه    </label>
                                        <input type="text" name="part[${i}][name]" value="${value}" readonly class="form-control" id="tell"  >
                                        <input type="text" name="part[${i}][id]" hidden value="${index}" readonly    >

                                    </div>
                                    <div class="col-lg-6">
                                        <br>
                                        <div class="mt-4 form-group">
                                            <input type="radio"  class="form-chessck-input minimal " name="part[${i}][status]" id="ga{${i}}" value="guaranty">
                                            <label class="mr-2" for="ga{${i}}"> گارانتی    </label>
                                            <input type="radio"  class="   mr-4"  name="part[${i}][status]" id="cu{${i}}" value="customer">
                                            <label class="mr-2" for="cu{${i}}">    مشتری    </label>
                                        </div>
                                      </div>

                               </div>

                           </div>
                          `
                        i++;
                    })
                }

            `
                return list;
            }

            $(document.body).on("change","#parts",function(){
                let parts=$('#parts').val()
                var obj_a = {};
                parts.forEach(function(val, i) {
                    var text= $('#parts option[value='+val+']').text();
                    obj_a[val] = text;

                });
                let ps=$('#part_section')
                let id= ps.children().length
                ps.html(
                    '<br>'
                )
                ps.html(
                    createNewPart({
                        obj_a ,
                        id
                    })
                )
                // $('.attr_select2').select2({tags:true})
            });
            // if ($('#parts').length){
            //     let parts=$('#parts').val()
            //     var obj_a = {};
            //     parts.forEach(function(val, i) {
            //         var text= $('#parts option[value='+val+']').text();
            //         obj_a[val] = text;
            //
            //     });
            //     let ps=$('#part_section')
            //     let id= ps.children().length
            //     ps.html(
            //         '<br>'
            //     )
            //     ps.html(
            //         createNewPart({
            //             obj_a ,
            //             id
            //         })
            //     )
            //
            // }

        </script>
    @endslot
@endcomponent

