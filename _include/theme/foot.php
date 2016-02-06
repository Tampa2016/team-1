

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