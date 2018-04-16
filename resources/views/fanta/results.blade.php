@extends('layouts.fanta')

@section('content')

@isset($fantas)
<div class="container">
    
<a role="buttton" href="{{route('index-fanta')}}" class="btn btn-success">Search Again</a>


<div class="clearfix"></div><br>

    <div class="" style="padding:10px;margin:6px;text-align:center;">
        <h4>Matches</h4>
        <div class="row">
        @foreach($fantas->sortBy('flavour_id') as $fanta)
                @if($fanta->preview)
                <div class="col" style="max-width:280px; padding:10px">
                    <div class="card">
                        <div class="card-body" style="text-align:center;margin-bottom:10px;">
                            <a role="" class="" href="{{ route('show-fanta', $fanta) }}"><img src="{{ asset('storage/images/'.$fanta->id.'/'.$fanta->preview) }}" width="100px"></a>
                            <div class="clearfix"></div><br>
                            <a role="button" class="btn btn-outline-success btn-sm" href="{{ route('show-fanta', $fanta) }}">Open</a>
                            @auth<a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('edit-fanta', $fanta) }}">Edit</a>@endauth
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
                        <a role="button" class="btn btn-outline-success btn-sm" href="{{ route('show-fanta', $fanta) }}">Open</a>
                        @auth <a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('edit-fanta', $fanta) }}">Edit</a>@endauth

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

