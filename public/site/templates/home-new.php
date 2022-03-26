<?php require 'inc/head.php' ?>
  <body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

    <!-- Content wrapper -->
    <div class="overflow-hidden">
        <!-- FIX A TAG NOT CLICKABLE IN HEADER -->
        <!-- Slanted Header div -->
        <div class="slanted-br-m relative text-white h-fit">
            <!-- Background image -->
            <img class="object-cover overflow-hidden w-full h-full"  src="<?= $config->urls->templates?>pictures/head/siamo-alpi-head-1.jpg" alt="Old lady">
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
                <div class="w-full flex text-gray-800 bg-white h-16 text-right mr-11 mt-2">
                    <div class="h2-sa pr-5 py-4 w-full ">
                      inizia qui la tua ricerca
                    </div>
                    <!-- Search Icon -->
                   <svg class="w-16 h-16" fill="currentColor" viewBox="-3 -6 35 35" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clipRule="evenodd" /></svg>
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
                    <a href="#">
                        <div class="bottone-verde">
                            Leggi tutto
                        </div>
                    </a>
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
