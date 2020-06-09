/**
 * nearestLocation.js - Finding the nearest location, based on the current user location or on the currently selected location
 * (This replaced the google maps Distance Matrix API)
 * Authors: Filip Djurdjevic & Milan Ciganovic
 */

//Find closest location by duration using the OSRM API (Distance isn't supported by default, but there should be a workaround)
var cancel=false;
function stopSimulation(){
	cancel=true;
	going_to=null;
}
function findNearestOSRM(){
	//Prepare the string for httpGet request
	console.time();
	if(going_to==null){

		var globalPos=0;
		var globalMin=99999999;
		var len=markers.length;
		var increment=165;
		for(var j=0;j<Math.floor(len/increment)+1;j++){
		var str='http://router.project-osrm.org/table/v1/driving/';
			if(!dst){
				str+=srcy+",";
				str+=srcx+";";
			}else{
				str+=dsty+",";
				str+=dstx+";";
			}
			var left;
			var start=j*increment;
			if(j!=(Math.floor(len/increment))){
				left=increment;
			}else{
				left=len%increment;
			}
			for(var i=start;i<start+left;i++){
				str+=markers[i].y+","+markers[i].x;
				if(i!=start+left-1){
					str+=";";
				}
			}
			str+="?sources=0";

			//Find the minimum duration
			var durationMatrix=JSON.parse(httpGet(str));
			var min=durationMatrix.durations[0][1];
			var pos=0;
			for(var i=2;i<durationMatrix.durations[0].length;i++){
				if(durationMatrix.durations[0][i]<min){
					min=durationMatrix.durations[0][i];
					pos=i-1;
				}
			}
			pos+=start;
			if(min<globalMin){
				globalMin=min;
				globalPos=pos;
			}
			console.log(globalMin);
		}
		nearest_marker=markers[globalPos];
		src.x=srcx;
		src.y=srcy;
		console.timeEnd();

		writeDirectionOnMap(src,nearest_marker.x,nearest_marker.y);

		going_to=nearest_marker;
		//Simulate travel
		setTimeout(function() {
			cancel=false;
			simulateTravel(srcx,srcy,nearest_marker.x,nearest_marker.y);
			//
		}, 500);
	}
}

function sim(){
	src.x=srcx;
	src.y=srcy;
	console.log(src);
	writeDirectionOnMap(src,nearest_marker.x,nearest_marker.y);

	going_to=nearest_marker;
	//Simulate travel
	setTimeout(function() {
		simulateTravel(src.x,src.y,nearest_marker.x,nearest_marker.y);
		//
	}, 500);
}