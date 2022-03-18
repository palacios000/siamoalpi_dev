<?php require 'inc/head.php' ?>
  <body class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

    <div class="overflow-hidden">
      <!-- Slanted Header div -->
      <div class="slanted-header relative bg-marrone-sa text-white h-fit -z-20">
        <!-- Background image -->
        <img class="object-cover overflow-hidden w-full h-full object-cover object-cover"  src="<?= $config->urls->templates?>pictures/blog/blog.jpg" alt="Old lady">
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
        <h1 class="h5-sa 2xl:text-h6 uppercase underline underline-offset-2 pl-12 2xl:pl-24 pt-12 pb-5 w-3/5 underline-offset-8">
          Le tradizioni siamo noi
        </h1>

        <div class="px-12 2xl:px-72 lg:px-56 mx-auto">
          <!-- First text section -->
          <div class="py-18 text-base 2xl:text-h1">
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
      <?php require 'inc/footer.php' ?>
    </div>


  </body>
</html>
