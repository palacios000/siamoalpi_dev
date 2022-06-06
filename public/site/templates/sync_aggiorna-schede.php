<?php 
/**
 *
 * Aggiorna lo status delle schede qualora avesse il campo Sirbec inserito manualmente da listerPro (da Maria o Gloria)
 *
 */

// cerca le schede
// stato_avanzamento: 1109 in lavorazion, 1111 approvata, 1112 esportata, 
$schede = $pages->find("template=gestionale_scheda, stato_avanzamento=1111, codice_esportato!='', limit=30");
if (count($schede)) {
    
    foreach ($schede as $scheda) {
       $scheda->of(false);
       $scheda->stato_avanzamento = 1112;
       $scheda->save();
    }
    $messaggio = 'Aggiornate ' . count($schede) . ' schede da APPROVATA a ESPORTATA';
    wire('log')->save('sync_aggiorna-schede', $messaggio);

}

/**
 *
 * Aggiungi il numero di schede pronte (esportate) alla pagina Ente, 
 *
 */


$enti = $pages->find("template=gestionale_ente");
foreach ($enti as $ente) {
    $esportate = count($ente->children("template=gestionale_scheda, stato_avanzamento=1112"));
    $ente->of(false);
    $ente->counter->records = $esportate;
    $ente->save();
}



/**
 *
 * Sistema categorie che hanno messo a casso
 *
 */

// cerca le schede
// stato_avanzamento: 1109 in lavorazion, 1111 approvata, 1112 esportata, 
/*$schede = $pages->find("template=gestionale_scheda, tema=2284");
if (count($schede)) {
    

    foreach ($schede as $scheda) {
        echo $scheda->title . " <a href='$scheda->url'>qui</a> <br>" ;
       $scheda->of(false);
       $scheda->tema = '';
       $scheda->save();
       $scheda->tema = 3532;
       $scheda->save();
       $scheda->tema = 3531;
       $scheda->save();
    }

}


*/



die()
/* 
 # guida ####################################################################

  * CAMPI del template "gestionale_scheda"
    |=========================|==========|===============|
    | title                   |          |               |
    | tema                    | PageRef  |               |
    | tema_insieme            | PageRef  |               |
    | stato_avanzamento       | PageRef  |               |
    | tags                    | PageRef  |               |
    | codice_esportato        | text     | Codice Sirbec |
    | descrizione             | textarea |               |
    | immagini                | image    |               |
    | file                    | file     |               |
    | valutazione_etnografica | PageRef  |               |
    | valutazione_estetica    | PageRef  |               |
    | **********              |          |               |
*/

?>