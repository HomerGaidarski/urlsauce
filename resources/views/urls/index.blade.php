@extends('layouts.layout')
@section('title')
	Urls
@stop

@section('body')
	@foreach($urls as $url)
		<h1>{{$url->id}}</h1>
		<h3>{{$url->long_url}}</h3>
	@endforeach
@stop

