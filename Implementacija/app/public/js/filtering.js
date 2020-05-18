var map=null;

var free_markers = [];
var old_markers = [];
var garage_markers=[];
var sensor_markers=[];
var zone_markers=[];


function setMarkerCluster(){
    if(markerCluster){
        markerCluster.setMap(null);
        markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'img/markerClusters/m'
        });
    }
}
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
	btn="free";
	setMarkerCluster();
}
function showOnlyGarages(){
	showAll();
	garage_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].type == "garage") {
			garage_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = garage_markers;
	btn="garage";
	setMarkerCluster();
}
function showOnlySensors(){
	showAll();
	sensor_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].type == "sensor") {
			sensor_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = sensor_markers;
	btn="sensor";
	setMarkerCluster();
}
function showRedZone(){
	showAll();
	zone_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].zone == "Crvena") {
			zone_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = zone_markers;
	btn="red";
	setMarkerCluster();
}
function showAll() {
	markers = old_markers;
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
	btn=null;
	setMarkerCluster();
}