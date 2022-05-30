<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- tailwind debug -->
		<!-- <script src="https://cdn.tailwindcss.com"></script> -->
		

		<link rel="stylesheet" href="<?= $config->urls->templates?>styles/main.css?v=<?= time() ?>" />
		<link rel="shortcut icon" href="<?= $config->urls->templates?>pictures/favicon.png" />

    	<!-- Alpine -->
    	<script defer src="https://unpkg.com/@alpinejs/focus@3.10.2/dist/cdn.min.js"></script>
		<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>




		<?php if ($page->template != 'home-new'){ ?>
			<!-- algolia -->
			<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>

			<!-- algolia pre connect -->
			<link crossorigin href="https://NK1J7ES7IV-dsn.algolia.net" rel="preconnect" />
	    	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXrz6wL-ik3qZC1ntwgCo8MptNZTiefds">
	    	</script>
		<?php } ?>
	
		<!-- swiper homepage -->
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


		<!-- magniphire image -->
		<!-- https://github.com/thdoan/magnify -->
		<?php if ($page->template == 'scheda') { ?>
			<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.min.js" integrity="sha512-YKxHqn7D0M5knQJO2xKHZpCfZ+/Ta7qpEHgADN+AkY2U2Y4JJtlCEHzKWV5ZE87vZR3ipdzNJ4U/sfjIaoHMfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/css/magnify.min.css" integrity="sha512-wzhF4/lKJ2Nc8mKHNzoFP4JZsnTcBOUUBT+lWPcs07mz6lK3NpMH1NKCKDMarjaw8gcYnSBNjjllN4kVbKedbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify-mobile.min.js" integrity="sha512-c3hGxeqPC+hyYCH6xddUy6sg5lgmXomxpN5fkhUxKPOM7OD/+M+Rj1rj02q4MOkn+PUBRGPZVNTMMrREyZS0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<?php } ?>


		
		<?php // SEO tags 
		/*
		if (count($page->seo)) {
			echo $page->seo;	
		} elseif($page->template == "scheda") {
			// sono in pagina scheda
			echo '
			<title>'.$scheda->title.' | siamoalpi.it</title>
			<link rel="canonical" href="'.$page->httpUrl.'?id='.$scheda->id.'">
			<meta property="og:title" content="'.$scheda->title.' | siamoalpi.it">
			<meta property="og:description" content="'. $sanitizer->markupToLine($scheda->descrizione, ['entities' => true]).'">
			<meta property="og:image" content="'.$scheda->immagini->first->httpUrl.'">
			<meta property="og:image:type" content="image/jpeg">
			<meta property="og:image:width" content="'.$scheda->immagini->first->width().'">
			<meta property="og:image:height" content="'.$scheda->immagini->first->height().'">
			<meta property="og:type" content="website">
			<meta property="og:locale" content="it_IT">
			<meta property="og:site_name" content="siamoalpi.it">
			<meta property="og:url" content="'.$page->httpUrl.'?id='.$scheda->id.'">
			<meta name="twitter:card" content="summary">
			<script type="application/ld+json">
			{
			  "@context": "https://schema.org",
			  "@type": "BreadcrumbList",
			  "itemListElement": [
			  {
			    "@type": "ListItem",
			    "position": 1,
			    "name": "PROGETTO",
			    "item": "'.$page->httpUrl.'?id='.$scheda->id.'"
			  }
			  ]
			}
			</script>
			';
		}*/
		?>


	</head>
