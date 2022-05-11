<?php require 'inc/head.php' ?>
	<body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

	  <div class="overflow-hidden" x-data="{ temi: false }">
	    <!-- Slanted Header div -->
	    <?php 
	    //prima di chiamare il banner, assicurati di aver definito l'immagine
	    $bannerBgImg = $page->images_bg->first->url;
	    include 'inc/header-banner.php' ?>

	    <section>

		    <!-- Grid hits -->
		    <div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-10 before:-z-10 mx-auto pb-32 bg-black">
		      <!-- Content container -->
		      <div class="px-12 w-fit pb-16">
		    	<!-- #algolia, temi -->
		    	<div x-show="temi">
		    		<div class="w-3/4 mx-auto text-h1 font-serif uppercase text-center">
				    	<h2 class="text-verde-sa mb">Temi</h2>
				    	<div id="temiricerca" class="text-white"></div>
		    		</div>
		    	</div>

	    		<div class="grid grid-cols-2 pt-4">
		    		<div id="stats" class="text-white font-serif text-h2"></div>
		    		<div class="text-right">
		    			<!-- griglia 1 -->
			    		<button x-on:click="solofoto = ! solofoto" class="h-6 w-6" 
			    		:class="solofoto ? 'fill-verde-sa' : 'fill-white'" >
			    		<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 29.4 28.5"  xml:space="preserve"><rect x="1.3" y="1" width="12.2" height="12.2"/><rect x="1.3" y="15.4" width="12.2" height="12.2"/><rect x="16" y="1" width="12.2" height="12.2"/><rect x="16" y="15.4" width="12.2" height="12.2"/></svg>
						</button>
						<!-- griglia 2 -->
						<button x-on:click="solofoto = ! solofoto" class="h-6 w-6" 
						:class="solofoto ? 'fill-white' : 'fill-verde-sa'" >
						<svg version="1.1" id="Livello_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33.7 28.5"  xml:space="preserve"><rect x="18.2" y="1.1" width="14.5" height="8.9"/><rect x="1" y="1.1" width="14.9" height="15.6"/><rect x="1" y="18.8" width="14.9" height="8.9"/><rect x="18.2" y="12.3" width="14.5" height="15.3"/></svg>

						</button>
		    		</div>

	    		</div>
				<div class="flex flex-row gap-x-4">
		    		<div id="clear-filter" class="text-white font-sansBold"></div>
		    		<div id="current-refinements" class="text-white"></div>
	    		</div>

		        <div id="hits" class="pt-2 -mx-4 relative" >
		        	<a href="#" class="absolute bottom-6 right-6 text-verde-sa inline-block" uk-totop uk-scroll>

		        	<svg class="fill-verde-sa h-6 w-6 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
		        	  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
		        	</svg>
		        	</a>

		        	
		        </div>
		        <div id="tags" class="h-8 overflow-hidden invisible"></div>
		        <div id="filtro" class="h-8 overflow-hidden invisible"></div>
		      </div>	      
		    </div>
	    </section>

	    <!-- Footer div -->
	    <?php require 'inc/footer.php' ?>
	  </div>



<!-- algolia search -->
	<script>
	// essenziale per farlo passare allo script algolia.js qui sotto
	 var filtro = {};
	</script>
	<script src="<?= $config->urls->templates?>js/algolia.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit.min.js"></script>


</body>
</html>


<!-- 
svg bottone +, riga troppo sottile
<svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 88.9 91.5" style="enable-background:new 0 0 88.9 91.5" xml:space="preserve"><path style="fill:#fff" d="M63.5 44.2H45.6V26.3h-3.3v17.9H24.4v3.2h17.9v17.9h3.3V47.4h17.9z"/><defs><path id="a" d="M6.3 7.6h76.4V84H6.3z"/></defs><clipPath id="b"><use xlink:href="#a" style="overflow:visible"/></clipPath><path d="M44.4 83.6c20.9 0 37.8-16.9 37.8-37.8S65.3 8 44.4 8 6.7 24.9 6.7 45.8c0 20.8 16.9 37.8 37.7 37.8z" style="clip-path:url(#b);fill:none;stroke:#fff;stroke-width:.806"/></svg>

rimpiazzata con heroicons

 -->
