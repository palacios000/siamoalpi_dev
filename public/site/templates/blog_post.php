<?php require 'inc/head.php' ?>
	<body id="blog_post" class="max-w-screen-xl 2xl:max-w-screen-2xl mx-auto bg-black/80 " >

		<div class="overflow-hidden">
			<!-- Slanted Header div -->
			<?php 
			//prima di chiamare il banner, assicurati di aver definito l'immagine
			$bannerBgImg = $page->images_bg->last->url;
			include 'inc/header-banner.php' ?>

			<!-- Main content div  -->
			<div class="slanted-tr-s relative pb-24 pt-1 bg-white z-0 before:-z-10">
				<!-- Title -->
				<h1 class="h5-sa 2xl:text-h6 uppercase underline underline-offset-2 pl-12 2xl:pl-24 pt-12 pb-5 w-3/5 underline-offset-8">
					<?= $page->titleH1 ?>
				</h1>

				<!-- condivi button -->
				<div class="absolute top-12 right-6 text-sm border-t border-black">
				  <!-- condividi -->
				  <?php // make urls
				  $soggetto = $sanitizer->entities("Condivisione URL da siamoalpi.it") ;
				  $mailtoURL = "mailto:?subject=$soggetto&body=".$page->httpUrl;  
				  $fbURL = "https://www.facebook.com/sharer/sharer.php?u=".$page->httpUrl;  
				  ?>
				  <p class="font-sansBold uppercase text-right mt-2.5">Condividi</p>
				  <ul class="fotoGiornoTags flex flex-row gap-4">
				    <li class="inline"><a class="hover:text-verde-sa transition" href="<?= $mailtoURL ?>">email</a></li>
				    <li class="inline"><a class="hover:text-verde-sa transition" href="<?= $fbURL ?>" target="_blank">facebook</a></li>
				  </ul>
				</div>


				<?php if ($user->isLoggedin()) {
					echo "<a target='_blank' href='$page->editUrl' class='bottone-verde'>Modifica post</a>";
				} ?>

				<div class="px-12 2xl:px-72 lg:px-56 mx-auto">
					<article class="pt-18">
						<?= $page->body ?>
					</article>
					<div>
						<a href="<?= $page->parent->url ?>" class="bottone-verde block mx-auto mt-14 mb-8">Vai a Diario</a>
					</div>
				</div>
			</div>


			<?php 
			if ($page->name == "progetto") {
				include 'foto-del-giorno.php'; 
			}else{ ?>

				<!--=============================
				=            algolia more       =
				==============================-->
				<div x-data="{solofoto: true }" class="slanted-tl-m h-fit z-10 before:-z-10 mx-auto pb-32 pt-10 bg-black">
					<div class="mx-12 w-fit">

							<!-- filtri / div nascosti -->
							<div id="searchbox" class="hidden"></div>
							<div id="maps" class="hidden"></div>
							<div id="datazione" class="hidden"></div>
							<div id="temiricerca" class="hidden"></div>

						<section id="grigliaAlg">
							<?php include 'inc/grigliaImmagini.php' ?>
						</section>
					</div>
				</div>

				
			<?php } ?>

			<!-- Footer div -->
			<?php require 'inc/footer.php' ?>


			<!-- ### algolia search ### -->
			<?php //trovami i tags da inviare ad algolia
				$blogTags = array();
				foreach ($page->tags as $tag) {
					$blogTags[] = $tag->title;
				};
				$blogTags = json_encode($blogTags);
			?>
			<script>
			// essenziale per farlo passare allo script algolia.js qui sotto
			var filtro = {'tags': <?= $blogTags ?>};
			var routingUrl = false;
			var lemmaRisultati = 'immagini correlate'; //risultati
			</script>
			<?php require 'inc/scripts.php' ?>

		</div>

	</body>
</html>
