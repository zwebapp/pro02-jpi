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
    
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
      
  </head>

  <body>

    <div class="container">

      {{ Form::open() }}
        <h2 class="form-signin-heading">Please sign in</h2>
         <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
          <span class="error">Username or password incorrect.</span>
        @endif

        {{ Form::text('username', '', ['class' => 'input-block-level', 'placeholder' => 'Username']) }}
        {{ Form::password('password', ['class' => 'input-block-level', 'placeholder' => 'Password']) }}
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>

      {{ Form::close() }}

    </div> <!-- /container -->

    <!-- Scripts are placed here -->
    {{ HTML::script('public/js/jquery-2.0.3.min.js') }}
    {{ HTML::script('public/js/bootstrap.min.js') }}

  </body>
</html>