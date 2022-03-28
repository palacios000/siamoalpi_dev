<?php require 'inc/head.php' ?>
  <body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

    <!-- Content wrapper -->
    <div class="overflow-hidden">
        <!-- FIX A TAG NOT CLICKABLE IN HEADER -->
        <!-- Slanted Header div -->
        <div class="slanted-br-m relative text-white h-fit">
            <!-- Background image -->
            <img class="object-cover overflow-hidden w-full h-full"  src="<?= $config->urls->templates?>pictures/head/siamo-alpi-head-small-5.jpg" alt="Old lady">
            <!-- Logo -->
            <a class="absolute top-0 left-0 w-82 mt-3 ml-1.5" href="#">
                <img class=""  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">
            </a>

            <!-- Menu Icon -->
            <svg class="text-white block h-8 w-8 absolute top-8 right-12" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </div>

        <!-- Picture div -->
        <div class="slanted-tl-sm text-white z-20 before:-z-10 bg-black pt-14 h-fit">
            <!-- Picture title -->
            <h1 class="h2-sa uppercase ml-12 w-60">
                Il titolo dell'immagine su più righe
            </h2>

            <!-- Picture content container -->
            <div class="flex mx-12 mt-10 pb-14">
                <!-- Picture -->
                <div class="relative mr-6 mt-2 mb-1 bg-white">
                    <img class="p-2.5" src="http://via.placeholder.com/785x590" alt="">
                    <!-- Fix clickable area -->
                    <a class="absolute w-10 h-10 top-5 right-7 rounded-full" href="#">
                        <svg class="w-10 fill-verde-sa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" >    
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

                    <a class="block w-fit" href="#">
                        <div class="bottone-verde mt-4">
                            Scheda pdf
                        </div>
                    </a>
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </div>
                    </div>

                    <!-- Parametri tecnici -->
                    <a href="#">
                        <div class="flex w-full h-fit py-1.5 bg-grigio-blu-sa h2-sa uppercase items-center pl-3">
                            Parametri tecnici
                            <svg class="w-16 ml-auto stroke-1 pr-3" xmlns="http://www.w3.org/2000/svg" viewBox="-20 -20 65 65" fill-rule="evenodd" clip-rule="evenodd"><path stroke="black" d="M11 11v-11h1v11h11v1h-11v11h-1v-11h-11v-1h11z"/></svg>                        
                        </div>
                    </a>
                </div>

                <!-- Audio racconti side section -->
                <div class="basis-2/5 pl-13">
                    <div class="h2-sa uppercase tracking-0">
                        Audio racconti
                    </div> 
                    <div>
                        <div class="w-[360px] h-[65px] rounded-full bg-gray-300/30 mt-9">
                        </div>
                        <div class="p-sa pt-3">
                            il ricordo di <span class="font-black">Andrea Sutti</span>
                        </div>
                    </div>
                    <div>
                        <div class="w-[360px] h-[65px] rounded-full bg-gray-300/30 mt-9">
                        </div>
                        <div class="p-sa pt-3">
                            il ricordo di <span class="font-black">Andrea Sutti</span>
                        </div>
                    </div>
                    <div>
                        <div class="w-[360px] h-[65px] rounded-full bg-gray-300/30 mt-9">
                        </div>
                        <div class="p-sa pt-3">
                            il ricordo di <span class="font-black">Andrea Sutti</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid div -->
        <div class="slanted-tr-m h-fit z-40 before:-z-10 mx-auto pt-2.5 pb-32 bg-black">
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
            <svg class="w-18 h-18 mx-auto" fill="white" viewBox="0 0 25 25" xmlns="http://www.w3.5org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M11.5 0c6.347 0 11.5 5.153 11.5 11.5s-5.153 11.5-11.5 11.5-11.5-5.153-11.5-11.5 5.153-11.5 11.5-11.5zm0 1c5.795 0 10.5 4.705 10.5 10.5s-4.705 10.5-10.5 10.5-10.5-4.705-10.5-10.5 4.705-10.5 10.5-10.5zm.5 10h6v1h-6v6h-1v-6h-6v-1h6v-6h1v6z"/></svg>
            
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