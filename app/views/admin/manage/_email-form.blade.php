<h3>Recipients</h3>
<p>The email address/es below will be notified once an order receives.</p>
{{ Form::open(array('action' => 'Admin@updateSettings')) }}

	{{ Form::textarea('recipients', Setting::first()->recipients ?: '', array('class' => 'input-block-level', 'rows' => 4)) }}
	{{ Form::submit('Update recipients', array('class' => 'btn btn-success')) }}

{{ Form::close() }} 