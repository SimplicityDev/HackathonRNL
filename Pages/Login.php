<?php 
if (!$User->LoginCheck()) {

	if (isset($_POST['submit'])) {
		$Alert = array();
		$ErrCheck = false;

		if ($_POST['submit'] == "Sign in") {
			if (!$User->SetUsername($_POST['Username']) || !$User->SetPassword($_POST['Password'])) {
				array_push($Alert,"Error");
				array_push($Alert,"Please enter valid credentials");

				$ErrCheck = true;
			}

			if ($ErrCheck == false) {
				if ($User->Login() == false) {
					array_push($Alert,"Error");
					array_push($Alert,"Invalid Username or password");

					require 'Forms/loginform.php';
				}
			}else{
				require 'Forms/loginform.php';
			}
		}

		if ($_POST['submit'] == 'Reset') {
			if ($User->SetEmail($_POST['Email']) || empty($_POST['Email'])) {
				array_push($Alert,"Error");
				array_push($Alert,"You must enter a valid emailadress");
				require 'Forms/loginform.php';
			}
			require 'Forms/loginform.php';
		}
		
	}else{// User hasen't pressed login or reset
		require 'Forms/loginform.php';
	}
}else{// if logged in
	RedirectToPage(null, 'dashboard');
}
