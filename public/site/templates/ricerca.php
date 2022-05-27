<?php require 'inc/head.php' ?>
<?php // prendi alcuni valori dal Get per mostrare i sottomenu
$showAnni = ($input->get->showdate == 1) ? 'true' : 'false' ?>
	<body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

	  <div class="overflow-hidden" x-data="{ temi: false, anni: <?= $showAnni ?>, mappa: false }">
	    <!-- Slanted Header div -->
	    <?php 
	    //prima di chiamare il banner, assicurati di aver definito l'immagine
	    $bannerBgImg = $page->images_bg->getRandom()->url;
	    include 'inc/header-banner.php' ?>

	    <!-- <div class="bg-white">
	    	<?php // pagination & random display results 
	    	/*if (count(parse_str($input->get('siamoAlpi')))>=1) {
	    		echo "no GET";
	    	}else{
	    		echo "URL GET";
	    	}*/
	    	 ?>
	    </div> -->

	    <section>

		    <!-- ALGOLIA -->
		    <div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-10 before:-z-10 mx-auto pb-32 bg-black">
		      <div class="mx-12 w-fit pb-16">
		    	<!-- #algolia -->
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
		<!-- // essenziale per farlo passare allo script algolia.js qui sotto
	  			qui vuoto, ma utile pe la pagina Scheda  -->	  
		  <script>
		   var filtro = {};
		   var routingUrl = true;
		  </script>
   	  <?php require 'inc/scripts.php' ?>



	</body>
</html>