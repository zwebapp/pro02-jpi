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
    
    
    @section('additionalCss')
    @show
      
  </head>

  <body>

    <div class="container-fluid">
      <div class="row-fluid header">
          @include('layouts.back.top')        
      </div>
      
      <div class="row-fluid">

        <div class="span2">
          {{-- Include the template part for the sidebar--}}
          @include('layouts.back.sidebar')
        </div>

        <div class="span10">
          @yield('content')      
        </div>
        
      </div>

      <div class="row-fluid footer"></div>

    </div>

    {{-- Best Place for modal boxes --}}
    
    @section('extraHtml')
    @show


    <!-- Scripts are placed here -->
    {{ HTML::script('public/js/jquery-2.0.3.min.js') }}
    {{ HTML::script('public/js/bootstrap.min.js') }}
    {{ HTML::script('public/js/eldarion-ajax.min.js') }}
    {{ HTML::script('public/js/admin.js') }}

    @section('extraJs')
    @show

  </body>
</html>