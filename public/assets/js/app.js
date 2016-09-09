function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 48.8376, lng:2.3341883},
    zoom: 14
  });
 

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });


var markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();

    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(171, 171),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(14, 14)
      };

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
    map.setZoom(15);    
  });

var position=document.getElementById("adress");  
var maPosMarker = new google.maps.Marker({map: map});





  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(pos) {
      var pos = {
        lat: pos.coords.latitude,
        lng: pos.coords.longitude
      };

      // var infoPos="Position déterminé : <br>";

      // infoPos+="Latitude : "+pos.coords.latitude+"<br>";
      // infoPos+="Longitude : "+pos.coords.longitude+"<br>";
      // infoPos+="Altitude : "+pos.coords.altitude+"<br>";
      // position.innerHTML=infoPos;



      maPosMarker.setPosition(pos);
      maPosMarker.setLabel('C ');
      maPosMarker.setTitle('C Moi');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, maPosMarker, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, maPosMarker, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, maPosMarker, pos) {
  maPosMarker.setPosition(pos);
  maPosMarker.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}