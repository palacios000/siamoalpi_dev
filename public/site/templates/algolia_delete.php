<?php 

/** Cancella le schede con stato di lavorazione ELIMINA
 * Cron impostato esecuzione una volta a settimana
*/

	// settaggio manuale per cancallare tutte i dati da algolia
	$svuotaAlgolia = false; 

	$delRecords = false;

	if ($svuotaAlgolia) {
		$eliminare = $pages->find("template=gestionale_scheda, limit=1"); 
	}else{
		$eliminare = $pages->find("template=gestionale_scheda, stato_avanzamento=2593"); // 2593 = ELIMINA
	}

	if (count($eliminare)) {
		$delRecords = true;
		$delRecordsArray = array();
		foreach ($eliminare as $elimina) {
			$delRecordsArray[] = 'sa'.$elimina->id;
			if (!$svuotaAlgolia) {
				$elimina->trash();
			}
		}

		//var_dump($delRecordsArray);
	}


// manda tutto ad algolia
	if ($delRecords) {
	
		$client = \Algolia\AlgoliaSearch\SearchClient::create('NK1J7ES7IV', '15310a01b90b40aa75122bf82fec47d9');
		$index = $client->initIndex('siamoAlpi');

		$index->deleteObjects($delRecordsArray); 
	}

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