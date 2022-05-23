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