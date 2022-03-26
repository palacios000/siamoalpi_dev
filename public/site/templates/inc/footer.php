<footer class="slanted-tr-l pb-24 2xl:pt-24 z-50 before:-z-10 relative flex bg-verde-sa text-white justify-items-end">
  <!-- Logo -->
  <a class="block w-fit h-fit" href="#">
    <img class="w-82 ml-1"  src="<?= $config->urls->templates?>pictures/logo/siamo-alpi-bianco.svg " alt="Logo">
  </a>

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
    <div class="shrink-0 border-l border-blu-scuro-sa text-blu-scuro-sa text-xxs uppercase pl-1 pr-0 mb-4">
      <p>Un'iniziativa di</p>
      <!-- Provincia di Sondrio e Società economica Valtellina -->
      <img class="pt-5 h-20 pr-4" src="<?php echo $config->urls->templates . "pictures/bg-landing/loghi-provincia-sev.png" ?>" alt="Provincia di Sondrio, SEV">
    </div>

    <!-- Finanziata da -->
    <div class="basis-2/5 2xl:basis-auto border-l border-blu-scuro-sa text-blu-scuro-sa text-xxs uppercase pl-2 pr-5 mb-4">
      <p>Finanziata da</p>
      <!-- Fondazione CARIPLO Logo -->
      <img class="pt-6 h-20 mb-3" src="<?php echo $config->urls->templates . "pictures/bg-landing/loghi-fondazione-cariplo.png" ?>" alt="Fondazione Cariplo">
    </div>
  </div>

</footer>