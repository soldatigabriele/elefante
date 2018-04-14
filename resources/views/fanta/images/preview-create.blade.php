@extends('layouts.fanta')

@section('style')
<style>
.button{
    width:150px;
}
</style>
@endsection

@section('content')


@include('fanta.partials.images-upload')
<br>

@if($fanta->preview)
<div>
    <img src="/images/{{$fanta->id}}/{{$fanta->preview}}" width="200px">
</div>
@endif
<hr>

@foreach($fanta->images as $im)
    <img src="/images/{{$fanta->id}}/{{$im->normal_size}}" width="200px">
@endforeach

@include('scripts.dropzone')

@endsection


