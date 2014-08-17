INTUITION = {};
INTUITION.map = {
	init: function() {
	},
	eventMap: function(address){
		
		var mapOptions = {
			zoom : 12,    
		};
		map = new google.maps.Map(document.getElementById('map'), mapOptions);
		navigator.geolocation.getCurrentPosition(function(position) {
		    var pos = new google.maps.LatLng(position.coords.latitude,
		                                    position.coords.longitude);
		      
			map.setCenter(pos);
			
			var directionsDisplay;
			var directionsService = new google.maps.DirectionsService();
			directionsDisplay = new google.maps.DirectionsRenderer();
			directionsDisplay.setMap(map);
			directionsDisplay.setPanel(document.getElementById('directions'));
			$lat = String(position.coords.latitude);
			$lng = String(position.coords.longitude);
			$latlng = $lat+", "+$lng;
			var request = {
			    origin: $latlng,
			    destination: address,
			    provideRouteAlternatives: true,
			    travelMode: google.maps.TravelMode.DRIVING
			};
			
			directionsService.route(request, function(response, status) {
			    if (status == google.maps.DirectionsStatus.OK) {
			      directionsDisplay.setDirections(response);
			    }
			});

		}, function() {
		    alert('something went wrong');
		});
		$counter = 0;
		$counter2 = 0;
		$(".adp").each(function(){
			if($counter == 0){
				$(this).hide();
			}
			$counter++;
		});

		$(".adp-list").each(function(){
			if($counter2 == 0){
				$(this).hide();
			}
			$counter2++;
		});

	},
	setMap: function(){
		var mapOptions = {
			zoom : 17,
		}
		map = new google.maps.Map(document.getElementById('map'), mapOptions);
		navigator.geolocation.getCurrentPosition(function(position) {
		    var pos = new google.maps.LatLng(position.coords.latitude,
		                                    position.coords.longitude);
		      
			map.setCenter(pos);
		}, function() {
		    alert('Sorry,something went wrong.');
		});	
		var input = /** @type {HTMLInputElement} */(
      				document.getElementById('locationData'));

		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		var autocomplete = new google.maps.places.Autocomplete(input);
  		autocomplete.bindTo('bounds', map);
  		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			map: map,
			anchorPoint: new google.maps.Point(0, -29)
		});

		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);  // Why 17? Because it looks good.
			}
			marker.setIcon(/** @type {google.maps.Icon} */({
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(35, 35)
			}));
			marker.setPosition(place.geometry.location);
			$('#location_text').text($('#locationData').val());
			$('.locationName').val($('#locationData').val());
			$('.locationCode').val(place.place_id);
			marker.setVisible(true);

			var address = '';
			if (place.address_components) {
				address = [
					(place.address_components[0] && place.address_components[0].short_name || ''),
					(place.address_components[1] && place.address_components[1].short_name || ''),
					(place.address_components[2] && place.address_components[2].short_name || '')
				].join(' ');
			}

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);
			var request = {
			    placeId: place.place_id
			};
			var service = new google.maps.places.PlacesService(map);
			service.getDetails(request, function(placeData, status) {
				$('.overall').show();
				$rating = (placeData.rating)?placeData.rating:'No Rating';
				$('.ratingFromGoogle').html($rating+"&nbsp;<small>(From google.com)</small>");
				if(placeData.reviews){
					$('.reviews').html('');
					$('.reviews').append('<h3>GOOGLE REVIEWS</h3>');
					for(var $counter1 = 0; $counter1 < placeData.reviews.length; $counter1++){
						$comment = (placeData.reviews[$counter1].text)?placeData.reviews[$counter1].text:"Blank Comment";
    					$('.reviews').append("<blockquote><p>"+$comment+"</p><small>"+placeData.reviews[$counter1].author_name+"</small></blockquote>");
					}
				}else{
					$('.reviews').html('');
					$('.reviews').append('<h3>No reviews from Google.</3>');
				}
			});
		});
	},
}