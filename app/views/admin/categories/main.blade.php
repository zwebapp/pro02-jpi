@extends('layouts.back.master')

@section('title')
  Manage Categories | Administrators Page | JPI 
@stop

@section('content')

  @include('_partials.errors')
  
  <div class="main-wrapper">
    <div class="row-fluid">
      <div class="span3">
        <a href="{{ url('admin/categories/add') }}" class="btn btn-primary" data-toggle="modal" data-target="#modalBox" id="addNewCategory">Add new category</a>
      </div>
      <div class="span3"></div>
      <div class="span6">
        @include('_partials.search')
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <h4>Categories List</h4>
        <table id="dataTable" class="table table-hover table-condensed table-striped">
          <thead>
            <th>Category</th>
            <th>Description</th>
            <th>Actions</th>
          </thead>
          <tbody>
          @foreach (Category::all() as $category)
            <tr class="item_{{ $category->id }}">
              <td class="name">{{ $category->name }}</td>
              <td class="description">{{ $category->description }}</td>
              <td>
                <a class="btn btn-mini edit" href="{{ url('admin/categories/' . $category->id) . '/edit' }}" data-toggle="modal" data-target="#modalBox" title="Edit"><i class="icon-pencil"></i> </a>
                <a class="btn btn-mini delete" href="{{ url('admin/categories/' . $category->id . '/remove')  }}" ><i class="icon-trash"></i> </a>
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
<div id="modalBox" class="modal hide fade admin-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> </button>
  
  <div class="modal-body">
    <div class="ajax-wrapper">
      {{ HTML::image('public/img/ajax-loader.gif'); }}
    </div>
  </div>

</div>

@stop