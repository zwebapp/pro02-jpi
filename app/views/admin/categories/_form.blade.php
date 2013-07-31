{{ Form::open(array('action' => isset($edit) ? 'Categories@update' : 'Categories@save', 'method' => 'get', 'class' => 'ajax form-horizontal')) }}

<div class="wrapper">
  <h4> {{ isset($edit) ? "Edit " : "Add new " }} category </h4>
  
  {{ Notification::showSuccess('<div class="alert alert-success"> :message </div>') }}

  <div class="control-group {{ ($errors->has('name') ? 'error' : '' ) }} ">
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