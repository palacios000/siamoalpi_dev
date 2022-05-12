<?php 
/* Le informazioni della scheda vengono prelevate tramite il get nell'URL, impostato su Algolia */
$schedaId = $sanitizer->int($input->get->id);
if ($schedaId) {
	$scheda = $pages->get($schedaId);
	$schedaOK = true;
}else{
	$schedaOK = false;
}

require 'inc/head.php'; ?>
<body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

  <!-- Content wrapper -->
  <div class="overflow-hidden">
      <!-- FIX A TAG NOT CLICKABLE IN HEADER -->
      <!-- Slanted Header div -->
      <?php 
      //prima di chiamare il banner, assicurati di aver definito l'immagine
      $bannerBgImg = $config->urls->templates . 'pictures/head/siamo-alpi-head-small-5.jpg';
      include 'inc/header-banner.php' ?>


      <!-- Picture div -->
      <div class="slanted-tl-sm z-20 before:-z-10 bg-black pt-14 h-fit">

	      <?php if ($user->isLoggedin()) {
	      	$edit = $config->urls->admin . "page/edit/?id=" . $scheda->id;
	      	echo "<a target='_blank' href='$edit' class='bottone-verde'>Modifica scheda</a>";
	      } ?>
          <!-- Picture title -->
          <h1 class="h2-sa uppercase ml-12 w-81 text-white">
              <?= $scheda->title ?>
          </h1>
                
          <!-- Picture content container -->
          <div class="flex mx-12 mt-10 pb-14">
              <div class="relative mr-6 mt-2 mb-1">

                <img src="<?= $scheda->immagini->first->height(660)->url ?>" class="zoom" data-magnify-src="<?= $scheda->immagini->first->url ?>" alt="<?= $scheda->title ?>">              
              </div>

              <!-- Luogo + Data + Tags list-->
              <div class="ml-1">
                  <!-- Luogo e data -->
                  <?php if ($scheda->luogo->comune || $scheda->datazione->anno) {
                    $quando = ($scheda->datazione->anno_fine) ? $scheda->datazione->anno . " - " . $scheda->datazione->anno_fine : $scheda->datazione->anno;
                    $dove = ($scheda->luogo->localita) ? $scheda->luogo->localita . ", " . $scheda->luogo->comune : $scheda->luogo->comune;
                    echo "
                    <ul class='list-none h2-sa tracking-0 text-white pb-8'>
                      <li>$quando</li>
                      <li>$dove</li>
                    </ul>                    
                    ";
                  } ?>

                  <ul class="list-hash list-inside uppercase h1-sa tracking-0 text-white">
                  <?php 
                  $urlTag = $archivioPage->url . '?siamoAlpi[refinementList][tags][0]=';
                  	foreach ($scheda->tags as $tag) {
                  	echo "<li><a href='$urlTag{$tag->name}'>$tag->title</a></li>";
                  } ?>	
                  </ul>

              </div>
          </div>

      </div>

      <!-- White div -->
      <div class="bg-white">
          <div class="flex pt-16 px-10 pb-46">
              <!-- Left section -->
              <div class="basis-3/5 pr-20 mr-3">
                  <!-- Text section -->
                  <div class="pl-2">
                      <div class="h2-sa uppercase pb-6">
                          Descrizione
                      </div>
  
                      <div class="p-sa pb-12 font-bold">
                          <?= $scheda->descrizione ?>
                      </div>

                      <!-- <div class="h2-sa uppercase pb-6">
                          Testimonianze
                          <ul class="list-disc text-sm lowercase">
                            <li>audio racconti...</li>
                            <li>riprese video...</li>
                          </ul>
                      </div> -->
                  </div>

                  
              </div>

              <!-- Audio racconti side section -->
              <div class="basis-2/5 pl-13">
                  <?php if ($scheda->autore) {
                    echo "
                    <div class='mb-6'>
                      <p class='text-sm font-sansBold uppercase'>Autore</p>
                      <p class=''>$scheda->autore</p>
                    </div>
                    ";
                  } ?>
                  <div class='mb-6'>
                    <p class='text-sm font-sansBold uppercase'>Archivio</p>
                    <p class=''><?= $scheda->parent->title ?></p>
                  </div>


                  <!-- <a class="block w-fit bottone-verde mt-4" href="#">
                      Scheda pdf
                  </a> -->
              </div>
          </div>
      </div>

          

      <!--=============================
      =            algolia more       =
      ==============================-->
      <div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-10 before:-z-10 mx-auto pb-32 bg-black">
      <div class="mx-12 w-fit pb-16">

          <!-- filtri / div nascosti -->
          <div id="searchbox" class="hidden"></div>
          <div id="maps" class="hidden"></div>
          <div id="datazione" class="hidden"></div>
          <div id="temiricerca" class="hidden"></div>

        <section id="grigliaAlg">
          <?php include 'inc/grigliaImmagini.php' ?>
        </section>
      </div>
      </div>

      <!-- La foto del giorno section -->
      <div class="relative overflow-hidden text-white pt-18 pb-46 bg-black/60"> 
          <!-- Content container -->
          <div class="flex w-full px-16 ">
              <!-- Lefthand side content -->
              <div class="w-1/3 mr-16">
                  <!-- Title -->
                  <h3 class="h4-sa uppercase mb-10">
                      La foto <br> del giorno
                  </h3>

                  <!-- Subtitle -->
                  <h4 class="h3-sa">
                      Il pellegrinaggio alla chiesa di Bianzone
                  </h4>
      
                  <!-- Separator -->
                  <span class="border-t-2 inline-block border-white w-8 h-1"></span>
      
                  <!-- Info grid -->
                  <div class="flex gap-1 p-sa mb-8 w-fit ">
                      <!-- Qui aggiustare il separatore | -->
                      <!-- Date -->
                      <div class="">
                          1970 |
                      </div>
                      <!-- text -->
                      <div class="">
                          montagna |
                      </div>
                      <div class="">
                          alpi |
                      </div>
                      <div class="">
                          alberi
                      </div>
                  </div>
                  
                  <!-- Button -->
                  <a href="">
                      <div class="bottone-verde">
                          Sfoglia
                      </div>
                  </a>
              </div>
              <!-- Righthand content -->
              <div class="bg-white p-3">
                  <img src="<?= $config->urls->templates?>pictures/foto-del-giorno.jpg" alt="">
              </div>
          </div>
          <!-- Background image -->
          <!-- Needs to be centered vertically? -->
          <img class="absolute bottom-0 items-center w-full -z-10" src="<?= $config->urls->templates?>pictures/foto-del-giorno.jpg" alt="">
      </div>

      <?php require 'inc/footer.php' ?>

  </div>
<?php 
/**
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

 <!-- algolia search -->

           <!-- DA SISTEMARE -->
           <script 
               src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXrz6wL-ik3qZC1ntwgCo8MptNZTiefds">
           </script>


  <script>
  // essenziale per farlo passare allo script algolia.js qui sotto
   var filtro = {'temi': ['<?= $scheda->tema->first->title ?>']};
  </script>
  <script src="<?= $config->urls->templates?>js/algolia.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/uikit@3.13.1/dist/js/uikit.min.js"></script>

  <script>
  $(document).ready(function() {
    $('.zoom').magnify();
  });
  </script>

</body>
</html>

