	<div class="grid grid-cols-2 pt-4 w-full">
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

	<div class="flex flex-row gap-x-4 w-full">
		<div id="clear-filter" class="text-white font-sansBold"></div>
		<div id="current-refinements" class="text-white"></div>
	</div>

    <div id="hits" class="pt-2 -mx-4 relative" >
    	<a id="tornasu" href="#" class="absolute bottom-2 right-4 inline-block bg-verde-sa " uk-totop uk-scroll>
    		<svg class="h-12 w-12 hover:fill-white transition-all" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.2 23.2"><path d="M16.9 10.1l-5.3-4.7-5.3 4.7.7.7L11.2 7v10.8h.9V7.5L12 7l4.2 3.8z"/></svg>
    	</a>
    </div>

    <div id="tags" class="h-8 invisible"></div>
    <div id="filtro" class="h-8 invisible"></div>