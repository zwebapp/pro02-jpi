@extends('layouts.back.master')

@section('title')
  Manage | Administrators Page | JPI 
@stop

@section('content')
	{{ Notification::showSuccess('<div class="page-alert"><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> :message </div></div>') }}
	
	<div class="row-fluid">
		
		<div class="span3 email-panel">
			<div class="wrapper">
				@include('admin.manage._email-form')
			</div>

		</div>
		<div class="span9 accounts">
			<div class="main-wrapper">
        <div class="row-fluid">
				  <a href="{{ url('admin/manage/add') }}" class="btn btn-primary" data-toggle="modal">Add new accounts</a>
        </div>

				<table id="dataTable" class="table table-hover table-condensed table-striped">
          <thead>
            <th>Name</th>
            <th>Username</th>
            <th>Last logged in</th>
            <th>Actions</th>
          </thead>
          <tbody>
          @foreach (Administrator::all() as $admin)
            <tr class="item_{{ $admin->id }} {{ !$admin->user->is_active ? 'unpublished' : '' }}">
              <td class="name">{{ $admin->name }}</td>
              <td class="username">{{ $admin->user->username }}</td>
              <td class="last_logged_in">{{ $admin->user->last_logged_in }}</td>
              <td>
                <a class="btn btn-mini edit" href="{{ url('admin/manage/accounts/' . $admin->user->id . '/edit') }}" data-toggle="modal" title="Edit"><i class="icon-pencil"></i> </a>
                <a class="btn btn-mini delete" href="{{ url('admin/manage/accounts/' . $admin->user->id . '/remove')  }}" ><i class="icon-trash"></i> </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
			</div>
		</div>


	</div>
	
@stop


@section('extraHtml')

<!-- Modal -->
<div id="modalBox" class="modal hide fade admin-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
  
  <div class="modal-body">
    <div class="ajax-wrapper">
      {{ HTML::image('public/img/ajax-loader.gif'); }}
    </div>
  </div>

</div>

@stop