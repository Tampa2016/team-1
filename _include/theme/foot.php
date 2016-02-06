

<div class="modal-folder">
	

<!-- Small modal -->

<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" style="padding:15px;">
			<form method="POST">
				<div id="login-results"></div>
				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Username" />
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" />
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



    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <!-- Custom Events Required for User Interface -->
    <script src="js/ajax-custom-events.js"></script>

</body>

</html>