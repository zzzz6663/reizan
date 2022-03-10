@foreach($product->dls as $dls)
        <div class="col-lg-6">
            <div class="row">
                <div class="col-3">
                 <h6>
                     {{$dls->name}}
                 </h6>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">بیشینه</label>
                        <input type="number" name="dsl[{{$dls->id}}][max]" class="form-control" placeholder="max">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">کمینه </label>
                        <input type="number" name="dsl[{{$dls->id}}][min]" class="form-control" placeholder="min">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
