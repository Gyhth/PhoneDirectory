<?php

class Employee extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'employees';

	public static $rules = array(
    'first_name'=>'required|alpha_num|min:2',
    'last_name'=>'required|alpha_num|min:2',
	'department_id'=>'required|numeric|exists:departments,id',
	'primary_phone_number'=>'required',
	'email'=>'required|email'
    );
	
	public function department() {
	     return $this->belongsTo('Department', 'department_id', 'id')->orderby('department_name');
	}
	
}
