
<div class="card" style="padding:15px 0px">
    <div class="col-12">
        <form action="{{ route('preview.store', $fanta->id) }}"
            enctype="multipart/form-data" class="dropzone" id="preview">
            <h4 class="dz-message">Drop Preview</h4>
            <div id="csrf">
                @csrf
            </div>
        </form>
    </div>

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
</div>
<div class="clearfix"></div><br>

    @if($fanta->preview)
    <h4>Preview</h4>
    <div class="card" style="max-width:100%;text-align: center;padding:10px;margin:0 10px">
        <div style="">
            <img src="{{ asset('storage/images/'.$fanta->id.'/'.$fanta->preview) }}" width="200px">
            <div class="clearfix"></div><br>
            <a role="button" class="btn btn-outline-danger btn-sm" href="{{ route('preview.destroy', $fanta) }}"> Delete preview</a>
        </div>
    </div>
    @endif
    <br>
    @if($fanta->images->count())
        <h4>Sides</h4>
            @foreach($fanta->images as $image)
            <div class="row" style="margin:0 10px">
                <div class="col" style="max-width:100%; padding:0px 0px 5px 0px;background:;">
                    <div class="card" style="margin:0 10px">
                        <div class="card-body" style="text-align:center;margin-bottom:10px;">
                            <img src="{{ asset('storage/images/'.$fanta->id.'/'.$image->normal_size) }}" width="100%">
                            <div class="clearfix"></div><br>
                            <a role="button" class="btn btn-outline-danger btn-sm" href="{{ route('side.destroy', [$fanta, $image]) }}"> Delete this image</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    <br>
    <div class="col-12">
        <div style="text-align:center; background:white; padding:10px; border:1px solid #ddd; border-radius:5px;">
            <a role="button" class="btn btn-danger" href="{{ route('sides.destroy', $fanta) }}"> Delete all sides</a>
            <a role="button" class="btn btn-danger" href="{{ route('images.destroy', $fanta) }}"> Delete all images</a>
        </div>
    </div>
    @endif

<!-- Include the necessary scripts -->
@include('scripts.dropzone')


