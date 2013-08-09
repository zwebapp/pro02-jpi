@extends('layouts.front.master');

@section('content')

	<div class="row-fluid">
		<div class="span12">
			<h2>Proceed checkout</h2>
			<p>Please review the items that you wish to order below. If done, click <strong>Submit Order</strong>.</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span9 offset1">
			<table class="table table-striped">
				<thead>
					<th>&nbsp;</th>
					<th>Product</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Actions</th>
				</thead>
				<tbody>
					@foreach(Session::get('orders') as $key => $value )
					<?php $order = Product::find($key); ?>
					<tr>
						<td class="image"> {{HTML::image( isset($order->image) ? json_decode($order->image)->thumb : 'public/img/thumb2-no-image-product.jpg', '', array('class' => 'image-polaroid'))}} </td>
						<td class="name"> {{ $order->name  }}</td>
						<td class="description"> {{ $order->description  }}</td>
						<td class="quantity"> {{ $value }}</td>
						<td class="actions">
								<a class="btn btn-mini edit" href="{{ action('Products@clientShowProduct', $order->id) }}" data-toggle="modal" title="Edit"><i class="icon-pencil"></i> </a>
                <a class="btn btn-mini delete" href="{{ action('Orders@removeItem', $order->id) }}" ><i class="icon-remove"></i> </a>
						</td>
					</tr>

					@endforeach
				</tbody>
			</table>
			<div class="submitform">
				<small id="addressInfo"><strong>Delivery Address:</strong> <em><span id="deliveryAddress">{{ Auth::user()->client->company_address ?: Auth::user()->client->address }}</span> &mdash; <a href="javascript:void(0)" id="changeAddress" class="change-address"> Change</a> </em></small>
				{{ Form::open(array('action' => 'Orders@submit')) }}
				{{ Form::hidden('client_address', Auth::user()->client->company_address ?: Auth::user()->client->address) }}
				<div class="input-append" style="display: none;">
  				<input name="delivery_address" class="input-xlarge" id="textAddress" type="text">
				  <button id="saveAddress" class="btn" type="button">Save</button>
				</div>
				<p> <button class="btn btn-inverse btn-medium" type="submit">Submit Order</button> </p>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@stop