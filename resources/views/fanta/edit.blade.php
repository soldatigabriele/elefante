@extends('layouts.fanta')

@section('content')

<div class="container">
    <br>        
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a role="buttton" href="{{route('home')}}" class="btn btn-success">Home</a>
        
    <h2>Edit a Fanta</h2>
    <form action="{{ route('fanta.update', $fanta->id) }}" class="form-control" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        @method('put')
        @include('fanta.partials.form', ['submitName' => 'Update' ])
    </form>
    
    <div id="app"></div>
    <div class="clearfix"></div><br>

            @include('fanta.partials.images-upload')
</div>

<br><br>

@include('scripts.selectize')

@endsection
