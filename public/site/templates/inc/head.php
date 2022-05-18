<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Siamo Alpi | Archivio Culturale di Valtellina e Valchiavenna</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?= $config->urls->templates?>styles/main.css" />
		<link rel="shortcut icon" href="<?= $config->urls->templates?>pictures/favicon.png" />

    	<!-- da sostituire in production START -->
    	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    	<script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
		<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    	<!-- da sostituire in production END -->

    	<script 
    	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXrz6wL-ik3qZC1ntwgCo8MptNZTiefds">
    	</script>


		<?php if ($page->template != 'home-new'){ ?>
		<!-- algolia -->
		<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>

		<!-- algolia pre connect -->
		<link crossorigin href="https://NK1J7ES7IV-dsn.algolia.net" rel="preconnect" />
		<?php } ?>
	
		<!-- swiper homepage -->

		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
		<!-- tailwind debug -->
		<!-- <script src="https://cdn.tailwindcss.com"></script> -->


		<!-- magniphire image -->
		<!-- https://github.com/thdoan/magnify -->
		<?php if ($page->template == 'scheda') { ?>
		<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify.min.js" integrity="sha512-YKxHqn7D0M5knQJO2xKHZpCfZ+/Ta7qpEHgADN+AkY2U2Y4JJtlCEHzKWV5ZE87vZR3ipdzNJ4U/sfjIaoHMfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/css/magnify.min.css" integrity="sha512-wzhF4/lKJ2Nc8mKHNzoFP4JZsnTcBOUUBT+lWPcs07mz6lK3NpMH1NKCKDMarjaw8gcYnSBNjjllN4kVbKedbw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.3/js/jquery.magnify-mobile.min.js" integrity="sha512-c3hGxeqPC+hyYCH6xddUy6sg5lgmXomxpN5fkhUxKPOM7OD/+M+Rj1rj02q4MOkn+PUBRGPZVNTMMrREyZS0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<?php } ?>






	</head>
