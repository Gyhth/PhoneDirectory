{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
    <h1 class="roundBorder">Please Login</h1>
	<ul class="login">
		<li>
			{{ Form::text('account_name', null, array('class'=>'input-block-level', 'placeholder'=>'Account Name')) }}
		</li>
		<li>
			{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
		</li>
		<li>
			{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
		</li>
	</ul>
{{ Form::close() }}