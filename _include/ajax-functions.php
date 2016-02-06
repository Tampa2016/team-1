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
			$objUser->create_user($email, $user, $pass);
		} else{
			echo '<p style="color:red;">One or More Fields Were Left Blank</p>';
		}
	}

































?>