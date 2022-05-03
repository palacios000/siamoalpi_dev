<?php 
/* hook per lister pro ######################### */

	/* qui volevo mostrare solo alcuni risulati in base alla selezione del filtro
	(filtro 1: museo Valfurva | filtro 2: mostrami solo temi di Valfurva)
	Ma non ci sono riuscito, troppo complicato
	$wire->addHookAfter('Fieldtype::getSelectorInfo', function($event) {

	  $field = $event->arguments(0);
	  if($field->name != 'tema.') return; 
	  
	  $info = $event->return; // array of info for selector for one field

	  foreach ($info as $options) {
	  	
	  }
	  
	  bd($info); // use TracyDebugger to see what is in $info 
	  
	  // selectable options are typically in an 'options' index
	  if(isset($info['options'])) bd($info['options']); 
	    
	  // you will probably need the full selector to see what's in it?
	  $selector = $event->session->getFor('giulio', 'selector'); 
	  bd($selector); 
	  
	  // if you make changes to $info then populate it back to event->return
	  $event->return = $info;
	}); 

	// remember the full selector for the hook above, if you need it
	$wire->addHookAfter('ProcessPageListerPro::getSelector', function($event) {
	  $selector = $event->return;
	  $event->session->setFor('giulio', 'selector', $selector);
	}); 
	*/


	/* qui invece posso cambiare il LABEL dell'intestazione colonna, come da mia richiesta nel forum.
	*  non si puo' modificare pero' il label PARENT(GENITORE), quello rimane cosi'... */
	$wire->addHookBefore("ProcessPageListerPro::renderResults", function(HookEvent $event) {
	  $field = $this->fields->get('display_name');
	  $field->label = "ente";
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

	// $rm = $wire->modules->get('RockMigrations');
	// $rm->migrate([
	//   'templates' => [
	//     'home-new' => [
	//       'fields' => [
	//         'titleH1',
	//         'body',
	//         'images_bg'
	//       ],
	//     ],
	//   ],
	// ]);




?>
