  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 48.8376, lng:2.3341883},
      zoom: 14
    });
    // marqueur ma position géolocalisée
    var maPosMarker = new google.maps.Marker({map: map});
    var advert=document.getElementById("advert");
    var sport=advert.getAttribute('data-sport');
    var date=advert.getAttribute('data-date');
    var time=advert.getAttribute('data-time');

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
        maPosMarker.setLabel('C ');
        maPosMarker.setTitle('C Moi');
        map.setCenter(pos);

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
                path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                strokeColor: "blue",
                scale: 6,
                strokeWeight :4
            },
           map: map,
           position:pos
        });

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