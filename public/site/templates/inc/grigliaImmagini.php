	<!--NoMinify-->
	<div class="grid grid-flow-col auto-cols-auto pt-4 w-full">
		<div id="stats" class="text-white font-serif text-h2"></div>
		<div class="text-right invisible md:visible h-0 md:h-auto">
			<!-- due bottoni per scelta visualizzazione -->

    		<button x-on:click="solofoto = ! solofoto" class="h-6 w-6" 
    		:class="solofoto ? 'fill-verde-sa' : 'fill-white hover:fill-verde-sa transition'" >
    		<svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 29.4 28.5"  xml:space="preserve"><rect x="1.3" y="1" width="12.2" height="12.2"/><rect x="1.3" y="15.4" width="12.2" height="12.2"/><rect x="16" y="1" width="12.2" height="12.2"/><rect x="16" y="15.4" width="12.2" height="12.2"/></svg>
			</button>

			<button x-on:click="solofoto = ! solofoto" class="h-6 w-6" 
			:class="solofoto ? 'fill-white hover:fill-verde-sa transition' : 'fill-verde-sa'" >
			<svg version="1.1" id="Livello_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33.7 28.5"  xml:space="preserve"><rect x="18.2" y="1.1" width="14.5" height="8.9"/><rect x="1" y="1.1" width="14.9" height="15.6"/><rect x="1" y="18.8" width="14.9" height="8.9"/><rect x="18.2" y="12.3" width="14.5" height="15.3"/></svg>
			</button>
		</div>
	</div>

	<div class="flex flex-col md:flex-row gap-x-4 w-full">
		<div id="clear-filter" class="text-white font-sansBold"></div>
		<div id="current-refinements" class="text-white"></div>
	</div>

    <div id="hits" class="pt-2 -mx-4 relative" >
    	<a id="tornasu" href="#" class="absolute bottom-2 right-4 inline-block invisible md:visible" uk-totop uk-scroll>
    		<svg class="h-10 w-10 fill-white hover:fill-verde-sa transition-all" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    			 viewBox="0 0 57.1 57.6" xml:space="preserve">
	    		<g>
	    			<path class="st0" d="M34.7,26.9l2-2l-8.1-8l-7.9,7.9l2,2l4.6-4.6v17.9h2.8V22.4L34.7,26.9z M53.5,28.5c0,13.7-11.1,24.8-24.8,24.8
	    				S3.8,42.2,3.8,28.5S15,3.7,28.7,3.7S53.5,14.8,53.5,28.5 M56.3,28.5c0-15.2-12.4-27.7-27.7-27.7C13.4,0.8,1,13.2,1,28.5
	    				s12.4,27.7,27.7,27.7C43.9,56.1,56.3,43.7,56.3,28.5"/>
	    		</g>
    		</svg>

    	</a>
    </div>

    <div id="tags" class="h-8 invisible"></div>
    <div id="filtro" class="h-8 invisible"></div>
    <div id="zona" class="h-8 invisible"></div>

    <!-- mappa Google per Algolia -->
    <div id="algoliaMap" class="h-0 opacity-0"></div>
	<!--/NoMinify-->