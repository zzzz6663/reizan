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
                            <h3 class="card-title">  فرم جستو جو     </h3>
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
                                <form action="{{route('admin.form')}}" method="get" autocomplete="off">
                                    @csrf
                                    @method('get')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="productpart">محصول  </label>
                                                <select class="form-control" name="product_id" id="productpart">
                                                    <option value="">یک مورد را انتخاب کنید</option>
                                                    @foreach(\App\Models\Product::all() as $product)
                                                        <option  {{request('product_id')==$product->id?'selected':''}} value="{{$product->id}}">{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                <label for="part">       قطعات</label>
                                                <select class="form-control select2"  name="part"   id="part">
                                                    <option value=""></option>
                                                    @foreach(\App\Models\Part::all() as $part)
                                                        <option {{request('part')==$part->id?'selected':''}} value="{{$part->id}}">{{$part->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">

                                            <div class="form-group">
                                                <label for="part">       Data Logger</label>
                                                <select class="form-control select2"  name="dls1[]"  multiple  id="dls">
                                                    <option value=""></option>
                                                    @foreach(\App\Models\Dl::all() as $dls)
                                                        <option {{in_array($dls->id,request('dls1',[]))?'selected':''}} value="{{$dls->id}}">{{$dls->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div class="row" id="dls_section">
                                                    @if(request('dls'))
                                                    @foreach(request('dls') as $ke=> $va)
                                                    {{-- @if (is_null($ke) || is_null($va))
                                                    @continue
                                                    @endif --}}

                                                        <div class="col-lg-6">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <h5>
                                                                        {{\App\Models\Dl::find($ke)->name}}
                                                                    </h5>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="">بیشینه</label>
                                                                        <input type="number" name="dls[{{$ke}}][max]" class="form-control" value="{{$va['max']}}" placeholder="max">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="">کمینه </label>
                                                                        <input type="number" name="dls[{{$ke}}][min]" class="form-control" value="{{$va['min']}}" placeholder="min">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class=" form-group">
                                                                        <span style="position:relative; top: 37px" data-val="{{$ke}}" class="btn btn-warning remove_r form-control" data-cl="ch{{$ke}}"  data-ids="${last}" data-id="dls[${i}][status]">حذف</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
{{--
                                                    @foreach(\App\Models\Dl::all() as $dls)
                                                        <div class="col-lg-6">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <h5>
                                                                        {{$dls->name}}
                                                                    </h5>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="">بیشینه</label>
                                                                        <input type="number" name="dls[{{$dls->id}}][max]" class="form-control" value="" placeholder="max">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="">کمینه </label>
                                                                        <input type="number" name="dls[{{$dls->id}}][min]" class="form-control" value="" placeholder="min">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach--}}
                                                @endif


                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="version">  ورژن  </label>
                                                <select class="form-control" name="version_id" id="version">
                                                    <option value="">یک مورد را انتخاب کنید</option>
                                                    @foreach(\App\Models\Version::all() as $version)
                                                        <option {{request('version_id')==$version->id?'selected':''}} value="{{$version->id}}">{{$version->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="color">رنگ  </label>
                                                <select class="form-control select2" name="color[]" multiple id="color">
                                                    @php
                                                    $colores=array();
                                                     if (request('color')){
                                                         $colores=request('color');
                                                     }
                                                    @endphp
                                                    <option value="">یک مورد را انتخاب کنید</option>
                                                    @foreach(\App\Models\Color::all() as $color)
                                                        <option  {{in_array($color->id,$colores)?'selected':''}} value="{{$color->id}}">{{$color->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="produce_from">  تاریخ تولید از</label>
                                                <input type="text" name="produce_from" value="{{request('produce_from')}}" class="form-control persian3" id="produce_from" placehrequest()er="تاریخ تولیداز را وارد کنید">
                                            </div>

                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="produce_till">  تاریخ تولید تا</label>
                                                <input type="text" name="produce_till" value="{{request('produce_till')}}" class="form-control persian3" id="produce_till" placehrequest()er="تاریخ تولید تا را وارد کنید">
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="deliver_from">  تاریخ خروج از</label>
                                                <input type="text" name="deliver_from" value="{{request('deliver_from')}}" class="form-control persian3" id="deliver_from" placehrequest()er="تاریخ خروج از را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="deliver_till">  تاریخ خروج تا</label>
                                                <input type="text" name="deliver_till" value="{{request('deliver_till')}}" class="form-control persian3" id="deliver_till" placehrequest()er="تاریخ خروج تا را وارد کنید">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="color">مشتری  </label>
                                                <select class="form-control" name="customer_id" id="customer">
                                                    <option value="" >یک مورد را انتخاب کنید</option>
                                                    @foreach(\App\Models\User::whereLevel('customer')->get() as $customer)
                                                        <option  {{request('customer_id')==$customer->id?'selected':''}} value="{{$customer->id}}">{{$customer->name}} {{$customer->family}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="ostan">       استان</label>
                                                <select class="form-control" name="ostan_id" id="ostan">
                                                    <option value="" >استان را انتخاب کنید </option>
                                                    @foreach(\App\Models\Ostan::all() as $ostan)
                                                        <option {{request('ostan_id')==$ostan->id?'selected':''}} value="{{$ostan->id}}">{{$ostan->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

{{--                                        <div class="col-4">--}}

{{--                                        </div>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" {{request('dewater')==1?'checked':''}} name="dewater" id="dewater" class="form-check-inline" value="1">
                                                    <label class="form-check-inline" for="dewater">آبخوردگی
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" {{request('dehit')==1?'checked':''}} name="dehit" id="dehit" class="form-check-inline" value="1">
                                                    <label class="form-check-inline" for="dehit">ضربه خوردگی
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" {{request('debar')==1?'checked':''}} name="debar" id="debar" class="form-check-inline" value="1">
                                                    <label class="form-check-inline" for="debar">اضافه بار
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" {{request('detemp')==1?'checked':''}} name="detemp" id="detemp" class="form-check-inline" value="1">
                                                    <label class="form-check-inline" for="detemp">اضافه حرارت محیط
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" {{request('deopen')==1?'checked':''}} name="deopen" id="deopen" class="form-check-inline" value="1">
                                                    <label class="form-check-inline" for="deopen">    باز شدن پلمپ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" {{request('demulti')==1?'checked':''}} name="demulti" id="demulti" class="form-check-inline" value="1">
                                                    <label class="form-check-inline" for="demulti">
                                                        دستکاری مولتی ترن
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="checkbox" {{request('wage')==1?'checked':''}} name="wage" id="wage" class="form-check-inline" value="1">
                                                    <label class="form-check-inline" for="wage">  دارای هزینه حمل
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-check-inline" for="rcount">دفعات خرابی
                                                </label>
                                                <input type="number" value="{{request('rcount')}}" name="rcount" id="rcount" class="form-check-inline" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="submit" id="submit">نتیجه:
                                            {{$repairs->total()}}
                                                عدد
                                            </label>
                                            <input type="submit" id="submit" value="جستو جو" class="btn form-control btn-danger">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="submit" id="submit">دوباره:
                                            </label>
                                            <a href="{{route('admin.form')}}" class="btn btn-warning form-control">ریست کردن</a>

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
                                @foreach($repairs as $repair)
                                @php
                                    $barcode=$repair->barcode;
                                @endphp
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
                                            @role('admin')
                                                <a class="btn btn-outline-secondary" href="{{route('repair.show',$repair->id)}}">مشاهده</a>
                                            @endrole
{{--                                            <a class="btn btn-outline-primary" href="{{route('barcode.edit',$barcode->id)}}">ویرایش</a>--}}
{{--                                            <form action="{{route('barcode.destroy',$barcode->id)}}" style="display: inline-block" method="post">--}}
{{--                                                @method('delete')--}}
{{--                                                @csrf--}}
{{--                                                <input type="submit"  onclick="return confirm('Are you sure?')" value="حذف" class="btn btn-danger">--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">

                            <div class="pagi">
                                {{ $repairs->appends(Request::all())->links('admin.pagination') }}
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

