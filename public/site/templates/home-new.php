<?php 
// logica per reindirizzamento search form 
// ULR: http://localhost:3000/siamoalpi/public/ricerca-test/?siamoAlpi%5Bquery%5D=alpe -->
if ($input->post->cerca) {
    $url = "http://localhost:3000/siamoalpi/public/ricerca-test/?siamoAlpi%5Bquery%5D=".$input->post->cerca;
    $session->redirect($url);
}
?>
<?php require 'inc/head.php' ?>
  <body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto" >

    <!-- Content wrapper -->
    <div class="overflow-hidden">
        <!-- FIX A TAG NOT CLICKABLE IN HEADER -->
        <!-- Slanted Header div -->
        <div class="slanted-br-m relative text-white h-fit">
            <!-- Background image -->
            <img class="object-cover overflow-hidden w-full h-full"  src="<?= $config->urls->templates?>pictures/head/siamo-alpi-head-1.jpg" alt="">
            <!-- Logo -->
            <a class="absolute top-0 left-0 w-82 mt-3 ml-1.5" href="#">
                <img class=""  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">
            </a>

            <!-- Menu Icon -->
            <svg class="text-white block h-8 w-8 absolute top-8 right-12" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </div>
        
        <!-- Slanted Search div -->


        <div class="slanted-tl-m z-20 before:-z-10 pt-12 pb-29 bg-verde-sa">
            <!-- Grid to contain both elements -->
            <div class="flex mx-auto w-full">
                <!-- Ricerca... text -->
                <div class="h2-sa w-52 shrink-0 text-center mr-20 ml-32 text-white">
                    Ricerca tra oltre 12300 immagini e documenti
                </div>
                <!-- Search bar -->
                <div class="w-full flex text-gray-800 h-16 text-right mr-11 mt-2">
                    <div class="h2-sa w-full ">
                      <form method="post" action="<?php $pages->findOne("template=ricerca")->url ?>?siamoAlpi%5Bquery%5D=" role="search" class="ais-SearchBox-form relative h-8 opacity-75 hover:opacity-100" novalidate=""><input name="cerca" class="ais-SearchBox-input bg-neutral-100 rounded-full pl-8 w-full" type="search" placeholder="Inizia la tua ricerca" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" maxlength="512"><button class="ais-SearchBox-submit absolute h-8 w-8 right-2 top-1.5 hover:fill-verde-sa" type="submit" title="Submit the search query."><svg class="ais-SearchBox-submitIcon" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 40 40"> <path d="M26.804 29.01c-2.832 2.34-6.465 3.746-10.426 3.746C7.333 32.756 0 25.424 0 16.378 0 7.333 7.333 0 16.378 0c9.046 0 16.378 7.333 16.378 16.378 0 3.96-1.406 7.594-3.746 10.426l10.534 10.534c.607.607.61 1.59-.004 2.202-.61.61-1.597.61-2.202.004L26.804 29.01zm-10.426.627c7.323 0 13.26-5.936 13.26-13.26 0-7.32-5.937-13.257-13.26-13.257C9.056 3.12 3.12 9.056 3.12 16.378c0 7.323 5.936 13.26 13.258 13.26z"></path> </svg></button><button class="ais-SearchBox-reset absolute h-8 w-8 left-2 top-1.5 hover:fill-verde-sa text-center" type="reset" title="Clear the search query." hidden=""><svg class="ais-SearchBox-resetIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="10" height="10"> <path d="M8.114 10L.944 2.83 0 1.885 1.886 0l.943.943L10 8.113l7.17-7.17.944-.943L20 1.886l-.943.943-7.17 7.17 7.17 7.17.943.944L18.114 20l-.943-.943-7.17-7.17-7.17 7.17-.944.943L0 18.114l.943-.943L8.113 10z"></path> </svg></button><span class="ais-SearchBox-loadingIndicator" hidden=""><svg class="ais-SearchBox-loadingIcon" width="16" height="16" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#444"> <g fill="none" fillrule="evenodd"> <g transform="translate(1 1)" strokewidth="2"> <circle strokeopacity=".5" cx="18" cy="18" r="18"></circle> <path d="M36 18c0-9.94-8.06-18-18-18"> <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform> </path> </g> </g> </svg></span></form>
                    </div>
                </div>
            </div>

        </div>

        <!-- White slanted section -->
        <div class="slanted-tr-s z-30 before:-z-10 h-fit pt-16 pb-32 bg-white">
            <div class="flex w-full">
                <h1 class="h3-sa uppercase shrink-0 w-76 ml-12 mr-34 ">
                    Siamo alpi, un racconto condiviso
                </h1>
                <div class="mr-34 ">
                    <!-- Text -->
                    <div class="p-sa mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.
                    </div>
                    <!-- Green button -->
                    <a href="#" class="bottone-verde block">Leggi tutto</a>
                </div>
            </div>
        </div>

        <!-- Album tematici section -->
        <div class="slanted-tl-l z-40 before:-z-10 pt-10 pb-16 bg-black text-white">
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


        <!-- Split banner section -->
        <div class="pb-10 text-white bg-black">
            <!-- Writings container -->
            <!-- <div class="relative bg-red-200 overflow-hiden  za-20 py-36 pl-12 w-full h-fit mb-26">
                <div class="absolute left-0 bottom-0 -zaa-10 w-1/2 h-full bg-blu-sa -skew-x-1" style="transform: skewX(-0.015turn);">
                </div>
                <div class="w-1/2 h-full absolute top-0 left-0 bg-verde-sa -az-10 ">
                    
                </div>
                
            </div> -->
            <div class="grid grid-cols-2">
                <div class="writing-container relative col-span-1 py-36 pl-12 z-20 bg-verde-sa">
                    <!-- Overtitle -->
                    <div class="h4-sa uppercase">
                        Diario
                    </div>
    
                    <!-- Title -->
                    <h3 class="h5-sa uppercase underline  underline-offset-8 decoration-4 overflow-visible">
                        Le tradizioni siamo noi
                    </h3>
    
                    <!-- Button -->
                    <div class="bottone-blu mt-10 ml-1">
                        Leggi tutto
                    </div>
                    <!-- skew border -->
                    <div class="absolute right-0 bottom-0 -z-10 w-1/2 h-full bg-verde-sa -skew-x-1" >
                    </div>
                </div>
    
                <!-- Picture container -->
                <div class="my-10 z-10">
                    <img class="py-10 " src="<?= $config->urls->templates?>pictures/blue-hat.jpg" alt="">
                </div>
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


</body>
</html>
