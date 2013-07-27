@extends('layouts.back.master')

@section('title')
  Manage Categories | Administrators Page | JPI 
@stop


@section('content')

  <?php 
  if(isset($errors)) {
    echo "<pre>" . print_r($errors->all(), TRUE) . "</pre>";
  }
  ?>

  <div class="row-fluid">
    <div class="span3">
      <a href="#myModal" class="btn btn-primary" data-toggle="modal" id="addNewCategory">Add new category</a>
    </div>
    <div class="span3"></div>
    <div class="span6">
      <form class="form-search">
        <div class="input-append">
          <input type="text" class="search-query input-xlarge">
          <button type="submit" class="btn">Search</button>
        </div>
      </form>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <table class="table table-hover table-condensed">
        <thead>
          <th>#</th>
          <th>Category</th>
          <th>Description</th>
          <th>Actions</th>
        </thead>
        <tbody>
        @foreach (Category::all() as $category)
          <tr>
            <td>{{ $category->id }} </td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>&nbsp;</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop

@section('extraHtml')

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Add new category</h3>
  </div>
  
  {{ Form::open(array('url' => 'admin/categories/add', 'method' => 'get', 'class' => 'ajax')) }}

  <div class="modal-body">    
    {{ Form::text('name', '', array('class' => 'span3', 'placeholder' => 'Category name')) }}
    {{ Form::textarea('description', '', array('class' => 'span3', 'placeholder' => '(Optional) Add a short description for your category. . .')) }}
  </div>
  
  <div class="modal-footer">
    {{ Form::button('Close', array('data-dismiss' => 'modal', 'aria-hidden' => 'true', 'class' => 'btn')) }}
    {{ Form::submit('Add category', array('class' => 'btn btn-primary')) }}
  </div>

  {{ Form::close() }}

</div>

@stop

@section('extraJs')

<script>
  
  jQuery('document').ready(function($){

    $(document).on("eldarion-ajax:begin", function(evt, $el) {
     console.log('gone here -- begin');
    });    

    $(document).on("eldarion-ajax:error", function(evt, $el, data) {
     console.log('gone here -- error');
    });

    $(document).on("eldarion-ajax:complete", function(evt, $el, data) {
     console.log('gone here -- complete');
    });

    $(document).on("eldarion-ajax:success", function(evt, $el, data) {
      console.log('gone here -- success');
      console.log(data);

      // var $node = $($el.data("prepend-inner"));
      // $node.data(data.html + $node.html());


    });

  });

</script>

@stop