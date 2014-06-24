@if (count($employees) > 0)
<?php $last_department = null ?>
@foreach($employees as $employee)
@if ($last_department != $employee->department->department_name)
	@if($last_department != null)
		</table>
	@endif
	<h1 class="roundBorder">{{$employee->department->department_name}}</h1>
	<table class="listEmployees">
	<tr><th>Name</th><th>Phone Number</th><th>Alt. Phone Number</th><th>Email</th></tr>
	<tr><td>
	@if(Auth::check())
		<a href="{{ '/employees/edit/'.$employee->id }}">{{$employee->first_name . " " . $employee->last_name }}</a>
	@else
		{{$employee->first_name . " " . $employee->last_name }}
	@endif
	</td><td>{{ $employee->primary_phone_number }}</td><td>{{ $employee->alt_phone_number }}</td><td>{{ $employee->email }}</td></tr>
	<?php $last_department = $employee->department->department_name ?>
@else
	<tr><td>{{$employee->first_name . " " . $employee->last_name }}</td><td>{{ $employee->primary_phone_number }}</td><td>{{ $employee->alt_phone_number }}</td><td>{{ $employee->email }}</td></tr>
	<?php $last_department = $employee->department->department_name ?>
@endif
@endforeach
@else
<h1 class="roundBorder">Error</h1>
<h2 class="errorNotice">No Employees</h2>
@endif 
</table>