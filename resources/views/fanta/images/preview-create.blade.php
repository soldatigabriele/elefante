@extends('layouts.fanta')

@section('style')
<style>
.button{
    width:150px;
}
</style>
@endsection

@section('content')
<div class="container">
        <div class="clearfix"></div><br>
        <div class="col">
            <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        </div>
        <div class="clearfix"></div><br>
    <div class="col-12">
        <div class="card">
            <h2>Add the Preview image</h2>

            <form action="{{ route('preview.store', $fanta) }}"
                enctype="multipart/form-data" class="dropzone" id="my-dropzone">
            </form>

        </div>
    </div>
</div>
<div id="app"></div>
@endsection

@section('scripts')
<script type="text/javascript">

$(document).ready(function(){
    Dropzone.options.myDropzone = {
        paramName: 'file',
        maxFilesize: 10, // MB
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            this.on("success", function(file, response) {
                console.log("file: ")
                console.log(file)
                console.log("response: ")
                console.log(response)
                
                var a = document.createElement('span');
                a.className = "thumb-url btn btn-primary";
                a.setAttribute('data-clipboard-text','{{url('/uploads')}}'+'/'+response);
                a.innerHTML = "copy url";
                file.previewTemplate.appendChild(a);
            });
        }
    };
});

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

