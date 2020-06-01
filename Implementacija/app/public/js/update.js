/**
 * Update.js - updating map markers on certain events like: sensor update, delete, add..
 * Author: Filip Djurdjevic
 */
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
var pusher = new Pusher('808da8c89a7fa475ce59', {
  	 cluster: 'eu'
});

/**
 * Get channel through pusher
 * @return pusherChannel
 * @param channelName
 */
var channel = pusher.subscribe('user-channel');
/**
 * Bind event to the channel
 */
channel.bind('user-event', function(messageData) {
		data=messageData.message;
		update(data,messageData.del,messageData.sensor);
		setMarkerCluster();
});
/**
 * Initialize alertify
 * @param type
 * @param position
 */
alertify.set('notifier','position', 'top-right');

var nearest_marker = {
	x: 0,
	x: 0
};
var going_to=null;

var btn=null;
/**
 * Update marker
 * @param marker 
 * @param del 
 */
function update(marker,del,sensor){
	console.log(marker);
	if(del==false&&sensor){
		markers=old_markers;
		var found=markers.find(element => element.id == marker.idPar);
		
		if(found){
			updateMarker(found,marker,sensor);
		}else{
			newSensorMarker(marker,sensor);
		}

		if(btn=="free"){
			showOnlyFree();
		}else if(btn=="sensor"){
			showOnlySensors();
		}else if(btn=="garage"){
			showOnlyGarages();
		}else if(btn=="dis"){
			showOnlyDisabled();
		}
		else if(btn!=null){
			showZone(btn);
		}
	}
	else if(del==true){
		markers=old_markers;
		var found=markers.find(element => element.id == marker.idPar);
		found.setMap(null);
		found.setPosition(new google.maps.LatLng(0,0));
		if(btn=="free"){
			showOnlyFree();
		}else if(btn=="red"){
			showRedZone();
		}else if(btn=="sensor"){
			showOnlySensors();
		}else if(btn=="garage"){
			showOnlyGarages();
		}else if(btn=="dis"){
			showOnlyDisabled();
		}
		else if(btn!=null){
			showZone(btn);
		}
	}
}

/**
 * Create new sensor and place it on the map
 * @param location 
 */
function newSensorMarker(location,sensor){
	var green_icon = {

		url:
			'https://cdn4.iconfinder.com/data/icons/map-pins-7/64/map_pin_pointer_location_navigation_parking_park-512.png',
		scaledSize: new google.maps.Size(45, 45) // size
	};
	var red_icon = {
		url: 'https://cdn4.iconfinder.com/data/icons/car-service-1/512/park-512.png',
		scaledSize: new google.maps.Size(35, 35) // size
	};
	
	var icon=green_icon;
	if(location.free=="0"){
		icon=red_icon;	
	}
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(location.x, location.y),
		map: map,
		icon: icon,
		html: document.getElementById('map'),
		x: location.x,
		y: location.y,
		free: location.Free,
		type:"sensor",
		zone:location.zone,
		disabled:location.disabled,
		id:location.idPar
	});	
	markers.push(marker);
	var infowindow = new google.maps.InfoWindow();
	google.maps.event.addListener(marker, 'click', function () {
		var disabled="Da";
		var free="Da";
		var type="Senzor";
		if(this.disabled==false)
			disabled="Ne";
		var additionalContent='<div style="color:black">Zona:</div>'+this.zone+'<br/><div style="color:black">Invalidsko:</div>'+disabled;
		
		if(this.free==false)
			free="Ne";
		if(this.type=="garage"){
			additionalContent="";
			type="Garaža";
			free=this.free;
		}
		nearest_marker=this;
		infowindow.setContent('<h5 style="color:black">' + type + '</h5><hr/><h6 style="color:blue; text-align:center"><div style="color:black">Slobodno:</div>'+free+additionalContent+'</h6><button onclick="sim()"class="btn btnPrimary"style="width:100%;background-color:#000240;color:white">Ruta</button>');
		infowindow.open(map, this);
	});		
}
/**
 * Update marker 'from' with marker 'to'
 * @param from 
 * @param to 
 */
function updateMarker(from,to){

	//Alert the user if his location status has changed
	if(from.free=="1"&&to.Free=="0"&&nearest_marker==from&&going_to!=null){
		alertify.error('Neko je zauzeo parking mesto');
	}
	from.free=to.Free;
	from.x=to.x;
	from.y=to.y;
	from.zone=to.zone;
	from.setPosition(new google.maps.LatLng(to.x, to.y));
	
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
	if(to.Free=="1")
		from.setIcon(green_icon);
	else 
		from.setIcon(red_icon);
	
	if(to.type=="garage")
		from.setIcon(garage_icon);
		
	google.maps.event.clearInstanceListeners(from);
	var infowindow = new google.maps.InfoWindow();
	google.maps.event.addListener(from, 'click', function () {
		var disabled="Da";
		var free="Da";
		var type="Senzor";
		if(this.disabled==false)
			disabled="Ne";
		var additionalContent='<div style="color:black">Zona:</div>'+this.zone+'<br/><div style="color:black">Invalidsko:</div>'+disabled;
		
		if(this.free==false)
			free="Ne";
		if(this.type=="garage"){
			additionalContent="";
			type="Garaža";
			free=this.free;
		}
		nearest_marker=this;
		infowindow.setContent('<h5 style="color:black">' + type + '</h5><hr/><h6 style="color:blue; text-align:center"><div style="color:black">Slobodno:</div>'+free+additionalContent+'</h6><button onclick="sim()"class="btn btnPrimary"style="width:100%;background-color:#000240;color:white">Ruta</button>');
		infowindow.open(map, this);
	});	
}