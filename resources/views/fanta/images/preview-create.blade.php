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
            <h2>Add the preview image</h2>

            <form action="{{ route('preview.store', $fanta->id) }}"
                enctype="multipart/form-data" class="dropzone" id="preview">
            <div id="csrf">
                @csrf
            </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="clearfix"></div><br>
    <div class="col-12">
        <div class="card">
            <h2>Add the Sides image</h2>
            <form action="{{ route('sides.store', $fanta->id) }}"
                enctype="multipart/form-data" class="dropzone" id="sides">
            <div id="csrf">
                @csrf
            </div>
            </form>
        </div>
    </div>
</div>
<div id="app"></div>
</div>
<div id="photoCounter"></div>


<br>

@if($fanta->preview)
<div>
    <img src="/images/{{$fanta->id}}/{{$fanta->preview}}" width="200px">
</div>
@endif
<hr>

@foreach($fanta->images as $im)
    <img src="/images/{{$fanta->id}}/{{$im->normal_size}}" width="200px">
@endforeach

@endsection

@section('scripts')
<script type="text/javascript">

Dropzone.options.sides = {
    uploadMultiple: false,
    parallelUploads: 10,
    maxFilesize: 12,
    maxFiles: 10,
    dictFileTooBig: 'Image is bigger than 8MB'
}

var photo_counter = 0;
Dropzone.options.preview = {
    uploadMultiple: false,
    parallelUploads: 10,
    maxFilesize: 12,
    maxFiles: 10,
    dictFileTooBig: 'Image is bigger than 8MB',

    // The setting up of the dropzone
    init:function() {

        this.on("removedfile", function(file) {
            $.ajax({
                type: 'POST',
                url: '/fanta/'+{{$fanta->id}}+'/preview/delete',
                data: {id: file.name, _token: "{{ csrf_token() }}" },
                dataType: 'html',
                success: function(data){
                    console.log('deleted successfilly');
                    var rep = JSON.parse(data);
                    if(rep.code == 200)
                    {
                        photo_counter--;
                        $("#photoCounter").text( "(" + photo_counter + ")");
                    }

                }
            });

        });
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    success: function(file,done) {
        photo_counter++;
        $("#photoCounter").text( "(" + photo_counter + ")");
    }
}
  
</script>
@endsection

