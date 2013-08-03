<h3>Recipients</h3>
<p>The email address/es below will be notified once an order receives.</p>
{{ Form::open(['action' => 'Admin@updateSettings']) }}

	{{ Form::textarea('recipients', Setting::first()->recipients ?: '', ['class' => 'input-block-level', 'rows' => 4 ]) }}
	{{ Form::submit('Update recipients', ['class' => 'btn btn-success']) }}

{{ Form::close() }} 