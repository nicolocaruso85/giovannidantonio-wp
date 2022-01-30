<?php 
add_action( 'wp_enqueue_scripts', 'enqueue_customize_styles' );
function enqueue_customize_styles() {
    
    // wp_enqueue_style( 'main-css-style', get_template_directory_uri() . '/style.css' );
    // wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'concept-css-style' ) );

	// wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/resources/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'child-custom', get_stylesheet_directory_uri() . '/css/custom.css' );
    wp_enqueue_style( 'child-responsive', get_stylesheet_directory_uri() . '/css/responsive.css' );

}



function enqueue_customize_scripts() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_customize_scripts' );



// Esclude categorie dal sidebar category widget
function ryans_exclude_categories($args){
   $exclude = "99,100,101,202,103,104,105,106, 3"; // The list or number of category ID’s you want to exclude.
   $args["exclude"] = $exclude;
   return $args;
}
add_filter("widget_categories_args", "ryans_exclude_categories");



// Trim title function (by words)
function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


// Title per la pagina "Gli ultimi articoli" usata come front page
function dq_override_post_title($title){
    if( is_front_page() ){ 
        $title = 'Giovanni D\'Antonio - Il Blog'; 
    }
    
    return $title; 
}
add_filter('wpseo_title', 'dq_override_post_title');

