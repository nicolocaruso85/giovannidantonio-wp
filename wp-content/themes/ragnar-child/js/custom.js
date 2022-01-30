jQuery(document).ready(function() {



	// Sostituzione del logo retina quando responsive
	retinaLogo();
	jQuery('#logo a img').show();


	jQuery( window ).resize(function() {
		retinaLogo();		
		jQuery('#logo a img').show();
	}); // resize


	jQuery( window ).scroll(function() {
		// fixedSidebar();
	}); // scroll



	function retinaLogo() {
		if ( jQuery(window).width() <= 1205 ) {
			jQuery('#logo a img').attr('src', '/wp-content/uploads/2017/01/logo-retina.png');

		} else {
			jQuery('#logo a img').attr('src', '/wp-content/uploads/2017/01/logo.png');
		} 
	}


	// function fixedSidebar() {

	// 		if (jQuery(window).scrollTop() >= 153) {
	// 	       jQuery('.main .sidebar').addClass('fixed');
	// 	    } else {
	// 	       jQuery('.main .sidebar').removeClass('fixed');
	// 	    }
	// }



	// Aggiunta della classe 'recent_posts' al widget della sidebar 'About me'
	if (  jQuery('.page-id-6851').length > 0  ) {
		jQuery('.page-id-6851').find('.main .sidebar').children('.widget').eq(1).addClass('recent_posts');
	}	








}) // document.ready

