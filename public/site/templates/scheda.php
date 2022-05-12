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
                <div>
                <img src="<?= $scheda->immagini->first->height(660)->url ?>" class="zoom" data-magnify-src="<?= $scheda->immagini->first->url ?>" alt="<?= $scheda->title ?>">   
                </div>

              <p class="text-white text-sm mt-2">
                <svg class='text-verde-sa h-6 w-6 inline' xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                </svg>
                <a target="_blank" href="<?= $scheda->immagini->first->httpUrl ?>">clicca qui per vedere l'immagine a dimensioni originali</a>
              </p>           
              </div>

              <!-- Luogo + Data + Tags list-->
              <div class="ml-1 relative h-98">
                  <!-- Luogo e data -->
                  <?php if ($scheda->luogo->comune || $scheda->datazione->anno) {

                    $quando = ($scheda->datazione->anno_fine) ? $scheda->datazione->anno . " - " . $scheda->datazione->anno_fine : $scheda->datazione->anno;

                    // calcola la decade
                    $decadeDa = (floor($scheda->datazione->anno / 10)) * 10;
                    if ($scheda->datazione->anno_fine) {
                      $decadeA = (ceil($scheda->datazione->anno_fine / 10)) * 10;
                    } else {
                      $decadeA = $decadeDa + 10;
                    }
                    $urlSlider = $archivioPage->url . "?siamoAlpi[range][datazione]=$decadeDa%3A$decadeA" . "&showdate=1";


                    $dove = ($scheda->luogo->localita) ? $scheda->luogo->localita . ", " . $scheda->luogo->comune : $scheda->luogo->comune;
                    echo "
                    <ul class='list-none h2-sa tracking-0 text-white pb-8'>
                      <li><a class='hover:text-verde-sa' href='$urlSlider'>$quando</a></li>
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

                  <div id="altrenote" class="absolute bottom-0 left-0 text-white text-sm">
                    <!-- condividi -->
                    <p class="font-sansBold uppercase">Condividi</p>
                    <ul class="fotoGiornoTags flex flex-row gap-4">
                      <li class="inline">email</li>
                      <li class="inline">facebook</li>
                    </ul>

                    <!-- Separator -->
                    <span class="border-t inline-block border-white w-8 h-1"></span>

                    <!-- licenza -->
                    <p>
                      <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="inline"
                      >
                        <path
                          d="M13.392 10.4362L14.8106 9.0176C14.1031 8.38476 13.169 8 12.145 8C9.93588 8 8.14502 9.79086 8.14502 12C8.14502 14.2091 9.93588 16 12.145 16C13.2563 16 14.2617 15.5468 14.9866 14.8152L13.674 13.5026L13.4646 13.503C13.1124 13.8124 12.6506 14 12.145 14C11.0405 14 10.145 13.1046 10.145 12C10.145 10.8954 11.0405 10 12.145 10C12.6166 10 13.0501 10.1632 13.392 10.4362Z"
                          fill="currentColor"
                        />
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3ZM12 5C15.866 5 19 8.13401 19 12C19 15.866 15.866 19 12 19C8.13401 19 5 15.866 5 12C5 8.13401 8.13401 5 12 5Z"
                          fill="currentColor"
                        />
                      </svg>
                      Licenza
                    </p>

                    
                  </div>

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

