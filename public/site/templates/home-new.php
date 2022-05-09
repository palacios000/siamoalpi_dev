<?php 
// logica per reindirizzamento search form 
// ULR: http://localhost:3000/siamoalpi/public/ricerca-test/?siamoAlpi%5Bquery%5D=alpe -->
if ($input->post->cerca) {
    $url = "http://localhost:3000/siamoalpi/public/ricerca-test/?siamoAlpi%5Bquery%5D=";
    $url .= $sanitizer->text($input->post->cerca);
    $session->redirect($url);
}
?>
<?php require 'inc/head.php' ?>
  <body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80" >

    <!-- Content wrapper -->
    <div class="overflow-hidden">
        <!-- Slanted Header div -->
        <?php 
        //prima di chiamare il banner, assicurati di aver definito l'immagine
        $bannerBgImg = $page->images_bg->first->url;
        include 'inc/header-banner.php' ?>
        
        <!-- Slanted Search div -->
        <div class="slanted-tl-m z-20 before:-z-10 pt-12 pb-29 bg-verde-sa">
            <!-- Grid to contain both elements -->
            <div class="flex mx-auto w-full">
                <!-- Ricerca... text -->
                <div class="h2-sa w-52 shrink-0 text-center mr-34 ml-32 text-white">
                    Ricerca tra oltre 12300 immagini e documenti
                </div>
                <!-- Search bar -->
                <div class="w-full flex text-gray-800 h-16 text-right ml-4 mr-11 mt-2">
                    <div class="h2-sa w-full ">
                        <!-- copiato da Algolia search-box -->
                      <form method="post" action="<?php $pages->findOne("template=ricerca")->url ?>?siamoAlpi%5Bquery%5D=" role="search" class="ais-SearchBox-form relative h-8 opacity-75 hover:opacity-100" novalidate=""><input name="cerca" class="ais-SearchBox-input bg-neutral-100 rounded-full pl-8 w-full" type="search" placeholder="Inizia la tua ricerca" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" maxlength="512"><button class="ais-SearchBox-submit absolute h-8 w-8 right-2 top-1.5 hover:fill-verde-sa" type="submit" title="Submit the search query."><svg class="ais-SearchBox-submitIcon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 40 40"> <path d="M26.804 29.01c-2.832 2.34-6.465 3.746-10.426 3.746C7.333 32.756 0 25.424 0 16.378 0 7.333 7.333 0 16.378 0c9.046 0 16.378 7.333 16.378 16.378 0 3.96-1.406 7.594-3.746 10.426l10.534 10.534c.607.607.61 1.59-.004 2.202-.61.61-1.597.61-2.202.004L26.804 29.01zm-10.426.627c7.323 0 13.26-5.936 13.26-13.26 0-7.32-5.937-13.257-13.26-13.257C9.056 3.12 3.12 9.056 3.12 16.378c0 7.323 5.936 13.26 13.258 13.26z"></path> </svg></button><button class="ais-SearchBox-reset absolute h-8 w-8 left-2 top-1.5 hover:fill-verde-sa text-center" type="reset" title="Clear the search query." hidden=""><svg class="ais-SearchBox-resetIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="10" height="10"> <path d="M8.114 10L.944 2.83 0 1.885 1.886 0l.943.943L10 8.113l7.17-7.17.944-.943L20 1.886l-.943.943-7.17 7.17 7.17 7.17.943.944L18.114 20l-.943-.943-7.17-7.17-7.17 7.17-.944.943L0 18.114l.943-.943L8.113 10z"></path> </svg></button><span class="ais-SearchBox-loadingIndicator" hidden=""><svg class="ais-SearchBox-loadingIcon" width="16" height="16" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#444"> <g fill="none" fillrule="evenodd"> <g transform="translate(1 1)" strokewidth="2"> <circle strokeopacity=".5" cx="18" cy="18" r="18"></circle> <path d="M36 18c0-9.94-8.06-18-18-18"> <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform> </path> </g> </g> </svg></span></form>
                    </div>
                </div>
            </div>
        </div>

        <!-- White slanted section -->
        <div class="slanted-tr-s z-30 before:-z-10 h-fit pt-16 pb-32 bg-white">
            <div class="flex w-full">
                <h1 class="h3-sa uppercase shrink-0 w-76 ml-12 mr-34 ">
                    <?= $page->titleH1 ?>
                </h1>
                <div class="mr-34 ">
                    <!-- Text -->
                    <div class="p-sa mb-6">
                        <?= $page->body ?>
                    </div>
                    <!-- Green button -->
                    <a href="#" class="bottone-verde block">Leggi tutto</a>
                </div>
            </div>
        </div>

        <!--============================================
        =            Album tematici section            =
        =============================================-->
        <div class="slanted-tl-l z-40 before:-z-10 pt-10 pb-18 bg-black text-white">
            <!-- Title -->
            <h2 class="h3-sa uppercase text-center">
                Album tematici
            </h2>

            <!-- Grid section with cards -->
            <div class="grid grid-cols-3 gap-x-0 mt-14 mb-9 mx-4">
                <!-- Card 1 -->
                <div class="mx-auto">
                    <!-- Clickable picture -->
                    <a href="#">
                        <img class="mb-4" src="http://via.placeholder.com/385x385" alt="">
                    </a>
                    <!-- Tag -->
                    <a class="h1-sa uppercase" href="">
                        # ANNI 1970
                    </a>
                </div>
                <!-- Card 2 -->
                <div class="mx-auto">
                    <!-- Clickable picture -->
                    <a href="#">
                        <img class="mb-4" src="http://via.placeholder.com/385x385" alt="">
                    </a>
                    <!-- Tag -->
                    <a class="h1-sa uppercase" href="#">
                        # SPORT INVERNALI
                    </a>
                </div>
                <!-- Card 3 -->
                <div class="mx-auto">
                    <!-- Clickable picture -->
                    <a href="#">
                        <img class="mb-4" src="http://via.placeholder.com/385x385" alt="">
                    </a>
                    <!-- Tag -->
                    <a class="h1-sa uppercase" href="#">
                        # RIFUGI E ALPI
                    </a>
                </div>
            </div>
            <!-- Navigation? -->
            <div class="mx-auto w-fit">
                Navigation dots here
            </div>
        </div>

        <!--============================
        =            Diario            =
        =============================-->
        <div class="pb-26 text-white bg-black">
            <!-- Grid container -->
            <div class="relative flex w-full">
                <div class="writing-container inline-block flex-initial basis-3/5 py-36 pl-22 z-20 bg-verde-sa">
                    <div class="unskew-container flex-col">
                        <!-- Overtitle -->
                        <div class="h4-sa mb-2 uppercase">
                            Diario
                        </div>
        
                        <!-- Title -->
                        <h3 class="h5-sa uppercase underline underline-offset-18 decoration-4 overflow-visible">
                            Le tradizioni siamo noi
                        </h3>
        
                        <!-- Button -->
                        <div class="bottone-blu mt-10 ml-1 mb-1">
                            Leggi tutto
                        </div>
                    </div>
                </div>
    
                <!-- Picture container -->
                <div class="absolute h-full z-10 items-center shrink-0 basis-2/5 right-0">
                    <img class="py-10 h-full" src="<?= $config->urls->templates?>pictures/blue-hat.jpg" alt="">
                </div>
            </div>
        </div>

        <!--========================================
        =            La foto del giorno            =
        =========================================-->
        <?php 
        // da capire se serve anche nelle altre pagine e gestione cache
        $fotoGiorno = $pages->find("template=gestionale_scheda, selezione=1")->getRandom();

        if($fotoGiorno->id){ 
            $fotoImg = $fotoGiorno->immagini->first->width(737);
            $fotoGiornoUrl = $pages->findOne("template=scheda")->url . "?id=" . $fotoGiorno->id; ?>

        <div class="relative overflow-hidden text-white pt-18 pb-46 bg-black/60"> 
            <div class="flex w-full px-16 ">
                <!-- Content -->
                <div class="w-1/3 mr-16">
                    <!-- Title -->
                    <h3 class="h4-sa uppercase mb-10">La foto <br> del giorno</h3>
                    <h4 class="h3-sa"><?= $fotoGiorno->title ?></h4>
        
                    <!-- Separator -->
                    <span class="border-t-2 inline-block border-white w-8 h-1"></span>
        
                    <!-- Info grid -->
                    <div class="flex gap-1 p-sa mb-8 w-fit ">
                        <ul class="fotoGiornoTags flex flex-row gap-4">
                        <?php foreach ($fotoGiorno->tags as $tag) {
                            echo "<li class='inline'>$tag->title</li>"; 
                        } ?>
                        </ul>
                    </div>
                    
                    <!-- Button -->
                    <a class="bottone-verde" href="<?= $fotoGiornoUrl ?>">Sfoglia</a>
                </div>
                <!-- Foto -->
                <div class="bg-white p-3">
                    <img src="<?= $fotoImg->url ?>" alt="<?= $fotoGiorno->title ?>">
                </div>
            </div>
            <!-- Background image -->
            <img class="absolute bottom-0 items-center w-full blur-xs -z-10" src="<?= $fotoImg->url ?>" alt="Foto del Giorno">
        </div>
        <?php } ?>

        <?php require 'inc/footer.php' ?>

    </div>


</body>
</html>
