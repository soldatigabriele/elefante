@extends('layouts.fanta')

@section('content')
<div class="container">
    <br>        
    <div class="col-12">
        <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        <a role="buttton" href="{{route('index-fanta')}}" class="btn btn-success">Search Again</a>
        <div class="clearfix"></div><br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <div>
                            Colour: 
                            @foreach($fanta->colours as $colour)
                            {{$colour->name}}
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
                        <div>
                            Created at: {{$fanta->created_at}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div><br>
            <div class="card">
                <div class="card-body">
                    @if($fanta->images->count())
                    <div class="" style="padding:10px;margin:6px;text-align:center;">
                        <h4>Fantastic!</h4>
                        <div class="row">
                            @foreach($fanta->images as $image)
                            <div class="col" style="max-width:400px; padding:10px; margin:0 auto">
                                <div class="card">
                                    <div class="card-body" style="text-align:center;margin-bottom:10px;">
                                        <img src="{{ asset('storage/images/'.$fanta->id.'/'.$image->normal_size) }}" width="340px">
                                        <div class="clearfix"></div><br>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div id="app"></div>
            </div>
        </div>
    </div>
</div>



@endsection





