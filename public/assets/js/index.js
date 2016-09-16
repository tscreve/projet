  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 48.8376, lng:2.3341883},
      zoom: 14
    });
    // marqueur ma position géolocalisée
    var maPosMarker = new google.maps.Marker({map: map});

    //la liste des coordonnées
    var list=document.getElementById("placesList");
    // markers = [];
    // console.log(list.childElementCount);


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

      // ajout d'un marqueur par entrée de #placesList
      for($i=0;$i<list.childElementCount;$i++){
        // console.log(list.children[$i].getAttribute('data-lat'));
        var sport=list.children[$i].getAttribute('data-sport');
        var date=list.children[$i].getAttribute('data-date');
        var time=list.children[$i].getAttribute('data-time');
        var participant=list.children[$i].getAttribute('data-participant');
        var level=list.children[$i].getAttribute('data-level');
        switch(level){
          case "debutant":
            level="débutant(s)";
            break;
            case "amateur":
            level="amateur(s)";
            break;
            case "confirme":
            level="confirmé(s)";
            break;
        }



        var contentString='<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 id="firstHeading" class="firstHeading">'+sport+' pour '+participant+' '+level+' le '+date+' à '+time+'</h3>'+
            '<div id="bodyContent">'+
            // '<p>sport</p>'+
            '</div>'+
            '</div>';
  
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        var pos = {
          lat: Number(list.children[$i].getAttribute('data-lat')),
          lng: Number(list.children[$i].getAttribute('data-lng'))
        };

        var marker = new google.maps.Marker({
          position: pos,
          map: map          
        });

        // markers.push(new google.maps.Marker({
        //    map: map,
        //    position:pos

        // }));

        bindWindow(marker, map, infowindow);

      }

    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, maPosMarker, map.getCenter());
    }
  }
  function bindWindow(marker, map, infowindow){
     marker.addListener('click', function() {
          infowindow.open(map, this);
        });
  }
 





  function handleLocationError(browserHasGeolocation, maPosMarker, pos) {
    maPosMarker.setPosition(pos);
    maPosMarker.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');
  }






