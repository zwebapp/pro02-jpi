<div class="cart-status">
	<p class="handler">>></p>

	<div class="items">
		
		<p>No. of Items: <span class="big"> {{ count(Session::get('orders')) }} </span></p>

		@if (!is_null(Session::get('orders')) && count(Session::get('orders')) > 0 ) 
			<p>Cart Items:</p>
			
			@foreach(Session::get('orders') as $key => $quantity)
				<?php $product = Product::find($key); ?>
				<div class="item">
					<a href="{{ action('Products@clientShowProduct', $key ) }}" title="{{ $product->name }}">
						{{ HTML::image(isset($product->image) ? json_decode($product->image)->thumb : 'public/img/thumb2-no-image-product.jpg', '', array('class'=> 'img-polaroid thumb pull-left')) }}
					</a>
					<span class="pull-right qty"> x{{ $quantity }} </span>
				</div>	
			@endforeach
		
			<a href="{{ action('Orders@proceedCheckout') }}" class="btn btn-primary"> Checkout </a>

		@else 
			<p>No items on your cart yet. </p>
		@endif
		

	</div>
		

</div>