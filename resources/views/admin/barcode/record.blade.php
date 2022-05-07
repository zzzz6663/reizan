

@if ($show)
<div class="col-md-12">
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        صداهای بارکد
                        {{$barcode->code}}
                  </h3>
                  {{-- <div class="card-tools">
                    <div class="btn-group-sm">
                        <span id="start_button" class="btn btn-danger" >
                            ضبط کردن
                        </span>
                        <span id="stop_button"  class="btn btn-success disnon" data-barcode="{{$barcode->id}}">
                            توقف
                        </span>
                        <span id="gif" class="  " data-barcode="{{$barcode->id}}">
                        </span>
                    </div>
                </div> --}}
                </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>شماره</th>
                                <th>توسط </th>
                                <th>بارکد </th>
                                <th>  قسمت</th>
                                <th>   تاریخ </th>
                                <th> پخش</th>
                                <th> اقدام</th>
                            </tr>
                            @foreach ($barcode->sounds()->latest()->get() as $sound )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$sound->user->name}}
                                    {{$sound->user->family}}
                                </td>
                                <td>
                                    {{$sound->barcode->code}}
                                </td>
                                <td>
                                    @if ($sound->location)
                                    {{__('arr.'.$sound->location)}}
                                    @endif
                                </td>
                                <td>{{\Morilog\Jalali\Jalalian::forge($sound->created_at)}}</td>
                                <td>
                                    <audio id="song1" src="{{asset('/src/voice/'. $sound->name) }}" controls></audio>
                                </td>
                                <td>
                                 @role('admin')
                                    <form action="{{route('repair.remove.voice')}}"
                                        style="display: inline-block" method="post">
                                        @csrf
                                        @method('post')
                                        @method('post')
                                        <input type="text" name="sound_id" hidden value="{{$sound->id}}">
                                             <input
                                            type="submit" onclick="return confirm('Are you sure?')" value="حذف"
                                            class="btn btn-danger">
                                    </form>
                                    @endrole
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
@else
    <span id="start_button" class="btn btn-danger" >
        ضبط کردن
    </span>
    <span id="stop_button" class="btn btn-success disnon" data-barcode="{{$barcode->id}}">
        توقف
    </span>
    <span id="gif" class="  " data-barcode="{{$barcode->id}}">
       {{-- <img width="40"  height="40"  src="{{asset('/home/images/2.gif')}}" alt=""> --}}
    </span>

@endif







