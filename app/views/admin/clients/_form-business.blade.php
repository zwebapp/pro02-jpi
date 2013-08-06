{{ Form::open(array('action' =>  Session::has('edit') ? 'Clients@update' : 'Clients@save', 'method' => 'get', 'class' => 'with-upload form-horizontal')) }}

<div class="wrapper">
  <h4> {{  Session::has('edit') ? "Edit " : "Add new " }} company client </h4>
  
  {{ Notification::showSuccess('<div class="alert alert-success"> :message </div>') }}

  <div class="pull-left info">
    
    <h6>Login credentials <small class="text-error">All fields are required.</small></h6>
    {{ Form::hidden('lookup_user_type', 7)}}
    {{ Form::hidden('is_client', true)}}
    <div class="control-group {{ ($errors->has('username') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::text('username', '', ['class' => 'input-xlarge', 'placeholder' => 'Username'] ) }}
        <span class="help-block">{{ $errors->first('username') }}</span>
      </div>
    </div>
    <div class="control-group {{ ($errors->has('password') ? 'error' : '' ) }}">
      <div class="control">
        <input type="password" name="password" placeholder="Password" class="input-xlarge" />
        <span class="help-block">{{ $errors->first('password') }}</span>
      </div>
    </div>
    <div class="control-group {{ ($errors->has('password_confirmation') ? 'error' : '' ) }}">
      <div class="control">
        <input type="password" name="password_confirmation" placeholder="Confirm password" class="input-xlarge" />
        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
      </div>
    </div>

    <h6>Company Information <small class="text-error">All fields are required.</small></h6>
    <div class="control-group {{ ($errors->has('company_name') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::text('company_name', '', ['class' => 'input-xlarge', 'placeholder' => 'Company Name'] ) }}
        <span class="help-block">{{ $errors->first('company_name') }}</span>
      </div>
    </div>
    <div class="control-group {{ ($errors->has('company_address') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::textarea('company_address', '', ['class' => 'input-xlarge', 'placeholder' => 'Company Address', 'rows' => '3'] ) }}
        <span class="help-block">{{ $errors->first('company_address') }}</span>
      </div>
    </div>
    <div class="control-group {{ ($errors->has('contact_no') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::text('contact_no', '', ['class' => 'input-xlarge', 'placeholder' => 'Contact numbers'] ) }}
        <span class="help-block">{{ $errors->first('contact_no') }}</span>
      </div>
    </div>


    <h6>Contact Personnel Information <small class="text-error">All fields are required.</small></h6>

    <div class="control-group {{ ($errors->has('lastname') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::text('lastname', '', ['class' => 'input-xlarge', 'placeholder' => 'Lastname'] ) }}
        <span class="help-block">{{ $errors->first('lastname') }}</span>
      </div>
    </div>

    <div class="control-group {{ ($errors->has('firstname') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::textarea('firstname', '', ['class' => 'input-xlarge', 'placeholder' => 'Firstname', 'rows' => '3'] ) }}
        <span class="help-block">{{ $errors->first('firstname') }}</span>
      </div>
    </div>    

    <div class="control-group {{ ($errors->has('email') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::text('email', '', ['class' => 'input-xlarge', 'placeholder' => 'Email Address'] ) }}
        <span class="help-block">{{ $errors->first('email') }}</span>
      </div>
    </div>

    <h6>Security Question <small class="text-error">All fields are required.</small></h6>

    <div class="control-group">
      <div class="control">
        {{ Form::select('lookup_security_question', Lookup::securityQuestions()->lists('value', 'id'), 0, ['class' => 'input-xlarge']) }}
        <span class="help-block"></span>
      </div>
    </div>
    <div class="control-group {{ ($errors->has('security_question_answer') ? 'error' : '' ) }}">
      <div class="control">
        {{ Form::text('security_question_answer', '', ['class' => 'input-xlarge', 'placeholder' => 'Security answer'] ) }}
        <span class="help-block">{{ $errors->first('security_question_answer') }}</span>
      </div>
    </div>

    <h6>Activate Account</h6>

    <div class="control-group">
      <div class="control">
        {{ Form::checkbox('is_verified', '', '', ['class' => 'for-switch']) }}
      </div>
    </div>

  </div>



  <div class="pull-left image">
    
    <div class="control-group {{ ($errors->has('image') ? 'error' : '' ) }}">

      <div class="controls">

        <div class="fileupload fileupload-{{ isset($image) ? 'exists' : 'new' }}" data-provides="fileupload">
          <div class="fileupload-new thumbnail">
            {{ HTML::image('public/img/no-image-client.gif', '') }}
          </div>
          <div class="fileupload-preview fileupload-exists thumbnail" >
            {{ HTML::image(isset($image) ?  json_decode($image)->thumb : 'public/img/thumb-no-image-product.jpg' , '') }}
          </div>
          <span class="btn btn-file">
            <span class="fileupload-new">Select image</span>
            <span class="fileupload-exists">Change</span>
            {{ Form::file('image', ['id' => 'image']) }}
          </span>
          <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
          <span class="help-block">{{ $errors->first('image') }}</span>
        </div>

      </div>

    </div>

  </div>
  
</div>

<div class="modal-footer">
  {{ HTML::image('public/img/preload.gif', '', ['class' => 'hidden', 'id' => 'preload']) }}
  @if (isset($id))
    {{ Form::hidden('id', $id) }}
  @endif
  {{ Form::button('Close', array('data-dismiss' => 'modal', 'aria-hidden' => 'true', 'class' => 'btn')) }}
  {{ Form::submit( Session::has('edit') ? 'Update' : 'Add Company Client', array('class' => 'btn btn-primary', 'data-refresh' => '.modal-body')) }}
</div>

{{ Form::close() }}