<h2>Sign up for Company account</h2>
{{ Form::open(array('action' => 'Clients@clientSubmit', 'files' => TRUE)) }}

  <div class="row-fluid">

    <div class="span6">
      
      <h6>Company Information <small class="text-error">All fields are required.</small></h6>
      <div class="control-group {{ ($errors->has('company_name') ? 'error' : '' ) }}">
        <div class="control">
          {{ Form::text('company_name', '', array('class' => 'input-block-level', 'placeholder' => 'Company Name') ) }}
          <span class="help-block">{{ $errors->first('company_name') }}</span>
        </div>
      </div>
      <div class="control-group {{ ($errors->has('company_address') ? 'error' : '' ) }}">
        <div class="control">
          {{ Form::textarea('company_address', '', array('class' => 'input-block-level', 'placeholder' => 'Company Address', 'rows' => '3') ) }}
          <span class="help-block">{{ $errors->first('company_address') }}</span>
        </div>
      </div>
      <div class="control-group {{ ($errors->has('contact_no') ? 'error' : '' ) }}">
        <div class="control">
          {{ Form::text('contact_no', '', array('class' => 'input-block-level', 'placeholder' => 'Contact numbers') ) }}
          <span class="help-block">{{ $errors->first('contact_no') }}</span>
        </div>
      </div>

      <h6>Contact Personnel Information <small class="text-error">All fields are required.</small></h6>

      <div class="control-group {{ ($errors->has('lastname') ? 'error' : '' ) }}">
        <div class="control">
          {{ Form::text('lastname', '', array('class' => 'input-block-level', 'placeholder' => 'Lastname') ) }}
          <span class="help-block">{{ $errors->first('lastname') }}</span>
        </div>
      </div>

      <div class="control-group {{ ($errors->has('firstname') ? 'error' : '' ) }}">
        <div class="control">
          {{ Form::textarea('firstname', '', array('class' => 'input-block-level', 'placeholder' => 'Firstname', 'rows' => '3') ) }}
          <span class="help-block">{{ $errors->first('firstname') }}</span>
        </div>
      </div>    

      <div class="control-group {{ ($errors->has('email') ? 'error' : '' ) }}">
        <div class="control">
          {{ Form::text('email', '', array('class' => 'input-block-level', 'placeholder' => 'Email Address') ) }}
          <span class="help-block">{{ $errors->first('email') }}</span>
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
            @if ($errors->has()) 
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
        {{ Form::hidden('lookup_user_type', 7)}}
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