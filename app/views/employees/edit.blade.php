{{ Form::open(array('url'=>'employees/edit/'.$employee->id)) }}
    <h1 class="roundBorder">Editing Employee {{$employee->first_name ." ".$employee->last_name}}</h1>
	<ul class="inputs">
    <li>{{ Form::text('first_name', $employee->first_name, array('placeholder'=>'First Name')) }}</li>
	<li>{{ Form::text('last_name', $employee->last_name, array('placeholder'=>'Last Name')) }}</li>
	<li class="selectorLabel">Department</li>
	<li>{{ Form::select('department_id', $departments, $employee->department_id) }}</li>
	<li>{{ Form::text('primary_phone_number', $employee->primary_phone_number, array('placeholder'=>'Primary Phone Number')) }}</li>
	<li>{{ Form::text('alt_phone_number', $employee->alt_phone_number, array('placeholder'=>'Alternate Phone Number')) }}</li>
    <li>{{ Form::text('email', $employee->email, array('placeholder'=>'Email Address')) }}</li>
    <li>{{ Form::submit('Edit Employee')}}</li>
	<li><a href="{{ '/employees/delete/'.$employee->id }}"><input type="button" value="Delete" /></a></li>
{{ Form::close() }}