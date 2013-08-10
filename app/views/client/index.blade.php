@extends('layouts.front.master')

@section('banner')
	@include('_partials.slideshow');
@stop

@section('content')

	<div class="slide-wrapper">
		@include('_partials.carousel')
	</div>

@stop