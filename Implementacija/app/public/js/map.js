var map;
var directionsService;
var directionsRenderer;
var locations=[];
var x = [];
var y = [];
var z = [];
var markers = [];

//Retrieve location data from the sent data
for(var i=0;i<data.length;i++){
	locations[i]=[];
	locations[i].x=data[i].location.x;
	locations[i].y=data[i].location.y;
	locations[i].free=data[i].sensor.Free;
}

var free_markers = [];
var old_markers = [];
function showOnlyFree() {
	free_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].free == 1) {
			free_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = free_markers;
}

function showAll() {
	markers = old_markers;
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
}

var location_now = 0;
var marker_now;
function CenterControl(controlDiv, map, text) {

	// Set CSS for the control border.
	var controlUI = document.createElement('div');
	controlUI.style.backgroundColor = 'white';
	controlUI.style.border = '2px solid #fff';
	controlUI.style.borderRadius = '3px';
	controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	controlUI.style.cursor = 'pointer';
	controlUI.style.marginBottom = '5px';
	controlUI.style.marginLeft = '5px';
	controlUI.style.textAlign = 'center';
	controlUI.title = 'Click to show only free spaces';
	controlDiv.appendChild(controlUI);

	// Set CSS for the control interior.
	var controlText = document.createElement('div');
	controlText.style.color = 'rgb(25,25,25)';
	controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
	controlText.style.fontSize = '16px';
	controlText.style.lineHeight = '38px';
	controlText.style.paddingLeft = '5px';
	controlText.style.paddingRight = '5px';
	controlText.innerHTML = text;
	controlUI.appendChild(controlText);

	// Setup the click event listeners: simply set the map to Chicago.
	

}
function addCustomControls(){

	var centerControlDiv = document.createElement('div');
	var centerControl = new CenterControl(centerControlDiv, map, 'Free');
	centerControlDiv.index = 1;
	centerControlDiv.onclick=showOnlyFree;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

	centerControlDiv = document.createElement('div');
	centerControl = new CenterControl(centerControlDiv, map, 'All');
	centerControlDiv.index = 1;
	centerControlDiv.onclick=showAll;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

	centerControlDiv = document.createElement('div');
	centerControl = new CenterControl(centerControlDiv, map, 'Route');
	centerControlDiv.index = 1;
	centerControlDiv.onclick=findNearest;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);
}
function initMap() {
	//staviti centar mape na korisnikovu lokaciju
	map = new google.maps.Map(document.getElementById('map'), {
		center: { lat: 44.80401, lng: 20.46513 },
		zoom: 13.5,
		disableDefaultUI: true,
		zoomControl: true,
		//Add style to the map
		styles:[
			{
				"featureType": "all",
				"elementType": "all",
				"stylers": [
					{
						"invert_lightness": true
					},
					{
						"saturation": 10
					},
					{
						"lightness": 30
					},
					{
						"gamma": 0.5
					},
					{
						"hue": "#435158"
					}
				]
			}
		]
	});
	

	//Add controls to the map
	addCustomControls();

	//place markers on the map on first map load
	placeMarkers();

	//needed for map directions
	directionsService = new google.maps.DirectionsService();
	directionsRenderer = new google.maps.DirectionsRenderer();
	directionsRenderer.setMap(map);

	//for placing own markers on the map
	placeMarkerOnClick();

	//Try to access user location
	accessUserLocation();

	//Setup search-box and location-finding features
	findLocation();
}


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
						  'Error: The Geolocation service failed.' :
						  'Error: Your browser doesn\'t support geolocation.');
	infoWindow.open(map);
  }

//Find the location that the user searched for
function findLocation(){
	
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
			if (!place.geometry) {
			console.log("Returned place contains no geometry");
			return;
			}
			var icon = {
			url: place.icon,
			size: new google.maps.Size(71, 71),
			origin: new google.maps.Point(0, 0),
			anchor: new google.maps.Point(17, 34),
			scaledSize: new google.maps.Size(25, 25)
			};

			// Create a marker for each place.
			markers.push(new google.maps.Marker({
			map: map,
			icon: icon,
			title: place.name,
			position: place.geometry.location
			}));

			if (place.geometry.viewport) {
			// Only geocodes have viewport.
			bounds.union(place.geometry.viewport);
			} else {
			bounds.extend(place.geometry.location);
			}
		});
		map.fitBounds(bounds);
	});
}

//Access the user's current location and pan to that location
function accessUserLocation(){
	var marker = new google.maps.Marker();
	
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
		  lat: position.coords.latitude,
		  lng: position.coords.longitude
		};

		marker.setPosition(pos);
		marker.setMap(map);
		map.setCenter(pos);
		srcx=position.coords.latitude;
		srcy=position.coords.longitude;
		
	  }, function() {
		handleLocationError(true, infoWindow, map.getCenter());
	  });
	} else {
	  // Browser doesn't support Geolocation
	  handleLocationError(false, infoWindow, map.getCenter());
	}
}

//Place markers from the database
function placeMarkers(){
	var green_icon = {
		url:
			'https://cdn4.iconfinder.com/data/icons/map-pins-7/64/map_pin_pointer_location_navigation_parking_park-512.png',
		scaledSize: new google.maps.Size(45, 45) // size
	};
	var red_icon = {
		url: 'https://cdn4.iconfinder.com/data/icons/car-service-1/512/park-512.png',
		scaledSize: new google.maps.Size(35, 35) // size
	};
	setTimeout(function() {
		//console.log(locations);
		for (i = 0; i < locations.length; i++) {
			console.log(locations[i]);
			var marker_x = parseFloat(locations[i].x);
			var marker_y = parseFloat(locations[i].y);
			var free_space = parseFloat(locations[i].free);
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(marker_x, marker_y),
				map: map,
				icon: free_space == '1' ? green_icon : red_icon,
				html: document.getElementById('map'),
				x: marker_x,
				y: marker_y,
				free: free_space
			});
			markers.push(marker);
		}
	}, 100);
}

function placeMarkerOnClick(){
	map.addListener('click', function(e) {
		if (location_now == 0) {
			placeMarkerAndPanTo(e.latLng, map);
			location_now = 1;
			srcy = e.latLng.lng();
			srcx = e.latLng.lat();
		} else {
			marker_now.setMap(null);
			placeMarkerAndPanTo(e.latLng, map);
			srcy = e.latLng.lng();
			srcx = e.latLng.lat();
		}
	});
}
var srcx;
var srcy;

function placeMarkerAndPanTo(latLng, map) {
	var marker = new google.maps.Marker({
		position: latLng,
		map: map
	});
	marker_now = marker;
}

function copy(mainObj) {
	let objCopy = {};
	let key;

	for (key in mainObj) {
		objCopy[key] = mainObj[key];
	}
	return objCopy;
}

var nearest_marker = {
	x: 0,
	x: 0
};
var src = {
	x: 0,
	x: 0
};
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
var nearest_distance;
var pos = 0;
var destinationB;
var distance;
var destinations = [];
var min = 99999999;
var minus = 0;
function findNearest() {
	console.log(httpGet('http://router.project-osrm.org/nearest/v1/driving/13.388860,52.517037?number=3&bearings=0,20'));
	setTimeout(function() {
		var service = new google.maps.DistanceMatrixService();
		var origin1 = new google.maps.LatLng(srcx, srcy);
		destinations=[];
		src.y = srcy;
		src.x = srcx;
		for (i = 0; i < markers.length; i++) {
			var item = i;
			destinationB = new google.maps.LatLng(markers[i].x, markers[i].y);
			destinations.push(destinationB);
		}
		service.getDistanceMatrix(
			{
				origins: [ origin1 ],
				destinations: destinations,
				travelMode: 'DRIVING',
				unitSystem: google.maps.UnitSystem.METRIC,
				avoidHighways: false,
				avoidTolls: false,
			},
			function(response, status) {
				callback(response, status);
			}
		);
		

		//Parsking JSON distance response
		function callback(response, status) {
			if (status == 'OK') {
				var origins = response.originAddresses;
				var destinations = response.destinationAddresses;
				for (var i = 0; i < origins.length; i++) {
					var results = response.rows[i].elements;
					for (var j = 0; j < results.length; j++) {
						var element = results[j];
						if (element.status == 'OK') {
							var distancep = element.distance.value;
							distance = parseFloat(distancep);
							if (distance < min) {
								pos = j;
								min = distance;
							}
							var duration = element.duration.text;
						}
					}
				}
			}
			nearest_marker.x = markers[pos].x;
			nearest_marker.y = markers[pos].y;
		}

		setTimeout(function() {
			writeDirectionOnMap(src, nearest_marker.x, nearest_marker.y);
		}, 600);
	}, 300);
}

function put_direction_on_map() {
	setTimeout(function() {
		write_direction_on_map(src, nearest_marker.x, nearest_marker.y);
	}, 600);
}
var fin=null;
function writeDirectionOnMap(src, dst_x, dst_y) {
	var starting_position = new google.maps.LatLng(src.x, src.y);
	var final_position = new google.maps.LatLng(dst_x, dst_y);
	fin=final_position;
	var request = {
		origin: starting_position,
		destination: final_position,
		// Note that JavaScript allows us to access the constant
		// using square brackets and a string value as its
		// "property."
		travelMode: 'DRIVING'
	};
	directionsService.route(request, function(response, status) {
		if (status == 'OK') {
			console.log(response);
			directionsRenderer.setDirections(response);
		}
	});
}
