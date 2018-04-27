@extends('layouts.fanta')

@section('style')
<style>
body{
    /* background:#a3a3a3; */
}
.buttons{
    position:absolute;
    bottom:10px;
    right: 0%;
    left: 0%;
}
.button-link{
    width: 50px;
}
.carte-results{
    text-align:center;
    padding:10px 0px 0px 0px;
    margin-bottom:10px;
    /* margin:0 0 10px 0; */
    height:230px;
}
.card{
    /* border:0px solid black; */
    border-radius:0px;
}
</style>
@endsection

@section('content')

@isset($fantas)
<div class="container">
    <div class="clearfix"></div><br>
    <a role="buttton" href="{{route('fanta.find')}}" class="btn btn-success">Refine Search</a>
    <div class="" style="padding:10px;margin:6px;text-align:center;">
        <h4>Matches</h4>
        <div class="row">
        @foreach($fantas->sortBy('flavour_id') as $fanta)
                @if($fanta->preview)
                <div class="col" style="max-width:280px;padding:10px">
                    <div class="card">
                        <div class="card-body carte-results">
                            <a role="" class="" href="{{ route('fanta.show', $fanta) }}"><img src="{{ asset('storage/images/'.$fanta->id.'/'.$fanta->preview) }}" width="100px" max-height="200px"></a>
                            <div class="clearfix"></div><br>
                            <div class="buttons">
                                <a role="button" class="btn btn-outline-success btn-sm button-link" href="{{ route('fanta.show', $fanta) }}">Open</a>
                                @auth<a role="button" class="btn btn-outline-warning btn-sm button-link" href="{{ route('fanta.edit', $fanta) }}">Edit</a>@endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        @endforeach
        </div>
    </div>

<div class="clearfix"></div><hr>

<h4>Matches with no preview</h4>

    <div class="col-12">
        <div class="row">
        @foreach($fantas as $fanta)

            @if(!$fanta->preview)
            <div class="col-md-4 col-sm-6" style="margin-bottom: 10px">
                <div class="card">
                    <div class="card-body">
                    
                        <div>
                            Colour: 
                            @foreach($fanta->colours as $colour)
                                {{$colour->name}},
                            @endforeach
                        </div>

                        <div>
                            Flavour: {{ $fanta->flavour->name }}
                        </div>
                        <div>
                            Tags: 
                            @foreach($fanta->tags as $tag)
                                {{$tag->name}},
                            @endforeach
                        </div>
                        <div>
                            Year: {{$fanta->year}}
                        </div>
                        <a role="button" class="btn btn-outline-success btn-sm" href="{{ route('fanta.show', $fanta) }}">Open</a>
                        @auth <a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('fanta.edit', $fanta) }}">Edit</a>@endauth

                    </div>
                </div>
            </div>
            @endif
        @endforeach
        </div>
    </div>
@endif
</div>


@endsection

