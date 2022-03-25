<?php require 'inc/head.php' ?>
  <body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

    <!-- Content wrapper -->
    <div class="overflow-hidden">
        <!-- FIX A TAG NOT CLICKABLE IN HEADER -->
        <!-- Slanted Header div -->
        <div class="slanted-br-m relative text-white h-fit -z-20">
            <!-- Background image -->
            <img class="object-cover overflow-hidden w-full h-full"  src="<?= $config->urls->templates?>pictures/head/siamo-alpi-head-small-5.jpg" alt="Old lady">
            <!-- Logo -->
            <a class="absolute top-0 left-0 w-82 mt-5 ml-1.5" href="#">
                <img class=""  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">
            </a>

            <!-- Menu Icon -->
            <svg class="text-white block h-8 w-8 absolute top-10 right-10" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </div>
        
        <!-- Picture div -->
        <div class="slanted-tl-sm text-white z-20 before:-z-10 bg-black pt-14 h-[1200px]">
            <!-- Picture title -->
            <h1 class="h2-sa uppercase ml-12 w-60">
                Il titolo dell'immagine su più righe
            </h2>

            <!-- Picture content container -->
            <div class="flex mx-12 my-10">
                <!-- Picture -->
                <div class="relative mr-6 mt-2 bg-white">
                    <img class="p-2.5" src="http://via.placeholder.com/785x590" alt="">
                    <!-- Fix clickable area -->
                    <a href="#">
                        <svg class="absolute w-10 top-5 right-7 fill-verde-sa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" >    
                            <circle viewBox="0 0 50 50" cx="25" cy="25" r="24" stroke="white" stroke-width="2" />
                            <path class="fill-white" d="M37,26H26v11h-2V26H13v-2h11V13h2v11h11V26z">
                            </path>
                        </svg>
                    </a>
                </div>

                <!-- Tags list-->
                <div class="ml-1">
                    <ul class="list-hash list-inside uppercase h1-sa tracking-0">
                        <li>Anni 1930</li>
                        <li>Parametro tag</li>
                        <li>Parametro tag</li>
                        <li>Parametro tag</li>
                        <li>Parametro tag</li>
                        <li>Parametro tag</li>
                    </ul>

                    <div class="bottone-verde mt-4">
                        Scheda pdf
                    </div>
                    
                </div>
            </div>

        </div>

        <!-- White div -->
        <div class="h-[725px] bg-white">

        </div>

        <!-- Grid div -->
        <div class="slanted-tr-m h-fit z-40 before:-z-10 mx-auto pt-16 pb-32 bg-black">
            <!-- Content container -->
            <div class="mx-12 w-fit pb-16">
            <!-- Title -->
            <div class="text-white text-left font-serif text-h2 pb-9">
                <span class="text-verde-sa">130</span> immagini correlate
            </div>
            <!-- Picture masonry grid -->
            <img class="mx-auto" src="http://via.placeholder.com/1336x400" alt="">
            </div>

            <!-- Plus icon -->
            <svg class="w-18 h-18 mx-auto" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            <circle cx="10" cy="10" r="8" fill="none" stroke-width="0.2" stroke="white"/>

            </svg>
            
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