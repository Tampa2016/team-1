

<div class="modal-folder">
	

<!-- Small modal -->

<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" style="padding:15px;">
			<form method="POST">
				<div id="login-results"></div>
				<div class="form-group">
					<input type="text" name="loginUsername" class="form-control" placeholder="Username" />
				</div>
				<div class="form-group">
					<input type="password" name="loginPassword" class="form-control" placeholder="Password" />
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-block btn-login">LOGIN</button>
				</div>
				<div class="form-group" style="text-align:center; cursor:pointer;">
					<a type="button" class="toCreate" data-toggle="modal" data-target=".create">Create an Account</a>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade create" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" style="padding:15px;">
			<form method="POST">
				<div id="create-results"></div>
				<div class="form-group">
					<input type="text" name="createEmail" class="form-control" placeholder="Email Address" />
				</div>
				<div class="form-group">
					<input type="text" name="createUsername" class="form-control" placeholder="Username" />
				</div>
				<div class="form-group">
					<input type="password" name="createPassword" class="form-control" placeholder="Password" />
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-block btn-create">CREATE</button>
				</div>
				<div class="form-group" style="text-align:center;">
					<a type="button" class="toLogin" style=" cursor:pointer;" >Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade reviewForm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog">
		<div class="modal-content" style="padding:15px;">
			<form method="POST">
				<?php $objSession = new session(); 
                      if($objSession->is_logged_in()): ?>
					<div id="review-results"></div>
					<div class="form-group">
						<label>Summarize Obstruction</label>
						<input type="text" name="reviewTitle" class="form-control" placeholder="Review Title" />
					</div>
					<div class="form-group">
						<label>Describe Obstruction Details</label>
						<textarea type="text" name="reviewDesc" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Upload Image</label>
						<input type="file" id="file-input-logo" name="reviewImage" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png">
					</div>
					<div class="form-group">
						<button type="submit" name="reviewSubmit" class="btn btn-block btn-create">Submit Report</button>
					</div>
				<?php else: ?>
					<div class="form-group" style="text-align:center">
						<a type="button" class="toLogin" style=" cursor:pointer;" >Login</a>
					</div>
				<?php endif;?>
			</form>

<?php

	if (isset($_POST['reviewSubmit'])) {

		$title = $_POST['reviewTitle'];
		$content = $_POST['reviewDesc'];
		
			$uploadDir = USERPIC_UPLOAD_PATH;
			$fileName = $_FILES['reviewImage']['name'];
			$tmpName  = $_FILES['reviewImage']['tmp_name'];
			$fileSize = $_FILES['reviewImage']['size'];
			$fileType = $_FILES['reviewImage']['type'];

		
		if($fileName != ""){
			$filePath = $uploadDir . $fileName;

			$result = move_uploaded_file($tmpName, $filePath);

			if(!get_magic_quotes_gpc()){
			  $fileName = addslashes($fileName);
				$filePath = addslashes($filePath);
			}

			$filePath = URLBASE."/".$filePath;

			$imageSize = getimagesize($filePath);
			$imageWidth = $imageSize[0];
			$imageHeight = $imageSize[1];

			
			#$values = 	" '".$cardid."', '".$fileName."', '".$fileSize."', '".$fileType.
			#						"', '".$imageWidth."', '".$imageHeight."', '".$filePath."'";
			$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 

			$cols = " review_pk, review_title, review_content, review_date, review_time, review_timestamp, user_pk ";
			$vals = " null, '$title', '$content', '$fileSize', '$fileType', '', '', null,  ";
			$query = mysqli_query($conn, "INSERT INTO `review` ($cols) VALUES ($vals) ") or die(mysqli_error($conn));	


			$cols = " pic_pk, pic_url, pic_name, pic_size, pic_type, pic_log, pic_lat, pic_timestamp, review_pk ";
			$vals = " null, '$filePath', '$fileName', '$fileSize', '$fileType', '', '', null,  ";
			$query = mysqli_query($conn, "INSERT INTO `picture` ($cols) VALUES ($vals) ") or die(mysqli_error($conn)); 
			if ($query) {
				echo '<p style="color:green;">Your account is now active!</p>';
			}else{
				echo '<p style="color:red;">Something went wrong!</p>';
			}

		}
		else{}


	}

?>


		</div>
	</div>
</div>

</div>




    <!-- Custom Events Required for User Interface -->
    <script src="js/ajax-custom-events.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <!-- Slick JS -->
    <script type="text/javascript" src="slick-1.5.9/slick/slick.js"></script>

    <script type="text/javascript">

    	$('.responsive').slick({
		  dots: true,
		  infinite: false,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 4,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
		});

    </script>


</body>

</html>