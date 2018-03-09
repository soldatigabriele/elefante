<style>
.center {
    position: absolute;
    width:20%;
    margin-left: 40%;
    margin-right: auto;
    margin-top:150px;
}
</style>

@extends('errors::layout')

@section('title', 'Fantapage not found')

	 
<img src="{{asset('404.png')}}" alt="sad fanta" width="300px" class="center">

@section('message', 'Sorry, the fantapage you are looking for could not be found.')
