<?php include "_include/classes.php"; include "_include/theme/head.php";   ?>

<script type="text/javascript"> $('nav').css('display','none'); </script>

<?php

	$objUser = new users();

	$username = $objUser->user_info('get_username');

	print_r($_SESSION[SESSION_USERNAME]);
	echo "<br>";
	print_r($_SESSION[SESSION_LOGGEDIN]);

?>


<?php $objSession = new session(); 
	  if($objSession->is_logged_in()): ?>
<h3>Welcome ... <?php echo $username; ?></h3>
<?php else: ?>
<h3>Not Logged In</h3>
<?php endif;?>

<?php include "_include/theme/foot.php"; ?>