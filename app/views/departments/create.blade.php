{{ Form::open(array('url'=>'departments/create')) }}
    <h1 class="roundBorders">Add a Department</h2>
    <ul class="inputs">
    <li>{{ Form::text('department_name', null, array('placeholder'=>'Department Name')) }}</li>
    <li>{{ Form::submit('Add Department')}}</li>
	</ul>
{{ Form::close() }}