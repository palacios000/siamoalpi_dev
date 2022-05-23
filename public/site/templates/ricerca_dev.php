<?php require 'inc/head.php' ?>
<?php // prendi alcuni valori dal Get per mostrare i sottomenu
$showAnni = ($input->get->showdate == 1) ? 'true' : 'false' ?>
	<body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

	  <div class="overflow-hidden" x-data="{ temi: false, anni: <?= $showAnni ?>, mappa: true }">
	    <!-- Slanted Header div -->
	    <?php 
	    //prima di chiamare il banner, assicurati di aver definito l'immagine
	    $bannerBgImg = $page->images_bg->first->url;
	    include 'inc/header-banner_dev.php' ?>

	    <section>

		    <!-- ALGOLIA -->
		    <div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-10 before:-z-10 mx-auto pb-32 bg-black">
		      <div class="mx-12 w-fit pb-16">
		    	<!-- #filtri div a scomparsa -->
		    	<section id="filtriAlg">		    		
			    	<div x-show="temi" x-transition class="w-full py-4">
			    		<div class="w-3/4 mx-auto text-h1 font-serif uppercase text-center">
					    	<h2 class="text-verde-sa mb">Temi</h2>
					    	<div id="temiricerca" class="text-white"></div>
			    		</div>
			    	</div>
			    	<div x-show="anni" x-transition class="w-full py-4 px-16">
			    		<div class="mx-auto text-h1 font-serif uppercase text-center ">
					    	<h2 class="text-verde-sa mb-8">Anni</h2>
					    	<div id="datazione" class="h-16 "></div>
			    		</div>
			    	</div>
			    	<div x-show="mappa" x-transition class="w-full py-4 px-16">
			    		<div class="mx-auto text-h1 font-serif uppercase text-center ">
					    	<h2 class="text-verde-sa mb-8">Mappa</h2>
					    	<div id="maps" class="h-32 bg-white"></div>
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

	    <!-- Footer div -->
	    <?php require 'inc/footer.php' ?>
	    <div id="maps2"></div>
	  </div>



<!-- algolia search -->

<!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXrz6wL-ik3qZC1ntwgCo8MptNZTiefds&callback=initMap">
</script>
 -->
	<script>
	// essenziale per farlo passare allo script algolia.js qui sotto
	// qui vuoto, ma utile pe la pagina Scheda
	 var filtro = {};
	</script>
	<script type="module" src="<?= $config->urls->templates?>js/algolia_dev.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit.min.js"></script>


</body>
</html>