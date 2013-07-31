@extends('layouts.back.master')

@section('title')
  Manage Agents | Administrators Page | JPI 
@stop

@section('content')

  @include('_partials.errors')
  
  <div class="main-wrapper">
    <div class="row-fluid">
      <div class="span3">
        <a href="{{ url('admin/agents/add') }}" class="btn btn-primary" data-toggle="modal" id="addNewAgent">Add new agent</a>
      </div>
      <div class="span3"></div>
      <div class="span6">
        @include('_partials.search')
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <table id="dataTable" class="table table-hover table-condensed table-striped">
          <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Birthday</th>
            <th>Contact #</th>
            <th>Actions</th>
          </thead>
          <tbody>
          @foreach ($agents as $agent)
            <?php $info = json_decode($agent->information); ?>
            <tr class="item_{{ $agent->id }} {{ !$agent->is_active ? 'unpublished' : '' }}">
              <td class="name">{{ $info->full_name }}</td>
              <td class="contact_no">{{ $info->email_address }}</td>
              <td class="address">{{ $info->address }}</td>
              <td class="birthday">{{ $info->birthday }}</td>
              <td class="contact_no">{{ $info->contact_no }}</td>
              <td>
                <a class="btn btn-mini edit" href="{{ url('admin/agents/' . $agent->id) . '/edit' }}" data-toggle="modal" title="Edit"><i class="icon-pencil"></i> </a>
                <a class="btn btn-mini delete" href="{{ url('admin/agents/' . $agent->id . '/remove')  }}" ><i class="icon-trash"></i> </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        {{ $agents->links() }}
      </div>
    </div>
  </div>
@stop

@section('extraHtml')

<!-- Modal -->
<div id="modalBox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
  
  <div class="modal-body">
    <div class="ajax-wrapper">
      {{ HTML::image('public/img/ajax-loader.gif'); }}
    </div>
  </div>

</div>

@stop