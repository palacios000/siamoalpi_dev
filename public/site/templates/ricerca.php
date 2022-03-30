<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Siamo Alpi | Archivio Culturale di Valtellina e Valchiavenna</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="stylesheet" href="view-source:https://siamoalpi.it/site/templates/styles/main.css" /> -->
		<link rel="stylesheet" href="<?= $config->urls->templates?>styles/main.css" />

		<link rel="shortcut icon" href="<?php echo $config->urls->templates?>pictures/favicon.png" />

		<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

		<!-- algolia -->
		<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>

		<!-- algolia pre connect -->
		<link crossorigin href="https://NK1J7ES7IV-dsn.algolia.net" rel="preconnect" />



	</head>


	<body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

	  <!-- <div class="overflow-hidden" x-data="{ temi: false, temi_sel: false }"> 
		sotto a "data-value="${item.value}" ho messo quanto segue per attivare temi_sel, ma non funziona,
		dovrei forse fare una funzione
	  	x-on:click="temi_sel = ! temi_sel"
		-->
	  <div class="overflow-hidden" x-data="{ temi: false }">
	    <!-- menu & header -->
	    <div class="slanted-header relative bg-marrone-sa text-white h-fit ">
	      <img class="object-cover overflow-hidden w-full h-full object-cover object-cover"  src="<?= $config->urls->templates?>pictures/bg/siamo-alpi-head-small-1.jpg" alt="BG">
	      <img class="absolute top-0 left-0 w-82 mt-5 ml-1.5"  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">

	      <div class="absolute top-10 right-30 w-2/3 flex justify-end">
	      	<div class="flex flex-col w-2/3">
	      		
    		<div class="text-black" id="searchbox"></div>
    			
				<ul class="py-4 text-sm text-right pr-4">
					<li class="inline ">Ricerca per:</li>
					<li class="inline"><button x-on:click="temi = ! temi" class="uppercase font-sansBold pl-3" :class="temi ? 'underline underline-offset-4' : ''">Temi</button></li>
					<li class="inline uppercase font-sansBold pl-3">Anni</li>
					<li class="inline uppercase font-sansBold pl-3">Mappa</li>
					<li class="inline uppercase font-sansBold pl-3">Avanzata</li>
				</ul>
	      	</div>
	      </div>

	      <svg class="text-white block h-8 w-8 absolute top-10 right-10" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
	            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
	      </svg>
	    </div>

	    <section>

	    <!-- Grid hits -->
	    <div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-40 before:-z-10 mx-auto pb-32 bg-black">
	      <!-- Content container -->
	      <div class="mx-12 w-fit pb-16">
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
		    		<button x-on:click="solofoto = ! solofoto" class="h-6 w-6 fill-white" x-show="solofoto" ><svg version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 29.4 28.5"  xml:space="preserve"><rect x="1.3" y="1" width="12.2" height="12.2"/><rect x="1.3" y="15.4" width="12.2" height="12.2"/><rect x="16" y="1" width="12.2" height="12.2"/><rect x="16" y="15.4" width="12.2" height="12.2"/></svg>
					</button>
					<!-- griglia 2 -->
					<button x-on:click="solofoto = ! solofoto" class="h-6 w-6 fill-verde-sa" x-show="!solofoto" ><svg version="1.1" id="Livello_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 33.7 28.5"  xml:space="preserve"><rect x="18.2" y="1.1" width="14.5" height="8.9"/><rect x="1" y="1.1" width="14.9" height="15.6"/><rect x="1" y="18.8" width="14.9" height="8.9"/><rect x="18.2" y="12.3" width="14.5" height="15.3"/></svg>

					</button>
	    		</div>
    			<div class="flex flex-row gap-x-4">
		    		
		    		<div id="clear-filter" class="text-white "></div>
		    		<div id="current-refinements" class="text-white"></div>
	    		</div>

    		</div>

	        <div id="hits" class="pt-2 -mx-4 relative" >
	        	<a href="#" class="absolute bottom-6 right-6 text-verde-sa inline-block" uk-totop uk-scroll>

	        	<svg class="fill-verde-sa h-6 w-6 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
	        	  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
	        	</svg>
	        	</a>

	        	
	        </div>
	        <div id="tags" class="text-black h-8 overflow-hidden invisible"></div>
	      </div>	      
	    </div>
	    </section>

	    <!-- Footer div -->
	    <?php require 'inc/footer.php' ?>
	  </div>



<!-- algolia search -->
	<script>
		const searchClient = algoliasearch('NK1J7ES7IV', '6581401b5f047688ea20ca3f5e6074fd');

		const search = instantsearch({
			indexName: 'siamoAlpi',
			searchClient,
			routing: true
		});


		// 1. Create CUSTOM render function
			// Custom HITS - 	https://www.algolia.com/doc/api-reference/widgets/infinite-hits/js/#full-example
			const renderInfiniteHits = (renderOptions, isFirstRender) => {
				const {
					hits,
					widgetParams,
					isFirstPage,
					showMore,
					isLastPage,
				} = renderOptions;

				if (isFirstRender) {
					const ul = document.createElement('div');
					// ul.classList.add('uk-child-width-1-3', 'uk-grid');
					ul.classList.add('grid', 'grid-cols-4');
					ul.setAttribute("uk-grid", "masonry: true");

					// next button - mostra altre schede
						const nextButton = document.createElement('button');
						nextButton.classList.add('next-button', 'text-white', 'p-3', 'mx-auto', 'block', 'hover:text-verde-sa', 'hover:rotate-90', 'transition');
						nextButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width=".5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
						nextButton.addEventListener('click', () => {
							showMore();
						});

					widgetParams.container.appendChild(ul);
					widgetParams.container.appendChild(nextButton);

					return;
				}

				widgetParams.container.querySelector('.next-button').disabled = isLastPage;


				widgetParams.container.querySelector('div').innerHTML = `
					${hits
						.map(
							item =>
								`
								<div>
								<a href='${item.url}'>
								<div class='p-2'>
									<div class='relative boder border-8 border-black hover:border-verde-sa transition-all duration-300 '>
										<img class='object-cover w-full' src='${item.immagine}'>
										<div x-show='!solofoto' class='absolute w-full h-full inset-0 px-4 py-2 text-white font-bold bg-black opacity-0 hover:opacity-70 transition duration-300 '>${instantsearch.highlight({ attribute: 'titolo', hit: item })}
											<span class='bottone-bianco-trasparente block absolute bottom-0 left-0 p-4 opacity-100'>Scopri</span>
										</div>

									</div>
									<div class='max-h-36 pt-3 overflow-hidden'>
										<h2 x-show='solofoto' class='font-bold titoloFoto text-white'>
											${instantsearch.highlight({ attribute: 'titolo', hit: item })}
										</h2>

									</div>
								</div>
								</a>
								</div>`
						)
						.join('')}
				`;
			};

			// Custom MENU (temi) -	 https://www.algolia.com/doc/api-reference/widgets/menu/js/#full-example
			const renderMenu = (renderOptions, isFirstRender) => {
			  const {
			    items,
			    refine,
			    createURL,
			    widgetParams,
			  } = renderOptions;

			  if (isFirstRender) {
			    const ul = document.createElement('ul');
			    widgetParams.container.appendChild(ul);
			  }

			  widgetParams.container.querySelector('ul').innerHTML = items
			    .map(
			      item => `
			        <li class='inline'>
			          <a
			            href="${createURL(item.value)}"
			            data-value="${item.value}"
			          >
			            <span class="${item.isRefined ? 'underline underline-offset-4' : ''}">${item.label}</span> <span class='text-verde-sa px-1'>${item.count}</span> <span class='px-1'>/</span>
			          </a>
			        </li>
			      `
			    )
			    .join('');

			  [...widgetParams.container.querySelectorAll('a')].forEach(element => {
			    element.addEventListener('click', event => {
			      event.preventDefault();
			      refine(event.currentTarget.dataset.value);
			    });
			  });
			};

			// Custom STATS - 	https://www.algolia.com/doc/api-reference/widgets/stats/js/#full-example
			const renderStats = (renderOptions, isFirstRender) => {
			  const {
			    nbHits,
			    areHitsSorted,
			    nbSortedHits,
			    processingTimeMS,
			    query,
			    widgetParams,
			  } = renderOptions;

			  if (isFirstRender) {
			    return;
			  }

			  let count = '';

			  if (areHitsSorted) {
			    if (nbSortedHits > 1) {
			      count = `<span class='text-verde-sa'>${nbSortedHits}</span> risultati filtrati`;
			    } else if (nbSortedHits === 1) {
			      count = `<span class='text-verde-sa'>1</span> risultato filtrato`;
			    } else {
			      count = 'Nessun risultato trovato ';
			    }
			    count += ` da n. ${nbHits} schede`;
			  } else {
			    if (nbHits > 1) {
			      count += `<span class='text-verde-sa'>${nbHits}</span> risultati`;
			    } else if (nbHits === 1) {
			      count += `<span class='text-verde-sa'>1</span> risultato trovato`;
			    } else {
			      count += 'Nessun risultato trovato ';
			    }
			  }

			  widgetParams.container.innerHTML = `
			    ${count}
			    ${query ? `per <q>${query}</q>` : ''}
			  `;
			};

		// 2. Create the custom widget
			const customInfiniteHits = instantsearch.connectors.connectInfiniteHits(
				renderInfiniteHits
			);

			const customMenu = instantsearch.connectors.connectMenu(
			  renderMenu
			);

			const customStats = instantsearch.connectors.connectStats(renderStats);

		// 3. Instantiate the custom widget
			search.addWidgets([

				// hits - risultati
				customInfiniteHits({
					container: document.querySelector('#hits')
				}),

				customMenu({
				  container: document.querySelector('#temiricerca'),
				  attribute: 'insieme',
				  showMoreLimit: 30,
				  sortBy:['name'],
  				  searchable: false,
				}),

				customStats({
				   container: document.querySelector('#stats'),
				 }),

				// searchbox
				instantsearch.widgets.searchBox({
					container: '#searchbox',
					searchAsYouType: true,
					autofocus: false,
					showReset: true,
					placeholder: 'Cerca nell\'archivio',
					cssClasses: {
					  form: ['relative', 'h-8', 'opacity-75', 'hover:opacity-100', ],
					  input: ['bg-neutral-100', 'rounded-full', 'pl-8', 'w-full' ],
					  submit: ['absolute', 'h-8', 'w-8', 'right-2', 'top-1.5', 'hover:fill-verde-sa', ],
					  reset: ['absolute', 'h-8', 'w-8', 'left-2', 'top-1.5', 'hover:fill-verde-sa', 'text-center' ]
					},
				}),


				// refinement -- filtra solo in base ai risultati di ricerca
				/* per ora non mi serve */
				instantsearch.widgets.refinementList({
				  container: '#tags',
				  attribute: 'tags',
				}),

				// https://www.algolia.com/doc/api-reference/widgets/current-refinements/js/
				instantsearch.widgets.currentRefinements({
				  container: '#current-refinements',
				}),

				
				// https://www.algolia.com/doc/api-reference/widgets/clear-refinements/js/
				instantsearch.widgets.clearRefinements({
				  container: '#clear-filter',
				  templates: {
				      resetLabel: 'Azzera filtri',
				    },
				  cssClasses: {
				  	root: 'h-8',
				  	// button: ['h-4', 'w-4'],
				  	disabledButton: 'invisible',
				  }
				}),

			]);

		search.start();

	</script>

	    			 <script>
/*
	    			 	// https://www.sitepoint.com/get-url-parameters-with-javascript/
	    			 	function getUrlValues(){
		    			 	let queryString = window.location.search;
		    			 	let urlParams = new URLSearchParams(queryString);
		    			 	let menuTema = urlParams.get('siamoAlpi[menu][insieme]');
		    			 	let tags = urlParams.getAll('siamoAlpi[refinementList][tags][0]');
		    			 	let tag  = tags[0];
		    			 	// non riesco a capire che array e' il tags, riesco solo a prendere il primo [0] ...

		    			 	// console.log(menuTema);
		    			 	// console.log(tag);

		    			 	let infoz = menuTema + ' - ' + tag;
		    			 	return infoz;

		    			};

	    			 	window.onload = console.log(getUrlValues());

						// https://phpcoder.tech/detect-url-change-in-javascript-without-refresh/
	    			 	let lastUrl = window.location.href; 
	    			 	new MutationObserver(() => {
	    			 	  const url = window.location.href;
	    			 	  if (url !== lastUrl) {
	    			 	    lastUrl = url;
	    			 	    console.log(getUrlValues());
	    			 	    // getUrlValues();
	    			 	  }
	    			 	}).observe(document, {subtree: true, childList: true});
	    			 	 

	    			 	  */

	    			 </script>

	<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit.min.js"></script>


</body>
</html>


<!-- 
svg bottone +, riga troppo sottile
<svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 88.9 91.5" style="enable-background:new 0 0 88.9 91.5" xml:space="preserve"><path style="fill:#fff" d="M63.5 44.2H45.6V26.3h-3.3v17.9H24.4v3.2h17.9v17.9h3.3V47.4h17.9z"/><defs><path id="a" d="M6.3 7.6h76.4V84H6.3z"/></defs><clipPath id="b"><use xlink:href="#a" style="overflow:visible"/></clipPath><path d="M44.4 83.6c20.9 0 37.8-16.9 37.8-37.8S65.3 8 44.4 8 6.7 24.9 6.7 45.8c0 20.8 16.9 37.8 37.7 37.8z" style="clip-path:url(#b);fill:none;stroke:#fff;stroke-width:.806"/></svg>

rimpiazzata con heroicons

 -->
