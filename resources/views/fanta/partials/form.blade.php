    @section('style')
<style>
    .cc-selector input{
        -webkit-appearance:none;
           -moz-appearance:none;
                appearance:none;
    }
    .cc-selector input:active +.drinkcard-cc{opacity: .9;}
    .cc-selector input:checked +.drinkcard-cc{
        -webkit-filter: none;
           -moz-filter: none;
                filter: none;
    }
    .drinkcard-cc{
        cursor:pointer;
        background-size:contain;
        background-repeat:no-repeat;
        width:100px;height:70px;
        -webkit-transition: all 100ms ease-in;
           -moz-transition: all 100ms ease-in;
                transition: all 100ms ease-in;
        -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
           -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
                filter: brightness(1.8) grayscale(1) opacity(.7);
    }
    .drinkcard-cc:hover{
        -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
           -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
                filter: brightness(1.2) grayscale(.5) opacity(.9);
    }

    /* Extras */
    p{margin-bottom:.3em;}
    .button{
        width:150px;
    }
</style>
    @endsection

    @csrf
    <br>
    <div class="col-12">
            <div class="row">
                <div class="col-sm-2 col">Logo</div>
                <div class="col-sm-10 col cc-selector">
                @foreach($logos as $logo)
                    <input type="radio" id="{{ $logo->name }}" name="logo" value="{{ $logo->id }}" @isset($fanta->logo) @if($fanta->logo_id == $logo->id) checked @endif @else @if(2 == $logo->id) checked @endif @endif>
                    <label class="drinkcard-cc {{$logo->name}}" for="{{ $logo->name }}" style="background-image:url({{ asset('images/logos/'.$logo->path ) }});"></label>
                @endforeach
                <input type="radio" name="logo" value="all" id="all">
                <label class="drinkcard-cc {{$logo->name}}" for="all" style="width:70px;height:70px;background:;"></label>
                </div> 
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
                <input type="integer" class="decimals" id="capacity" placeholder="Capacity in ml" value="@isset($fanta){{ $fanta->capacity }}@endif" name="capacity">
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Country</label>
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


