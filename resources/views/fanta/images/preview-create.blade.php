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
                enctype="multipart/form-data" class="dropzone" id="myDropzone">
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

@foreach($images as $im)


    <img src="{{ url($im) }}" alt="au"/>{{ url($im ) }}
@endforeach

@endsection

@section('scripts')
<script type="text/javascript">

var photo_counter = 0;
Dropzone.options.myDropzone = {
    uploadMultiple: false,
    parallelUploads: 100,
    maxFilesize: 12,
    addRemoveLinks: true,
    createImageThumbnails: true,
    dictRemoveFile: 'Remove',
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

