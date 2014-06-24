<h1 class="roundBorder">Users</h1>
@if (count($users) > 0)
	<ul class="departmentListing">
	@foreach($users as $user) 
		<li class='departmentItem'>{{ HTML::link('users/editpassword/'.$user->id, $user->account_name) }}</li>
	@endforeach
	</ul>
@else 
	<h2 class="errorNotice">No Users Exist</h2>
@endif 
