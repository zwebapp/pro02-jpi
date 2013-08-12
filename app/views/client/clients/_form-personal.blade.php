<h2>Sign up for Personal account</h2>
{{ Form::open(array('action' => 'Clients@clientSubmit', 'files' => TRUE)) }}

  <div class="row-fluid">

    <div class="span6">
      <h6>Personal Information <small class="text-error">All fields are required.</small></h6>
      <div class="control-group {{ ($errors->has('lastname') ? 'error' : '' ) }}">
        <div class="controls">
          {{ Form::text('lastname', '', array('placeholder' => 'Lastname', 'class' => 'input-block-level'))}}
          @if ($errors->has('lastname')) 
            <span class="help-block">{{ $errors->first('lastname') }}</span>
          @endif
        </div>
      </div>
      <div class="control-group {{ ($errors->has('firstname') ? 'error' : '' ) }}">
        <div class="controls">
          {{ Form::text('firstname', '', array('placeholder' => 'Firstname', 'class' => 'input-block-level'))}}
          @if ($errors->has('firstname')) 
            <span class="help-block">{{ $errors->first('firstname') }}</span>
          @endif
        </div>
      </div>
      <div class="control-group {{ ($errors->has('email') ? 'error' : '' ) }}">
        <div class="controls">
          {{ Form::text('email', '', array('placeholder' => 'Email address', 'class' => 'input-block-level'))}}
          @if ($errors->has('email')) 
            <span class="help-block">{{ $errors->first('email') }}</span>
          @endif
        </div>
      </div>
      <div class="control-group {{ ($errors->has('birthday') ? 'error' : '' ) }}">
        <div class="controls">
          <div class="input-append" id="datetimepicker">
            {{ Form::text('birthday', null , array('data-format' => 'yyyy-MM-dd', 'placeholder' => 'Birthday', 'class' => 'input-block-level'))}}
            <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
            @if ($errors->has('birthday')) 
              <span class="help-block">{{ $errors->first('birthday') }}</span>
            @endif
          </div>
        </div>
      </div>
      <div class="control-group {{ ($errors->has('address') ? 'error' : '' ) }}">
        <div class="controls">
          {{ Form::textarea('address', null, array('placeholder' => 'Delivery Address', 'class' => 'input-block-level', 'rows' => 3))}}
          @if ($errors->has('address')) 
            <span class="help-block">{{ $errors->first('address') }}</span>
          @endif
        </div>
      </div>

      <div class="control-group {{ ($errors->has('contact_no') ? 'error' : '' ) }}">
        <div class="controls">
          {{ Form::text('contact_no', '', array('placeholder' => 'Contact number/s', 'class' => 'input-block-level'))}}
          @if ($errors->has('contact_no')) 
            <span class="help-block">{{ $errors->first('contact_no') }}</span>
          @endif
        </div>
      </div>

      <h6>Account Information <small class="text-error">All fields are required.</small></h6>

      <div class="control-group {{ ($errors->has('username') ? 'error' : '' ) }}">
        <div class="controls">
          {{ Form::text('username', '', array('placeholder' => 'Username', 'class' => 'input-block-level'))}}
          @if ($errors->has('username')) 
            <span class="help-block">{{ $errors->first('username') }}</span>
          @endif
        </div>
      </div>

      <div class="control-group {{ ($errors->has('password') ? 'error' : '' ) }}">
        <div class="controls">
          <input name="password" type="password" class="input-block-level" placeholder="Password"/>
          @if ($errors->has('password')) 
            <span class="help-block">{{ $errors->first('password') }}</span>
          @endif
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <input name="password_confirmation" type="password" class="input-block-level" placeholder="Retype Password"/>
        </div>
      </div>

      <h6>Security Question <small class="text-error">All fields are required.</small></h6>

      <div class="control-group">
        <div class="control">
          {{ Form::select('lookup_security_question', Lookup::securityQuestions()->lists('value', 'id'), 0, array('class' => 'input-block-level')) }}
        </div>
      </div>
      <div class="control-group {{ ($errors->has('security_question_answer') ? 'error' : '' ) }}">
        <div class="control">
          {{ Form::text('security_question_answer', '', array('class' => 'input-block-level', 'placeholder' => 'Security answer') ) }}
          @if ($errors->has('security_question_answer')) 
            <span class="help-block">{{ $errors->first('security_question_answer') }}</span>
          @endif
        </div>
      </div>

    </div>

    <div class="span6">
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
              {{ Form::file('image', array('id' => 'image')) }}
            </span>
            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            @if ($errors->has('image')) 
              <span class="help-block">{{ $errors->first('image') }}</span>
            @endif
          </div>

        </div>
      </div>
    </div>
    
  </div>

  <div class="row-fluid">
    <div class="span10 offset2">
      <div class="control-group">
        {{ Form::hidden('lookup_user_type', 6)}}
        <div class="control">
          <label for="">
            {{ Form::checkbox('terms', null, true) }} I have read and understood the terms and agreement
            {{ Form::submit('Sign up', array('class' => 'btn btn-primary'))}}
          </label>
          @if ($errors->has('terms')) 
            <p class=" {{ ($errors->has('terms') ? 'text-error' : '' ) }}">{{ $errors->first('terms') }}</p>
          @endif
        </div>
      </div>
    </div>
  </div>
{{ Form::close()}}