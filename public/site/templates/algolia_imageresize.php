<?php 

/** RIDIMENSIONA LE IMMAGINI PER ALGOLIA
 * 
 * Script da attivare con un CronJob in modo che le immagini
 * siano pronte quando l'altro script che generea il json (sempre per algolia)
 * non debba stare a ridimensionare 1000+ immagini. In pratica riduco il load del server.
 * 
 * 260px: misura che utilizza ListerPro per ridimensionare le immagini, per l'anteprima di della tabella (260w per immagini verticali e 260w per immagini orizzontali)
 * 
 * trovo le immagini ridimensionate il larghezza 260px da lister, ovvero le immagini verticali. Se esistono, creo un'altra variante un po' pou' grande di 305px di larghezza.
 * 
 * (le immagini orizzontali vengono ridimensionate in altezza 260px, e non hanno bisogno di ritocchi perche la larghezza supera i 305 px). 
*/



$schede = $pages->find("template=gestionale_scheda, limit=15, sort=random, stato_avanzamento!=2593, sync.fotoready!=1");
$listerwidth = 260; 
$optionsVariations = array('width' => $listerwidth);

$nSchede = count($schede); 
$idScheda = "";
if ($nSchede >= 1) {
	
	foreach ($schede as $scheda) {
		// echo  "scheda: " . $scheda->title . " id:" . $scheda->id . "<br>";
		if (count($scheda->immagini)) {

			foreach ($scheda->immagini as $immagine) {
				//trovami la versione di Lister
				$listerImage = $immagine->getVariations($optionsVariations);
				if (count($listerImage) == 1) {
					$immagine->width(305);
					// echo "trovata un'immagine 260 <br>";
					// echo $immagine->name . " immagine ridimensionata <br>";
				}
			}

			// aggiorna il check della scheda
			$scheda->of(false);
			$scheda->sync->fotoready = 1;
			$scheda->save();
			$idScheda .= " id:$scheda->id ,"; 
			
		}
	}
	wire('log')->save('sync_algolia_imagersize', "$nSchede controllate: $idScheda");
}


?>