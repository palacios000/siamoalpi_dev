/* todo 
random... https://discourse.algolia.com/t/how-to-randomly-display-hits-on-the-searches-initial-load/10363
 */


const searchClient = algoliasearch('NK1J7ES7IV', '6581401b5f047688ea20ca3f5e6074fd');

const search = instantsearch({
	indexName: 'siamoAlpi',
	searchClient,
	routing: routingUrl,
	initialUiState: {
		siamoAlpi: {
	    	refinementList: filtro
		}
	}
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
			ul.classList.add('grid','grid-cols-1', 'md:grid-cols-3', 'lg:grid-cols-4',);
			ul.setAttribute("uk-grid", "masonry: true");

			// next button - mostra altre schede
			const nextButton = document.createElement('button');
			// nextButton.classList.add('next-button', 'text-white', 'p-3', 'mx-auto', 'block', 'hover:text-verde-sa', 'hover:rotate-90', 'transition');
			// nextButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width=".5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
			nextButton.classList.add('next-button', 'bottone-verde','mx-auto', 'block', 'mt-16');
			nextButton.innerHTML = 'Mostra Altro';
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
								<div x-show='solofoto' class='absolute w-full h-full inset-0 px-4 py-2 text-white font-bold bg-black opacity-0 hover:opacity-70 transition duration-300 leading-5 tracking-03'>${instantsearch.highlight({ attribute: 'titolo', hit: item })}
								</div>

							</div>
							<div class='max-h-36 pt-1 overflow-hidden'>
								<h2 x-show='!solofoto' class='titoloFoto text-white text-sm ml-2'>
									${instantsearch.highlight({ attribute: 'titolo', hit: item })}
								</h2>
								<!-- mobile only -->
								<h2 class='titoloFoto text-white text-sm ml-2 visible md:hidden'>
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
	        <li class='md:inline'>
	          <a
	            href="${createURL(item.value)}"
	            data-value="${item.value}"
	          >
	            <span class="${item.isRefined ? 'underline underline-offset-4' : ''}">${item.label}</span> <span class='text-verde-sa px-1'>${item.count}</span> <span class='px-1 invisible md:visible'>/</span>
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
	      count += `<span class='text-verde-sa'>${nbHits}</span> ${lemmaRisultati}`;
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

	// Custom REFINEMENTS - https://www.algolia.com/doc/api-reference/widgets/current-refinements/js/#full-example

		// Create the render function
		const createDataAttribtues = refinement =>
		  Object.keys(refinement)
		    .map(key => `data-${key}="${refinement[key]}"`)
		    .join(' ');

		const renderListItem = item => `
		  <li class='uppercase inline'>
		    <span class='sr-only'>${item.label}:</span>
		    <ul class='inline'>
		      ${item.refinements
		        .map(
		          refinement =>
		            `<li class='lowercase md:inline pr-4'>
		              <button ${createDataAttribtues(refinement)}><svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6 fill-verde-sa stroke-black hover:fill-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button>
		              ${refinement.label} 
		            </li>`
		        )
		        .join('')}
		    </ul>
		  </li>
		`;

		const renderCurrentRefinements = (renderOptions, isFirstRender) => {
		  const { items, refine, widgetParams } = renderOptions;

		  widgetParams.container.innerHTML = `
		    <ul class='mt-2'>
		      ${items.map(renderListItem).join('')}
		    </ul>
		  `;

		  [...widgetParams.container.querySelectorAll('button')].forEach(element => {
		    element.addEventListener('click', event => {
		      const item = Object.keys(event.currentTarget.dataset).reduce(
		        (acc, key) => ({
		          ...acc,
		          [key]: event.currentTarget.dataset[key],
		        }),
		        {}
		      );

		      refine(item);
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

	const customStats = instantsearch.connectors.connectStats(renderStats);

	const customCurrentRefinements = instantsearch.connectors.connectCurrentRefinements(
	  renderCurrentRefinements
	);

// 3. Instantiate the custom widget
	search.addWidgets([

		// hits - risultati
		customInfiniteHits({
			container: document.querySelector('#hits'),
		}),

		customMenu({
		  container: document.querySelector('#temiricerca'),
		  attribute: 'insieme',
		  limit: 40,
		  showMoreLimit: 40,
		  sortBy:['name'],
			  searchable: false,
		}),

		customStats({
		   container: document.querySelector('#stats'),
		 }),

		customCurrentRefinements({
		  container: document.querySelector('#current-refinements'),
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
			  submit: ['absolute', 'h-8', 'w-8', 'right-2', 'top-1.5', 'hover:fill-verde-sa', 'transition' ],
			  reset: ['absolute', 'h-8', 'w-8', 'left-4', 'top-1.5', 'hover:fill-verde-sa', 'text-center' ]
			},
		}),


		// refinement -- filtra solo in base ai risultati di ricerca
		/* nascosto via css */ // ?siamoAlpi[refinementList][tags][0]=montagna
		instantsearch.widgets.refinementList({
		  container: '#tags',
		  attribute: 'tags',
		}),

		instantsearch.widgets.refinementList({
		  container: '#filtro',
		  attribute: 'temi',
		}),

		
		// https://www.algolia.com/doc/api-reference/widgets/clear-refinements/js/
		instantsearch.widgets.clearRefinements({
		  container: '#clear-filter',
		  templates: {
		      resetLabel: 'RIMUOVI FILTRI',
		    },
		  cssClasses: {
		  	button: ['border', 'border-verde-sa', 'px-4', 'py-1', 'text-sm', 'font-sansBold', 'tracking-widest', 'mt-1', 'hover:text-verde-sa', 'transition' ],
		  	disabledButton: 'invisible',
		  }
		}),

		// slider
		instantsearch.widgets.rangeSlider({
		  container: '#datazione',
		  attribute: 'datazione',

		  pips: true,
		  tooltips: true,
		  step: 5
		}),

		// maps
		// https://www.algolia.com/doc/guides/building-search-ui/ui-and-ux-patterns/geo-search/js/
		// https://www.algolia.com/doc/api-reference/widgets/geo-search/js/
		/*
		instantsearch.widgets.geoSearch({
		  container: '#maps',
		  googleReference: window.google,
		  // Optional parameters
		  initialZoom: 11,
		  initialPosition: {
		      lat: 48.864716,
		      lng: 2.349014,
		    },
		  mapOptions: {
            mapTypeId: window.google.maps.MapTypeId.TERRAIN,
          },
		  // builtInMarker: object,
		  // customHTMLMarker: object,
		  // enableRefine: boolean,
		  enableClearMapRefinement: true,
		  enableRefineControl: false,
		  // enableRefineOnMapMove: false,
		  // templates: object,
		  // cssClasses: object,
		  templates: {
		  	  reset: 'Reimposta zoom mappa',
		  	  HTMLMarker: `
				  	  <span class="marker block w-fit bg-white px-3 py-2 border border-2 border-verde-sa">
		  	            <a href='{{url}}'>{{ titolo }}</a>
		  	          </span>`,
		      //HTMLMarker: '<svg class="w-12 h-12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 42.7 68" style="enable-background:new 0 0 42.7 68;" xml:space="preserve"><style type="text/css">.st0{clip-path:url(#SVGID_2_);fill:#009879;}</style><g><defs><rect id="SVGID_1_" x="5" y="6" width="32.6" height="56"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_"  style="overflow:visible;"/></clipPath><path class="st0" d="M21.3,6C12.3,6,5,13.2,5,22c0,8,6,14.6,13.8,15.8v21.8c0,1.4,1.1,2.5,2.5,2.5s2.5-1.1,2.5-2.5V37.8 C31.6,36.6,37.7,30,37.7,22C37.5,13.2,30.3,6,21.3,6z"/></g></svg>',
		    },
		}),
		*/


	]);

search.start();


