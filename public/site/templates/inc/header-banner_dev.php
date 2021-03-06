<?php 
// menu pages pagine in _defaultPages.php
?>

<div x-data="{ menu: true }" class="slanted-br-m relative text-white h-fit">
    <!-- Background image -->
    <img class="object-cover overflow-hidden w-full h-full"  src="<?= $bannerBgImg ?>" alt="">
    <!-- Logo -->
    <a class="absolute top-0 left-0 w-82 mt-3 ml-1.5" href="<?= $homeNew ?>">
        <img class=""  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">
    </a>

    <!-- Menu Icon - Hamburger -->
    <div class="h-0" x-on:click="menu = true">
        <button type="button" x-show="!menu">
            <svg class="text-white block h-8 w-8 absolute top-8 right-12" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>

    <?php if ($page->template == 'ricerca_dev' || $page->template == 'ricerca'): ?>
    <div class="absolute top-10 right-30 w-2/3 flex justify-end">
        <div class="flex flex-col w-2/3">
            
            <div class="text-black" id="searchbox"></div>
            
            <ul class="py-4 text-sm text-right pr-4 uppercase font-sansBold">
                <li class="inline ">Ricerca per:</li>
                <li class="inline">
                    <button x-on:click="temi = ! temi" class="pl-3 uppercase" :class="temi ? 'underline underline-offset-4' : ''">Temi</button>
                </li>
                <li class="inline pl-3">
                    <button x-on:click="anni = ! anni" class="uppercase" :class="anni ? 'underline underline-offset-4' : ''">Anni</button>
                </li>
                <li class="inline pl-3">
                    <button x-on:click="mappa = ! mappa" class="uppercase" :class="mappa ? 'underline underline-offset-4' : ''">Mappa</button>
                </li>
                <!-- <li class="inline pl-3">Avanzata</li> -->
            </ul>
        </div>
    </div>
    <?php endif ?>



    <!-- Modal AlpineJS-->
        <div
            x-show="menu"
            style="display: none"
            x-on:keydown.escape.prevent.stop="menu = false"
            role="dialog"
            aria-modal="true"
            x-id="['modal-title']"
            :aria-labelledby="$id('modal-title')"
            class="fixed inset-0 overflow-y-auto z-30 h-screen pb-1" 
        >
            <!-- Overlay -->
            <div x-show="menu" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-40 z-30"></div>

            <!-- Panel -->
            <!-- qui sotto le stesse impostazioni/classes del body -->
            <div
                x-show="menu" x-transition
                x-on:click="menu = false"
                class="relative min-h-screen max-w-screen-xl 2xl:max-w-screen-2xl mx-auto z-50"
            >
                <!-- close botton -->
                <button class="absolute top-8 right-12" x-on:click="menu = ! menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" h-8 w-8 stroke-current text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div
                    x-on:click.stop
                    x-trap.noscroll.inert="menu"
                    class="absolute h-auto w-auto right-0 top-36 z-30"
                >
                    <ul class="text-white h3-sa uppercase ">

                        <?php foreach ($menuPages as $menuPage) {
                            $activePage = ($page->id == $menuPage->id) ? "activePage" : "";
                            echo "
                            
                                <li class='h-18 p-4 bg-blu-sa hover:bg-verde-sa transition float-right'>

                                <a href='$menuPage->url' class='s$activePage'>$menuPage->name</a>
                                
                            </li>
                            <span class='clear-both block'></span>
                            ";
                        } ?>

                       <?php if ($page->editable()) {
                            echo '
                            <li class="h-16 mb-2"><a href="'. $page->editUrl .'" class="bg-verde-sa pl-3 pr-6 ">Edit</a></li>
                            ';
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <span class="h-[4.55rem]"></span>

</div>