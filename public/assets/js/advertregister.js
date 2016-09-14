  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 48.8376, lng:2.3341883},
      zoom: 14
    });
    // marqueur ma position géolocalisée
    var maPosMarker = new google.maps.Marker({map: map});
    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // affichage des coordonnées
    var latStr=document.getElementById("data-lat");  
    var lngStr=document.getElementById("data-lng");  
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
           // Create a marker for each place.
        markers.push(new google.maps.Marker({
          map: map,
          title: place.name,
          position: place.geometry.location
        }));
        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
        
        latStr.value=place.geometry.location.lat();
        lngStr.value=place.geometry.location.lng();
      });
      map.fitBounds(bounds);
      map.setZoom(17);    
    });

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(pos) {
        
        var pos = {
          lat: pos.coords.latitude,
          lng: pos.coords.longitude
        };
        latStr.value=pos.lat;
        lngStr.value=pos.lng;

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

  function placeMarkerAndPanTo(latLng, map) {      
      latStr.value=latLng.lat();
      lngStr.value=latLng.lng();

    markers.push(new google.maps.Marker({
      position: latLng,
        map: map
    }));  
    // map.panTo(latLng); // centrer la carte sur l'endroit cliqué
  }

    map.addListener('click', function(e) {      
          // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];
      placeMarkerAndPanTo(e.latLng, map);
    });
  }

  function handleLocationError(browserHasGeolocation, maPosMarker, pos) {
    maPosMarker.setPosition(pos);
    maPosMarker.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
  }


  $( function() {
    // SELECT
    $( "#level" ).selectmenu();
    $( "#nb_participant" ).selectmenu();
    $( "#time" ).selectmenu();
    // DATEPICKER
    $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
    $( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );

  } );



