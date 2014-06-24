<?php

class Department extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';
	
	public static $rules = array(
    'department_name'=>'required|min:2|unique:departments|regex:/\w+/'
    );
	
	public function employees() {
	     return $this->hasMany('Employee', 'department_id', 'id');
	}
	
}