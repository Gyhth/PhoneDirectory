{{ Form::open(array('url'=>'departments/edit/'.$department->id)) }}
    <h1 class="roundBorder">Editing The {{ $department->department_name }} Department</h2>
	<ul class="inputs">
    <li>{{ Form::text('department_name', $department->department_name, array('placeholder'=>'Department Name')) }}</li>
    <li>{{ Form::submit('Edit Department')}}</li>
	<li><a href="{{ '/departments/delete/'.$department->id }}"><input type="button" value="Delete" /></a></li>
{{ Form::close() }}