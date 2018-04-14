@extends('layouts.fanta')

@section('content')

<div class="container">
    <br>        
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
    <div class="col-12">
        <h2>Edit a Fanta</h2>
        <form action="{{ route('update-fanta', $fanta->id) }}" class="form-control" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
            @method('put')
            <br>
            <div class="col-12">
                <div class="form-group col-12">
                    @foreach($logos as $logo)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="{{ $logo->name }}" name="logo" value="{{ $logo->id }}" @if($fanta->logo->id == $logo->id) checked @endif>
                        <label class="form-check-label" for="{{ $logo->name }}">{{ $logo->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="flavour" class="col-sm-2 col-form-label">Flavour</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="flavours" placeholder="Flavour" value="{{ $fanta->flavour->name }}" name="flavour">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="year" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                        <input type="integer" class="form-control" id="year" placeholder="Year" value="{{ $fanta->year }}" name="year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Coutry</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="country" placeholder="Country" value="{{ $fanta->country->name }}" name="country">
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
                <button type="submit" class="btn btn-outline-warning">Save</button>
            </div>
            <br>
        </form>
        <div id="app"></div>
    </div>
    <div class="clearfix"></div><br>
    <div class="col-12">
        <div class="card">
            @include('fanta.partials.images-upload')
        </div>
    </div>
</div>

<br><br>

@endsection

@section('scripts')
<script src="{{ asset('node_modules/selectize/dist/js/selectize.js') }}"></script>

<script>

    let old_tags = []
    @foreach ($fanta->tags as $key => $tag)
        old_tags.push("{{$tag->name}}")
    @endforeach

    let old_colours = []
    @foreach ($fanta->colours as $key => $colour)
        old_colours.push("{{$colour->name}}")
    @endforeach

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

    $( document ).ready(function() {

        $('#tags').val(old_tags)
        $('#colours').val(old_colours)

        $('#tags').selectize({
            delimiter: ',',
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

