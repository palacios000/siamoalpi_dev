
/* todo 
random... https://discourse.algolia.com/t/how-to-randomly-display-hits-on-the-searches-initial-load/10363
 */



const searchClient = algoliasearch('NK1J7ES7IV', '6581401b5f047688ea20ca3f5e6074fd');

const search = instantsearch({
	indexName: 'siamoAlpi',
	searchClient,
	routing: true,
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
								<div x-show='solofoto' class='absolute w-full h-full inset-0 px-4 py-2 text-white font-bold bg-black opacity-0 hover:opacity-70 transition duration-300 '>${instantsearch.highlight({ attribute: 'titolo', hit: item })}
									<span class='bottone-bianco-trasparente block absolute bottom-0 left-0 p-4 opacity-100'>Scopri</span>
								</div>

							</div>
							<div class='max-h-36 pt-3 overflow-hidden'>
								<h2 x-show='!solofoto' class='titoloFoto text-white ml-2'>
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

	// Custom REFINEMENTS - https://www.algolia.com/doc/api-reference/widgets/current-refinements/js/#full-example

		// Create the render function
		const createDataAttribtues = refinement =>
		  Object.keys(refinement)
		    .map(key => `data-${key}="${refinement[key]}"`)
		    .join(' ');

		const renderListItem = item => `
		  <li class='uppercase inline pl-6'>
		    ${item.label}:
		    <ul class='inline'>
		      ${item.refinements
		        .map(
		          refinement =>
		            `<li class='lowercase inline'>
		              ${refinement.label} 
		              <button ${createDataAttribtues(refinement)}><svg xmlns="http://www.w3.org/2000/svg" class="inline mb-1 h-6 w-6 fill-verde-sa stroke-black hover:fill-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button>
		            </li>`
		        )
		        .join('')}
		    </ul>
		  </li>
		`;

		const renderCurrentRefinements = (renderOptions, isFirstRender) => {
		  const { items, refine, widgetParams } = renderOptions;

		  widgetParams.container.innerHTML = `
		    <ul>
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
		  showMoreLimit: 30,
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
			  submit: ['absolute', 'h-8', 'w-8', 'right-2', 'top-1.5', 'hover:fill-verde-sa', ],
			  reset: ['absolute', 'h-8', 'w-8', 'left-2', 'top-1.5', 'hover:fill-verde-sa', 'text-center' ]
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

		// https://www.algolia.com/doc/api-reference/widgets/current-refinements/js/
		// instantsearch.widgets.currentRefinements({
		//   container: '#current-refinements',
		// }),

		
		// https://www.algolia.com/doc/api-reference/widgets/clear-refinements/js/
		instantsearch.widgets.clearRefinements({
		  container: '#clear-filter',
		  templates: {
		      resetLabel: 'RIMUOVI FILTRI',
		    },
		  cssClasses: {
		  	button: ['border', 'border-verde-sa', 'px-4', 'py-1', 'font-bold' ],
		  	//button: ['h-4', 'w-4'],
		  	disabledButton: 'invisible',
		  }
		}),

	]);

search.start();

