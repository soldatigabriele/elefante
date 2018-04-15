@extends('layouts.fanta')

@section('content')
<div class="container">
    <br>        
    <div class="col-12">
    <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        <h2>Add a Fanta</h2>
        <form action="{{ route('fanta.store') }}" class="form-control" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        
            @include('fanta.partials.form', ['submitName' => 'Save' ])

        </form> 


        <div id="app"></div>
    </div>
</div>


@include('scripts.selectize')
@include('scripts.decimals')


@endsection


