<?php require 'inc/head.php' ?>
<?php // prendi alcuni valori dal Get per mostrare i sottomenu
$showAnni = ($input->get->showdate == 1) ? 'true' : 'false';
$showMappa = ($input->get->showmap == 1) ? 'true' : 'false';
?>
	<body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

	  <div class="overflow-hidden" x-data="{ temi: false, anni: <?= $showAnni ?>, mappa: <?= $showMappa ?> }">
	    <!-- Slanted Header div -->
	    <?php 
	    //prima di chiamare il banner, assicurati di aver definito l'immagine
	    $bannerBgImg = $page->images_bg->getRandom()->url;
	    include 'inc/header-banner.php' ?>

	    <section>

		    <!-- ALGOLIA -->
		    <div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-10 before:-z-10 mx-auto md:pb-32 bg-black">
		      <div class="mx-6 md:mx-12 w-fit md:pb-16">
		    	<!-- #algolia -->
		    	<section id="filtriAlg">		    		
			    	<div x-show="temi" x-transition class="w-full py-4">
			    		<div class="md:w-3/4 mx-auto text-h1 font-serif uppercase ">
					    	<h2 class="text-verde-sa text-center">Temi</h2>
					    	<div id="temiricerca" class="text-white md:text-center"></div>
			    		</div>
			    	</div>
			    	<div x-show="anni" x-transition class="w-full md:py-4 md:px-16">
			    		<div class="mx-auto text-h1 font-serif uppercase text-center ">
					    	<h2 class="text-verde-sa mb-10">Anni</h2>
					    	<div id="datazione" class="h-16 "></div>
			    		</div>
			    	</div>
			    	<div x-show="mappa" x-transition class="w-full py-4 ">
			    		<div class="mx-auto text-h1 font-serif uppercase text-center ">
					    	<h2 class="text-verde-sa mb-4">Mappa</h2>
					    	<div id="maps" class="h-90 bg-black"></div>
			    		</div>
			    	</div>
			    </section>


    		    <!-- griglia risultati -->
    		    <section id="grigliaAlg">
    		    	<?php include 'inc/grigliaImmagini.php' ?>
    			</section>

		      </div>	      
		    </div>
	    </section>

	    <?php require 'inc/footer.php' ?>
	  </div>


	  <!-- ### algolia search ### -->
		<?php if ($input->get->presso){
			$fraseRisulati = "risultati presso &laquo;" .$sanitizer->text(urldecode($input->get->presso)) . "&raquo;";
		} else {
			$fraseRisulati = "risultati";
		}
		?>

		<script>
		   var filtro = {};
		   var routingUrl = true;
		   var lemmaRisultati = "<?= $fraseRisulati ?>"; 
		</script>
   	  <?php require 'inc/scripts.php' ?>


   	  <!--====================================
   	  =            Google Map API            =
   	  =====================================-->
   	  


	   	  <!-- Gmaps API -->
	   	  <!-- 
	   	  	obergine: #023e58 replaced with #0d376b  

	   	  Maps API
	   	  * style: https://mapstyle.withgoogle.com/
	   	  * https://developers.google.com/maps/documentation/javascript/overview
	   	  Marker: https://developers.google.com/maps/documentation/javascript/reference/marker#MarkerOptions.clickable
	   	  	

	   	  multiple markers
	   	  	https://stackoverflow.com/questions/3059044/google-maps-js-api-v3-simple-multiple-marker-example

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
	   	  	      	{name: 'siamoalpi'});

	   	        	var sondrio = {lat: 46.19, lng: 9.8676338};

	   	          var map = new google.maps.Map(document.getElementById('maps'), {
	   	            center: sondrio,
	   	            zoom: 9,
	   	            streetViewControl: false,
	   	            fullscreenControl: false,
	   	            zoomControl: true,
	   	            scaleControl: false,
	   	            mapTypeControl: false,

	   	          });

	   	          <?php //iniziamo il pastishe php+js
	   	          $enti = $pages->find("template=gestionale_ente, name!=provincia");
	   	          $n = 1;
	   	          foreach ($enti as $ente) {
	   	          	$urlEnte = $archivioPage->httpUrl . '?siamoAlpi[refinementList][zona][0]=area+' . urlencode($ente->display_name);
	   	          	//dimensione pallino
	   	          	$diametro = 10;
	   	          	if ($ente->counter->records < 50) { 
	   	          		$diametro = 18;
	   	          	}elseif ($ente->counter->records >= 50 && $ente->counter->records < 100) {
	   	          		$diametro = 20;		
	   	          	}elseif ($ente->counter->records >= 100 && $ente->counter->records < 500) {
	   	          		$diametro = 24;		
	   	          	}elseif ($ente->counter->records >= 500 && $ente->counter->records < 1000) {
	   	          		$diametro = 26;		
	   	          	}elseif ($ente->counter->records >= 1000) {
	   	          		$diametro = 28;		
	   	          	}
	   	          	echo "
	   	  	        var marker{$n} = new google.maps.Marker({
	   	  	        	position: new google.maps.LatLng(".$ente->mappa->lat.", ".$ente->mappa->lng." ), 
	   	  	        	map: map,
	   	  	        	clickable: true,
	   	  	        	url: '$urlEnte',
	   	  	        	label: {
	   	  				      text: '{$ente->counter->records}',
	   	  				      color: 'black',
	   	  				      fontSize: '16px',
	   	  				      fontWeight: 'bold',
	   	  				      fontFamily: 'Moderat-Bold',
	   	  			      },
	   	  	        	icon: {
	   	      	        path: google.maps.SymbolPath.CIRCLE,
	   	      	        scale: $diametro,
	   	      	        fillColor: 'white',
	   	      	        fillOpacity: 1,
	   	      	        strokeWeight: 3,
	   	      	        strokeColor: '#0E9B7E',
	   	  	        	},
	   	  	        });
	   	  					";
	   	  					$n++;
	   	          } ?>

	   	          <?php 
	   	          	for ($i = 1; $i < $n; $i++) {	        		
	   	          	echo "
	   	  	        google.maps.event.addListener(marker{$i}, 'click', function() {
	   	              window.location.href = marker{$i}.url;
	   	            });
	   	          	";
	   	          } ?>

	   	          map.mapTypes.set('styled_map', styledMapType);
	   	                  map.setMapTypeId('styled_map');
	   	        }
	   	  </script>
   	  
   	  <!--====  End of Google Map API  ====-->
   	  



	</body>
</html>