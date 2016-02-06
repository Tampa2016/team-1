//https://www.googleapis.com/geolocation/v1/geolocate?key= AIzaSyAJSRWD6jbEFgREIGInrUNtw9IgstCD_u0 
window.onload = function() {
  var startPos;
  var geoOptions = {
     timeout: 10 * 1000
  }

  var geoSuccess = function(position) {
    startPos = position;
    document.getElementById('startLat').innerHTML = startPos.coords.latitude;
    document.getElementById('startLon').innerHTML = startPos.coords.longitude;
  };
  var geoError = function(error) {
    console.log('Error occurred. Error code: ' + error.code);
    if(error.code == 0) {
      alert("An unknown error is preventing us from processing your request.\nPlease try again shortly");
    }else if(error.code == 1) {
      alert("Please enable location services");
    } else if(error.code == 2) {
      alert("Position unavailable");
    }else if(error.code == 3) {
      alert("The application timed out.\nPlease check your connection");
    }
  };

  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
};