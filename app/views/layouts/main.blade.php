<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Directory</title>
	{{ HTML::style('css/main.css')}}
  </head>
 
  <body>
     <header class="roundBorder">
        <nav id="mainNav">
		<h1>Phone Directory</h1>
            <ul id="navHeader">
				<li>{{ HTML::link('employees/list', 'Contact List') }}</li>   
                @if(!Auth::check()) 
                    <li>{{ HTML::link('users/login', 'Login') }}</li>  
                @else
				<li>Users
					<ul>
						<li>{{ HTML::link('users/index', 'List Users') }}</li>
						<li>{{ HTML::link('users/register', 'Add User') }}</li>
					</ul>
				</li>
				<li>
					Employees
					<ul>
						<li>{{ HTML::link('employees/create', 'Add Employee') }}</li>
					</ul>
				</li>
				<li>
					Department
					<ul>
						<li>{{ HTML::link('departments/index', 'List Departments') }}</li>
						<li>{{ HTML::link('departments/create', 'Add Department') }}</li>
					</ul>
				</li>
                <li>{{ HTML::link('users/logout', 'Logout') }}</li>
                @endif 
            </ul> 
        </nav>
    </header> 
			@if(Session::has('message'))
			<div class="container roundBorder wrapper">
				<h1 class="roundBorder">Notification</h1>
				<p class="alert">{{ Session::get('message') }}</p>
				@if (count($errors) > 0)
					<ul class='css-errorList'>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				@endif
			</div>
			@endif
			<div class="container roundBorder">
		<div class="content roundBorder wrapper">
			{{ $content }}
		</div>
	</div>
  </body>
</html>