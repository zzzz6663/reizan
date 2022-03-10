<option   value="">قطعه را انتخاب کنید </option>
@foreach($product->parts as $parts)
    <option value="{{$parts->id}}">{{$parts->name}}</option>
@endforeach
