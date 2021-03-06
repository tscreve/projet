  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 48.8376, lng:2.3341883},
      zoom: 13
    });
    // marqueur ma position géolocalisée
    var maPosMarker = new google.maps.Marker({map: map});
    var advert=document.getElementById("advert");
    var sport=advert.getAttribute('data-sport');
    var date=advert.getAttribute('data-date');
    var time=advert.getAttribute('data-time');
    var color=advert.getAttribute('data-color');

    //les coordonnées
    var strLat=document.getElementById("data-lat");   
    var strLng=document.getElementById("data-lng");   

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(pos) {        
        var pos = {
          lat: pos.coords.latitude,
          lng: pos.coords.longitude
        };
        maPosMarker.setPosition(pos);
        maPosMarker.setTitle('C Moi');
        

      }, function() {
        handleLocationError(true, maPosMarker, map.getCenter());
      });
         var contentString='<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 id="firstHeading" class="firstHeading">'+sport+' le '+date+' à '+time+'</h3>'+
            '<div id="bodyContent">'+           
            '</div>'+
            '</div>';  
        infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        var pos = {
          lat: Number(strLat.value),
          lng: Number(strLng.value)
        };

        var marker=new google.maps.Marker({
          icon: {
                path: MAP_PIN,
                fillColor: color,
                fillOpacity: 0.8,
                strokeColor: '#4d535d',
                strokeWeight: 1.5
            },
           map: map,
           position:pos
        });

        map.setCenter(pos);

        marker.addListener('click', function(){
          infowindow.open(map, marker);
        });
    }else{
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