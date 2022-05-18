<?php

/**
  *
  * template ad uso interno
  *
  */

$fotoGiorno = $pages->find("template=gestionale_scheda, selezione=1")->getRandom();


if($fotoGiorno->id){ 
    $fotoImg = $fotoGiorno->immagini->first->height(530);
    $fotoGiornoUrl = $pages->findOne("template=scheda")->url . "?id=" . $fotoGiorno->id; ?>

	<div class="relative overflow-hidden text-white pt-18 pb-46 bg-black/60"> 
	    <div class="flex w-full px-16 ">
	        <!-- Content -->
	        <div class="w-1/2 mr-8">
	            <!-- Title -->
	            <h3 class="h4-sa uppercase mb-10">La foto <br> del giorno</h3>
	            <h4 class="h3-sa"><?= $fotoGiorno->title ?></h4>

	            <!-- Separator -->
	            <span class="border-t-2 inline-block border-white w-8 h-1"></span>

	            <!-- Info grid -->
	            <div class="flex gap-1 p-sa mb-8 w-fit ">
	                <ul class="fotoGiornoTags flex flex-row gap-4">
	                <?php foreach ($fotoGiorno->tags("limit=3") as $tag) {
	                    echo "<li class='inline-block'>$tag->title</li>"; 
	                } ?>
	                </ul>
	            </div>
	            
	            <!-- Button -->
	            <a class="bottone-verde" href="<?= $fotoGiornoUrl ?>">Sfoglia</a>
	        </div>
	        <!-- Foto -->
	        <div class="w-full">
	            <img class="max-h-97 bg-white p-3 mx-auto" src="<?= $fotoImg->url ?>" alt="<?= $fotoGiorno->title ?>">
	        </div>
	    </div>
	    <!-- Background image -->
	    <img class="absolute bottom-0 items-center w-full blur-xs -z-10" src="<?= $fotoImg->url ?>" alt="Foto del Giorno">
	</div>
<?php } ?>