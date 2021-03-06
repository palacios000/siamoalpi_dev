<?php 

/** MOTORE CRUD SCHEDE CON ALGOLIA
 * 
 * A. La pagina crea un file json che viene poi inviato ad Algolia
 * B. Cancella le schede con stato di lavorazione ELIMINA
 * 
 * L'id dei record Algolia un prefisso "sa" per identificare le schede aggiunte da Siamo Alpi.
 * Mentre per i record OPAC il prefisso e'  "op".
 * 
 * le immagini vanno prima ridotte a dimensione per l'output e poi consegnate ad Algolia
 * Le immagini le prepara un altro script, attivato con Cron, in "gestionale_algolia-imageresize.php"
 * 
 * Le coordinate geocoding viene elaborato da uno script che chiede tramite google API le coordinate 
 * coi valori importati precedentemente dal Sirbec. Per questo aggiorno le schede che sono state
 * sincronizzate AND geo taggate
 *  
 * Lo script php di algolia e' inserito tramite Composer nel root di ProcessWire
*/

// 0 controlla lo stopper se e' attivo, se lo e' blocca tutto
	$error = ($page->counter->stop) ? true : false;
	$debug = false; // non mandare il json ad algolia...
	$jsonName = "algolia.json";
	$filePath = $config->paths->assets . $jsonName;

// 1 prepara la query di ricerca schede

	// selector per trovare le schede da esportare in algolia
	$selector = "template=gestionale_scheda, immagini.count>=1";

	// stato_avanzamento: 1109 in lavorazion, 1111 approvata, 1112 esportata, 3338 da esportare, 2593 eliminata
	$selector .= ", stato_avanzamento=1112|3338";
	if (!$page->counter->reset) {
		// PRODUCTION
		// $selector .= ", (created|modified>=$page->timestamp), (sync.sirbec=1, sync.geocoding=1, sync.fotoready=1) "; 
		// TEMP
		$selector .= ", modified>=$page->timestamp";
	}

	//debug
	// $selector .= ", limit=100";
	// $selector .= ", datazione.anno=''";


	// prepare il contenuto del json
	$json = '';
	if (!$error) {
		$schede = $pages->find($selector);

		$jsonBuild = array();

		// prepara gli array per il $supporto
		$supp_audio = array('mp3', 'ogg');
		$supp_video = array('mp4', 'webm');
		$supp_docs = array('pdf', 'doc', 'docx', 'xls', 'xlsx');

		foreach ($schede as $scheda) {
			$record = array();
				
				// immagine 
					$immagineUrl = '';
					// check if there is our variation -- riprendi il codice e vedi le note di algolia_imageresize.php  

					// PRODUCTION
					$listerwidth = 260;
					$horizontalImageWidth = 350;

					$immagineVerticale = false; 
					$optionsVariations = array('width' => $listerwidth);

					$listerImage = $scheda->immagini->first->getVariations($optionsVariations);
					if (count($listerImage) == 1) {
						// se non c'e' la variante prec. creata da algolia_imageresize, mi tocca crearla ora
						if ($scheda->sync->fotoready != 1) {
							$scheda->immagini->first->width($horizontalImageWidth);
							$scheda->of(false);
							$scheda->sync->fotoready = 1;
							$scheda->save();
						}
						$immagineVerticale = true;
					}
					if ($immagineVerticale) { // prendi la 260
						$immagine = $scheda->immagini->first->getVariations(['width' => 350])->first();
					}else{ // prendi la 350
						$immagine = $scheda->immagini->first->getVariations(['height' => 260])->first();
					}

					// output HTTP URL
					if ($immagine->httpUrl) {
						$immagineUrl = $immagine->httpUrl;	
					}else{
						// mi da' problemi per alcune immagini quasi quadrate... non so perche'
						$immagine = $scheda->immagini->first->width($horizontalImageWidth);
						$immagineUrl = $immagine->httpUrl;	
					}


				// tema & temi raggruppati
					$temi = array();
					$temi_insieme = array();
						foreach ($scheda->tema as $tema) {
							$temi[] = $tema->title;
							foreach ($tema->tema_insieme as $insieme) {
								$temi_insieme[] = $insieme->title;
							}
						}

				// tags
					$tags = array();
						foreach ($scheda->tags as $tag) {
							$tags[] = strtolower($tag->title);
						}

				// valutazione
					/* assegnamo pesi diversi per i due tipi di valutazione della scheda (etnografica / grafica) dando piu' rilievo alla grafica */
					$voto = ($scheda->valutazione_etnografica->codice) + ($scheda->valutazione_estetica->codice * 2);

				// datazione - sirbec dependant 
					// per avere solo un valore faccio la media dei due anni ...
					$annox = '1850';
					$anno_start = '';
					$anno_end = '';
					if ($scheda->datazione->anno) {
						// controlla che ci sia solo l'anno e non la data
						if (strstr($scheda->datazione->anno, "/")) {
							$datax = explode('/', $scheda->datazione->anno);
							$anno_start = $datax[2];
						}else{
							$anno_start = $scheda->datazione->anno;
						}
					}

					if ($scheda->datazione->anno_fine) {
						// controlla che ci sia solo l'anno e non la data
						if (strstr($scheda->datazione->anno_fine, "/")) {
							$datax = explode('/', $scheda->datazione->anno_fine);
							$anno_end = $datax[2];
						}else{
							$anno_end = $scheda->datazione->anno_fine;
						}
					}

					if ($anno_start && $anno_start >= 1800) {
						if ($anno_end) {
							$annox = ($anno_start + $anno_end) / 2 ;
						}else{
							$annox = $anno_start;
						}
					} // else comparira annox default 1950

				// luogo - sirbec dependant 
					// se c'e' bene, altrimenti metto Sondrio
					$latitudine = ($scheda->sync->geocoding || $scheda->mappa->map_desync) ? $scheda->mappa->lat : '46.1700326';
					$longitudine = ($scheda->sync->geocoding || $scheda->mappa->map_desync) ? $scheda->mappa->lng : '9.8676338';

					$geo = (object) array('lat'=> floatval($latitudine), 'lng'=> floatval($longitudine));
					$comune = $scheda->luogo->comune;

				// supporto - per forza almeno immagine
					$supporto = array('immagine');
					if (count($scheda->file)) {
						foreach ($scheda->file as $checkFile) {
							if (in_array($checkFile->ext(), $supp_audio)) {
								$supporto[] = 'audio';
							}
							if (in_array($checkFile->ext(), $supp_video)) {
								$supporto[] = 'video';
							}
							if (in_array($checkFile->ext(), $supp_docs)) {
								$supporto[] = 'documento';
							}
						}
					}

				
				// prepare il json
					$record['objectID'] = "sa".$scheda->id ;
					$record['titolo'] = $sanitizer->markupToLine($scheda->title) ;
					$record['descrizione'] = $sanitizer->markupToLine($scheda->descrizione) ;
					$record['immagine'] = $immagineUrl;
					$record['supporto'] = $supporto;
					$record['url'] = 'https://siamoalpi.it/archivio/scheda/?id='.$scheda->id ;
					$record['zona'] = 'area '.$scheda->parent->display_name;
					$record['ente'] = $scheda->parent->title;
					$record['temi'] = $temi ;
					$record['insieme'] = $temi_insieme ;
					$record['tags'] = $tags ;
					$record['voto'] = $voto ;
					$record['datazione'] = intval($annox) ;
					$record['comune'] = $comune ;
					$record['_geoloc'] = $geo ;	

			$jsonBuild[] = $record;

		}

		$nSchedePronte = count($jsonBuild);
		$json = json_encode($jsonBuild);
	}

// 2. check if it's all valid. Scrivi il json
	if ($json) {
		$result = json_decode($json);
		switch (json_last_error()) {
		       case JSON_ERROR_NONE:
		           $error = ''; // JSON is valid // No error has occurred
		           break;
		       case JSON_ERROR_DEPTH:
		           $error = 'The maximum stack depth has been exceeded.';
		           break;
		       case JSON_ERROR_STATE_MISMATCH:
		           $error = 'Invalid or malformed JSON.';
		           break;
		       case JSON_ERROR_CTRL_CHAR:
		           $error = 'Control character error, possibly incorrectly encoded.';
		           break;
		       case JSON_ERROR_SYNTAX:
		           $error = 'Syntax error, malformed JSON.';
		           break;
		       // PHP >= 5.3.3
		       case JSON_ERROR_UTF8:
		           $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
		           break;
		       // PHP >= 5.5.0
		       case JSON_ERROR_RECURSION:
		           $error = 'One or more recursive references in the value to be encoded.';
		           break;
		       // PHP >= 5.5.0
		       case JSON_ERROR_INF_OR_NAN:
		           $error = 'One or more NAN or INF values in the value to be encoded.';
		           break;
		       case JSON_ERROR_UNSUPPORTED_TYPE:
		           $error = 'A value of a type that cannot be encoded was given.';
		           break;
		       default:
		           $error = 'Unknown JSON error occured.';
		           break;
		   }
		if (!$error) {
			// URL 
			$algoliaURL = $config->urls->httpAssets . $jsonName;
			echo $algoliaURL; // controlla che sia tutto OK
			$algoliaJson = fopen("$filePath", "w");
			fwrite($algoliaJson, $json);
			fclose($algoliaJson);
		}else{
			echo "ERRORE!: ";

			$mail = wireMail();
			$mail->sendSingle(true);
			$mail->to('admin@siamoalpi.it'); 
			$mail->subject("Problema con Algolia, pagina: $page->name");
			$mail->body($error);
			$mail->send();
		}
	}

// 3. aggiorna questa pagina
	if (!$error && !$debug) {
		$page->of(false);
		$page->timestamp = time();
		$page->counter->records = $nSchedePronte;
		$page->save();

		if ($nSchedePronte) {
			wire('log')->save('sync_algolia_add', "$nSchedePronte sinicronizzate");
			// e mandami un'email, per ora
			$mail = wireMail();
			$mail->sendSingle(true);
			$mail->to('admin@siamoalpi.it'); 
			$mail->subject("Algolia sync OK - schede: $nSchedePronte");
			$mail->body("Sinicronizzate $nSchedePronte schede");
			$mail->send();
		}
	}else{
		wire('log')->save('sync_algolia_add', "$error");
	}

// 4. manda tutto ad algolia
	if (!$error && !$debug) {

		$client = \Algolia\AlgoliaSearch\SearchClient::create('NK1J7ES7IV', '15310a01b90b40aa75122bf82fec47d9');
		$index = $client->initIndex('siamoAlpi');

		$records = json_decode(file_get_contents("$algoliaURL"), true);

		$index->saveObjects($records, ['autoGenerateObjectIDIfNotExist' => true]);

	}

echo "<br>" . count($schede);
exit;


/**
 * CAMPI template
 * 
	|===========|=============================|
	| title     |                             |
	| timestamp | datetime                    |
	| counter   | cicli, records, reset, stop |
	|           |                             |
 *
 * 
*/
?>