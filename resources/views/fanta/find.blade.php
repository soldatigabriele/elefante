@extends('layouts.fanta')

@section('content')

<div class="container">
    <br>
    <div class=" col-12">
    <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        <h2>Get a Fanta!</h2>
        <form action="{{ route('fanta.filter') }}" class="form-control" method="GET" accept-charset="utf-8" enctype="multipart/form-data">
           
            @include('fanta.partials.form', ['submitName' => 'Search' ])
        
        </form>
    </div>
<div id="app"></div>
@if (session()->has('fantas'))
    
<div class="clearfix"></div><br>

    <div class="" style="padding:10px;margin:6px;text-align:center;">
        <h4>Matches</h4>
        <div class="row">
        @foreach(session('fantas') as $fs)
            @foreach($fs as $fanta)
                @if($fanta->preview)
                <div class="col" style="max-width:280px; padding:10px">
                    <div class="card">
                        <div class="card-body" style="text-align:center;margin-bottom:10px;">
                            <img src="/images/{{$fanta->id}}/{{$fanta->preview}}" width="100px">
                            <div class="clearfix"></div><br>
                            <a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('fanta.edit', $fanta) }}">{{ $fanta->flavour->name }}</a>

                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endforeach
        </div>
    </div>
@endif

@if (session()->has('fantas'))

    <div class="clearfix"></div><hr>

    <h4>Matches with no preview</h4>

            <div class="col-12">
                <div class="row">
                @foreach(session('fantas') as $fs)
                    @foreach($fs as $fanta)
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
                                    @auth <a role="button" class="btn btn-outline-warning btn-sm" href="{{ route('fanta.edit', $fanta) }}">Edit</a> @endauth
                                    <a role="button" class="btn btn-outline-success btn-sm" href="{{ route('fanta.show', $fanta) }}">Open</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endforeach
                </div>
            </div>
@endif


</div>

@include('scripts.selectize')
@include('scripts.decimals')


@endsection

