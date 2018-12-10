{{--@inject('countries','App\Http\Utilities\Country')--}}
{{csrf_field()}}
<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label for="street">Street</label>
    <input type="text" class="form-control" id="street"  name="street"  value="{{old('street')}}" required>
</div>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city"  name="city"  value="{{old('street')}}" required>
</div>

<div class="form-group">
    <label for="zip">Zip /post code</label>
    <input type="text" class="form-control" id="zip"  name="zip"  value="{{old('zip')}}" required>
</div>

<div class="form-group">
    <label for="country">Country</label>
    <input type="text" class="form-control" id="country"  name="country"  value="{{old('country')}}" required>
    {{--<select name="country" id="country" class="form-control"></select>--}}
    {{--@foreach(\App\Http\Utilities\Country::all() as $country=>$code)--}}
    {{--<option value="{{$code}}">{{$country}}</option>--}}
    {{--@endforeach--}}
</div>

<div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state"  name="state"  value="{{old('state')}}" required>
</div>
</div>
    <div class="col-md-6">

<div class="form-group">
    <label for="price">selling Price</label>
    <input type="text" class="form-control" id="price"  name="price"  value="{{old('price')}}" required>
</div>

<div class="form-group">
    <label for="description">Home description</label>
    <textarea  class="form-control"   name="description" id="description"  rows="10" required>{{old('description')}}</textarea>
</div>

{{--<div class="form-group" >--}}
    {{--<label for="photos">selling Price</label>--}}
    {{--<input type="file" class="form-control" id="photos"  name="photos">--}}
{{--</div>--}}

    </div>
    <div class="ol-md-12">
        <hr>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Banner</button>
        </div>

    </div>
</div>