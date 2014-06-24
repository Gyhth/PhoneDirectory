{{ Form::open(array('url'=>'users/editpassword/'.$user->id)) }}
    <h1 class="roundBorder">Please enter a new password for {{ $user->account_name }} </h1>
	<ul class="inputs">
    <li>{{ Form::password('password', array('placeholder'=>'Password')) }}</li>
    <li>{{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password')) }}</li>
    <li>{{ Form::submit('Edit Password')}}</li>
{{ Form::close() }}