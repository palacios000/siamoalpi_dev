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


		<!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-TxKWSXbsweFt0o2WqfkfJRRNVaPdzXJ/YLqgStggBVRREXkwU7OKz+xXtqOU4u8+" crossorigin="anonymous"> -->

		<?php //echo $page->seo; ?>
	

	<!-- </head> -- la chiusa HEAD va nel template --> 


<!-- algolia -->
<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>

<!-- algolia pre connect -->
<link crossorigin href="https://NK1J7ES7IV-dsn.algolia.net" rel="preconnect" />


</head>
<body class='bg-verde-sa antialiased'>
	<div class="uk-grid">
		<section class="uk-width-2-3 ">
			<div class="bg-white ">
				<h1 class="text-3xl py-8 px-5">Ricerca contenuti [Prova UIkit]</h1>
				<div id="searchbox" class="p-5"></div>
				<div id="stats" class="p-5 text-sm"></div>
				
				<div id="hits" class="uk-padding-small" uk-grid="masonry: true"></div>
			</div>
			
		</section>
		<section class="uk-width-1-3">
			<div id="clear-filter"></div>
			<h2 class="mt-4 text-white px-4">filtri</h2>
			<div id="refinement-list" class="px-8">
				
			</div>

			<h2 class="mt-4 text-white px-4">Temi di ricerca</h2>
			<div id="temiricerca" class="px-8">
				
			</div>
		</section>
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
			// https://www.algolia.com/doc/api-reference/widgets/infinite-hits/js/#full-example
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
					ul.classList.add('uk-child-width-1-3', 'uk-grid');
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
								<div class='algCard '>
									<div>
										<img src='${item.immagine}'>
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

		// 2. Create the custom widget
			const customInfiniteHits = instantsearch.connectors.connectInfiniteHits(
				renderInfiniteHits
			);


		// 3. Instantiate the custom widget
			search.addWidgets([

				// hits - risultati
				customInfiniteHits({
					container: document.querySelector('#hits')
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

				instantsearch.widgets.refinementList({
				  container: '#refinement-list',
				  attribute: 'tags',
				  limit: 15,
				  showMore: true,
				  searchable: true,
				  searchablePlaceholder: 'Cerca tra i tags',
				}),

				instantsearch.widgets.menu({
				  container: '#temiricerca',
				  attribute: 'temi',
				}),

					
				
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
	<!-- <script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit-icons.min.js"></script> -->
</body>
</html>
