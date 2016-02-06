<?php include "_include/classes.php"; include "_include/theme/head.php";  

	$objSession = new session(); 
	if(!$objSession->is_logged_in()){ header("Location: index.php");}

?>
  
<div class="twocol">
	<div class="col1">
		<a href=""><img src="img/nopic.gif" height="100" width="100" alt="Userpic" title="Userpic"></a>
		<h3>Username:</h3>
		<h3>Points Earned:</h3>
	</div><!-- /.col1 -->
	<div class="col2">
		<h3>Frequently Pinned Areas</a></h3>
		<!-- Map Section -->
		<section id="map" class="map-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<script>
						// Note: This example requires that you consent to location sharing when
						// prompted by your browser. If you see the error "The Geolocation service
						// failed.", it means you probably did not give permission for the browser to
						// locate you.

						function initMap() {
						var map = new google.maps.Map(document.getElementById('map'), {
						center: {lat: -34.397, lng: 150.644},
						zoom: 6
						});
						var infoWindow = new google.maps.InfoWindow({map: map});

						// Try HTML5 geolocation.
						if (navigator.geolocation) {
						navigator.geolocation.getCurrentPosition(function(position) {
						var pos = {
						lat: position.coords.latitude,
						lng: position.coords.longitude
						};

						infoWindow.setPosition(pos);
						infoWindow.setContent('Location found.');
						map.setCenter(pos);
						}, function() {
						handleLocationError(true, infoWindow, map.getCenter());
						});
						} else {
						// Browser doesn't support Geolocation
						handleLocationError(false, infoWindow, map.getCenter());
						}
						}

						function handleLocationError(browserHasGeolocation, infoWindow, pos) {
						infoWindow.setPosition(pos);
						infoWindow.setContent(browserHasGeolocation ?
						'Error: The Geolocation service failed.' :
						'Error: Your browser doesn\'t support geolocation.');
						}

						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJwwNTTFGz7GqqTQWhZGmrru1ZJcQvtB8&signed_in=true&callback=initMap"
						async defer>
						</script>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /#map -->
	</div><!-- /.col2 -->
</div><!-- /.twocol -->


<!-- Info Section -->
<section id="info" class="info-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<h2>Badges & Rewards</h2>
<br />
<br />
<h4></h4>
</div>
</div> 
</div>
</section>

<?php include "_include/theme/foot.php"; ?>