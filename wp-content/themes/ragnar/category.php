<?php get_header(); ?>

<?php

	if(ragnar_globals('grid_blog')){
		switch(ragnar_data('grid_blog')){
		case 1:
			get_template_part('category_default','category');
		break;
		case 2:
			get_template_part('category_grid','category');
		break;		
		}
	}
	else {
		get_template_part('category_default','category');
	}

?>

<?php get_footer(); ?>