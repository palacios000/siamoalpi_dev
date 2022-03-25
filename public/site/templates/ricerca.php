<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Siamo Alpi | Archivio Culturale di Valtellina e Valchiavenna</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="stylesheet" href="<?php echo $config->urls->templates?>styles/uikit.css" /> -->
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

	  <div class="overflow-hidden">
	    <!-- menu & header -->
	    <div class="slanted-header relative bg-marrone-sa text-white h-fit -z-20">
	      <img class="object-cover overflow-hidden w-full h-full object-cover object-cover"  src="<?= $config->urls->templates?>pictures/bg/siamo-alpi-head-small-1.jpg" alt="BG">
	      <img class="absolute top-0 left-0 w-82 mt-5 ml-1.5"  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">

	      <svg class="text-white block h-8 w-8 absolute top-10 right-10" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
	            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
	      </svg>
	    </div>

	    <section id="algolia" x-data="{ temi: false, solofoto: true }">
	    <!-- ricerca  -->
	    <div class="slanted-tr-s relative pb-20 pt-1 bg-white z-0 before:-z-10">
	    	<div class="px-12 w-full ">
	    	<div class="flex justify-between">
	    		<button x-on:click="solofoto = ! solofoto" class="">solo foto</button>
	    		<div class="w-1/3" id="stats"></div>
	    		<div class="w-2/3">
	    			<ul class="py-4">
	    				<li class="inline ">Ricerca per:</li>
	    				<li class="inline"><button x-on:click="temi = ! temi" class="uppercase font-sansBold pl-3">Temi</button></li>
	    				<li class="inline uppercase font-sansBold pl-3">Anni</li>
	    				<li class="inline uppercase font-sansBold pl-3">Mappa</li>
	    				<li class="inline uppercase font-sansBold pl-3">Avanzata</li>
	    			</ul>
		    		<div class="w-full" id="searchbox"></div>
	    		</div>
	    	</div>
		    </div>
	    	<div x-show="temi">
	    		<div class="w-1/2 mx-auto pt-4">
			    	<div id="clear-filter"></div>
			    	<div class="uppercase font-serif text-h1" id="temiricerca"></div>
	    		</div>
	    	</div>
	    </div>

	    <!-- Grid hits -->
	    <div class="slanted-tl-m h-fit z-40 before:-z-10 mx-auto pt-16 pb-32 bg-black">
	      <!-- Content container -->
	      <div class="mx-12 w-fit pb-16">
	        <!-- Title 
	        <div class="text-white text-left font-serif text-h2 pb-9">
	          <span class="text-verde-sa">130</span> immagini correlate
	        </div> -->
	        <div id="hits" class="" ></div>
	      </div>	      
	    </div>
	    </section>

	    <!-- Footer div -->
	    <?php require 'inc/footer.php' ?>
	  </div>

	</body>


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
						nextButton.classList.add('next-button', 'text-white', 'p-3', 'mx-auto', 'block', 'hover:text-verde-sa');
						nextButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width=".5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
						nextButton.addEventListener('click', () => {
							showMore();
						});

					// show/hide content
						const hideButton = document.createElement('button');
						const showButton = document.createElement('button');
						const hideme = document.getElementsByClassName('titoloFoto');
						var i;
						hideButton.classList.add('bg-verde-sa', 'text-white', 'p-1');
						showButton.classList.add('bg-verde-sa', 'text-white', 'p-1', 'hidden');
						hideButton.textContent = 'nascondi titolo';
						showButton.textContent = 'mostra titolo';
						hideButton.addEventListener('click', () => {
							for (i = 0; i < hideme.length; i++) {
								hideme[i].classList.add('hidden');
							};
							hideButton.classList.add('hidden');
							showButton.classList.remove('hidden');
						});
						showButton.addEventListener('click', () => {
							for (i = 0; i < hideme.length; i++) {
								hideme[i].classList.remove('hidden');
							};
							hideButton.classList.remove('hidden');
							showButton.classList.add('hidden');
						});

					//widgetParams.container.appendChild(hideButton);
					//widgetParams.container.appendChild(showButton);
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
								<div class='p-4'>
									<div>
										<img class='object-cover w-full' src='${item.immagine}'>
									</div>
									<div class='max-h-36 pt-3 overflow-hidden'>
									
										<h2 x-show="solofoto" class='font-bold titoloFoto text-white'>
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

			// Custom MENU -	 https://www.algolia.com/doc/api-reference/widgets/menu/js/#full-example
			// 1. Create a render function
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
			            style="font-weight: ${item.isRefined ? 'bold' : ''}"
			          >
			            ${item.label} <span class='text-verde-sa'>${item.count}</span> /
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


		// 2. Create the custom widget
			const customInfiniteHits = instantsearch.connectors.connectInfiniteHits(
				renderInfiniteHits
			);

			const customMenu = instantsearch.connectors.connectMenu(
			  renderMenu
			);


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
				  sortBy:['count:desc'],
  				  searchable: false,
				}),

				// searchbox
				instantsearch.widgets.searchBox({
					container: '#searchbox',
					searchAsYouType: false,
					autofocus: false,
					showReset: false,
					placeholder: 'Cerca nell\'archivio',
					cssClasses: {
					  form: ['relative', 'h-8', 'w-fit', 'bg-gray-300'],
					  input: ['bg-neutral-100'],
					  submit: ['absolute', 'h-8', 'w-8', 'right-0', 'top-2']
					},
				}),

				// n. risultati
				instantsearch.widgets.stats({
					container: '#stats',
					templates: {
						 text: `
								 {{#hasNoResults}}Nessun risultato trovato{{/hasNoResults}}
								 {{#hasOneResult}}1 risultato trovato{{/hasOneResult}}
								 {{#hasManyResults}}{{#helpers.formatNumber}}{{nbHits}}{{/helpers.formatNumber}} risultati trovati{{/hasManyResults}}
						 `,
					 },
				}),

				// refinement -- filtra solo in base ai risultati di ricerca
/*				instantsearch.widgets.refinementList({
				  container: '#refinement-list',
				  attribute: 'tags',
				  limit: 15,
				  showMore: true,
				  searchable: true,
				  searchablePlaceholder: 'Cerca tra i tags',
				}),
*/
				// instantsearch.widgets.menu({
				//   container: '#temiricerca',
				//   attribute: 'insieme',
				//   limit: 20,
				//   sortBy:['count:desc'],
				//   searchable: false,
				//   showMore: false
				// }),

					
				
				instantsearch.widgets.clearRefinements({
				  container: '#clear-filter',
				  templates: {
				      resetLabel: 'Rimuovi filtri',
				    },
				}),

			]);

		search.start();

	</script>

	<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit.min.js"></script>
</body>
</html>


<!-- 
svg bottone +, riga troppo sottile
<svg class="h-16 w-16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 88.9 91.5" style="enable-background:new 0 0 88.9 91.5" xml:space="preserve"><path style="fill:#fff" d="M63.5 44.2H45.6V26.3h-3.3v17.9H24.4v3.2h17.9v17.9h3.3V47.4h17.9z"/><defs><path id="a" d="M6.3 7.6h76.4V84H6.3z"/></defs><clipPath id="b"><use xlink:href="#a" style="overflow:visible"/></clipPath><path d="M44.4 83.6c20.9 0 37.8-16.9 37.8-37.8S65.3 8 44.4 8 6.7 24.9 6.7 45.8c0 20.8 16.9 37.8 37.7 37.8z" style="clip-path:url(#b);fill:none;stroke:#fff;stroke-width:.806"/></svg>

rimpiazzata con heroicons

 -->
