<div class="sidebar-nav">
    <a href="{{ action('Admin@index') }}" class="btn btn-large btn-block">Dashboard</a>
    <a href="{{ action('Orders@index') }}" class="btn btn-large btn-block ">Orders
			<?php $count = Order::where('lookup_status', 1)->count(); ?>
			@if ($count > 0)
				<span class="badge badge-inverse">{{ $count }}</span>
			@endif
    </a>
    <a href="{{ action('Products@index') }}" class="btn btn-large btn-block">Product</a>
    <a href="{{ action('Categories@index') }}" class="btn btn-large btn-block">Categories</a>
    <a href="{{ action('Clients@index') }}" class="btn btn-large btn-block">Clients</a>
    <a href="{{ action('Agents@index') }}" class="btn btn-large btn-block">Agents</a>
    <a href="{{ action('Admin@manage') }}" class="btn btn-large btn-block">Manage</a>
</div><!--/.well -->