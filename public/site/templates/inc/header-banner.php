<?php 
// da sostituire poi
$homeNew = $pages->findOne("template=home-new")->url;
$archivioNew = $pages->findOne("template=ricerca")->url;
$blogNew = $pages->findOne("template=blog")->url;
?>

<div x-data="{ menu: false }" class="slanted-br-m relative text-white h-fit">
    <!-- Background image -->
    <img class="object-cover overflow-hidden w-full h-full"  src="<?= $bannerBgImg ?>" alt="">
    <!-- Logo -->
    <a class="absolute top-0 left-0 w-82 mt-3 ml-1.5" href="<?= $homeNew ?>">
        <img class=""  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">
    </a>

    <!-- Menu Icon -->
    <div class="h-0" x-on:click="menu = true">
        <button type="button" x-show="!menu">
            <svg class="text-white block h-8 w-8 absolute top-8 right-12" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>

    <?php if ($page->template == 'ricerca'): ?>
    <div class="absolute top-10 right-30 w-2/3 flex justify-end">
        <div class="flex flex-col w-2/3">
            
            <div class="text-black" id="searchbox"></div>
            
            <ul class="py-4 text-sm text-right pr-4 uppercase font-sansBold">
                <li class="inline ">Ricerca per:</li>
                <li class="inline"><button x-on:click="temi = ! temi" class="pl-3 uppercase" :class="temi ? 'underline underline-offset-4' : ''">Temi</button></li>
                <li class="inline pl-3">Anni</li>
                <li class="inline pl-3">Mappa</li>
                <li class="inline pl-3">Avanzata</li>
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
            class="fixed inset-0 overflow-y-auto z-30" 
        >
            <!-- Overlay -->
            <div x-show="menu" x-transition.opacity class="fixed inset-0 bg-blu-sa bg-opacity-70 z-30"></div>

            <!-- Panel -->
            <!-- qui sotto le stesse impostazioni/classes del body -->
            <div
                x-show="menu" x-transition
                x-on:click="menu = false"
                class="relative min-h-screen max-w-screen-xl 2xl:max-w-screen-2xl mx-auto z-50"
            >
                <div
                    x-on:click.stop
                    x-trap.noscroll.inert="menu"
                    class="absolute h-auto w-auto right-0 top-36 z-30"
                >
                    <ul class="text-right text-white h3-sa uppercase">

                        <li class="my-2"><a href="<?= $homeNew ?>" class="bg-blu-sa py-3 pl-3 pr-6 ">Home</a></li>
                        <li class="my-2"><a href="" class="bg-blu-sa py-3 pl-3 pr-6 ">(Progetto)</a></li>
                        <li class="my-2"><a href="<?= $archivioNew ?>" class="bg-blu-sa py-3 pl-3 pr-6 ">Ricerca</a></li>
                        <li class="my-2"><a href="<?= $blogNew ?>" class="bg-blu-sa py-3 pl-3 pr-6 ">Diario</a></li>
                    </ul>
                </div>
            </div>
        </div>

</div>