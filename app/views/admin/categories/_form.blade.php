
{{ Form::open(array('url' => isset($edit) ? 'admin/categories/update' : 'admin/categories/save', 'method' => 'get', 'class' => 'ajax form-horizontal')) }}

<div class="wrapper">
  <h4> {{ isset($edit) ? "Edit " : "Add new " }} category </h4>
  
  @if (Session::has('save'))
    <div class="alert alert-success"><strong>Yes!</strong> New category added! <small> Wanna add more? </small></div>
  @elseif (Session::has('update'))
    <div class="alert alert-success"><strong>Dang!</strong> Category updated!</div>
  @endif


  @if ($errors->has('name'))
  <div class="control-group error">
  @else 
  <div class="control-group">
  @endif
    <label class="control-label" for="name">Name: <span class="label label-important">Required</span> </label>
    <div class="controls">
      {{ Form::text('name', isset($name) ? $name : '', array('class' => 'span3', 'placeholder' => 'e.g: Tissue Papers')) }}
      <span class="help-inline">{{ $errors->first('name') }}</span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Short description:</label>
    <div class="controls">
      {{ Form::textarea('description', isset($description) ? $description : '', array('class' => 'span3', 'row' => '2', 'placeholder' => 'e.g: Clean and white tissue papers')) }}
    </div>
  </div>
</div>

<div class="modal-footer">
  {{ HTML::image('public/img/preload.gif', '', ['class' => 'hidden', 'id' => 'preload']) }}
  @if (isset($id))
    {{ Form::hidden('id', $id) }}
  @endif
  {{ Form::button('Close', array('data-dismiss' => 'modal', 'aria-hidden' => 'true', 'class' => 'btn')) }}
  {{ Form::submit(isset($edit) ? 'Update' : 'Add Category', array('class' => 'btn btn-primary', 'data-refresh' => '.modal-body')) }}
</div>

{{ Form::close() }}