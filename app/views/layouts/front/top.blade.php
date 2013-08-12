<div class="row-fluid">
	<div class="pull-left">
		<a href="{{ url('/') }}"> 
			{{ HTML::image('public/img/logo.png') }}
		</a>
	</div>
	<div class="pull-right">
		<div class="auth">
			@if(Auth::guest() || Auth::user()->is_client == FALSE)
			{{ Form::open(array('url' => 'client/login', 'method' => 'POST', 'class' => 'form-inline'))}}
				
				{{ Form::text('username', '', array('class' => 'input-small', 'placeholder' => 'Username'))}}
			  <input name="password" type="password" class="input-small" placeholder="Password">

			  <label class="checkbox">
			    <input type="checkbox"> Remember me
			  </label>
			  {{ Form::submit('Login', array('class' => 'btn')) }}
				
			{{ Form::close() }}
			<div class="reg-for">
				{{HTML::link('/register', 'Register')}} | {{HTML::link('forgot-password', 'Forgot Password?')}}
			</div>
			@else 
				<div class="reg-for">
					{{HTML::link('profile', 'My Account')}} | {{HTML::link('logout', 'Logout')}}
				</div>
				<p class="greet"> Welcome {{ Auth::user()->client->company_name ?: Auth::user()->client->firstname }} </p>
			@endif

		</div>
		<nav>
			@include('layouts.front.nav')
		</nav>
	</div>
</div>