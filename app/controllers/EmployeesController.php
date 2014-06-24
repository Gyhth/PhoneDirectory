<?php
 
class EmployeesController extends BaseController {
	protected $layout = "layouts.main";
	
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('except'=>array('getList')));
		$this->beforeFilter('checkParam', array('only' => array('getDelete', 'postDelete', 'getEdit', 'postEdit')));
	}
	
	public function getCreate() {
		$departments = Department::orderBy('department_name', 'asc')->lists('department_name','id');
		$this->layout->content = View::make('employees.create')->with(array('departments'=>$departments));
	}
	
	public function postCreate() {
		$validator = Validator::make(Input::all(), Employee::$rules);

		if ($validator->passes()) {
				$employee = new Employee;
				$employee->first_name = Input::get('first_name');
				$employee->last_name = Input::get('last_name');
				$employee->department_id = Input::get('department_id');
				$employee->primary_phone_number = Input::get('primary_phone_number');
				$employee->alt_phone_number = Input::get('alt_phone_number');
				$employee->email = Input::get('email');
				$employee->save();
				return Redirect::to('employees/list')->with('message', 'Employee Now Added.');
		} else {
			return Redirect::to('employees/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
		}
	}
	
	public function getList() {
		$employees = Employee::all();
		$this->layout->content = View::make('employees.list')->with(array('employees' => $employees));
	}
	
	public function getEdit($id) {
		$employee = Employee::find($id);
		$departments = Department::orderby('department_name')->lists('department_name','id');
		$this->layout->content = View::make('employees.edit')->with(array('employee' => $employee, 'departments' => $departments));
	}
	
	public function postEdit($id) {
		$employee = Employee::findOrFail($id);
    	$validator = Validator::make(Input::all(), Employee::$rules);
		if ($validator->passes()) {		
				$employee->first_name = Input::get('first_name');
				$employee->last_name = Input::get('last_name');
				$employee->department_id = Input::get('department_id');
				$employee->primary_phone_number = Input::get('primary_phone_number');
				$employee->alt_phone_number = Input::get('alt_phone_number');
				$employee->email = Input::get('email');
				$employee->save();
				return Redirect::to('users/dashboard')->with('message', $employee->first_name . ' '.$employee->last_name.'\'s Password Updated.');
		} else {
			return Redirect::to('employees/edit/'.$id)->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
		}
	}
	
	public function getDelete($id) {
		$employee = Employee::findOrFail($id);
		$this->layout->content = View::make('employees.delete')->with(array('employee'=>$employee));
	}
	
	public function postDelete($id) {
		$employee = Employee::findOrFail($id);
		$employeeName = $employee->first_name . " " . $employee->last_name;
		$employee->delete();
		return Redirect::to('users/dashboard')->with('message', 'Deleted Employee: ' . $employeeName);
	}
	
}
?>