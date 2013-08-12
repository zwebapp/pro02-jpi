@extends('layouts.front.master')


@section('content')

	<div class="row-fluid profile">
		
		<div class="span3">
			<div class="wrapper info">
				<div class="avatar">
					{{ HTML::image(json_decode(Auth::user()->client->image)->avatar, '', array('class' => 'img-polaroid')) }}
				</div>
				<div class="details">
					<h6> {{ 6 == Auth::user()->client->lookup_user_type ? Auth::user()->client->firstname . ' ' . Auth::user()->client->lastname : Auth::user()->client->company_name }}</h6>
					
					<h4>Address</h4>
					<p>{{ 6 == Auth::user()->client->lookup_user_type ? Auth::user()->client->address : Auth::user()->client->company_address }}</p>

					<h4>Contact number</h4>
					<p>{{ Auth::user()->client->contact_no }}</p>

					<h4>Email</h4>
					<p>{{ Auth::user()->client->email }}</p>

					@if (7 == Auth::user()->client->lookup_user_type)
						<h4>Company representative</h4>
						<p>Auth::user()->client->firstname . ' ' . Auth::user()->client->lastname </p>
					@else 	
						<h4>Birthday</h4>
						<p>{{Auth::user()->client->birthday}}</p>
					@endif
					
				</div>
			</div>
		</div>

		<div class="span9">
			
			<h4>Order History</h4>

        <table id="dataTable" class="table table-hover table-condensed table-striped">
          <thead>
            <th>Status</th>
            <th>Date ordered</th>
            <th>Agent Assigned</th>
            <th>Date approved</th>
            <th>&nbsp;</th>
          </thead>
          <tbody>
          @if (count($orders) > 0)
            @foreach ($orders as $order)
              <tr class="{{ strtolower($order->status->value) }}"> 
                <td> {{ $order->status->value }}</td>               
                <td> <a href="{{ action('Clients@orderInfo', $order->id) }}">{{ $order->created_at }} </td>
                <td> {{ isset($order->agent_id) ? json_decode($order->agent->information)->full_name : '' }} </td>
                <td>{{ $order->approved_at ?: '' }} </td>
                <td> 
                	@if ($order->status->id != 1)
                		<a class="btn btn-mini edit" href="{{ action('Clients@orderCancel', $order->id) }}" title="Cancel Order"><i class="icon-remove"></i> </a> 
                	@endif
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6"> No orders available </td>
            </tr>
          @endif
          </tbody>
        </table>


		</div>

	</div>

@stop