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

	    <!-- ricerca  -->
	    <div class="slanted-tr-s relative pb-44 pt-1 bg-white z-0 before:-z-10">
	    	<div class="flex flex-column justify-between">
	    		<div id="stats"></div>
	    		<div id="searchbox"></div>
	    	</div>
	    	<div id="clear-filter"></div>
	    	<div id="temiricerca"></div>
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

	      <!-- Plus icon -->
	      <svg class="w-18 h-18 mx-auto" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
	        <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
	        <circle cx="10" cy="10" r="8" fill="none" stroke-width="0.2" stroke="white"/>

	      </svg>
	      
	    </div>

	    <!-- Footer div -->
	    <?php require 'inc/footer.php' ?>
	  </div>


	</body>






<!-- 



<body class='bg-verde-sa antialiased'>
	<div class="flex flex-column">
		<section class="w-3/4 ">
			<div class="bg-white ">
				<h1 class="text-3xl py-8 px-5">Ricerca contenuti [Prova UIkit]</h1>
				<div id="searchbox" class="p-5"></div>
				<div id="stats" class="p-5 text-sm"></div>
				
				<div id="hits" class="" ></div>
			</div>
			
		</section>
		<section class="w-1/4">
			<div id="clear-filter"></div>
			<h2 class="mt-4 text-white px-4">filtri</h2>
			<div id="refinement-list" class="px-8">
				
			</div>

			<h2 class="mt-4 text-white px-4">Temi di ricerca</h2>
			<div id="temiricerca" class="px-8">
				
			</div>
		</section>
	</div>

 -->

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
						nextButton.classList.add('next-button', 'bg-verde-sa', 'text-white', 'p-3', 'uk-width-1-1');
						nextButton.textContent = 'Mostra altro';
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

					widgetParams.container.appendChild(hideButton);
					widgetParams.container.appendChild(showButton);
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
								<div class='p-8'>
									<div>
										<img class='object-cover w-full' src='${item.immagine}'>
									</div>
									<div class='max-h-36 overflow-hidden'>
									
										<h2 class='font-bold titoloFoto'>
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
			        <li>
			          <a
			            href="${createURL(item.value)}"
			            data-value="${item.value}"
			            style="font-weight: ${item.isRefined ? 'bold' : ''}"
			          >
			            ${item.label} (${item.count})
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
