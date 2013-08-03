<div class="span3">
  <img src="{{ asset('public/img/logo.png') }}" alt="" />
</div>
<div class="span3"></div>
<div class="span6">
	<h4><small>Welcome </small>{{ Auth::user()->administrator->name }}</h4>
	{{ HTML::link('logout', 'Logout') }}
</div>
