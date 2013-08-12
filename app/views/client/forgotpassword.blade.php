@extends('layouts.front.master')

@section('content')

<h4>Reset password</h4>
<p>Please provide your email address below and we will send a  temporary password to you. </p>

{{ Notification::showError('<div class="alert alert-error"> :message </div>') }}

{{ Form::open(array('action' => 'Clients@changePassword', 'class' => 'form-inline'))}}
	<div class="control-group">
    <label class="control-label" for="inputEmail">Email Address</label>
    <div class="controls">
      {{ Form::text('email', '', array('class' => 'span5', 'placeholder' => 'Email Address')) }}
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      {{ Form::submit() }}
    </div>
  </div>
{{Form::close()}}

@stop