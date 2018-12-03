<?php

class LoginController extends Controller{

	protected $userObject;

	 public function do_login() {
		 //handle login

		 $this->userObject = new User();

		// var_dump($_POST);

		$password = $_POST['password'];
		//$password_db = password_hash($password,PASSWORD_DEFAULT);


		if($this->userObject->checkUser($_POST['email'],$_POST['password'])) {

			$userInfo = $this->userObject->getUserFromEmail($_POST['email']);

			$_SESSION['uID'] = $userInfo['uID'];

			if(strlen($_SESSION['redirect']) > 0 ){
					$view=$_SESSION['redirect'];
					unset($_SESSION['redirect']);
					header('Location: '.BASE_URL.$view);
			}
			else {
				header('Location: '.BASE_URL);

			}

		}
		else {
			$this->set('error','Wrong password/email combination');
			//echo "Try Again";
		}

		}

public function logout() {
	//unset the session id
	unset($_SESSION['uID']);

	// closet the session
		session_write_close();

		//send to the homepage
		header('Location: '.BASE_URL);

}


}
