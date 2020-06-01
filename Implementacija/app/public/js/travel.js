/**
 * travel.js - This file is used for the travel simulation
 * Author: Filip Djurdjevic
 */
var src = {x:0,y:0};
var going_to=null;
var numDeltas = 200;
var delay = 10; //milliseconds
//Represents the total time it takes to go from one polyline coordinate to another (in milliseconds)
var pointDelay=numDeltas*delay;

function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return xmlHttp.responseText;
}
/**
 * Write route to the map
 */
function put_direction_on_map() {
	setTimeout(function() {
		write_direction_on_map(src, nearest_marker.x, nearest_marker.y);
	}, 600);
}
var response_simulation=null;
function writeDirectionOnMap(src, dst_x, dst_y) {
	var starting_position = new google.maps.LatLng(src.x, src.y);
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
			response_simulation=response;
		}
	});}
//Sleep	
function sleep (time) {
	return new Promise((resolve) => setTimeout(resolve, time));
  }
  
/**
 * Simulate travel from source to destinaton
 * @param  srcx 
 * @param  srcy 
 * @param dstx 
 * @param  dsty 
 */
function simulateTravel(srcx,srcy,dstx,dsty){
	if(cancel)return;
	
	//Decode route polyline using polyline.js
	var polylineArray=polyline.decode(response_simulation.routes[0].overview_polyline);
	
	//Recursively simulate movement
	moveAlongPolyline(0,polylineArray.length,polylineArray);
	sleep(pointDelay*polylineArray.length).then(()=> {
		going_to=null;
		//On finish post to the server
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			type:'post',
			url:'/getmsg',
			
			data: {_token: CSRF_TOKEN, idPar:nearest_marker.id},
							dataType: 'JSON',
			success: function( msg ) {
			}
		});
	});

}

//Recursively iterate over the polyline (recursion is used to add up delay)
function moveAlongPolyline(i,n,coordinates){
	if(i>=n)return;
	if(cancel){
		return;
	}
	sleep(pointDelay).then(() => {
		transition(coordinates[i][0],coordinates[i][1]);
	
	
		src.x=coordinates[i][0];
		src.y=coordinates[i][1];

		//Writing route direction (currently not used)
		//Disclaimer: writeDirectionOnMap can use up a lot of google credits !
		//writeDirectionOnMap(src,nearest_marker.x,nearest_marker.y);

		moveAlongPolyline(i+1,n,coordinates);
	});	
}

/**
 * Smoothly move marker from current position to result position
 * @param  result0 
 * @param  result1 
 */
function transition(result0,result1){
	if(cancel)return;
	position[0]=src.x;
	position[1]=src.y;
	i = 0;
	deltaLat=(result0 - position[0])/numDeltas;
	deltaLng=(result1 - position[1])/numDeltas;
	moveMarker();
}

function moveMarker(){
	if(cancel)return;
	sleep(delay).then(() => {
		position[0] += deltaLat;
		position[1] += deltaLng;
		var latlng = new google.maps.LatLng(position[0], position[1]);

		marker_now.setPosition(latlng);
		if(i!=numDeltas){
			i++;
			moveMarker();
		}
	});
}