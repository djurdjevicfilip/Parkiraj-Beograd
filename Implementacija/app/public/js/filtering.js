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
function showRemaining(){
	if(zone==true){

	}
}
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
var zone=false;
function zoneCheck() {
	var garageCheckBox = document.getElementById('zone');
	var label1=document.getElementById('lab1');
	var label2=document.getElementById('lab2');
	var label3=document.getElementById('lab3');
	if (garageCheckBox.checked) {
		label1.style.visibility = 'visible';

		label2.style.top = '140px';

		label2.style.backgroundColor = '#f81e01';
		label2.style.visibility = 'visible';

		label3.style.top = '210px';
		label3.style.backgroundColor = '#2314f7';
		label3.style.visibility = 'visible';
		zone=true;
	} else {
		label1.style.visibility = 'hidden';
		label2.style.visibility = 'hidden';
		label3.style.visibility = 'hidden';
		zone=false;
	}
}