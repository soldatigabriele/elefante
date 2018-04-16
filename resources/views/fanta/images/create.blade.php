@extends('layouts.fanta')

@section('style')
<style>
.button{
    width:150px;
}
.content{
    margin-top:20px;
}
</style>
@endsection

@section('content')

<div class="container">
    <div class="content col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
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
                            Created at: {{$fanta->created_at}}
                        </div>
                    </div>
                    <div class="col">
                        <a role="button" class="btn btn-outline-warning" href="{{route('create-fanta')}}">Create a new Fanta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div><br>
    <div class="col-12">
        <div class="card">
            @include('fanta.partials.images-upload')
        <div>
    <div>
</div>



@endsection


