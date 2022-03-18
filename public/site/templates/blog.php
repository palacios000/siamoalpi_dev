<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Siamo Alpi | Archivio Culturale di Valtellina e Valchiavenna</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="stylesheet" href="<?= $config->urls->templates?>styles/uikit.css" /> -->
		<link rel="stylesheet" href="<?= $config->urls->templates?>styles/main.css" />
		<link rel="shortcut icon" href="<?= $config->urls->templates?>pictures/favicon.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

		<!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-TxKWSXbsweFt0o2WqfkfJRRNVaPdzXJ/YLqgStggBVRREXkwU7OKz+xXtqOU4u8+" crossorigin="anonymous"> -->

  </head>

  <body class="max-w-screen-xl mx-auto bg-black/80 w-xl" stsyle="width: 1440px;">

    <div class="overflow-hidden">
      <!-- Slanted Header div -->
      <div class="slanted-header relative bg-marrone-sa text-white h-fit -z-20">
        <!-- Background image -->
        <img class="object-cover overflow-hidden max-h-fit"  src="<?= $config->urls->templates?>pictures/blog/blog.jpg" aslt="Old lady">
        <!-- Logo -->
        <img class="absolute top-0 left-0 w-82 mt-5 ml-1.5"  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">

        <!-- Menu Icon -->
        <svg class="text-white block h-8 w-8 absolute top-10 right-10" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
      </div>

      <!-- Main content div  -->
      <div class="slanted-tr-s relative pb-44 pt-1 bg-white z-0 before:-z-10">
        <!-- Title -->
        <h1 class="h5-sa uppercase underline underline-offset-2 pl-12 pt-12 pb-5 w-3/5">
          Le tradizioni siamo noi
        </h1>

        <div class="px-12 lg:px-56 mx-auto">
          <!-- First text section -->
          <div class="py-18">
            Duis nec magna nulla. Etiam vulputate semper sem, nec euismod purus vestibulum ac. Ut sed mollis risus. Nunc convallis porttitor velit in accumsan. Nam id mauris blandit, sodales libero sit amet, blandit ex. Sed in sodales mi. Etiam vitae consequat risus. Aliquam in sem convallis, sollicitudin tellus a, luctus tellus. Nulla facilisi.
            <br><br>
            Quisque tincidunt maximus lacinia. Vivamus eu sem tortor. In hac habitasse platea dictumst. Donec molestie velit nec mattis feugiat. Duis ut malesuada ex. Vestibulum posuere fermentum vestibulum. Aenean id blandit dui, nec faucibus mi. Maecenas non euismod nisl. Cras at tellus egestas, vehicula augue eu, pharetra neque. In ut quam efficitur, tristique sapien at, maximus erat. Maecenas quis urna vel ligula laoreet volutpat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            In dignissim convallis molestie. Phasellus consequat dui at nunc condimentum venenatis. Morbi ullamcorper arcu leo, in porta ante dictum id. 
          </div>

          <!-- Picture -->
          <div class="">
            <img class="mx-auto" src="http://via.placeholder.com/760x540" alt="">
            <!-- Description -->
            <div class="text-sm text-center pt-7">
              P-small paragraph here but it looks too small
            </div>
          </div>

          <!-- Bigger text section -->
          <div class="h2-sa text-center pt-20 pb-14 font-serif">
            Duis nec magna nulla. Etiam vulputate semper sem, nec euismod purus vestibulum ac. Ut sed mollis risus. Nunc convallis porttitor velit in accumsan. Nam id mauris blandit, sodales.
          </div>
          
          <!-- Bottom text section -->
          <div class="text-base">
            Maecenas malesuada massa quis ligula mattis, vitae vestibulum tortor volutpat. Morbi dolor augue, dignissim a convallis sit amet, vulputate sit amet diam. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin maximus, orci et tristique facilisis, magna dolor varius metus, a elementum neque sapien dapibus lectus. Cras augue tortor, interdum eget quam eget, mollis lobortis nibh. Sed augue velit, dignissim ut semper at, dignissim ut nisl. Suspendisse sed gravida risus. Curabitur at diam bibendum, feugiat arcu in, suscipit arcu. Donec vel bibendum mi. 
          </div>
        </div>
      </div>

      <!-- Grid div -->
      <div class="slanted-tl-m h-fit z-40 before:-z-10 mx-auto pt-16 pb-32 bg-black">
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

      <!-- Footer div -->
      <div class="slanted-tr-l pb-24 z-50 before:-z-10 relative flex bg-verde-sa text-white">
        <!-- Logo -->
        <img class="w-82 ml-1"  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">
    
        <!-- Right hand grid -->
        <div class="flex basis-1/2 h-fit ml-auto pt-5 mr-9">
          <!-- Socials -->
          <div class="mr-6">
            <p>
              Segui lo sviluppo del progetto sui nostri canali social
            </p>
            <!-- Social media Icons -->
            <div class="grid grid-cols-2 w-fit pt-4 text-blu-sa">
              <!-- Instagram -->
              <svg class="w-8 h-8" fill="currentColor" viewBox="2 2 16 16" xmlns="http://www.w3.org/2000/svg">
                <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clipRule="evenodd" />
              </svg>
              <!-- Facebook -->
              <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="2 2 16 16" xmlns="http://www.w3.org/2000/svg">
                <path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clipRule="evenodd" />
              </svg>
            </div>
          </div>

          <!-- Iniziativa di.. -->
          <div class="shrink-0 border-l border-blu-scuro-sa text-blu-scuro-sa footer-xxs uppercase pl-1 pr-0 mb-4">
            <p>Un'iniziativa di</p>
            <!-- Provincia di Sondrio e Società economica Valtellina -->
            <img class="pt-5 h-20 pr-4" src="<?php echo $config->urls->templates . "pictures/bg-landing/loghi-provincia-sev.png" ?>" alt="Provincia di Sondrio, SEV">
          </div>

          <!-- Finanziata da -->
          <div class="basis-2/5 border-l border-blu-scuro-sa text-blu-scuro-sa footer-xxs uppercase pl-2 pr-5 mb-4">
            <p>Finanziata da</p>
            <!-- Fondazione CARIPLO Logo -->
            <img class="pt-6 h-20 mb-3" src="<?php echo $config->urls->templates . "pictures/bg-landing/loghi-fondazione-cariplo.png" ?>" alt="Fondazione Cariplo">
          </div>
        </div>

      </div>
    </div>


  </body>
</html>
