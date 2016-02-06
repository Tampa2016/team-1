<?php



	include "classes.php";


	$func = isset($_POST['func']) ? $_POST['func'] : "";
	#$var = isset($_POST['var']) ? $_POST['var'] : "";



	if($func == "create-account"){
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$user  = isset($_POST['user']) ? $_POST['user'] : "";
		$pass  = isset($_POST['pass']) ? $_POST['pass'] : "";
		if($email != "" && $user != "" && $pass != ""){
			$objUser = new users();
			$objExists = new exists();
			
			if(!$objExists-> user_exists($user))){
				if(!$objUser->email_exists($email){
					$objUser->create_user($email, $user, $pass);
				} else{
					echo '<p style="color:red;">There is a user with that email already!</p>';
				}
			}else{
				echo '<p style="color:red;">There is a user with that username already!</p>';
			}

		} else{
			echo '<p style="color:red;">One or More Fields Were Left Blank</p>';
		}
	}

	if($func == "account-login"){
		$user  = isset($_POST['user']) ? $_POST['user'] : "";
		$pass  = isset($_POST['pass']) ? $_POST['pass'] : "";

		$objExists = new exists();

		if($objExists-> user_exists($user)){
			#echo '<p style="color:green;">Account Located!</p>';
			$objExists = new exists();
			if($objExists->pass_match($user,$pass)){
				$objSession = new session();
				$objSession->set_session($user);
				echo "loggedin";
			}else{
				echo '<p style="color:red;">Your password does not match the database!</p>';
			}

		}
		else{
			echo '<p style="color:red;">Can\'t find account!</p>';
		}

	}
	if($func == "account-logout"){

		$_SESSION[SESSION_USERNAME] = "";
		$_SESSION[SESSION_LOGGEDIN] = 0;

		session_destroy();

		header("index");

		echo "logout";

	}

































?>