@extends('layouts.fanta')

@section('content')

<div class="container">
    <br>
    <div class=" col-12">
    <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        <h2>Get a Fanta!</h2>
        <form action="{{ route('find-fanta') }}" class="form-control" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <br>
            <div class="col-12">
                <div class="form-group col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="all_logos" name="logo" value="all" @if(old('logo')) checked @endif checked>
                        <label class="form-check-label" for="all_logos">All Logos</label>
                    </div>
                    @foreach($logos as $logo)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="{{ $logo->name }}" name="logo" value="{{ $logo->id }}" @if(old('logo') == $logo->id) checked @endif>
                        <label class="form-check-label" for="{{ $logo->name }}">{{ $logo->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="flavour" class="col-2 col-form-label">Flavour</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="flavours" placeholder="Flavour" value="{{ old('flavour') }}" name="flavour">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="year" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                        <input type="integer" class="form-control" id="year" placeholder="Year" value="{{ old('year') }}" name="year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Coutry</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="country" placeholder="Country" value="{{ old('country') }}" name="country">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="colours" class="col-sm-2 col-form-label">Colour</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="colours" placeholder="Colours" value="{{ old('colours') }}" name="colours">
                    </div>
                </div>                                
                <div class="form-group row">
                    <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ old('tags') }}" name="tags" class="" id="tags" placeholder="Tags">
                    </div>
                </div>
            </div>

            <div class="clearfix"><br></div>


            <div class="offset-1 col-sm-10">
                <button type="submit" class="btn btn-outline-warning">Search</button>
            </div>
            <br>
        </form>
    </div>
</div>

@if (session()->has('fantas'))
    
<div class="clearfix"></div><br>

    <div class="offset-2 col-8">
    <div class="card carta">
        <div class="col-12">
            <h4>Matches: {{ count(session('fantas')[0]) }}</h4>
        </div>
        <div class="clearfix"></div><br>
        @foreach(session('fantas') as $fs)
            @foreach($fs as $fanta)
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col">
                        @if($fanta->preview)
                            <img src="/images/{{$fanta->id}}/{{$fanta->preview}}" width="100px">
                        @endif
                        </div>
                        <div class="col-2">
                            {{ $fanta->flavour->name }}
                        </div>
                        <div class="col-2">
                            {{ $fanta->country->name }}
                        </div>
                        <div class="col-1">
                            {{ $fanta->year }}
                        </div>
                        <div class="col">
                            @foreach($fanta->tags as $tag)
                                {{ $tag->name }}
                            @endforeach
                        </div>
                        <div class="col">
                            @foreach($fanta->colours as $colour)
                                {{ $colour->name }}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <a role="button" class="btn btn-outline-warning" href="{{ route('edit-fanta', $fanta->id) }}">Edit</a>
                </div>
            </div>
            <div class="clearfix"></div><hr>
            @endforeach
        @endforeach
    </div>
</div>
@endif

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