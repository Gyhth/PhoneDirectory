<h1 class="roundBorder">Department Names</h1>
@if (count($departments) > 0)
	<ul class="departmentListing">
	@foreach($departments as $department) 
		<li class='departmentItem'>{{ HTML::link('departments/edit/'.$department->id, $department->department_name) }}</li>
	@endforeach
	</ul>
@else 
	<h2 class="errorNotice">No Departments Exist</h2>
@endif 
