<div class="container">
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


@if($fanta->preview)
<div>
    <img src="/images/{{$fanta->id}}/{{$fanta->preview}}" width="200px">
    <a href="{{ route('preview.destroy', $fanta) }}"> Destroy preview</a>
</div>
@endif

<hr>
<a href="{{ route('sides.destroy', $fanta) }}"> Destroy all sides</a>
<a href="{{ route('images.destroy', $fanta) }}"> Destroy all images</a>
@foreach($fanta->images as $image)
    <img src="/images/{{$fanta->id}}/{{$image->normal_size}}" width="200px">
    <a href="{{ route('side.destroy', [$fanta, $image]) }}"> Destroy this image</a>
    
@endforeach