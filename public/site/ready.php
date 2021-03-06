<?php 
/**
 *
 * LOGIN 
 * 
 */
	// redirect users after logout to login-register page
	if(!$user->isLoggedin() && $input->get('loggedout')) {
		$session->removeNotices();
		$session->redirect($config->urls->root . 'registrazione'); 
	}

	// replace PW login form with login-register.php page
	// !!! only for live server!!!
	// $wire->addHookBefore('ProcessLogin::buildLoginForm', function (HookEvent $event) {
	// 	$session = $this->wire('session');
	// 	$config = $this->wire('config');
	// 	$input = $this->wire('input');
	// 	$session->redirect($config->urls->root . 'registrazione'); 
	// });


/**
 *
 * Gestionale Siamo Alpi
 *
 */



	/* backend - seleziona il tema della ricerca antropologia in base alla posizione in cui si trova la pagina. 
	Riferimento al template "gestionale_scheda". Hook suggerito durante l'impostazione del campo pageReference "tema" del template "gestionale_tema" */

	$wire->addHookAfter('InputfieldPage::getSelectablePages', function($event) {
	  if($event->object->hasField == 'tema') {
		$pageSchedaParentId = $event->arguments('page')->parent->id;
		$event->return = $event->pages->find("template=gestionale_tema, ente=$pageSchedaParentId, include=unpublished");
	  }
	});


	/* Soluzione per controllare gli eventi da generare in caso che un catalogatore salvi/modifichi pagine appartenenti ad un gruppo di lavoro a cui non appartiene'. */   

	$wire->addHookAfter('Pages::saveReady', function($event) {

	  $user = wire('user');
	  $page = $event->arguments(0);

	  if ($page->template == "gestionale_scheda" && $user->hasRole('operatore') && $page->parent->name != "trash") {

		/* sospeso 03/2022
		if ($user->ente->id != $page->parent->id) {

			// 1 notifica admin
			$mail = $this->wire(new WireMail());
			
			// $WireMailSmtp = $modules->get('WireMailSmtp'); // non riesco a chiamarlo
			$mail->to('admin@siamoalpi.it'); 
			$mail->from('admin@siamoalpi.it'); 
			$mail->subject("mancata corrispondenza user/ente");
			$mail->body("mancata corrispondenza user/ente. User: $user->name / pagina: $page->title. URL: $page->httpUrl");
			$mail->send();

			// 2 scrivi sul log
			wire('log')->save('notifiche', "mancata corrispondenza user/ente. User: $user->name, pagina: $page->title");

			// 3 spara un messaggio di notifica sulla pagina
			throw new WireException("$user->display_name stai salvando una sceda in un gruppo di lavoro di cui non fai parte (probabilamente hai selezionato l'ente sbagliato). Verrai contattato dall'amministratore del sito per verificare le impostazioni di questa scheda.");


			// 4 blocca la pagina
			// $page->addStatus("locked"); // non so perche' ma non va...
		}
		*/

	  	/* Scheda: pubblica sempre, anche quando viene premuto salva (e non pubblica) */
	  	if ($page->isUnpublished()) {
	  		$page->removeStatus('unpublished');
	  	}

	  }


	  // riordina tags per Gloria e Maria
	  if($page->template == 'gestionale_scheda') {
	      // Sort the Page Reference field by title
	      $page->tags->sort('name') ;
	  }
  	});


	/* cambia titolo colonne di listerPro -- non funziona  */
	// $wire->addHookBefore("ProcessPageListerPro::renderResults", function(HookEvent $event) {
	//   // $field = $this->fields->get('tema.title');
	//   $field = $this->fields->get('modified_users_id');
	//   $field->label = "Some Very Different Title";
	// });




/**
 *
 * SEO Maestro
 * Add the brand name after the title. 
 * https://github.com/wanze/SeoMaestro#___renderseodatavalue
 *
 */

	$wire->addHookAfter('SeoMaestro::renderSeoDataValue', function (HookEvent $event) {
		$sanitizer = $this->wire('sanitizer');

		$group = $event->arguments(0);
		$name = $event->arguments(1);
		$value = $event->arguments(2);
		
		if ($group === 'meta' && $name === 'description') {
			$description = $sanitizer->truncate($value, [
				'type' => 'sentence',
				'maxLength' => 300,
				'visible' => true,
				'convertEntities' => true
			]) ;
			$event->return = $sanitizer->text($description) ;
		}
		if ($group === 'opengraph' && $name === 'description') {
			$description = $sanitizer->truncate($value, [
				'type' => 'sentence',
				'maxLength' => 500,
				'visible' => true,
				'convertEntities' => true,
				'keepFormatTags' => false
			  ]) ;
			$event->return = $sanitizer->text($description) ;
		}
	});


/**
 *
 * Rock migrations
 *
 */

	/** @var RockMigrations1 $rm */
	// $rm = $this->wire('modules')->get('RockMigrations');
	// $rm->migrate([
	//   'fields' => [
	//     'images_bg' => [
	//       'type' => 'image',
	//       'label' => 'Immagine header/sfondo',
	//     ],
	//   ],
	//   'templates' => [
	//     'blog_post' => [
	//       'fields' => [
	//         'tags',
	//         'title',
	//         'titleH1',
	//         'images_bg',
	//         'body',
	//         'images',
	//       ],
	//     ],
	//   ],
	// ]);

	// $rm = $this->wire('modules')->get('RockMigrations');
	// $rm->migrate([
	//   'templates' => [
	//     'basic-page' => [
	//       'fields' => [
	//         'title',
	//         'titleH1',
	//         'images_bg',
	//         'body',
	//         'images',
	//       ],
	//     ],
	//   ],
	// ]);


/**
 *
 * PAGINE DEFAULT
 * 1. Foto del giorno
 *
 */
	// 1
	// stato_avanzamento: 1109 in lavorazion, 1111 approvata, 1112 esportata, 2593 eliminata
	