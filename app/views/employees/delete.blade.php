{{ Form::open(array('url'=>'employees/delete/'.$employee->id)) }}
	<h1 class="roundBorder">Are you sure you wish to delete {{$employee->first_name . " " . $employee->last_name}}?</h1>
    	<ul class="inputs">
		<li><span class="deleteInform">This action cannot be undone!</span></li>
		<li>{{ Form::submit('Delete')}}</li>
	</ul>
{{ Form::close() }}