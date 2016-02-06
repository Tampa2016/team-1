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


function add_lat_long($longtitude, $latitude) {
	
	$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 

	$cols = "pic_pk, pic_log,pic_lat,pic_name,pic_url,pic_size,pic_type,pic_timestamp,review_pk";

	$vals = " null,'$longtitude','$latitude', 'test','test','test','test','test','test' ";

	$query = mysqli_query($conn, "INSERT INTO `picture` ($cols) VALUES ($vals) ") or die(mysqli_error($conn)); 
	if ($query) {
		echo '<p style="color:green;">This is saved!</p>';
	}else{
		echo '<p style="color:red;">Didnt save!</p>';
	}
}




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

		header("index");
	}

}


/**
* 
*/
class users {
	public $conn;

	function create_user($email, $username, $password){

		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 

		$cols = " user_pk, user_name, user_pass, user_email, user_badges, user_points, user_timestamp ";

		$badges = mysql_escape_string(serialize(array('A')));

		$password = md5($password);

		$vals = " null, '$username', '$password', '$email', '$badges', 0, null ";

		$query = mysqli_query($conn, "INSERT INTO `user` ($cols) VALUES ($vals) ") or die(mysqli_error($conn)); 
		if ($query) {
			echo '<p style="color:green;">Your account is now active!</p>';
		}else{
			echo '<p style="color:red;">Something went wrong!</p>';
		}
	}

	function user_info($func){
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
		$user = isset( $_SESSION[SESSION_USERNAME] ) ? $_SESSION[SESSION_USERNAME] : "";
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE user_name = '$user' " );
		if ($query) {
			$row = mysqli_fetch_array($query, MYSQLI_BOTH);
			
			if($func == "get_badges"){
				$badges = unserialize($row['user_badges']);
				#return $badges;
			}
			if($func == "get_points"){
				return number_format ( intval($row['user_points']) );
			}
			if($func == "get_username"){
				return $row['user_name'];
			}
			if($func == "get_password"){
				return $row['user_pass'];
			}
		}else{ echo "fail";	}
	}

}


class exists{
	public $conn;

	function user_exists($name){
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE user_name = '$name' " );
		$numrows =  mysqli_num_rows($query);
		if($numrows == 1){
			return true;
		} else{ return false; }
	}
	function email_exists($email){
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE user_email = '$email' " );
		$numrows =  mysqli_num_rows($query);
		if($numrows == 1){
			return true;
		} else{ return false; }		
	}
	function pass_match($user, $pass){
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE user_name = '$user' " );
		if ($query) {
			$row = mysqli_fetch_array($query, MYSQLI_BOTH);

			$stored_pass = $row['user_pass'];

			$test_pass = md5($pass);

			if($test_pass == $stored_pass){
				return true;
			} else { return false;}

		}else{	}
	}
}

class reviews {

	function get_info($userpk){
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
		$user = isset( $_SESSION[SESSION_USERNAME] ) ? $_SESSION[SESSION_USERNAME] : "";
		$query = mysqli_query($conn, "SELECT * FROM `review` WHERE user_pk = '$user' " );
		if ($query) {
			$row = mysqli_fetch_array($query, MYSQLI_BOTH);
			
			if($func == "get_pk"){
				return $row['review_pk'];
			}
			if($func == "get_points"){
				return number_format ( intval($row['user_points']) );
			}
			if($func == "get_username"){
				return $row['user_name'];
			}
			if($func == "get_password"){
				return $row['user_pass'];
			}
		}else{ echo "fail";	}
	}

}














