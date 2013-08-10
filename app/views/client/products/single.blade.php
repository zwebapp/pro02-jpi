@extends('layouts.front.master');

@section('banner')

{{ Notification::showSuccess('<div class="page-alert"><div class="alert alert-success"> :message </div></div>') }}

<div class="slide-container">

	<div class="container-semifluid">
		<div class="row-fluid">
			
			<div class="span6 product-info"> 
				<div class="wrapper">
					{{ Form::open(array('action' => 'Orders@addItemToBasket', 'method' => 'POST')) }}
						
					{{Form::hidden('id', $product->id) }}

					<div class="control-group {{ $errors->has('quantity') ? 'error' : '' }}">
					  <div class="controls">
					    <span class="help-inline">{{ $errors->first('quantity') }}</span>
							{{ Form::text('quantity', '', array('class' => 'span4', 'placeholder' => 'Enter Quantity')) }} 
					  </div>
						<button type="submit" class="btn btn-primary btn-large"><i class="icon-shopping-cart icon-white"></i> Add to Cart</button>
					</div>
					{{ Form::close() }}
					<div class="details">
						<h1>{{ $product->name }}</h1>
						<p class="lead">{{ $product->description }}</p>
						<h3> {{ isset($product->category->name) ? $product->category->name : 'Uncategorized' }} </h3>
					</div>
				</div>
			</div>
			<div class="span6 product-image">
				<div class="wrapper">
					{{ HTML::image( isset($product->image) ? json_decode($product->image)->slideshow : 'public/img/no-image-product.jpg', '', array('class' => 'img-polaroid')) }}
				</div>
			</div>

		</div>

	</div>
	
</div>

@stop

@section('content')
	
	<div class="slide-wrapper">
		
		<h4>Other {{ $product->category->name }} products </h4>

		<div class="row-fluid carousel">

			<div class="span1">
				<input class="prev" type="image" src="{{ url('public/img/ca-left.png') }}" />
			</div>

			<div class="span10">

				<div class="jcarousel">
				  <ul>
				  
			  	@foreach(Category::find($product->category->id)->products as $product)
						
						@if(!$product->is_active) 
							<?php continue; ?>
						@endif

						<li>
							<figure>
								<a href="{{ action('Products@clientShowProduct', $product->id)}}" >
									{{ HTML::image(isset($product->image) ? json_decode($product->image)->thumb  : 'public/img/thumb2-no-image-product.jpg', '', array('class' => 'img-polaroid')) }}
								</a>
								<figcaption>
									<a href="{{ action('Products@clientShowProduct', $product->id)}}" > <small>{{ $product->name }}</small></a>
								</figcaption>
							</figure>
						</li>

			  	@endforeach

				  </ul>

				</div>

			</div>

			<div class="span1">
				<input class="next" type="image" src="{{ url('public/img/ca-right.png') }}" />
			</div>

		</div>
	</div>

	
@stop
