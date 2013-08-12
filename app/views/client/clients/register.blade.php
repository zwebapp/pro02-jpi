@extends('layouts.front.master');

@section('title')
	Register Account | JPI
@stop

@section('content')

<div class="registration-form">
	<ul class="nav nav-tabs" id="myTab">
	  <li class="active"><a href="#personal" >Personal</a></li>
	  <li><a href="#company">Company</a></li>
	</ul>

 
	<div class="tab-content">

	  <div class="tab-pane active" id="personal">

	  	@include('client.clients._form-personal');

	  </div>

	  <div class="tab-pane" id="company">
	  	@include('client.clients._form-business');
	  </div>

	</div>

</div>

@stop