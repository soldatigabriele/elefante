<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="{{ asset('css/front.css') }}" rel="stylesheet" type="text/css"   >

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div class="container">



            <form action="{{ route('store-fanta') }}" class="form-control" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                        <input type="text" class="" id="countries" placeholder="Country" value="" name="country">
                    </div>
                </div>  
                <div class="form-group row">
                    <label for="colour" class="col-sm-2 col-form-label">Colour</label>
                    <div class="col-sm-10">
                        <input type="text" class="" id="colours" placeholder="Colour" value="" name="colour">
                    </div>
                </div>                                
                <div class="form-group row">
                    <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-10">
                        <input type="text" value="" name="tags" class="" id="tags" placeholder="Tags">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
    <div id="app"></div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('node_modules/selectize/dist/js/selectize.js') }}"></script>

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
    $('#countries').selectize({
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
    </body>
</html>
