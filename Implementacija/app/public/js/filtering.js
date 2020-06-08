/**
 * filtering.js - Filtering markers based on user selection
 * Milan Ciganović and Filip Đurđević
 */
var map=null;

var free_markers = [];
var old_markers = [];
var garage_markers=[];
var sensor_markers=[];
var zone_markers=[];
var disabled_markers=[];
/**
 * Set marker cluster - this is called when you need to update the cluster
 * e.g. when a filter is set, the clustering won't change on it's own, so we need to call this function to update it
 */
function setMarkerCluster(){
    if(markerCluster){
        markerCluster.setMap(null);
        markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'img/markerClusters/m'
        });
    }
}
/**
 * Set of functions used for filtering
 */
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
function showZone(zone){
	showAll();
	zone_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].zone == zone) {
			zone_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = zone_markers;
	btn=zone;
	setMarkerCluster();
}
function showOnlyDisabled(){
	showAll();
	disabled_markers = [];
	for (var i = 0; i < markers.length; i++) {
		if (markers[i].disabled == 1&&markers[i].type=="sensor") {
			disabled_markers.push(markers[i]);
		} else {
			markers[i].setMap(null);
		}
	}
	old_markers = markers;
	markers = disabled_markers;
	btn='dis';
	setMarkerCluster();
}
/**
 * Show all sensors (turn off filters)
 */
function showAll() {
	markers = old_markers;
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
	btn=null;
	setMarkerCluster();
}

/**
 * Set of functions used for filter manipulation through the checkbox implementation
 */
function garageCheck() {
	var garageCheckBox = document.getElementById('garage');
	if (garageCheckBox.checked) {
		showOnlyGarages();
	} else {
		showAll();
	}
	document.getElementById('inv').checked=false;
	document.getElementById('free').checked=false;
	document.getElementById('zone').checked=false;
	hideZones();
}
function invCheck() {
	var disabledCheckBox = document.getElementById('inv');
	if (disabledCheckBox.checked) {
		showOnlyDisabled();
	} else {
		showAll();
	}
	
	document.getElementById('garage').checked=false;
	document.getElementById('free').checked=false;
	document.getElementById('zone').checked=false;
	hideZones();
}

function freeCheck() {
	var freeCheckBox = document.getElementById('free');
	if (freeCheckBox.checked) {
		showOnlyFree();
	} else {
		showAll();
	}
	
	document.getElementById('inv').checked=false;
	document.getElementById('garage').checked=false;
	document.getElementById('zone').checked=false;
	hideZones();
}

var zone=false;
function zoneCheck() {
	var zoneCheckBox = document.getElementById('zone');
	var label1=document.getElementById('lab1');
	var label2=document.getElementById('lab2');
	var label3=document.getElementById('lab3');
	if (zoneCheckBox.checked) {
		label1.style.visibility = 'visible';

		label2.style.top = '140px';

		label2.style.backgroundColor = '#f81e01';
		label2.style.visibility = 'visible';

		label3.style.top = '210px';
		label3.style.backgroundColor = '#2314f7';
		label3.style.visibility = 'visible';
		zone=true;
	} else {
		hideZones();
		showAll();
		zone=false;
	}
	
	document.getElementById('inv').checked=false;
	document.getElementById('free').checked=false;
	document.getElementById('garage').checked=false;
}
/**
 * Hide all zone checkboxes
 */
function hideZones(){
	
	var label1=document.getElementById('lab1');
	var label2=document.getElementById('lab2');
	var label3=document.getElementById('lab3');
	document.getElementById('cb1').checked=false;
	document.getElementById('cb2').checked=false;
	document.getElementById('cb3').checked=false;
	label1.style.visibility = 'hidden';
	label2.style.visibility = 'hidden';
	label3.style.visibility = 'hidden';
}
/**
 * Uncheck other checkboxes
 */
$(document).ready(function(){
	$('._checkbox').click(function(){
		if(this.checked){
			document.getElementById('cb1').checked=false;
			document.getElementById('cb2').checked=false;
			document.getElementById('cb3').checked=false;
			this.checked=true;
			if(this.id=="cb1"){
				showZone("Zelena");
			}else if(this.id=="cb2"){
				showZone("Crvena");
			}else{
				showZone("Plava");
			}

		}else{
			showAll();
		}
	});
});