{{ Form::open(array('url'=>'users/delete/'.$user->id, 'class'=>'form-signup')) }}
	<h1>Are you sure you wish to delete {{$user->account_name}}?</h1>
	<span>This action can not be undone!</span>
    <br />
    {{ Form::submit('Delete!', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}