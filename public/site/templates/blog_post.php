<?php require 'inc/head.php' ?>
  <body id="blog_post" class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

    <div class="overflow-hidden">
      <!-- Slanted Header div -->
      <?php 
      //prima di chiamare il banner, assicurati di aver definito l'immagine
      $bannerBgImg = $page->images_bg->first->url;
      include 'inc/header-banner.php' ?>

      <!-- Main content div  -->
      <div class="slanted-tr-s relative pb-44 pt-1 bg-white z-0 before:-z-10">
        <!-- Title -->
        <h1 class="h5-sa 2xl:text-h6 uppercase underline underline-offset-2 pl-12 2xl:pl-24 pt-12 pb-5 w-3/5 underline-offset-8">
          <?= $page->titleH1 ?>
        </h1>

        <div class="px-12 2xl:px-72 lg:px-56 mx-auto">
          <article class="pt-18">
            <?= $page->body ?>
          </article>
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
        <svg class="w-18 h-18 mx-auto" fill="white" viewBox="0 0 25 25" xmlns="http://www.w3.5org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M11.5 0c6.347 0 11.5 5.153 11.5 11.5s-5.153 11.5-11.5 11.5-11.5-5.153-11.5-11.5 5.153-11.5 11.5-11.5zm0 1c5.795 0 10.5 4.705 10.5 10.5s-4.705 10.5-10.5 10.5-10.5-4.705-10.5-10.5 4.705-10.5 10.5-10.5zm.5 10h6v1h-6v6h-1v-6h-6v-1h6v-6h1v6z"/></svg>
        
      </div>

      <!-- Footer div -->
      <?php require 'inc/footer.php' ?>
    </div>


  </body>
</html>
