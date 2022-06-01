<?php require 'inc/head.php' ?>
  <body id="blog_post" class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

    <div class="overflow-hidden">
      <!-- Slanted Header div -->
      <?php 
      //prima di chiamare il banner, assicurati di aver definito l'immagine
      $bannerBgImg = $page->images_bg->getRandom()->url;
      include 'inc/header-banner.php' ?>

      <!-- Masonry grid container-->
      <div class="slanted-tl-s pb-10 mr-10 bg-black text-white z-0 before:-z-10 h-fit">
        <!-- Title -->
        <h1 class="h2-sa text-white uppercase pt-8 ml-6 md:ml-auto mr-8 w-auto md:w-1/2 lg:w-1/3  md:text-right"><?= $page->titleH1 ?></h1>

        <!-- Masonry grid with Uikit -->
        <div class="px-6 md:px-8 mt-13 mb-16 w-full" >
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8" uk-grid="masonry: true">
            <!-- PHP code to iteratively print blog posts -->
            <?php 
              $counter = 0;
              foreach ($page->children as $post) {
              $slanted = ($counter % 2 == 0) ? "slanted-tr-m" : "slanted-tl-m";
              $postImg = $post->images_bg->first->width(660)->url;
                echo "
                <div class='break-inside-avoid'>
                  <a href='$post->url' class='hover:opacity-80 hover:ease-in-out transition'>
                    <img class='-z-0 w-full' src='$postImg' alt='$post->title'>
                    <!-- Card title -->
                    <div class='$slanted title bg-verde-sa text-white pl-6 pt-6 pb-6 z-0 before:-z-10'>
                      <h2 class='h2-sa uppercase pr-8'>$post->title</h2>  
                    </div>
                  </a>
                </div>
                ";
                $counter++;
              }
            ?>
          </div>
        </div>

        <!-- Section to push down footer -->
        <div class="w-full h-20"></div>
      </div>


      <?php include 'foto-del-giorno.php'; ?>

      <!-- Footer div -->
      <?php require 'inc/footer.php' ?>

      <?php require 'inc/scripts.php' ?>

    </div>

  </body>
</html>
