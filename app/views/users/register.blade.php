{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
    <h1 class="roundBorder">Add a new user</h1>
	<ul class="inputs">
    <li>{{ Form::text('account_name', null, array('class'=>'input-block-level', 'placeholder'=>'Account Name')) }}</li>
    <li>{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}</li>
    <li>{{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}</li>
    <li>{{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}</li>
    <li>{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}</li>
{{ Form::close() }}