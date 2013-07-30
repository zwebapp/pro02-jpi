@extends('layouts.back.master')

@section('title')
  Manage Products | Administrators Page | JPI 
@stop

@section('content')

  @include('_partials.errors')
  <div class="main-wrapper">
    <div class="row-fluid">
      <div class="span3">
        <a href="{{ url('admin/products/add') }}" class="btn btn-primary" data-toggle="modal" data-target="#modalBox" id="addNewProduct">Add new product</a>
      </div>
      <div class="span4"> {{ Notification::showSuccess('<div class="alert alert-success"> :message </div>') }}</div>
      <div class="span5">
        @include('_partials.search')
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <h5>Product List</h5>
        <table id="dataTable" class="table table-hover table-condensed table-striped">
          <thead>
            <th>&nbsp;</th>
            <th>Product</th>
            <th>Category</th>
            <th>Actions</th>
          </thead>
          <tbody>
          @foreach (Product::orderBy('name')->get() as $product)
            <tr class="item_{{ $product->id }}">
              <td class="thumbs">
                {{ HTML::image(isset($product->image) ?  json_decode($product->image)->mini : 'public/img/thumb-no-image-product.jpg' , '', ['class' => 'thumbnail']) }}
              </td>
              <td class="name">{{ link_to('admin/products/' . $product->id  .'/show/', $product->name, [ 'data-toggle' => 'modal',  'data-target' => '#modalBox' ]) }} </td>
              <td class="category">  {{  isset($product->category->name) ? $product->category->name : 'Uncategorized'  }}</td>
              <td class="nolink">
                <a class="btn btn-mini edit rowlink" href="{{ url('admin/products/' . $product->id) . '/edit' }}" data-toggle="modal" data-target="#modalBox" title="Edit"><i class="icon-pencil"></i> </a>
                <a class="btn btn-mini delete rowlink" href="{{ url('admin/products/' . $product->id . '/remove')  }}" ><i class="icon-trash"></i> </a>
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
