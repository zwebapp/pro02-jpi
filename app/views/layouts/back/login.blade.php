<!DOCTYPE html>
<html>
  <head>
    <title> @section('title')
Administrator Page | JPI @show</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS are placed here -->
    {{ HTML::style('public/css/bootstrap.min.css') }}
    {{ HTML::style('public/css/bootstrap-responsive.min.css') }}
    
    {{ HTML::style('public/css/admin.css') }}
    
    </style>
      
  </head>

  <body class="login">

    <div class="container">

      @if (Session::has('login_errors'))
        <div class="page-alert">
          <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Username or password incorrect.
          </div>
        </div>
      @endif

      <div class="logo">
        {{ HTML::image('public/img/login/logo.png', '') }}
      </div>

      {{ Form::open(array('class' => 'form-horizontal')) }}
         <!-- check for login errors flash var -->

        <div class="control-group">
          {{ Form::label('username', 'Username', array( 'class' => 'control-label')) }}
          <div class="controls">
            {{ Form::text('username', '', array('class' => '', 'placeholder' => 'Username')) }}
          </div>
        </div>
        <div class="control-group">
          {{ Form::label('password', 'Password', array( 'class' => 'control-label')) }}
          <div class="controls">
            {{ Form::password('password', array('class' => '', 'placeholder' => 'Password')) }}
          </div>
        </div>

        <div class="control-group">
          <div class="controls">
            {{ Form::submit('Sign in', array('class' => 'btn')) }}
          </div>
        </div>
      {{ Form::close() }}

    </div> <!-- /container -->

    <!-- Scripts are placed here -->
    {{ HTML::script('public/js/jquery-2.0.3.min.js') }}
    {{ HTML::script('public/js/bootstrap.min.js') }}

  </body>
</html>