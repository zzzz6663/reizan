<option  >استان را انتخاب کنید </option>
@foreach($ostan->shahrs as $shahr)
    <option value="{{$shahr->id}}">{{$shahr->name}}</option>
@endforeach
