{{ Form::open(array('action' => isset($edit) ? 'Admin@update' : 'Admin@save', 'class' => 'ajax form-horizontal')) }}

<div class="wrapper">
  <h4> {{ isset($edit) ? "Edit " : "Add new " }} accounts </h4>
  
  {{ Notification::showSuccess('<div class="alert alert-success"> :message </div>') }}

  <?php $user = isset($id) ? Administrator::find($id)->user : ''; ?>

  <div class="control-group {{ ($errors->has('username') ? 'error' : '' ) }} ">
    <label class="control-label" for="username">Username: <span class="label label-important">Required</span> </label>
    <div class="controls">
      {{ Form::text('username', isset($user->username) ? $user->username : '', array('class' => 'span3', 'placeholder' => 'e.g: johndoe')) }}
      <span class="help-inline">{{ $errors->first('username') }}</span>
    </div>
  </div>
  @if (!isset($edit))
  <div class="control-group {{ ($errors->has('password') ? 'error' : '' ) }} ">
    <label class="control-label" for="password">Password: <span class="label label-important">Required</span> </label>
    <div class="controls">
      {{ Form::password('password', isset($user->password) ? $user->password : '', array('class' => 'span3', 'placeholder' => 'YourPassword')) }}
      <span class="help-inline">{{ $errors->first('password') }}</span>
    </div>
  </div>
  <div class="control-group {{ ($errors->has('password_confirmation') ? 'error' : '' ) }} ">
    <label class="control-label" for="password_confirmation">Confirm password: <span class="label label-important">Required</span> </label>
    <div class="controls">
      {{ Form::password('password_confirmation', isset($user->password) ? $user->password : '',  array('class' => 'span3', 'placeholder' => 'e.g: YourPassword')) }}
      <span class="help-inline">{{ $errors->first('password_confirmation') }}</span>
    </div>
  </div>
  @endif

  <div class="control-group {{ ($errors->has('name') ? 'error' : '' ) }} ">
    <label class="control-label" for="name">Name: <span class="label label-important">Required</span> </label>
    <div class="controls">
      {{ Form::text('name', isset($name) ? $name : '', array('class' => 'span3', 'placeholder' => 'e.g: John Doe')) }}
      <span class="help-inline">{{ $errors->first('name') }}</span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="is_active">Activate: </label>
    <div class="controls">
      {{ Form::checkbox('is_active', true ,isset( $user->is_active ) ? $user->is_active : true , ['class' => 'for-switch']) }}
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