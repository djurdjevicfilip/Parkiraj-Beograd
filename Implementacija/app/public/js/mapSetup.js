//Setting up map
var directionsService;
var directionsRenderer;
var locations=[];
var markers = [];
var i = 0;

var marker_now;
var location_now=0;
var position=[];
function retrieveLocations(){
	//Retrieve location data from the sent data
	console.log(data);
	for(var i=0;i<data.length;i++){
		locations[i]=[];
		locations[i].x=data[i].location.x;
		locations[i].y=data[i].location.y;
		locations[i].id=data[i].idPar;
		if(data[i].sensor!=null){
			locations[i].free=data[i].sensor.Free;
			locations[i].zone=data[i].sensor.Zone;
			locations[i].disabled=data[i].sensor.Disabled;
			locations[i].type="sensor";
		}
		else if(data[i].garage){
			
			locations[i].free=data[i].garage.Free;
			locations[i].type="garage";
		}
	}

}
function initMap() {
	
	
	//Retrieve location data from the sent data
	retrieveLocations();
	
	if(map==null){
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
	
	markers=[];
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

	old_markers=markers;
	}
	
	
}

function CenterControl(controlDiv, map, text) {

	// Set CSS for the control border.
	var controlUI = document.createElement('div');
	controlUI.style.backgroundColor = '#000240';
	controlUI.style.border = '2px solid #fff';
	controlUI.style.borderRadius = '3px';
	controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	controlUI.style.cursor = 'pointer';
	controlUI.style.marginBottom = '5px';
	controlUI.style.marginLeft = '5px';
	controlUI.style.textAlign = 'center';

	controlUI.title = 'Ruta do najblize lokacije. Ukoliko je trenutno primenjen filter, ruta ce pronaci samo lokacije koje zadovoljavaju kriterijum tog filtera';
	controlDiv.appendChild(controlUI);

	// Set CSS for the control interior.
	var controlText = document.createElement('div');
	controlText.style.color = 'white';
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
	centerControlDiv = document.createElement('div');
	centerControl = new CenterControl(centerControlDiv, map, 'Route');
	centerControlDiv.index = 1;
	centerControlDiv.onclick=findNearestOSRM;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

	
	centerControlDiv = document.createElement('div');
	centerControl = new CenterControl(centerControlDiv, map, 'Stop Simulation');
	centerControlDiv.index = 1;
	centerControlDiv.onclick=stopSimulation;
	map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);
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
		//Error
	  });
	} else {
	  // Browser doesn't support Geolocation
	}
}

var markerCluster;
//Place markers from the database
function placeMarkers(){
	var id=0;
	var infowindow = new google.maps.InfoWindow();
	
		for (i = 0; i < locations.length; i++) {
			newMarker(locations[i],infowindow);
		}
	markerCluster = new MarkerClusterer(map, markers, {
		imagePath: 'img/markerClusters/m'
	});
}
function newMarker(location,infowindow){
	var green_icon = {
		url:
			'https://cdn4.iconfinder.com/data/icons/map-pins-7/64/map_pin_pointer_location_navigation_parking_park-512.png',
		scaledSize: new google.maps.Size(45, 45) // size
	};
	var red_icon = {
		url: 'https://cdn4.iconfinder.com/data/icons/car-service-1/512/park-512.png',
		scaledSize: new google.maps.Size(35, 35) // size
	};
	
	var garage_icon={
		url: 'img/garage-marker.png',
		scaledSize: new google.maps.Size(35, 35) // size
	}
			var icon=green_icon;
				
			if(location.type=="garage"){
				icon=garage_icon;
			}else if(location.free=="0"){
				icon=red_icon;	
			}
			
			var marker_x = parseFloat(location.x);
			var marker_y = parseFloat(location.y);
			var free_space = parseFloat(location.free);
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(marker_x, marker_y),
				map: map,
				icon: icon,
				html: document.getElementById('map'),
				x: marker_x,
				y: marker_y,
				free: free_space,
				type:location.type,
				zone:location.zone,
				disabled:location.disabled,
				id:location.id
			});	
			markers.push(marker);
			
			//Info windows
			google.maps.event.addListener(marker, 'click', function () {
				var additionalContent='<div style="color:black">Zona:</div>'+this.zone+'<br/><div style="color:black">Invalidsko:</div>'+this.disabled;
				if(this.type=="garage"){
					additionalContent="";
				}
				nearest_marker=this;
				infowindow.setContent('<h5 style="color:black">' + this.type + '</h5><hr/><h6 style="color:blue; text-align:center"><div style="color:black">Slobodno:</div>'+this.free+additionalContent+'</h6><button onclick="sim()"class="btn btnPrimary"style="width:100%;background-color:#000240;color:white">Ruta</button>');
				infowindow.open(map, this);
			});
			
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


