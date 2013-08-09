<?php  if (isset($edit)) $info = json_decode($information); ?>

{{ Form::open(array('action' => isset($edit) ? 'Agents@update' : 'Agents@save', 'method' => 'get', 'class' => 'ajax form-horizontal')) }}

<div class="wrapper">
  <h4> {{ isset($edit) ? "Edit " : "Add new " }} agent </h4>
  
  {{ Notification::showSuccess('<div class="alert alert-success"> :message </div>') }}
  @if (isset($edit))
  <div class="control-group">
    <label class="control-label" for="is_active">Active: </label>
    <div class="controls">
      {{ Form::checkbox('is_active', '', $is_active , array('class' => 'for-switch') ) }}
    </div>
  </div>
  @endif
  <div class="control-group">
    <label class="control-label" for="full_name">Fullname: </label>
    <div class="controls">
      {{ Form::text('full_name', isset($info->full_name) ? $info->full_name : '', array('class' => 'span3', 'placeholder' => 'e.g: Juan Dela Cruz')) }}
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="email_address">Email: </label>
    <div class="controls">
      {{ Form::text('email_address', isset($info->email_address) ? $info->email_address : '', array('class' => 'span3', 'placeholder' => 'e.g: juan@delacruz.com')) }}
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="address">Address:</label>
    <div class="controls">
      {{ Form::textarea('address', isset($info->address) ?$info->address : '', array('class' => 'span3', 'row' => '3', 'placeholder' => 'e.g: Somewhere down the road')) }}
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="birthday">Birthday:</label>
    <div class="controls">
      {{ Form::text('birthday', isset($info->birthday) ? $info->birthday : '', array( 'data-mask' => '99-99-9999', 'class' => 'span2', 'placeholder' => 'e.g: 03-03-1983')) }}
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="contact_no">Contact #:</label>
    <div class="controls">
      {{ Form::text('contact_no', isset($info->contact_no) ? $info->contact_no : '', array('class' => 'span2', 'placeholder' => 'e.g: 123-33-3312')) }}
    </div>
  </div>

</div>

<div class="modal-footer">
  {{ HTML::image('public/img/preload.gif', '', array('class' => 'hidden', 'id' => 'preload')) }}
  @if (isset($id))
    {{ Form::hidden('id', $id) }}
  @endif
  {{ Form::button('Close', array('data-dismiss' => 'modal', 'aria-hidden' => 'true', 'class' => 'btn')) }}
  {{ Form::submit(isset($edit) ? 'Update' : 'Add Agent', array('class' => 'btn btn-primary', 'data-refresh' => '.modal-body')) }}
</div>

{{ Form::close() }}