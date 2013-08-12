<div class="wrapper">
	<h4>Products</h4>

	<table id="dataTable" class="table table-hover table-condensed table-striped">
	  <thead>
	    <th>&nbsp;</th>
	    <th>Products</th>
	    <th>Description</th>
	    <th>Category</th>
	    <th>Quantity</th>
	  </thead>
	  <tbody>
		  @foreach($products['orders'] as $key => $quantity)
	      	<?php $product = Product::find($key) ?>		      
	        <tr>
	          <td> {{ HTML::image(isset($product->image) ? json_decode($product->image)->thumb : 'public/img/thumb-no-image-product.jpg', '', array('class' => 'img-polaroid')) }} </td>
	          
	          <td><strong> {{ $product->name }} </strong></td>
	          <td> {{ $product->description }} </td>
	          <td> {{ $product->category->name }} </td>
	          <td class="qty"> {{ $quantity }} </td>
	        </tr>
		    @endforeach
	  </tbody>
	</table>
</div>

<div class="modal-footer">
  {{ Form::button('Close', array('data-dismiss' => 'modal', 'aria-hidden' => 'true', 'class' => 'btn btn-primary')) }}
</div>
