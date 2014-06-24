{{ Form::open(array('url'=>'departments/delete/'.$department->id)) }}
	<h1 class="roundBorders">Are you sure you wish to delete {{$department->department_name}}?</h1>
	<ul class="inputs">
		<li><span class="deleteInform">This action cannot be undone!</span></li>
		<li>{{ Form::submit('Delete')}}</li>
	</ul>
{{ Form::close() }}