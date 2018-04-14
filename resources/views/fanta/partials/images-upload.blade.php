<div class="container">
        <div class="clearfix"></div><br>
    <div class="col-12">
        <!-- <h2>Add the preview image</h2> -->

        <form action="{{ route('preview.store', $fanta->id) }}"
            enctype="multipart/form-data" class="dropzone" id="preview">
            <h4 class="dz-message">Drop Preview</h4>
            <div id="csrf">
                @csrf
            </div>
        </form>
    </div>
</div>
<div class="container" style="padding:10px">
    <div class="clearfix"></div><br>
    <div class="col-12">
        <form action="{{ route('sides.store', $fanta->id) }}"
            enctype="multipart/form-data" class="dropzone" id="sides">
            <h4 class="dz-message">Drop Sides Image</h4>
            <div id="csrf">
                @csrf
            </div>
        </form>
    </div>
    <div class="clearfix"></div><br>

    @if($fanta->preview)
    <div class="card" style="width:300px;text-align: center;padding:10px;">
        <h4>Preview</h4>
        <div style="">
            <img src="/images/{{$fanta->id}}/{{$fanta->preview}}" width="200px">
            <div class="clearfix"></div><br>
            <a role="button" class="btn btn-outline-danger btn-sm" href="{{ route('preview.destroy', $fanta) }}"> Destroy preview</a>
        </div>
    </div>
    @endif
    <br>
    @if($fanta->images->count())
    <div class="card" style="padding:10px;margin:6px;text-align: center;">
        <h4>Sides</h4>
        <div class="row">
            
        @foreach($fanta->images as $image)
        <div class="col" style="text-align: center;margin-bottom: 10px">
                <img src="/images/{{$fanta->id}}/{{$image->normal_size}}" width="200px">
                <div class="clearfix"></div><br>
                <a role="button" class="btn btn-outline-danger btn-sm" href="{{ route('side.destroy', [$fanta, $image]) }}"> Destroy this image</a>
        </div>
        @endforeach
        </div>
    </div>
    <hr>
    <a role="button" class="btn btn-danger" href="{{ route('sides.destroy', $fanta) }}"> Destroy all sides</a>
    <a role="button" class="btn btn-danger" href="{{ route('images.destroy', $fanta) }}"> Destroy all images</a>
    @endif
</div>
