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
    
    @section('other-styles')
      
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <!-- Content -->
    @yield('content')


    <!-- Scripts are placed here -->
    {{ HTML::script('public/js/jquery-2.0.3.min.js') }}
    {{ HTML::script('public/js/bootstrap.min.js') }}

  </body>
</html>