<?php
 
class UsersController extends BaseController {
	protected $layout = "layouts.main";
	
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('except'=>array('getLogin', 'postSignin', 'getLogout')));
		$this->beforeFilter('checkParam', array('only' => array('getDelete', 'postDelete', 'getEditpassword', 'postEditpassword')));
	}
	
	public function getRegister() {
		$this->layout->content = View::make('users.register');
	}
	
	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
				$user = new User;
				$user->account_name = Input::get('account_name');
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));
				$user->save();
				return Redirect::to('users/dashboard')->with('message', 'User Now Registered.');
		} else {
			return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
		}
	}
	
	public function getLogin() {
		$this->layout->content = View::make('users.login');
	}
	
	public function postSignin() {
		if (Auth::attempt(array('account_name'=>Input::get('account_name'), 'password'=>Input::get('password')))) {
			return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('users/login')
			->with('message', 'Your username/password combination was incorrect')
			->withInput();
		}
	}
	
	public function getDashboard() {
		$this->layout->content = View::make('users.dashboard');
	}
	
	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
	
	public function getDelete($id) {
		$user = User::findOrFail($id);
		$this->layout->content = View::make('users.delete')->with(array('user'=>$user));
	}
	
	public function postDelete($id) {
		$user = User::findOrFail($id);
		if ($user->account_name !== "gmerkley") {
			$accountName = $user->account_name;
			$user->delete();
			return Redirect::to('users/dashboard')->with('message', 'Deleted User: ' . $accountName);
		}
		else {
			return Redirect::to('users/dashboard')->with('message', 'Invalid. Unable to delete user Admin.');
		}
	}
	
	public function getEditpassword($id) {
		$user = User::findOrFail($id);
		$this->layout->content = View::make('users.editPassword')->with(array('user'=>$user));
	}
	
	public function postEditpassword($id) {
		$user = User::findOrFail($id);
		$rules = array(
			'password'=>'required|alpha_num|between:6,12|confirmed',
			'password_confirmation'=>'required|alpha_num|between:6,12'
		);
    	$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {		
				$user->password = Hash::make(Input::get('password'));
				$user->save();
				return Redirect::to('users/dashboard')->with('message', $user->account_name . '\'s Password Updated.');
		} else {
			return Redirect::to('users/editpassword/'.$id)->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
		}
	}
	
	public function getIndex() {
		$users = User::orderby('account_name', 'asc')->get();
		$this->layout->content = View::make('users.list')->with(array('users'=>$users));
	}
}
?>