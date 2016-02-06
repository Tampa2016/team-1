<?php session_start(); ob_start();

/**/
define('BASEURL', 'http://localhost/code4good/team-1');

define('DBHOST', 'ec2-54-163-131-112.compute-1.amazonaws.com');
define('DBUSER','root');
define('DBPASS','code4good');
define('DBNAME','tampa1');

define('SESSION_USERNAME', 'USERNAME');
define('SESSION_LOGGEDIN', 'LOGGEDIN');


/**
* 
*/
class session {
	
	function is_logged_in(){
		if (!empty($_SESSION[SESSION_LOGGEDIN]) && $_SESSION[SESSION_LOGGEDIN] == 1 ) {
			return TRUE;
		}
		else{ return FALSE;	}
	}

	function set_session($username){
		$_SESSION[SESSION_USERNAME] = $username;
		$_SESSION[SESSION_LOGGEDIN] = 1;
	}

	function loggout_session(){
		$_SESSION[SESSION_USERNAME] = "";
		$_SESSION[SESSION_LOGGEDIN] = 0;

		session_destroy();
	}

}


/**
* 
*/
class users {
	public $conn;

	function create_user($username, $password){

		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 

		$cols = " pk, badges, points, user, pass ";

		$badges = mysql_escape_string(serialize(array('A')));

		$password = md5($password);

		$vals = " null, '$badges', 0, '$username', '$password'  ";

		$query = mysqli_query($conn, "INSERT INTO `user` ($cols) VALUES ($vals) ") or die(mysqli_error($conn)); 
	}

	function user_info($func){
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
		$user = isset( $_SESSION[SESSION_USERNAME] ) ? $_SESSION[SESSION_USERNAME] : "";
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE user = 'user' " );
		$row = mysqli_fetch_array($query, MYSQLI_BOTH);
		
		if($func = "get_badges"){
			$badges = unserialize($row['badges']);
			return $badges;
		}
		if($func = "get_points"){
			return number_format ( intval($row['points']) );
		}
		if($func = "get_username"){
			return $row['user'];
		}
		if($func = "get_password"){
			return $row['pass'];
		}
	}

}

















