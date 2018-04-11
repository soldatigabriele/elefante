@extends('layouts.fanta')

@section('style')
<style>
/*
.inputDnD .form-control-file {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 6em;
    outline: none;
    visibility: hidden;
    cursor: pointer;
    background-color: #c61c23;
    box-shadow: 0 0 5px solid currentColor;
}
.inputDnD .form-control-file:before {
    content: attr(data-title);
    position: absolute;
    top: 0.5em;
    left: 0;
    width: 100%;
    min-height: 6em;
    line-height: 2em;
    padding-top: 1.5em;
    opacity: 1;
    visibility: visible;
    text-align: center;
    border: 0.25em dashed currentColor;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    overflow: hidden;
}
.inputDnD .form-control-file:hover:before {
    border-style: solid;
    box-shadow: inset 0px 0px 0px 0.25em currentColor;
}
*/

.button{
    width:150px;
}
</style>
@endsection

@section('content')
<div class="container">
    <br>        
    <div class="col-12">
    <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        <h2>Add a Fanta</h2>
        <form action="{{ route('fanta.store') }}" class="form-control" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <br>
            <div class="col-12">
                <div class="form-group col-12">
                    @foreach($logos as $logo)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="{{ $logo->name }}" name="logo" value="{{ $logo->id }}">
                        <label class="form-check-label" for="{{ $logo->name }}">{{ $logo->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="flavour" class="col-sm-2 col-form-label">Flavour</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="flavours" placeholder="Flavour" value="" name="flavour">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="year" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                        <input type="integer" class="form-control" id="year" placeholder="Year" value="" name="year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Coutry</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="country" placeholder="Country" value="" name="country">
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
                <button type="submit" class="btn btn-outline-warning button">Add</button>
            </div>
            <br>
        </form>
        <div id="app"></div>
    </div>
</div>
@endsection

@section('scripts')

<script>

    var tags = [
    @foreach ($tags as $tag)
    {tag: "{{$tag}}" },
    @endforeach
    ];

    var countries = [
    @foreach ($countries as $country)
    {country: "{{$country}}" },
    @endforeach
    ];

    var colours = [
    @foreach ($colours as $colour)
    {colour: "{{$colour}}" },
    @endforeach
    ];

    var flavours = [
    @foreach ($flavours as $flavour)
    {flavour: "{{$flavour}}" },
    @endforeach
    ];

    console.log(flavours);
    $( document ).ready(function() {

        $('#tags').selectize({
            delimiter: ',',
            persist: false,
            valueField: 'tag',
            labelField: 'tag',
            searchField: 'tag',
            options: tags,
            create: function(input) {
                return {
                    tag: input
                }
            }
        });
        $('#flavours').selectize({
            delimiter: ',',
            persist: false,
            valueField: 'flavour',
            labelField: 'flavour',
            searchField: 'flavour',
            maxItems: 1,
            options: flavours,
            create: function(input) {
                return {
                    flavour: input
                }
            }
        });
        $('#country').selectize({
            delimiter: ',',
            persist: false,
            valueField: 'country',
            labelField: 'country',
            searchField: 'country',
            maxItems: 1,
            options: countries,
            create: function(input) {
                return {
                    country: input
                }
            }
        });
        $('#colours').selectize({
            delimiter: ',',
            persist: false,
            valueField: 'colour',
            labelField: 'colour',
            searchField: 'colour',
            options: colours,
            create: function(input) {
                return {
                    colour: input
                }
            }
        });
    });
</script>
@endsection

