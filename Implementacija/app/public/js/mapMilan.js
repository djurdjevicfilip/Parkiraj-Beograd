var map;
var directionsService;
var directionsRenderer;
var locations = [];
var x = [];
var y = [];
var z = [];
var markers = [];
var marker_now2;
var srcForNowY;
var srcForNowX;

//Retrieve location data from the sent data
for (var i = 0; i < data.length; i++) {
	locations[i] = [];
	locations[i].x = data[i].location.x;
	locations[i].y = data[i].location.y;
	if (data[i].sensor != null) {
		locations[i].free = data[i].sensor.Free;
		locations[i].zone = data[i].sensor.Zone;
		locations[i].disabled = data[i].sensor.Disabled;
		locations[i].type = 'sensor';
	} else {
		locations[i].free = data[i].garage.Free;
		locations[i].type = 'garage';
	}
}
var free_markers = [];
var old_markers = [];
var garage_markers = [];
var sensor_markers = [];
var zone_markers = [];
function showOnlyFree() {
	showAll();
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
function showOnlyGarages() {
	showAll();
	garage_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].type == 'garage') {
			garage_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = garage_markers;
}
function showOnlySensors() {
	showAll();
	sensor_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].type == 'sensor') {
			sensor_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = sensor_markers;
}
function showRedZone() {
	showAll();
	zone_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].zone == 'Crvena') {
			zone_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = zone_markers;
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

function buttonCheckbox(controlDiv, map, text) {}
function addCustomControls() {
	var centerControlDiv = document.createElement('div');
	var centerControl = new CenterControl(centerControlDiv, map, 'Garages');
	centerControlDiv.index = 1;
	centerControlDiv.onclick = showOnlyGarages;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

	var centerControlDiv = document.createElement('div');
	var centerControl = new CenterControl(centerControlDiv, map, 'Sensors');
	centerControlDiv.index = 1;
	centerControlDiv.onclick = showOnlySensors;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

	var centerControlDiv = document.createElement('div');
	var centerControl = new CenterControl(centerControlDiv, map, 'Red zone');
	centerControlDiv.index = 1;
	centerControlDiv.onclick = showRedZone;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

	centerControlDiv = document.createElement('div');
	centerControl = new CenterControl(centerControlDiv, map, 'All');
	centerControlDiv.index = 1;
	centerControlDiv.onclick = showAll;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

	centerControlDiv = document.createElement('div');
	centerControl = new CenterControl(centerControlDiv, map, 'Route');
	centerControlDiv.index = 1;
	centerControlDiv.onclick = findNearestOSRM;
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
		styles: [
			{
				featureType: 'all',
				elementType: 'all',
				stylers: [
					{
						invert_lightness: true
					},
					{
						saturation: 10
					},
					{
						lightness: 30
					},
					{
						gamma: 0.5
					},
					{
						hue: '#435158'
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
	var markerCluster = new MarkerClusterer(map, markers, {
		imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
	});
	placeMarkerOnClick();

	//Try to access user location
	accessUserLocation();

	//Setup search-box and location-finding features
	findLocation();

	old_markers = markers;
}
//Find the location that the user searched for

function garageCheck() {
	var garageCheckBox = document.getElementById('garage');
	if (garageCheckBox.checked) {
		showOnlyGarages();
	} else {
		showAll();
	}
}
function invCheck() {
	var garageCheckBox = document.getElementById('inv');
	//treba da se ubaci pretraga za invalidska mesta
}

function freeCheck() {
	var garageCheckBox = document.getElementById('free');
	if (garageCheckBox.checked) {
		showOnlyFree();
	} else {
		showAll();
	}
}

function zoneCheck() {
	var garageCheckBox = document.getElementById('zone');
	if (garageCheckBox.checked) {
		document.getElementById('lab1').style.visibility = 'visible';

		document.getElementById('lab2').style.top = '140px';
		document.getElementById('lab2').style.backgroundColor = '#f81e01';
		document.getElementById('lab2').style.visibility = 'visible';

		document.getElementById('lab3').style.top = '210px';
		document.getElementById('lab3').style.backgroundColor = '#2314f7';
		document.getElementById('lab3').style.visibility = 'visible';
	} else {
		//when is not acitve
		document.getElementById('lab').style.visibility = 'hidden';
		document.getElementById('lab2').style.visibility = 'hidden';
		document.getElementById('lab3').style.visibility = 'hidden';
	}
}

function findLocation() {
	// Create the search box and link it to the UI element.
	var input = document.getElementById('pac-input');
	var searchBox = new google.maps.places.SearchBox(input);
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	// Bias the SearchBox results towards current map's viewport.
	map.addListener('bounds_changed', function() {
		searchBox.setBounds(map.getBounds());
	});

	// Listen for the event fired when the user selects a prediction and retrieve
	// more details for that place.
	searchBox.addListener('places_changed', function() {
		var places = searchBox.getPlaces();

		if (places.length == 0) {
			return;
		}

		// Clear out the old markers.
		// For each place, get the icon, name and location.
		var bounds = new google.maps.LatLngBounds();
		places.forEach(function(place) {
			if (!place.geometry) {
				console.log('Returned place contains no geometry');
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
			marker = new google.maps.Marker({
				map: map,
				icon: icon,
				title: place.name,
				position: place.geometry.location
			});
			console.log('pise');
			marker_now2 = marker;

			srcForNowY = marker.position.lng();
			srcForNowX = marker.position.lat();
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
function accessUserLocation() {
	var marker = new google.maps.Marker();

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			function(position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};

				marker.setPosition(pos);
				marker.setMap(map);
				map.setCenter(pos);
				srcx = position.coords.latitude;
				srcy = position.coords.longitude;
			},
			function() {
				//Error
			}
		);
	} else {
		// Browser doesn't support Geolocation
	}
}

//Place markers from the database
function placeMarkers() {
	var green_icon = {
		url:
			'https://cdn4.iconfinder.com/data/icons/map-pins-7/64/map_pin_pointer_location_navigation_parking_park-512.png',
		scaledSize: new google.maps.Size(45, 45) // size
	};
	var red_icon = {
		url: 'https://cdn4.iconfinder.com/data/icons/car-service-1/512/park-512.png',
		scaledSize: new google.maps.Size(35, 35) // size
	};
	var garage_icon = {
		url: 'img/garage-marker.png',
		scaledSize: new google.maps.Size(35, 35) // size
	};
	var markerCluster;
	var infowindow = new google.maps.InfoWindow();
	setTimeout(function() {
		for (i = 0; i < locations.length; i++) {
			var icon = green_icon;

			if (locations[i].type == 'garage') {
				icon = garage_icon;
			} else if (locations[i].free == '0') {
				icon = red_icon;
			}

			var marker_x = parseFloat(locations[i].x);
			var marker_y = parseFloat(locations[i].y);
			var free_space = parseFloat(locations[i].free);
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(marker_x, marker_y),
				map: map,
				icon: icon,
				html: document.getElementById('map'),
				x: marker_x,
				y: marker_y,
				free: free_space,
				type: locations[i].type,
				zone: locations[i].zone,
				disabled: locations[i].disabled
			});

			markers.push(marker);

			//Info windows
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(
					'<h5 style="color:black">' +
						this.type +
						'</h5><hr/><h6 style="color:blue; text-align:center"><div style="color:black">Slobodno:</div>' +
						this.free +
						'<div style="color:black">Zona:</div>' +
						this.zone +
						'<br/><div style="color:black">Invalidsko:</div>' +
						this.disabled +
						'</h6>'
				);
				infowindow.open(map, this);
			});
		}
		markerCluster = new MarkerClusterer(map, markers, {
			imagePath: 'img/markerClusters/m'
		});
	}, 100);
}
var location_now2 = 0;
function placeMarkerOnClick() {
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

	map.addListener('dblclick', function(e) {
		if (location_now2 == 0) {
			placeMarkerAndPanToDbl(e.latLng, map);
			location_now2 = 1;
			srcForNowY = e.latLng.lng();
			srcForNowX = e.latLng.lat();
		} else {
			marker_now2.setMap(null);
			placeMarkerAndPanToDbl(e.latLng, map);
			srcForNowY = e.latLng.lng();
			srcForNowX = e.latLng.lat();
		}
		console.log(srcForNowX);
		console.log(srcForNowY);
	});
}
function placeMarkerOnDblClick() {}

function placeMarkerAndPanToDbl(latLng, map) {
	var marker = new google.maps.Marker({
		position: latLng,
		map: map,
		animation: google.maps.Animation.DROP,
		icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
	});
	marker_now2 = marker;
	marker_now.setMap(null);
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
function httpGet(theUrl) {
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.open('GET', theUrl, false); // false for synchronous request
	xmlHttp.send(null);
	return xmlHttp.responseText;
}
var nearest_distance;
var pos = 0;
var destinationB;
var distance;
var destinations = [];
var min = 99999999;
var minus = 0;
var srcForNow = {
	x: 0,
	y: 0
};
function findNearest() {
	setTimeout(function() {
		var service = new google.maps.DistanceMatrixService();
		var origin1 = new google.maps.LatLng(srcx, srcy);
		destinations = [];
		src.y = srcy;
		src.x = srcx;

		srcForNow.x = srcForNowX;
		srcForNow.y = srcForNowY;
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
				avoidTolls: false
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
			writeDirectionOnMap(srcForNow, nearest_marker.x, nearest_marker.y);
		}, 600);
	}, 300);
}

var response_simulation = null;
function writeDirectionOnMap(srcForNow, dst_x, dst_y) {
	var starting_position = new google.maps.LatLng(srcForNowX, srcForNowY);
	var final_position = new google.maps.LatLng(dst_x, dst_y);
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
			directionsRenderer.setDirections(response);
			response_simulation = response;
		}
	});
}
//Find closest location by duration using the OSRM API (Distance isn't supported by default, but there should be a workaround)
function findNearestOSRM() {
	//Prepare the string for httpGet request
	var str = 'http://router.project-osrm.org/table/v1/driving/';
	str += srcy + ',';
	str += srcx + ';';
	for (var i = 0; i < markers.length; i++) {
		str += markers[i].y + ',' + markers[i].x;
		if (i != markers.length - 1) {
			str += ';';
		}
	}
	str += '?sources=0';

	//Find the minimum duration
	var durationMatrix = JSON.parse(httpGet(str));
	var min = durationMatrix.durations[0][1];
	var pos = 0;
	for (var i = 2; i < durationMatrix.durations[0].length; i++) {
		if (durationMatrix.durations[0][i] < min) {
			min = durationMatrix.durations[0][i];
			pos = i - 1;
		}
	}

	nearest_marker.x = markers[pos].x;
	nearest_marker.y = markers[pos].y;
	src.x = srcx;
	src.y = srcy;

	writeDirectionOnMap(src, nearest_marker.x, nearest_marker.y);

	//Simulate travel
	setTimeout(function() {
		simulateTravel(srcx, srcy, nearest_marker.x, nearest_marker.y);
	}, 500);
}
function sleep(time) {
	return new Promise((resolve) => setTimeout(resolve, time));
}

function simulateTravel(srcx, srcy, dstx, dsty) {
	//Decode route polyline using polyline.js
	var polylineArray = polyline.decode(response_simulation.routes[0].overview_polyline);
	//Recursively simulate movement
	moveAlongPolyline(0, polylineArray.length, polylineArray);
}

var numDeltas = 100;
var delay = 10; //milliseconds
//Represents the total time it takes to go from one polyline coordinate to another (in milliseconds)
var pointDelay = numDeltas * delay;

//Recursively iterate over the polyline (recursion is used to add up delay)
function moveAlongPolyline(i, n, coordinates) {
	if (i >= n) return;
	sleep(pointDelay).then(() => {
		transition(coordinates[i][0], coordinates[i][1]);

		src.x = coordinates[i][0];
		src.y = coordinates[i][1];

		//Writing route direction (currently not used)
		//Disclaimer: writeDirectionOnMap can use up a lot of google credits !
		//writeDirectionOnMap(src,nearest_marker.x,nearest_marker.y);

		moveAlongPolyline(i + 1, n, coordinates);
	});
}

//Smoothly move marker
var i = 0;
var deltaLat;
var deltaLng;
var position = [];
function transition(result0, result1) {
	position[0] = src.x;
	position[1] = src.y;
	i = 0;
	deltaLat = (result0 - position[0]) / numDeltas;
	deltaLng = (result1 - position[1]) / numDeltas;
	moveMarker();
}

function moveMarker() {
	sleep(delay).then(() => {
		position[0] += deltaLat;
		position[1] += deltaLng;
		var latlng = new google.maps.LatLng(position[0], position[1]);

		marker_now.setPosition(latlng);
		if (i != numDeltas) {
			i++;
			moveMarker();
		}
	});
}
