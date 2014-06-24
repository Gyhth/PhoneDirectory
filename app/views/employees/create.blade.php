{{ Form::open(array('url'=>'employees/create')) }}
    <h1 class="roundBorder">Add a new employee</h1>
	<ul class="inputs">
    <li>{{ Form::text('first_name', null, array('placeholder'=>'First Name')) }}</li>
	<li>{{ Form::text('last_name', null, array('placeholder'=>'Last Name')) }}</li>
	<li class="selectorLabel">Department</li>
	<li>{{ Form::select('department_id', $departments) }}</li>
	<li>{{ Form::text('primary_phone_number', null, array('placeholder'=>'Primary Phone Number')) }}</li>
	<li>{{ Form::text('alt_phone_number', null, array('placeholder'=>'Alternate Phone Number')) }}</li>
    <li>{{ Form::text('email', null, array('placeholder'=>'Email Address')) }}</li>
    <li>{{ Form::submit('Create Employee')}}</li>
{{ Form::close() }}