@extends('layouts.front.master');

@section('banner')

<div class="slide-container category-container">

	<div class="container-semifluid">
		
		<div class="row-fluid category-info">

			<div class="wrapper">
				
				@if(URL::current() == url('products'))
					<h1>Products</h1>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, consectetur, veniam pariatur debitis iure est cumque molestias voluptatibus rerum eum dicta officiis odit necessitatibus qui fugiat velit cum enim atque.</p>
				@else
					<h1>{{ $category->name }}</h1>
					<p class="lead">{{ $category->description }}</p>
				@endif

			</div>
			
		</div>

	</div>
	
</div>

@stop

@section('content')

	<div class="row-fluid">

		<aside class="span3">
			<ul class="menu-categories">
				<li class="{{ URL::current() == url('products') ? 'active' : '' }}">
				 {{ HTML::link('products', 'All Products') }}	
				</li>
			@foreach(Category::all() as $category)
				<li class="{{ URL::current() == action('Products@clientShowCategory', $category->id) ? 'active' : '' }}">
					<a href="{{ action('Products@clientShowCategory', $category->id) }}">{{ $category->name }}</a></li>			
			@endforeach
			</ul>
		</aside>

		<div class="span9">
			
			<?php $counter = 0; ?>

			@foreach($products as $product)
				
				@if(!$product->is_active) 
						<?php continue; ?>
				@endif


				<?php $counter++; ?>
				@if($counter == 1)
					<div class="row-fluid">
				@endif
					<div class="span4">
						<figure>
							<a href="{{ action('Products@clientShowProduct', $product->id)}}" >
								{{ HTML::image(isset($product->image) ? json_decode($product->image)->avatar : 'public/img/avatar-no-image-product.jpg' , '', array('class' => 'img-polaroid')) }}
							</a>
							<figcaption>
								<a href="{{ action('Products@clientShowProduct', $product->id)}}" >{{ $product->name }} </a>
								<br/> <small>{{ $product->description }}</small>
							</figcaption>	

						</figure>

					</div>
				@if($counter == 3)
					</div> 
					<?php $counter = 0; ?>
				@endif
			@endforeach

			@if($counter > 0)
				</div>
			@endif
			<div class="row-fluid">
				{{ $products->links() }}
			</div>

		</div>
	</div>
@stop