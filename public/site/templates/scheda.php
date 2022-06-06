<?php 
$schedaOK = false;
/* Le informazioni della scheda vengono prelevate tramite il get nell'URL, impostato su Algolia */
$schedaId = $sanitizer->int($input->get->id);
if ($schedaId) {
	$scheda = $pages->get($schedaId);
  if ($scheda->template == "gestionale_scheda") {
  	$schedaOK = true;
  }
}

require 'inc/head.php'; ?>
<body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

  <!-- Content wrapper -->
  <div class="overflow-hidden">
      <!-- FIX A TAG NOT CLICKABLE IN HEADER -->
      <!-- Slanted Header div -->
      <?php 
      //prima di chiamare il banner, assicurati di aver definito l'immagine
      $bannerBgImg = $page->parent->images_bg->getRandom()->url;
      include 'inc/header-banner.php' ?>

      <?php if ($schedaOK){ ?>
      <!-- Picture div -->
      <div class="slanted-tl-sm z-20 before:-z-10 bg-black pt-14 h-fit">

	      <?php if ($user->isLoggedin()) {
	      	$edit = $config->urls->admin . "page/edit/?id=" . $scheda->id;
	      	echo "<a target='_blank' href='$edit' class='bottone-verde'>Modifica scheda</a>";
	      } ?>      
          
          <!-- Picture title -->
          <h1 class="h2-sa uppercase ml-6 md:ml-12 md:w-1/2 text-white">
              <?= $scheda->title ?>
          </h1>
                
          <!-- Picture content container -->
          <div class="flex mx-6 md:mx-12 mt-4 md:mt-10 pb-6 md:pb-14 flex-col md:flex-row">
              <div class="relative md:mr-6 md:mb-1">
                <div>
                  <!-- mobile -->
                  <img class="h-auto md:h-0 visible md:hidden" src="<?= $scheda->immagini->first->height(660)->url ?>"  data-magnify-src="<?= $scheda->immagini->first->url ?>" alt="<?= $scheda->title ?>">  
                  <div class="zoom"></div> 
                  <!-- medium (zoom) -->
                  <img class="zoom h-0 md:h-auto invisible md:visible" src="<?= $scheda->immagini->first->height(660)->url ?>"  data-magnify-src="<?= $scheda->immagini->first->url ?>" alt="<?= $scheda->title ?>">   
                </div>

                <p class="text-white text-sm mt-2 invisible lg:visible h-0 md:h-auto">
                  <svg class='text-verde-sa h-6 w-6 inline' xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                  </svg>
                  <a class="hover:text-verde-sa transition" target="_blank" href="<?= $scheda->immagini->first->httpUrl ?>">Dimensioni originali</a>
                </p>           
              </div>

              <!-- Luogo + Data + Tags list-->
              <div class="ml-1 relative h-auto md:h-98 pb-8 md:pb-0">
                  <!-- Luogo e data -->
                  <?php 
                  $urlSlider = '';
                  $urlMap = '';
                  if ($scheda->luogo->comune || $scheda->datazione->anno) {

                    echo "<ul class='list-none h2-sa tracking-0 text-white pb-8'>";

                    // datazione
                    if ($scheda->datazione->anno) {
                      
                      $quando = ($scheda->datazione->anno_fine) ? $scheda->datazione->anno . " - " . $scheda->datazione->anno_fine : $scheda->datazione->anno;

                      // calcola la decade
                      $decadeDa = (floor($scheda->datazione->anno / 10)) * 10;
                      if ($scheda->datazione->anno_fine) {
                        $decadeA = (ceil($scheda->datazione->anno_fine / 10)) * 10;
                      } else {
                        $decadeA = $decadeDa + 10;
                      }
                      $urlSlider = $archivioPage->url . "?siamoAlpi[range][datazione]=$decadeDa%3A$decadeA" . "&showdate=1";

                      echo "<li><a class='hover:text-verde-sa transition' href='$urlSlider'>$quando</a></li>";
                    }

                    // comune con geo
                    if ($scheda->luogo->comune) {
                      // nome paese, frazione
                      $dove = ($scheda->luogo->localita) ? $scheda->luogo->comune . ", " . $scheda->luogo->localita : $scheda->luogo->comune;

                      // geo lat lng bounding box
                      if ($scheda->mappa->lat && $scheda->mappa->lng) {
                        /** mappa geo ref
                         * 
                          | NW | ==== N ====    |    |
                          | O  | scheda lat/lng | E  |
                          |    | ==== S ====    | SE |

                        valori presi da bounding box mappa
                            |            |        lat        |        lng        |
                            |============|===================|===================|
                            | A          |   46.225749197894 |   10.155965810791 |
                            | B          |  46.1401764406245 |  9.81710625268557 |
                            |            |                   |                   |
                            | differenza | 0.085572757269482 | 0.338859558105469 |
                            |            |                   |                   |
                            | meta'      | 0.042786378634741 | 0.169429779052734 |
                         */
                        $halfLat = 0.042786378634741;
                        $halfLng = 0.169429779052734;

                        $boxNW_lat = $scheda->mappa->lat + $halfLat;
                        $boxSE_lng = $scheda->mappa->lng - $halfLng;
                        //
                        $boxSE_lat = $scheda->mappa->lat - $halfLat;
                        $boxNW_lng = $scheda->mappa->lng + $halfLng;

                        // https://siamoalpi.it/archivio/?siamoAlpi%5BgeoSearch%5D%5BboundingBox%5D=46.225749197894%2C10.155965810791043%2C46.140176440624515%2C9.817106252685575
                        $urlMap = $archivioPage->url . "?siamoAlpi[geoSearch][boundingBox]={$boxNW_lat}%2C{$boxNW_lng}%2C{$boxSE_lat}%2C{$boxSE_lng}";
                        echo "<li><a class='underline underline-offset-8 decoration-1 hover:text-verde-sa transition' href='$urlMap'>$dove</a></li>";
                      }else{
                        echo "<li>$dove</li>";
                      }

                    }


                    echo "</ul>";
                  } 
                  ?>

                  <ul class="list-hash list-inside uppercase h1-sa tracking-0 text-white pb-8">
                  <?php 
                  $urlTag = $archivioPage->url . '?siamoAlpi[refinementList][tags][0]=';
                  	foreach ($scheda->tags as $tag) {
                  	echo "<li><a class='hover:text-verde-sa transition' href='$urlTag{$tag->name}'>$tag->title</a></li>";
                  } ?>	
                  </ul>

                  <div id="altrenote" class="text-white text-sm">
                    <!-- condividi -->
                    <?php // make urls
                    $soggetto = $sanitizer->entities("Condivisione URL da siamoalpi.it") ;
                    $mailtoURL = "mailto:?subject=$soggetto&body=".$page->httpUrl."?id=".$schedaId;  
                    $fbURL = "https://www.facebook.com/sharer/sharer.php?u=".$page->httpUrl."?id=".$schedaId;  
                    ?>
                    <p class="font-sansBold uppercase">Condividi</p>
                    <ul class="fotoGiornoTags flex flex-row gap-4">
                      <li class="inline"><a class="hover:text-verde-sa transition" href="<?= $mailtoURL ?>">email</a></li>
                      <li class="inline"><a class="hover:text-verde-sa transition" href="<?= $fbURL ?>" target="_blank">facebook</a></li>
                    </ul>

                    <!-- Separator -->
                    <span class="border-t inline-block border-white w-8 h-1"></span>

                    <!-- licenza -->
                      <!--NoMinify-->
                      <p>
                        <svg class="inline" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           width="24px" height="24px" viewBox="5.5 -3.5 64 64" enable-background="new 5.5 -3.5 64 64" xml:space="preserve">
                        <g>
                          <circle fill="#FFFFFF" cx="37.785" cy="28.501" r="28.836"/>
                          <path d="M37.441-3.5c8.951,0,16.572,3.125,22.857,9.372c3.008,3.009,5.295,6.448,6.857,10.314
                            c1.561,3.867,2.344,7.971,2.344,12.314c0,4.381-0.773,8.486-2.314,12.313c-1.543,3.828-3.82,7.21-6.828,10.143
                            c-3.123,3.085-6.666,5.448-10.629,7.086c-3.961,1.638-8.057,2.457-12.285,2.457s-8.276-0.808-12.143-2.429
                            c-3.866-1.618-7.333-3.961-10.4-7.027c-3.067-3.066-5.4-6.524-7-10.372S5.5,32.767,5.5,28.5c0-4.229,0.809-8.295,2.428-12.2
                            c1.619-3.905,3.972-7.4,7.057-10.486C21.08-0.394,28.565-3.5,37.441-3.5z M37.557,2.272c-7.314,0-13.467,2.553-18.458,7.657
                            c-2.515,2.553-4.448,5.419-5.8,8.6c-1.354,3.181-2.029,6.505-2.029,9.972c0,3.429,0.675,6.734,2.029,9.913
                            c1.353,3.183,3.285,6.021,5.8,8.516c2.514,2.496,5.351,4.399,8.515,5.715c3.161,1.314,6.476,1.971,9.943,1.971
                            c3.428,0,6.75-0.665,9.973-1.999c3.219-1.335,6.121-3.257,8.713-5.771c4.99-4.876,7.484-10.99,7.484-18.344
                            c0-3.543-0.648-6.895-1.943-10.057c-1.293-3.162-3.18-5.98-5.654-8.458C50.984,4.844,44.795,2.272,37.557,2.272z M37.156,23.187
                            l-4.287,2.229c-0.458-0.951-1.019-1.619-1.685-2c-0.667-0.38-1.286-0.571-1.858-0.571c-2.856,0-4.286,1.885-4.286,5.657
                            c0,1.714,0.362,3.084,1.085,4.113c0.724,1.029,1.791,1.544,3.201,1.544c1.867,0,3.181-0.915,3.944-2.743l3.942,2
                            c-0.838,1.563-2,2.791-3.486,3.686c-1.484,0.896-3.123,1.343-4.914,1.343c-2.857,0-5.163-0.875-6.915-2.629
                            c-1.752-1.752-2.628-4.19-2.628-7.313c0-3.048,0.886-5.466,2.657-7.257c1.771-1.79,4.009-2.686,6.715-2.686
                            C32.604,18.558,35.441,20.101,37.156,23.187z M55.613,23.187l-4.229,2.229c-0.457-0.951-1.02-1.619-1.686-2
                            c-0.668-0.38-1.307-0.571-1.914-0.571c-2.857,0-4.287,1.885-4.287,5.657c0,1.714,0.363,3.084,1.086,4.113
                            c0.723,1.029,1.789,1.544,3.201,1.544c1.865,0,3.18-0.915,3.941-2.743l4,2c-0.875,1.563-2.057,2.791-3.541,3.686
                            c-1.486,0.896-3.105,1.343-4.857,1.343c-2.896,0-5.209-0.875-6.941-2.629c-1.736-1.752-2.602-4.19-2.602-7.313
                            c0-3.048,0.885-5.466,2.658-7.257c1.77-1.79,4.008-2.686,6.713-2.686C51.117,18.558,53.938,20.101,55.613,23.187z"/>
                        </g>
                        </svg>

                        <a class="hover:text-verde-sa transition" target="_blank" href="https://creativecommons.org/licenses/by-nc-sa/4.0/">Licenza</a>
                      </p>
                      <!--/NoMinify-->

                  </div>

              </div>
          </div>
      </div>

      <!-- White div -->
      <div class="bg-white">
          <div class="flex pt-16 px-6 md:px-10 pb-12 md:pb-46 flex-col md:flex-row">
              <!-- Left section -->
              <div class="md:basis-3/5 md:pr-20">
                  <!-- Text section -->
                  <div class="pl-2">
                      <div class="h2-sa uppercase pb-6">
                          Descrizione
                      </div>
  
                      <div class="pb-12 font-bold">
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
              <div class="md:basis-2/5 pl-6 md:pl-13 border-l border-black">
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
      <div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-10 before:-z-10 mx-auto pb-32 pt-10 bg-black">
        <div class="mx-6 md:mx-12 w-fit">

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



      <?php 
      // endif $schedaOK
      }else{
        echo '
        <div class="h-48 w-full">
        <h1 class="h2-sa uppercase mx-auto mt-16 text-white">
            Nessuna scheda trovata, prego riprovare.
        </h1>
        </div>';
      } ?>



      <!--========================================
      =            La foto del giorno            =
      =========================================-->
      <?php include 'foto-del-giorno.php'; ?>

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




  <!-- ### algolia search ### -->
    <!-- // essenziale per farlo passare allo script algolia.js qui sotto -->
    <script>
      var filtro = {'temi': ['<?= $scheda->tema->first->title ?>']};
      var routingUrl = false;
      var lemmaRisultati = 'immagini correlate'; //risultati
    </script>
  <?php require 'inc/scripts.php' ?>

  <!-- magnifire zoon -->
  <script>
  $(document).ready(function() {
    $('.zoom').magnify();
  });
  </script>

</body>
</html>

