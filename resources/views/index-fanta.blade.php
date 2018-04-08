@extends('layouts.fanta')

@section('content')

<div class="container">
    <br>
    <div class="offset-3 col-6">


        <h2>Get a Fanta!</h2>
        <form action="{{ route('find-fanta') }}" class="form-control" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <br>
            <div class="col-12">

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
                <button type="submit" class="btn btn-outline-warning">Search</button>
            </div>
            <br>
        </form>
    </div>
</div>

<div id="app">
    <div id="fante"></div>
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