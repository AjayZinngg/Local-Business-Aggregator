function showPosition(position){

	var data = {};

	var lat = position.coords.latitude;
	var lng = position.coords.longitude;

	data['lat'] = lat;
	data['lng'] = lng;

	$('#searchbutton').click(function(){
		$searchtext = $('#searchtext').val();
		$radiusKm = $('#radiusKm').val();
		if($searchtext !== "" && $radiusKm !== "")
		{
			alert($radiusKm);
			data['searchtext'] = $searchtext;
			data['radiusKm'] = $radiusKm;

			$.post("getdata.php",data,function(response,status,jqXHR){
				//alert(response);
				var obj = $.parseJSON(response);
				console.log(obj);
			});
		}
	});

}

function initMap() {
	        if (navigator.geolocation) {
		    	navigator.geolocation.getCurrentPosition(showPosition);
		  	} else {
		    	alert("Geolocation is not supported by this browser.");
			}
	    }

$(document).ready(function(){
	initMap();
});