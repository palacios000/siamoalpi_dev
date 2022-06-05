
	
	<!-- algolia search -->
	<script type="module" src="<?= $config->urls->templates?>js/algolia.js"></script>

	<!-- uikit (for masonry layout) -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit.min.js"></script>


	
	<!-- Gmaps API -->
	<!-- 
		obergine: #023e58 replaced with #0d376b  

	Maps API
	* style: https://mapstyle.withgoogle.com/
	* https://developers.google.com/maps/documentation/javascript/overview
	Marker: https://developers.google.com/maps/documentation/javascript/reference/marker#MarkerOptions.clickable
		
	-->


	<script>
	      var map;
	      function initMap() {

	      	var styledMapType = new google.maps.StyledMapType(
		      	[
		      	  {
		      	    "elementType": "geometry",
		      	    "stylers": [
		      	      {
		      	        "color": "#1d2c4d"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#8ec3b9"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "elementType": "labels.text.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#1a3646"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "administrative.country",
		      	    "elementType": "geometry.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#4b6878"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "administrative.land_parcel",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "administrative.land_parcel",
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#64779e"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "administrative.neighborhood",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "administrative.province",
		      	    "elementType": "geometry.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#4b6878"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "landscape.natural",
		      	    "elementType": "geometry",
		      	    "stylers": [
		      	      {
		      	        "color": "#233f62"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "poi",
		      	    "elementType": "geometry",
		      	    "stylers": [
		      	      {
		      	        "color": "#283d6a"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "poi",
		      	    "elementType": "labels.text",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "poi",
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#6f9ba5"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "poi",
		      	    "elementType": "labels.text.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#1d2c4d"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "poi.park",
		      	    "elementType": "geometry.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#023e58"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "poi.park",
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#3c7680"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road",
		      	    "elementType": "geometry",
		      	    "stylers": [
		      	      {
		      	        "color": "#304a7d"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road",
		      	    "elementType": "labels",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road",
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#98a5be"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road",
		      	    "elementType": "labels.text.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#1d2c4d"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road.arterial",
		      	    "elementType": "labels",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road.highway",
		      	    "elementType": "geometry",
		      	    "stylers": [
		      	      {
		      	        "color": "#2c6675"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road.highway",
		      	    "elementType": "geometry.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#255763"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road.highway",
		      	    "elementType": "labels",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road.highway",
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#b0d5ce"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road.highway",
		      	    "elementType": "labels.text.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#023e58"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "road.local",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "transit",
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#98a5be"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "transit",
		      	    "elementType": "labels.text.stroke",
		      	    "stylers": [
		      	      {
		      	        "color": "#1d2c4d"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "transit.line",
		      	    "elementType": "geometry.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#283d6a"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "transit.station",
		      	    "elementType": "geometry",
		      	    "stylers": [
		      	      {
		      	        "color": "#3a4762"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "water",
		      	    "elementType": "geometry",
		      	    "stylers": [
		      	      {
		      	        "color": "#0e1626"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "water",
		      	    "elementType": "labels.text",
		      	    "stylers": [
		      	      {
		      	        "visibility": "off"
		      	      }
		      	    ]
		      	  },
		      	  {
		      	    "featureType": "water",
		      	    "elementType": "labels.text.fill",
		      	    "stylers": [
		      	      {
		      	        "color": "#4e6d70"
		      	      }
		      	    ]
		      	  }
		      	],
		      	{name: 'Backup-dati'});

	      	var sondrio = {lat: 46.1700326, lng: 9.8676338};

	        var map = new google.maps.Map(document.getElementById('maps'), {
	          center: sondrio,
	          zoom: 9,
	          streetViewControl: false,
	          fullscreenControl: false,
	          zoomControl: false,
	          scaleControl: false,
	          mapTypeControl: false,

	        });

	        var marker = new google.maps.Marker({
	        	position: sondrio, 
	        	map: map,
	        	clickable: true,
	        	url: 'http://www.google.com/',
	        	// animation: google.maps.Animation.DROP,
	        	label: {
				      text: "4545",
				      color: "black",
				      fontSize: "16px",
				      fontWeight: "bold",
				      fontFamily: "Moderat-Bold",
			      },
	        	icon: {
    	        path: google.maps.SymbolPath.CIRCLE,
    	        scale: 22,
    	        // fillColor: "#0E9B7E",
    	        fillColor: "yellow",
    	        fillOpacity: 1,
    	        strokeWeight: 0,
	        	},
	        });

	        google.maps.event.addListener(marker, 'click', function() {
	              window.location.href = 'http://www.google.com/';
	            });

	        map.mapTypes.set('styled_map', styledMapType);
	                map.setMapTypeId('styled_map');
	      }
	    </script>
	    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhKDtx78Vhbm05-9TDb_ra93TQEYC78NY&callback=initMap"
	    async defer></script>
 -->
	    <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXrz6wL-ik3qZC1ntwgCo8MptNZTiefds&callback=initMap">
	    </script>