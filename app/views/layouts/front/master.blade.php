<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> @section('title')
JJED | JPI @show</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{ HTML::style('public/css/bootstrap.min.css') }}
    {{ HTML::style('public/css/flexslider.css') }}
    {{ HTML::style('public/css/client.css') }}
    
    @section('additionalCss')
    @show
      
  </head>

  <body>
    
    <header class="container-semifluid"> 
      @include('layouts.front.top') 
    </header>

    @section('banner')
    @show

    <div class="container-semifluid">

      <div class="main" role="main">
        @yield('content')
      </div>
      
      <footer> 
        @include('layouts.front.footer')
      </footer>

    </div>


    @if(! Auth::guest() && Auth::user()->is_client == TRUE )
      @include('_partials.cart');
    @endif

    {{-- Best Place for modal boxes --}}
    
    @section('extraHtml')
    @show


    <!-- Scripts are placed here -->
    {{ HTML::script('public/js/jquery-2.0.3.min.js') }}
    {{ HTML::script('public/js/eldarion-ajax.min.js') }}
    {{ HTML::script('public/js/bootstrap-switch.min.js') }}
    {{ HTML::script('public/js/jquery.flexslider-min.js') }}
    {{ HTML::script('public/js/jcarousel.min.js') }}
    {{ HTML::script('public/js/ajaxfileupload.js') }}
    {{ HTML::script('public/js/main.js') }}

    @section('extraJs')
    @show

  </body>
</html>