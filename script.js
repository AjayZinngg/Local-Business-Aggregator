		var map;
		var myLatlng;
		var usrlatlng;
		var data = {};

		function showPosition(position) {
			var lat = position.coords.latitude;
			var lng = position.coords.longitude;
		  	myLatlng = new google.maps.LatLng(lat, lng);

		  	var mapOptions = {
	          center: myLatlng,
	          zoom: 15,
	          zoomControl: true,
			  mapTypeControl: true,
			  scaleControl: true,
			  streetViewControl: true,
			  rotateControl: true,
			  fullscreenControl: true,
			  mapTypeControlOptions: {
			  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			  	//position: google.maps.ControlPosition.TOP_CENTER
	   		  }
	          //mapTypeId: google.maps.MapTypeId.SATELLITE
	        } 
	        map = new google.maps.Map(document.getElementById('map1'), mapOptions);
	        //var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
			var marker = new google.maps.Marker({
	  			position: myLatlng,
	  			map: map,
	  			draggable:true,
	  			title: 'Hello World'
	  			//icon: iconBase + 'schools_maps.png'
			});

			// google.maps.event.addListener(marker,'position_changed',function(){
			// 	usrlatlng = marker.getPosition();
			// });

			console.log(myLatlng.lng());

			$("button").click(function(){
				$("input").each(function(){
					var key = $(this).attr("id");
					var val = $(this).val();
					data[key] = val;
				});
				data["descr"] = $("textarea").val();
				data["lat"] = marker.getPosition().lat();
				data["lng"] = marker.getPosition().lng();
				console.log(data);
				if(data["name"]== "" || data["storename"]== "" || data[tags] == ""){
					alert("Fields Cannot be empty");
				}
				else{
					$.post("savedata.php",data,function(response,status,jqXHR){
						alert(response);
					});
				}
			});
		}
	    //var myLatlng = {lat: 12.934533, lng: 77.626579};
	    function initMap() {
	        if (navigator.geolocation) {
		    	navigator.geolocation.getCurrentPosition(showPosition);
		  	} else {
		    	alert("Geolocation is not supported by this browser.");
			}
	    }
    
    google.maps.event.addDomListener(window, 'load', initMap);

	$(document).ready(function() {
	    Materialize.updateTextFields();
	  });	
	$(document).ready(function(){
	      $('.slider').slider({full_width: true});
	    });
	 // Pause slider
	$('.slider').slider('pause');
	// Start slider
	$('.slider').slider('start');
	// Next slide
	$('.slider').slider('next');
	// Previous slide
	$('.slider').slider('prev');