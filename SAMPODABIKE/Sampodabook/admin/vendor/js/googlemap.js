function loadMap() {
	var zapote = {lat: 14.4651, lng: 120.9726};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: zapote
    });

    var marker = new google.maps.Marker({
      position: zapote,
      map: map
    });

}