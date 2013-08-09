@extends('layouts.back.master')

@section('title')
  Manage Clients | Administrators Page | JPI 
@stop

@section('content')

  @include('_partials.errors')
  
  <div class="main-wrapper">
    <div class="row-fluid">
      <div class="span3">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalBox" id="addNewAgent">Add new client</a>
      </div>
      <div class="span3"></div>
      <div class="span6">
        @include('_partials.search')
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <h4>Clients List</h4>
        <table id="dataTable" class="table table-hover table-condensed table-striped">
          <thead>
            <th>Type</th>
            <th>&nbsp;</th>
            <th>Client</th>
            <th>Address</th>
            <th>Last logged in</th>
            <th>Actions</th>
          </thead>
          <tbody>
          @foreach ($users as $user)
            <tr class="item_{{ $user->id }} {{ !$user->is_active ? 'unpublished' : '' }}">
              <td class="type"> {{ $user->client->userType->value }}</td>
              <td class="thumbs">
                {{ HTML::image(isset($user->client->image) ?  json_decode($user->client->image)->mini : 'public/img/thumb-no-image-product.jpg' , '', array('class' => 'thumbnail')) }}
              </td>
              <td class="name">{{ isset($user->client->company_name) ? $user->client->company_name : $user->client->firstname . ' ' . $user->client->lastname }}</td>
              <td class="address">{{ isset($user->client->company_address) ? $user->client->company_address : $user->client->address }}</td>
              <td class="last-logged-in">{{ $user->last_logged_in }}</td>
              <td>
                <a class="btn btn-mini edit" href="{{ url('admin/clients/' . $user->id) . '/edit' }}" data-toggle="modal" title="Edit"><i class="icon-pencil"></i> </a>
                <a class="btn btn-mini delete" href="{{ url('admin/clients/' . $user->id . '/remove')  }}" ><i class="icon-trash"></i> </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $users->links() }}
      </div>
    </div>
  </div>
@stop

@section('extraHtml')

<!-- Modal -->
<div id="modalBox" class="modal hide fade clients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
  
  <div class="modal-body">
    <div class="ajax-wrapper">
      <h5>What client type do you want to add?</h5>
      <figure class="pull-left">
        <a href="{{ url('admin/clients/addPersonal') }}" class="client-selector" data-toggle="modal">{{ HTML::image('public/img/client-personal.png')  }}</a>
        <figcaption>Personal</figcaption>
      </figure>
      <figure class="pull-right">
        <a href="{{ url('admin/clients/addBusiness') }}" class="client-selector" data-toggle="modal">{{ HTML::image('public/img/client-business.png')  }}</a>
        <figcaption>Company</figcaption>
      </figure>
      {{ HTML::image('public/img/preload.gif', '', array('class' => 'hidden', 'id' => 'preload')) }}
    </div>
  </div>

</div>

@stop