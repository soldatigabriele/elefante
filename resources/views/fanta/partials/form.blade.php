    @csrf
    <br>
    <div class="col-12">
        <div class="form-group col-12">
            @foreach($logos as $logo)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="{{ $logo->name }}" name="logo" value="{{ $logo->id }}" @isset($fanta->logo) @if($fanta->logo->id == $logo->id) checked @endif @endif>
                <label class="form-check-label" for="{{ $logo->name }}">{{ $logo->name }}</label>
            </div>
            @endforeach
        </div>
        <div class="form-group row">
            <label for="flavour" class="col-sm-2 col-form-label">Flavour</label>
            <div class="col-sm-10">
                <input type="text" class="" id="flavours" placeholder="Flavour" value="@isset($fanta){{ $fanta->flavour->name }}@endif" name="flavour">
            </div>
        </div>
        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-10">
                <input type="integer" class="form-control" id="year" placeholder="Year" value="@isset($fanta){{ $fanta->year }}@endif" name="year">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Capacity</label>
            <div class="col-sm-10">
                <input type="integer" class="decimals" id="capacity" placeholder="Capacity in ml. Es: 350" value="{{ old('capacity') }}" name="capacity">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Coutry</label>
            <div class="col-sm-10">
                <input type="text" class="" id="country" placeholder="Country" value="@isset($fanta){{ $fanta->country->name }}@endif" name="country">
            </div>
        </div>  
        <div class="form-group row">
            <label for="colours" class="col-sm-2 col-form-label">Colour</label>
            <div class="col-sm-10">
                <input type="text" class="" id="colours" placeholder="Colours" value="" name="colours">
            </div>
        </div>                                
        <div class="form-group row">
            <label for="tags" class="col-sm-2 col-form-label">Tags</label>
            <div class="col-sm-10">
                <input type="text" value="" name="tags" class="" id="tags" placeholder="Tags">
            </div>
        </div>
    </div>

    <div class="clearfix"><br></div>


    <div class="offset-1 col-sm-10">
        <button type="submit" class="btn btn-outline-warning">{{ $submitName }}</button>
    </div>
    <br>

@include('scripts.decimals')


