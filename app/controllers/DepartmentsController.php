<?php
 
class DepartmentsController extends BaseController {
	protected $layout = "layouts.main";
	
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth');
		$this->beforeFilter('checkParam', array('only' => array('getDelete', 'postDelete')));
	}
	
	public function getCreate() {
		$this->layout->content = View::make('departments.create');
	}
	
	public function postCreate() {
		$validator = Validator::make(Input::all(), Department::$rules);
		if ($validator->passes()) {
				$department = new Department;
				$department->department_name = Input::get('department_name');
				$department->save();
				return Redirect::to('departments/index')->with('message', 'Department ' . $department->department_name . ' now created.');
		} else {
			return Redirect::to('departments/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
		}
	}
	
	public function getEdit($id) {
		$department = Department::find($id);
		$this->layout->content = View::make('departments.edit')->with(array('department' => $department));
	}
	
	public function postEdit($id) {
		$validator = Validator::make(Input::all(), Department::$rules);
		if ($validator->passes()) {
			$department = Department::find($id);
			$oldDepartmentName = $department->department_name;
			$department->department_name = Input::get('department_name');
			$department->save();
			return Redirect::to('departments/index')->with('message', 'Department' . $oldDepartmentName . ' renamed to ' . $department->department_name);
		} else {
			return Redirect::to('departments/edit/'.$id)->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
		}
	}
	
	public function getIndex() {
		$departments = Department::all();
		$this->layout->content = View::make('departments.list')->with(array('departments' => $departments));
	}
	
	public function getDelete($id) {
		$department = Department::findOrFail($id);
		$this->layout->content = View::make('departments.delete')->with(array('department'=>$department));
	}
	
	public function postDelete($id) {
		$department = Department::findOrFail($id);
		if ($department->employees->count() > 0) {
			//Can not delete, as employees are linked to the department. 
			return Redirect::to('users/dashboard')->with('message', 'Unable to delete Department. Still associated with Employees.');
		}
		else {
			$departmentName = $department->department_name;
			$department->delete();
			return Redirect::to('users/dashboard')->with('message', 'Deleted Department: ' . $departmentName);
		}
	}
}
?>