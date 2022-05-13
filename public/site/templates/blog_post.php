<?php require 'inc/head.php' ?>
  <body id="blog_post" class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

    <div class="overflow-hidden">
      <!-- Slanted Header div -->
      <?php 
      //prima di chiamare il banner, assicurati di aver definito l'immagine
      $bannerBgImg = $page->images_bg->last->url;
      include 'inc/header-banner.php' ?>

      <!-- Main content div  -->
      <div class="slanted-tr-s relative pb-44 pt-1 bg-white z-0 before:-z-10">
        <!-- Title -->
        <h1 class="h5-sa 2xl:text-h6 uppercase underline underline-offset-2 pl-12 2xl:pl-24 pt-12 pb-5 w-3/5 underline-offset-8">
          <?= $page->titleH1 ?>
        </h1>

        <?php if ($user->isLoggedin()) {
          echo "<a target='_blank' href='$page->editUrl' class='bottone-verde'>Modifica post</a>";
        } ?>

        <div class="px-12 2xl:px-72 lg:px-56 mx-auto">
          <article class="pt-18">
            <?= $page->body ?>
          </article>
        </div>
      </div>


      <?php 
      if ($page->name == "progetto") {
        include 'foto-del-giorno.php'; 
      } else{
        echo "immagini correlate -- da fare";
      }
      ?>

      <!-- Footer div -->
      <?php require 'inc/footer.php' ?>
    </div>


  </body>
</html>
