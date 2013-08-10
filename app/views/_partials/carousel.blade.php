<div class="row-fluid carousel">
	<div class="span1">
		<input class="next" type="image" src="{{ url('public/img/ca-left.png') }}" />
	</div>
	<div class="span10">

		<div class="jcarousel">
		  <ul>
		  
	  	@foreach(Product::all() as $product)
					
			@if(!$product->is_active)
				<?php continue; ?>
			@endif
										
				<li>
					<figure>
						<a href="{{ action('Products@clientShowProduct', $product->id)}}" >
							{{ HTML::image(isset($product->image) ? json_decode($product->image)->thumb  : 'public/img/thumb2-no-image-product.jpg', '', array('class' => 'img-polaroid')) }}
						</a>
						<figcaption><a href="{{ action('Products@clientShowProduct', $product->id)}}" > <small>{{ $product->name }}</small></a></figcaption>
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