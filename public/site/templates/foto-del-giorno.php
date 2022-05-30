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

	<div class="relative overflow-hidden text-white pt-18 pb-46 bg-black/60 bg-cover bg-center bg-blend-darken" style="background-image: url('<?= $fotoImg->url ?>')"> 
	    <div class="flex w-full px-6 md:px-16 flex-col md:flex-row justify-end">
	        <!-- Content -->
	        <div class="w-full md:w-1/2 mr-0 md:mr-8">
	            <!-- Title -->
	            <h3 class="text-h3mobile md:text-h4 leading-none md:leading-relaxed-sa tracking-02 font-serif uppercase mb-0 md:mb-10">La foto <br> del giorno</h3>
	            <!-- <h3 class="h4-sa uppercase mb-0 md:mb-10">La foto <br> del giorno</h3> -->
	            <h4 class="h3-sa invisible md:visible h-0 md:h-auto"><?= $fotoGiorno->title ?></h4>

	            <!-- Separator -->
	            <span class="border-t-2 inline-block border-white w-8 h-1 invisible md:visible h-0 md:h-auto"></span>

	            <!-- Info grid -->
	            <div class="flex gap-1 p-sa mb-8 w-fit invisible md:visible h-0 md:h-auto">
	                <ul class="fotoGiornoTags flex flex-row gap-4">
	                <?php foreach ($fotoGiorno->tags("limit=3") as $tag) {
	                    echo "<li class='inline-block'>$tag->title</li>"; 
	                } ?>
	                </ul>
	            </div>
	            
	            <!-- Button md: -->
	            <a class="bottone-verde invisible md:visible h-0 md:h-auto" href="<?= $fotoGiornoUrl ?>">Sfoglia</a>
	        </div>
	        <!-- Foto -->
	        <div class="w-full -mt-12 md:mt-0">
	            <img class="max-h-97 bg-white p-3 mx-auto" src="<?= $fotoImg->url ?>" alt="<?= $fotoGiorno->title ?>">
	        </div>

	        <!-- Button sm: -->
	        <a class="bottone-verde block md:hidden mt-8" href="<?= $fotoGiornoUrl ?>">Sfoglia</a>
	    </div>
	    <!-- Background image -->
	    <!-- <img class="absolute top-0 md:bottom-0 items-center w-auto md:w-full h-full md:h-auto blur-xs -z-10 bg-cover bg-center" src="<?= $fotoImg->url ?>" alt="Foto del Giorno"> -->
	</div>
<?php } ?>