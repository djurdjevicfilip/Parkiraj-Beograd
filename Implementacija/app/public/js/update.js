
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
var pusher = new Pusher('808da8c89a7fa475ce59', {
  	 cluster: 'eu'
});

var channel = pusher.subscribe('user-channel');
    channel.bind('user-event', function(messageData) {
		data=messageData.message;
		update(data);
		setMarkerCluster();
});

alertify.set('notifier','position', 'top-right');
var nearest_marker = {
	x: 0,
	x: 0
};
var going_to=null;

var btn=null;
function update(marker){
	markers=old_markers;
	var found=markers.find(element => element.id == marker.idPar);
	
	if(found){
		updateMarker(found,marker);
	}else{
		newSensorMarker(marker);
	}

	if(btn=="free"){
		showOnlyFree();
	}else if(btn=="red"){
		showRedZone();
	}else if(btn=="sensor"){
		showOnlySensors();
	}else if(btn=="garage"){
		showOnlyGarages();
	}
}
function newSensorMarker(location){
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
function updateMarker(from,to){

	//Alert the user if his location status has changed
	if(from.free=="1"&&to.Free=="0"&&nearest_marker==from&&going_to!=null){
		alertify.error('Neko je zauzeo parking mesto');
	}
	from.free=to.Free;
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