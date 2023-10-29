@extends('layouts.fanta')
@section('style')
<style>
.key{
}
.els{
    font-weight:600;
}
</style>
@endsection
@section('content')
<div class="container">
    <br>        
    <div class="col-12">
        <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        <a role="buttton" href="{{route('fanta.find')}}" class="btn btn-success">Search Again</a>
        @auth<a role="button" class="btn btn-warning" href="{{ route('fanta.edit', $fanta) }}">Edit</a>@endauth 
        <div class="clearfix"></div><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col key">
                        Colour: 
                    </div>
                    <div class="col-8 els">
                        @foreach($fanta->colours as $colour)
                        {{$colour->name}}
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col key">
                        Flavour: 
                    </div>
                    <div class="col-8 els">
                        {{ $fanta->flavour->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col key">
                        Country: 
                    </div>
                    <div class="col-8 els">
                    {{ $fanta->country->name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col key">
                        Tags: 
                    </div>
                    <div class="col-8 els">
                        @foreach($fanta->tags as $tag)
                        {{$tag->name}},
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col key">
                        Year: 
                    </div>
                    <div class="col-8 els">
                        {{$fanta->year}}
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div><br>
            @if($fanta->images->count())
            <div class="" style="padding:10px;margin:6px;text-align:center;">
                <h4>Fantastic!</h4>
                <div class="row">
                    @foreach($fanta->images as $image)
                    <div style="max-width:100%; padding:0px 0px 5px 0px; margin: 0 10px">
                        <div class="card">
                            <div class="card-body" style="text-align:center;margin-bottom:10px;">
                                <div class="" style="text-align:center;margin-bottom:0px;">
                                    <img src="{{ asset('storage/images/'.$fanta->id.'/'.$image->normal_size) }}" width="100%">
                                    <div class="clearfix"></div><br>
                                    @auth<a role="button" class="btn btn-outline-success btn-sm button-link" href="{{ asset('storage/images/'.$fanta->id.'/'.$image->full_size) }}">Full Size</a>@endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div id="app"></div>
        </div>
    </div>
</div>



@endsection





