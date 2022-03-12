@component('admin.section.content',['title'=>'فرم جستو جو  '])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">فرم جستو جو   </li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  فرم   موجودی     </h3>
                            <div class="card-tools">
{{--                                <div class="btn-group-sm">--}}
{{--                              <a class="btn btn-info" href="{{route('cats.create')}}">    جدید</a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="card-tools">

                            </div>

                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">اطلاعات جست و جو  </h3>
                                </div>
                                <form action="{{route('admin.stock')}}" method="get" autocomplete="off">
                                    @csrf
                                    @method('get')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="productpart">محصول  </label>
                                                <select class="form-control" name="product" id="">
                                                    <option value="">یک مورد را انتخاب کنید</option>
                                                    @foreach(\App\Models\Product::all() as $product)
                                                        <option  {{request('product')==$product->id?'selected':''}} value="
                                                            {{$product->id}}">{{$product->name}}
                                                            ({{$product->barcodes()->count()}} بارکد)
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-4">
                                            <label for="submit" id="submit">نتیجه:
                                            {{$barcodes->total()}}
                                                عدد
                                            </label>
                                            <input type="submit" id="submit" value="جستو جو" class="btn form-control btn-danger">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="submit" id="submit">دوباره:
                                            </label>
                                            <a href="{{route('admin.stock')}}" class="btn btn-warning form-control">ریست کردن</a>

                                        </div>
                                    </div>
                                </div>
                                </form>

                                <!-- /.card-body -->
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>کد </th>
                                    <th>محصول </th>
                                    <th>تاریخ تولید </th>
                                    <th>تاریخ خروج </th>
                                    <th>  ورژن </th>
                                    <th>  رنگ </th>
                                    <th>  مشتری </th>
                                    <th>  اپراتور </th>
                                    <th>  توضیحات </th>
                                    <th>  اقدامات </th>
                                </tr>
                                @foreach($barcodes as $barcode)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a class="text-success" href="{{route('barcode.show',$barcode->id)}}">{{$barcode->code}}</a>
                                        </td>

                                        <td>{{isset($barcode->product)?$barcode->product->name:''}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->produce)}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($barcode->deliver)}}</td>
                                        <td>  {{implode(', ',$barcode->colores->pluck('name')->toArray())}}</td>
                                        <td>{{isset($barcode->version)?$barcode->version->name:'----'}}</td>
                                        <td>{{isset($barcode->customer)?$barcode->customer->name.' '.$barcode->customer->family:'----'}}</td>
                                        <td>@foreach($barcode->operators as $operator)
                                                {{$operator->name}}
                                                {{$operator->family}} -
                                            @endforeach
                                        </td>
                                        <td>{{$barcode->info}}</td>
                                        <td>
                                            @can('is_admin')
                                                <a class="btn btn-outline-secondary" href="{{route('barcode.show',$barcode->id)}}">مشاهده</a>
                                            @endcan
{{--                                            <a class="btn btn-outline-primary" href="{{route('barcode.edit',$barcode->id)}}">ویرایش</a>--}}
{{--                                            <form action="{{route('barcode.destroy',$barcode->id)}}" style="display: inline-block" method="post">--}}
{{--                                                @method('delete')--}}
{{--                                                @csrf--}}
{{--                                                <input type="submit" value="حذف" class="btn btn-danger">--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">

                            <div class="pagi">
                                {{ $barcodes->appends(Request::all())->links('admin.pagination') }}
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

    @slot('script')
    <script>

        let createNewDls=({obj_a,id,last})=>{

            var list;
            var i=id;

            `
            ${
                $.each(obj_a, function(index, value){
                    console.log(858585)
                    console.log(last)
                    list =  `


                       <div class="col-lg-6  col-md-12 part_op" id="dls-${last}">
                            <div class="row">
                                <div class="col-2">
                                    <h5>
                                        ${value}
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">بیشینه</label>
                                        <input type="number" name="dls[${last}][max]" class="form-control" value="" placeholder="max">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="">کمینه </label>
                                        <input type="number" name="dls[${last}][min]" class="form-control" value="" placeholder="min">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class=" form-group">
                                        <span style="position:relative; top: 37px" data-val="${last}" class="btn btn-warning remove_r form-control" data-cl="ch${last}"  data-ids="${last}" data-id="dls[${i}][status]">حذف</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      `
                    // i++;

                })
            }

        `
            return list;
        }

        // $("select").on("select2:unselect", function (e) {
        //     var value=   e.params.data.id;
        //     alert(value);
        // });
        $('#dls').on("select2:unselect", function(e){
            var el=$(this)
            let last=e.params.data.id
            let ids='dls-'+last
            // var elem = document.querySelector('#'+id);
            // elem.style.display = 'none';
            $('.part_op').each(function() {
                let el=$(this)
                let id=el.attr('id')
                if (ids==id){
                    el.remove()
                }
                console.log(323223)
                console.log(id)
            })
        }).trigger('change');
        $('#dls').on('select2:select', function(e) {
            // $(document.body).on("change","#parts",function(e){

            let parts=$('#dls').val()
            let last=e.params.data.id
            var obj_a = {};
            obj_a[last]= $('#dls option[value='+last+']').text();

            // parts.forEach(function(val, i) {
            //    var text= $('#parts option[value='+val+']').text();
            //     obj_a[val] = text;
            //
            // });

            let ps=$('#dls_section')
            let id= ps.children().length
            // ps.append(
            // '<br>'
            // )
            ps.append(
                createNewDls({
                    obj_a,id,last
                })
            )
            // $('.attr_select2').select2({tags:true})
        });
        $(document).on('click', '.remove_r', function (event) {
            var el = $(this);
            var ids = el.data('ids');
            var val = el.data('val');
            var id = el.data('id');
            var cl = el.data('cl');
            $('#dls option[value='+val+']').prop("selected", false)     // deselect the option
                .parent().trigger("change");
            $('#' + 'dls-'+val).remove();
            $('.' + cl).attr('checked', false);
            $('.' + cl).prop('checked', false); // $('input[name='+id+']').prop('checked', false);
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
        //         createNewDls({
        //             obj_a ,
        //             id
        //         })
        //     )
        //
        // }

    </script>
    @endslot
@endcomponent

