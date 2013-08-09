@extends('layouts.back.master')

@section('title')
  Manage Orders | Administrators Page | JPI 
@stop

@section('content')

  @include('_partials.errors')
  
  <div class="main-wrapper">
    <div class="row-fluid">
      <div class="span3">
        <h4>Orders List</h4>
      </div>
      <div class="span3"></div>
      <div class="span6">
        @include('_partials.search')
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        
        <ul class="nav nav-pills">
          
          <li  class="{{ URL::current() == action('Orders@index') ? 'active' : '' }}">
            <a href="{{ action('Orders@index') }}"> All </a>
          </li>

          @foreach(Lookup::orderStatuses()->get() as $status)
          
            <li class="{{ URL::current() == action('Orders@showSort', $status->id) ? 'active' : '' }}"> 
              <a href="{{ action('Orders@showSort', $status->id) }}">{{ $status->value }}</a> 
            </li>

          @endforeach

        </ul>

        <table id="dataTable" class="table table-hover table-condensed table-striped">
          <thead>
            <th>Status</th>
            <th>From</th>
            <th>Agent</th>
            <th>Date ordered</th>
            <th>Date approved</th>
          </thead>
          <tbody>
          @if (count($orders) > 0)
            @foreach ($orders as $order)
              <tr class="{{ strtolower($order->status->value) }}"> 
                <td> {{ $order->status->value }}</td>
                <td>
                  <a href="{{ action('Orders@show', $order->id) }}" data-toggle="modal"> 
                    {{ $order->client->company_name ?: $order->client->firstname  . ' ' . $order->client->lastname }} 
                  </a>
                </td>                
                <td> {{ isset($order->agent_id) ? json_decode($order->agent->information)->full_name : '' }} </td>
                <td>{{ $order->created_at }} </td>
                <td>{{ $order->approved_at ?: '' }} </td>
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
  </div>
@stop

@section('extraHtml')

<!-- Modal -->
<div id="modalBox" class="modal hide fade admin-orders" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
  
  <div class="modal-body">
    <div class="ajax-wrapper">
      {{ HTML::image('public/img/ajax-loader.gif'); }}
    </div>
  </div>

</div>

@stop