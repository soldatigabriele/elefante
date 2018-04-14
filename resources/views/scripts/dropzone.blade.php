<script type="text/javascript">

Dropzone.options.sides = {
    uploadMultiple: false,
    parallelUploads: 10,
    // maxFilesize: 18,
    maxFiles: 10,
    dictFileTooBig: 'Image is bigger than 8MB'
}

var photo_counter = 0;
Dropzone.options.preview = {
    uploadMultiple: false,
    parallelUploads: 10,
    // maxFilesize: 18,
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