<?php
add_action( 'after_setup_theme', 'ragnar_theme_setup' );
function ragnar_theme_setup() {
	/*woocommerce support*/
	add_theme_support( 'post-formats', array( 'link', 'gallery', 'video' , 'audio', 'quote') );
	/*feed support*/
	add_theme_support( 'automatic-feed-links' );
	/*post thumb support*/
	add_theme_support( 'post-thumbnails' ); // this enable thumbnails and stuffs
	/*title*/
	add_theme_support( 'title-tag' );
	/*lang*/
	load_theme_textdomain( 'ragnar', get_template_directory() . '/lang' );
	/*setting thumb size*/
	add_image_size( 'ragnar-gallery', 120,80, true ); 
	add_image_size( 'ragnar-widget', 220,150, true );
	add_image_size( 'ragnar-postBlock', 1180, 770, true );
	add_image_size( 'ragnar-related', 345,230, true );
	add_image_size( 'ragnar-postGridBlock', 590,390, true );
	add_image_size( 'ragnar-postGridBlock-2', 590,437, true );	
	register_nav_menus(array(
	
			'ragnar_mainmenu' => esc_html__('Main Menu','ragnar'),
			'ragnar_respmenu' => esc_html__('Responsive Menu','ragnar'),	
			'ragnar_scrollmenu' => esc_html__('Scroll Menu','ragnar'),	
			
	));	
	
	
		
    register_sidebar(array(
        'id' => 'ragnar_sidebar',
        'name' => esc_html__('Sidebar main','ragnar'),
		'description' => esc_html__('Main sidebar for blog and posts.','ragnar'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	

    register_sidebar(array(
        'id' => 'ragnar_sidebar-top-left',
        'name' => esc_html__('Top sidebar left','ragnar'),
		'description' => esc_html__('Left sidebar for top bar.','ragnar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		  

    register_sidebar(array(
        'id' => 'ragnar_sidebar-top-right',
        'name' => esc_html__('Top sidebar right','ragnar'),
		'description' => esc_html__('Right sidebar for top bar.','ragnar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		
		
 
    register_sidebar(array(
        'id' => 'ragnar_sidebar-logo',
        'name' => esc_html__('Sidebar for advert in logo area','ragnar'),
		'description' => esc_html__('If you wish to add advert to header use this sidebar.','ragnar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));	

    register_sidebar(array(
        'id' => 'ragnar_sidebar-under-header-left',
        'name' => esc_html__('Sidebar under header left','ragnar'),
		'description' => esc_html__('Custom sidebar under header on left position.','ragnar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'ragnar-sidebar-under-header-right',
        'name' => esc_html__('Sidebar under header right','ragnar'),
		'description' => esc_html__('Custom sidebar under header on right position.','ragnar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'ragnar-sidebar-under-header-fullwidth',
        'name' => esc_html__('Sidebar under header full width','ragnar'),
		'description' => esc_html__('Custom sidebar under header (below left and right sidebar) fullwidth position.','ragnar'),					
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
	
	
    register_sidebar(array(
        'id' => 'ragnar-sidebar-footer-fullwidth',
        'name' => esc_html__('Sidebar above footer full width','ragnar'),
		'description' => esc_html__('Custom sidebar above footer fullwidth position.','ragnar'),				
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));	
	
    register_sidebar(array(
        'id' => 'ragnar-sidebar-footer-left',
        'name' => esc_html__('Sidebar above footer left','ragnar'),
		'description' => esc_html__('Custom sidebar above footer left position.','ragnar'),					
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));		
		
    register_sidebar(array(
        'id' => 'ragnar-sidebar-footer-right',
        'name' => esc_html__('Sidebar above footer right','ragnar'),
		'description' => esc_html__('Custom sidebar above footer right position.','ragnar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget-line"></div>'
    ));			
	
		
    register_sidebar(array(
        'id' => 'ragnar_footer1',
        'name' => esc_html__('Footer sidebar 1','ragnar'),
		'description' => esc_html__('Footer sidebar first position','ragnar'),		
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'id' => 'ragnar_footer2',
        'name' => esc_html__('Footer sidebar 2','ragnar'),
		'description' => esc_html__('Footer sidebar secund position','ragnar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
	
    
    register_sidebar(array(
        'id' => 'ragnar_footer3',
        'name' => esc_html__('Footer sidebar 3','ragnar'),
		'description' => esc_html__('Footer sidebar third position','ragnar'),			
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
	
	
	// Responsive walker menu
	class ragnar_Walker_Responsive_Menu extends Walker_Nav_Menu {
		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			global $wp_query;		
			$item_output = $attributes = $prepend ='';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( '', array_filter( $classes ), $item ) );			
			$class_names = ' class="'. esc_attr( $class_names ) . '"';			   
			// Create a visual indent in the list if we have a child item.
			$visual_indent = ( $depth ) ? str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>', $depth) : '';
			// Load the item URL
			$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url ) .'"' : '';
			// If we have hierarchy for the item, add the indent, if not, leave it out.
			// Loop through and output each menu item as this.
			if($depth != 0) {
				$item_output .= '<a '. $class_names . $attributes .'>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle"></i>' . $item->title. '</a><br>';
			} else {
				$item_output .= '<a ' . $class_names . $attributes .'><strong>'.$prepend.$item->title.'</strong></a><br>';
			}
			// Make the output happen.
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	
	// Main walker menu	
	class ragnar_Walker_Main_Menu extends Walker_Nav_Menu
	{		
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		   $this->curItem = $item;
		   global $wp_query;
		   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		   $class_names = $value = '';
		   $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		   $class_names = ' class="'. esc_attr( $class_names ) . '"';
		   $image  = ! empty( $item->custom )     ? ' <img src="'.esc_attr($item->custom).'">' : '';
		   $output .= $indent . '<li id="menu-item-'.rand(0,9999).'-'. $item->ID . '"' . $value . $class_names .'>';
		   $attributes_title  = ! empty( $item->attr_title ) ? ' <i class="fa '  . esc_attr( $item->attr_title ) .'"></i>' : '';
		   $attributes  = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		   $prepend = '';
		   $append = '';
		   if($depth != 0)
		   {
				$append = $prepend = '';
		   }
			$item_output = $args->before;
			$item_output .= '<a '. $attributes .'>';
			$item_output .= $attributes_title.$args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= $args->link_after;
			$item_output .= '</a>';	
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	
	

}




/*-----------------------------------------------------------------------------------*/
// Options Framework
/*-----------------------------------------------------------------------------------*/
// Paths to admin functions
define('RAGNAR_ADMIN_PATH', get_template_directory() . '/admin/');
define('RAGNAR_BOX_PATH', get_template_directory() . '/includes/boxes/');
define('RAGNAR_ADMIN_DIR', get_template_directory_uri() . '/admin/');
define('RAGNAR_OPTIONS', 'of_options_pmc'); // Name of the database row where your options are stored
require_once (get_template_directory() . '/admin/import/plugins/options-importer.php');   // Options panel settings and custom settings
add_option('IMPORT_RAGNAR', 'false');
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	//Call action that sets
	if(get_option('IMPORT_RAGNAR') == 'false'){
		import(get_template_directory() . '/admin/import/options.json');
		update_option('IMPORT_RAGNAR', 'true');
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=optionsframework&pmc_import=false' )) );
	}
	else{
		wp_redirect(  esc_url_raw(admin_url( 'themes.php?page=optionsframework' )) );
	}
}

// Build Options

require_once (get_template_directory() . '/admin/theme-options.php');   // Options panel settings and custom settings
require_once (get_template_directory() . '/admin/admin-interface.php');  // Admin Interfaces
$ragnar_includes =  get_template_directory() . '/includes/';
$ragnar_widget_includes =  get_template_directory() . '/includes/widgets/';
/* include custom widgets */
require_once ($ragnar_widget_includes . 'recent_post_widget.php'); 
require_once ($ragnar_widget_includes . 'popular_post_widget.php');
require_once ($ragnar_widget_includes . 'social_widget.php');
require_once ($ragnar_widget_includes . 'post_widget.php');
require_once ($ragnar_widget_includes . 'post_slider_widget.php');
require_once ($ragnar_widget_includes . 'video_widget.php');
/* include scripts */
function ragnar_scripts() {
	/*scripts*/
	wp_enqueue_script('fitvideos', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'),true,true);	
	wp_enqueue_script('webfontloader', get_template_directory_uri() . '/js/webfontloader.js', array('jquery'),true,false);	
	wp_enqueue_script('retinaimages', get_template_directory_uri() . '/js/retina.min.js', array('jquery'),true,true);	
	wp_enqueue_script('ragnar_customjs', get_template_directory_uri() . '/js/custom.js', array('jquery'),true,false);  	      
	wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'),true,true);
	wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'),true,true);
	wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array('jquery'),true,true);		
	wp_register_script('news', get_template_directory_uri() . '/js/jquery.li-scroller.1.0.js', array('jquery'),true,true);  
	wp_enqueue_script('gistfile', get_template_directory_uri() . '/js/gistfile_pmc.js', array('jquery') ,true,true);  
	wp_enqueue_script('bxSlider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery') ,true,false);  	
	wp_enqueue_script('infinity', get_template_directory_uri() . '/js/pmc_infinity.js', array('jquery') ,true,false);  	
	wp_enqueue_script('jquery-ui-tabs');
	/*style*/
	wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyPhoto.css', 'style');
	
	global $ragnar_data;
	if(isset($ragnar_data['google_body_custom']) && $ragnar_data['google_body_custom'] != ''){
		$font_explode = explode(' ' , $ragnar_data['google_body_custom']);
		$font_body  = '';
		$size = count($font_explode);
		$count = 0;
		if(count($font_explode) > 0){
			foreach($font_explode as $font){
				if($count < $size-1){
					$font_body .= $font_explode[$count].'+';
				}
				else{
					$font_body .= $font_explode[$count];
				}
				$count++;
			}
		}else{
			$font_body = esc_attr($ragnar_data['google_body_custom']);
		}
	}		
			

	if(isset($ragnar_data['google_heading_custom']) && $ragnar_data['google_heading_custom'] != ''){
		$font_explode = explode(' ' , $ragnar_data['google_heading_custom']);
		$font_heading  = '';
		$size = count($font_explode);
		$count = 0;
		if(count($font_explode) > 0){
			foreach($font_explode as $font){
				if($count < $size-1){
					$font_heading .= $font_explode[$count].'+';
				}
				else{
					$font_heading .= $font_explode[$count];
				}
				$count++;
			}
		}else{
			$font_heading = esc_attr($ragnar_data['google_heading_custom']);
		}
		$font_heading = '|'.$font_heading;
	}
	
	if(isset($ragnar_data['google_menu_custom']) && $ragnar_data['google_menu_custom'] != ''){
		$font_explode = explode(' ' , $ragnar_data['google_menu_custom']);
		$font_menu  = '';
		$size = count($font_explode);
		$count = 0;
		if(count($font_explode) > 0){
			foreach($font_explode as $font){
				if($count < $size-1){
					$font_menu .= $font_explode[$count].'+';
				}
				else{
					$font_menu .= $font_explode[$count];
				}
				$count++;
			}
		}else{
			$font_menu = esc_attr($ragnar_data['google_menu_custom']);
		}
		$font_menu = '|'. $font_menu;
	}
						
	
	
	/* FONT FOR QUOTE */
	
	if(isset($ragnar_data['google_quote_custom']) && $ragnar_data['google_quote_custom'] != ''){
		$font_explode = explode(' ' , $ragnar_data['google_quote_custom']);
		$font_quote  = '';
		$size = count($font_explode);
		$count = 0;
		if(count($font_explode) > 0){
			foreach($font_explode as $font){
				if($count < $size-1){
					$font_quote .= $font_explode[$count].'+';
							}
				else{
					$font_quote .= $font_explode[$count];
					}
				$count++;
			}
		}else{
			$font_quote = esc_attr($ragnar_data['google_quote_custom']);
		}
		$font_quote = '|' . $font_quote ;
	}

	wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family='.$font_body . $font_heading . $font_menu . $font_quote, false);	
	wp_enqueue_script('font-awesome_pms', 'https://use.fontawesome.com/30ede005b9.js' , '',null);				
}
add_action( 'wp_enqueue_scripts', 'ragnar_scripts' );
require_once (get_template_directory() . '/admin/admin-functions.php');  // Theme actions based on options settings
require_once ($ragnar_includes . 'class-tgm-plugin-activation.php');
 
/*add boxed to body class*/

add_filter('body_class','ragnar_body_class');

function ragnar_body_class($classes) {
	global $ragnar_data;
	$class = '';
	if(isset($ragnar_data['use_boxed'])){
		$classes[] = 'ragnar_boxed';
	}
	return $classes;
}

/* custom breadcrumb */
function ragnar_breadcrumb($title = false) {
	global $ragnar_data;
	$breadcrumb = '';
	if (!is_home()) {
		if($title == false){
			$breadcrumb .= '<a href="';
			$breadcrumb .=  esc_url(home_url('/'));
			$breadcrumb .=  '">';
			$breadcrumb .= esc_html__('Home', 'ragnar');
			$breadcrumb .=  "</a> &#187; ";
		}
		if (is_single()) {
			if (is_single()) {
				$name = '';
				if($title == false){
					$breadcrumb .= $name .' &#187; <span>'. get_the_title().'</span>';
				}
				else{
					$breadcrumb .= get_the_title();
				}
			}	
		} elseif (is_page()) {
			$breadcrumb .=  '<span>'.get_the_title().'</span>';
		}
		else if(is_tag()){
			$tag = get_query_var('tag');
			$tag = str_replace('-',' ',$tag);
			$breadcrumb .=  '<span>'.$tag.'</span>';
		}
		else if(is_search()){
			$breadcrumb .= esc_html__('Search results for ', 'ragnar') .'"<span>'.get_search_query().'</span>"';			
		} 
		else if(is_category()){
			$cat = get_query_var('cat');
			$cat = get_category($cat);
			$breadcrumb .=  '<span>'.$cat->name.'</span>';
		}
		else if(is_archive()){
			$breadcrumb .=  '<span>'.esc_html__('Archive','ragnar').'</span>';
		}	
		else{
			$breadcrumb .=  esc_html__('Home','ragnar');
		}

	}
	return $breadcrumb ;
}
/* social share links */
function ragnar_socialLinkSingle($link,$title) {
	$social = '';
	$social  .= '<div class="addthis_toolbox">';
	$social .= '<div class="custom_images">';
	$social .= '<a class="addthis_button_facebook" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'" ><i class="fa fa-facebook"></i></a>';
	$social .= '<a class="addthis_button_twitter" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-twitter"></i></a>';  
	$social .= '<a class="addthis_button_google_plusone_share" addthis:url="'.esc_url($link).'" g:plusone:count="false" addthis:title="'.esc_attr($title).'"><i class="fa fa-google-plus"></i></a>'; 	

	// $social .= '<a class="addthis_button_pinterest_share" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-pinterest"></i></a>'; 
	// $social .= '<a class="addthis_button_stumbleupon" addthis:url="'.esc_url($link).'" addthis:title="'.esc_attr($title).'"><i class="fa fa-stumbleupon"></i></a>';
	
	$social .='</div><script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js"></script>';	
	$social .= '</div>'; 
	echo $social;
	
	
}
/* links to social profile */
function ragnar_socialLink() {
	$social = '';
	global $ragnar_data; 
	$icons = $ragnar_data['socialicons'];
	if(is_array($icons)){
		foreach ($icons as $icon){
			$social .= '<a target="_blank"  href="'.esc_url($icon['link']).'" title="'.esc_attr($icon['title']).'"><i class="fa '.esc_attr($icon['url']).'"></i></a>';	
		}
	}
	echo $social;
}
/* links to social profile footer */
function ragnar_socialLink_footer() {
	$social = '';
	global $ragnar_data; 
	$icons = $ragnar_data['socialicons'];
	if(is_array($icons)){
		foreach ($icons as $icon){
			$social .= '<a target="_blank"  href="'.esc_url($icon['link']).'" title="'.esc_attr($icon['title']).'"><i class="fa '.esc_attr($icon['url']).'"></i><span>'.esc_attr($icon['title']).'</span></a>';	
		}
	}
	echo $social;
}

add_filter('the_content', 'ragnar_addlightbox');
/* add lightbox to images*/
function ragnar_addlightbox($content)
{	global $post;
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
  	$replacement = '<a$1href=$2$3.$4$5 rel="lightbox[%LIGHTID%]"$6>';
    $content = preg_replace($pattern, $replacement, $content);
	if(isset($post->ID))
		$content = str_replace("%LIGHTID%", $post->ID, $content);
    return $content;
}
/* remove double // char */
function ragnar_stripText($string) 
{ 
    return str_replace("\\",'',$string);
} 
	
/* custom post types */	
add_action('save_post', 'ragnar_update_post_type');
add_action("admin_init", "ragnar_add_meta_box");



function ragnar_add_meta_box(){
	add_meta_box("ragnar_post_type", esc_attr__("Ragnar options","ragnar"), "ragnar_post_type", "post", "normal", "high");	
	
}	



function ragnar_post_type(){
	global $post;
	$ragnar_data = get_post_custom(get_the_id());

	if (isset($ragnar_data["video_post_url"][0])){
		$video_post_url = $ragnar_data["video_post_url"][0];
	}else{
		$video_post_url = "";
	}	
	
	if (isset($ragnar_data["link_post_url"][0])){
		$link_post_url = $ragnar_data["link_post_url"][0];
	}else{
		$link_post_url = "";
	}	
	
	if (isset($ragnar_data["audio_post_url"][0])){
		$audio_post_url = $ragnar_data["audio_post_url"][0];
	}else{
		$audio_post_url = "";
	}


?>
    <div id="portfolio-category-options">
        <table cellpadding="15" cellspacing="15">		
            <tr class="videoonly" style="border-bottom:1px solid #000;">
            	<td><label><?php esc_attr_e('Video URL(*required) - add if you select video post:','ragnar') ?> <i style="color: #999999;"></i></label><br><input name="video_post_url" value="<?php echo esc_attr($video_post_url); ?>" /> </td>	
			</tr>		
            <tr class="linkonly" >
            	<td><label><?php esc_attr_e('Link URL - add if you select link post : ','ragnar') ?><i style="color: #999999;"></i></label><br><input name="link_post_url"  value="<?php echo esc_attr($link_post_url); ?>" /></td>
            </tr>				
            <tr class="audioonly">
            	<td><label><?php esc_html_e('Audio URL - add if you select audio post (audio from SoundCloud -- https://soundcloud.com/ )<br>You also need to install plugin SoundCloud Shortcode (https://wordpress.org/plugins/soundcloud-shortcode):','ragnar') ?> <i style="color: #999999;"></i></label><br><input name="audio_post_url"  value="<?php echo esc_attr($audio_post_url); ?>" /></td>
            </tr>	
            <tr class="nooptions">
            	<td><?php esc_attr_e('No options for this post type.','ragnar') ?></td>
            </tr>				
        </table>
    </div>
	<style>
	div#portfolio-category-options table {width:100%;}
	div#portfolio-category-options td textarea {width:100%; height:80px}
	#portfolio-category-options input {width:100%}
	</style>
	<script>
	"use strict"; 
	jQuery(document).ready(function(){	
			if (jQuery("input[name=post_format]:checked").val() == 'video'){
				jQuery('.videoonly').show();
				jQuery('.audioonly, .linkonly , .nooptions').hide();}
				
			else if (jQuery("input[name=post_format]:checked").val() == 'link'){
				jQuery('.linkonly').show();
				jQuery('.videoonly, .select_video,.nooptions').hide();	}	
				
			else if (jQuery("input[name=post_format]:checked").val() == 'audio'){
				jQuery('.videoonly, .linkonly,.nooptions').hide();	
				jQuery('.audioonly').show();}						
			else{
				jQuery('.videoonly').hide();
				jQuery('.audioonly').hide();
				jQuery('.linkonly').hide();
				jQuery('.nooptions').show();}	
			
			jQuery("input[name=post_format]").change(function(){
			if (jQuery("input[name=post_format]:checked").val() == 'video'){
				jQuery('.videoonly').show();
				jQuery('.audioonly, .linkonly,.nooptions').hide();}
				
			else if (jQuery("input[name=post_format]:checked").val() == 'link'){
				jQuery('.linkonly').show();
				jQuery('.videoonly, .audioonly,.nooptions').hide();	}	
				
			else if (jQuery("input[name=post_format]:checked").val() == 'audio'){
				jQuery('.videoonly, .linkonly,.nooptions').hide();	
				jQuery('.audioonly').show();}	
				
			else{
				jQuery('.videoonly').hide();
				jQuery('.audioonly').hide();
				jQuery('.linkonly').hide();
				jQuery('.nooptions').show();}				
		});
	});
	</script>	
      
<?php
	
}
function ragnar_update_post_type(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){

		if( isset($_POST["video_post_url"]) ) {
			update_post_meta($post->ID, "video_post_url", $_POST["video_post_url"]);
		}		
		if( isset($_POST["link_post_url"]) ) {
			update_post_meta($post->ID, "link_post_url", $_POST["link_post_url"]);
		}	
		if( isset($_POST["audio_post_url"]) ) {
			update_post_meta($post->ID, "audio_post_url", $_POST["audio_post_url"]);
		}							
		
	}
	
	
	
}
if( !function_exists( 'ragnar_fallback_menu' ) )
{

	function ragnar_fallback_menu()
	{
		$current = "";
		if (is_front_page()){$current = "class='current-menu-item'";} 
		echo "<div class='fallback_menu'>";
		echo "<ul class='Ragnar_fallback menu'>";
		echo "<li $current><a href='".esc_url(esc_url(home_url('/')))."'>Home</a></li>";
		wp_list_pages('title_li=&sort_column=menu_order');
		echo "</ul></div>";
	}
}

add_filter( 'the_category', 'ragnar_add_nofollow_cat' );  

function ragnar_add_nofollow_cat( $text ) { 
	$text = str_replace('rel="category tag"', "", $text); 
	return $text; 
}

/* get image from post */
function ragnar_getImage($id, $image){
	$return = '';
	if ( has_post_thumbnail() ){
		$return = get_the_post_thumbnail($id,$image);
		}
	else
		$return = '';
	
	return 	$return;
}

if ( ! isset( $content_width ) ) $content_width = 800;


function ragnar_add_this_script_footer(){ 

	$ragnar_script = '	
		"use strict"; 
		jQuery(document).ready(function($){	
			jQuery(".searchform #s").attr("value","'. esc_html__("Cerca nel Blog...","ragnar").'");	
			jQuery(".searchform #s").focus(function() {
				jQuery(".searchform #s").val("");
			});
			
			jQuery(".searchform #s").focusout(function() {
				if(jQuery(".searchform #s").attr("value") == "")
					jQuery(".searchform #s").attr("value","'. esc_html__("Cerca nel Blog...","ragnar") .'");
			});		
				
		});	
		
		';
	wp_add_inline_script( 'ragnar_customjs', $ragnar_script );
}

add_action( 'wp_enqueue_scripts', 'ragnar_add_this_script_footer' );


function ragnar_security($string){
	echo wp_kses(stripslashes($string),array('img' => array('src' => array(),'alt'=>array()),'a' => array('href' => array()),'span' => array(),'div' => array('class' => array()),'b' => array(),'strong' => array(),'br' => array(),'p' => array())); 

}

/* SEARCH FORM */
function ragnar_search_form( $form ) {
	$form = '<form method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	<i class="fa fa-search search-desktop"></i>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'ragnar_search_form' );



	add_action('save_post', 'ragnar_update_post_rev');
	add_action("admin_init", "ragnar_add_rev");
	
	function ragnar_add_rev(){
	
	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			"ragnar_post_content", esc_attr__("Ragnar Options","ragnar"), "ragnar_post_content",
			$screen,'side','high'
		);
	}	
		
		
	}	
	


	
	function ragnar_post_content(){	
		global $post;	
		$ragnar_data = get_post_custom(get_the_id());
		if (isset($ragnar_data["custom_post_rev"][0])){		
			$custom_post_rev = $ragnar_data["custom_post_rev"][0];	
		}else{		
			$custom_post_rev = "";	
		}		
		global $wp_registered_sidebars;
		if (isset($ragnar_data["sidebar"][0])){
			$sidebar = $ragnar_data["sidebar"][0];
		}else{
			$sidebar = "";
		}	?>	
         <table cellpadding="15" cellspacing="0">	
			<tr>
			<td><label><?php esc_html_e('Select custom revolution slider:','ragnar') ?> </label>				
			<br>	
				<?php if(shortcode_exists( 'rev_slider')) {  ?>
				<select id="custom_post_rev"  name="custom_post_rev">	
				<option value="empty" <?php if($custom_post_rev == 'empty') echo 'selected'; ?>><?php esc_html_e('Empty','ragnar'); ?></option>	
				<?php 				
				$slider = new RevSlider();				
				$arrSliders = $slider->getArrSliders();				
				if(!empty($arrSliders)){ 	
					$revSliderArray = array();					
					foreach($arrSliders as $sliders){ ?>
						<option value="<?php echo esc_attr($sliders->getAlias()); ?>" <?php if($sliders->getAlias() == $custom_post_rev) echo 'selected'; ?>>
						<?php echo esc_attr($sliders->getShowTitle()) ?>
						</option>						
					<?php
					} 						
				}																
				?>

				<?php } ?>
			</td>            
			</tr>		
		</table>  	
		
	<?php	
	}
	
	function ragnar_update_post_rev()
	{
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){

		if( isset($_POST["custom_post_rev"]) ) {
			update_post_meta($post->ID, "custom_post_rev", $_POST["custom_post_rev"]);
		}		
		if( isset($_POST["sidebar"]) ) {
			update_post_meta($post->ID, "sidebar", $_POST["sidebar"]);
		}	
	}
	}
	
/*the_excerpt*/

function ragnar_excerpt_length( $length ) {
	return 28;
}
add_filter( 'excerpt_length', 'ragnar_excerpt_length', 999 );

function ragnar_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'ragnar_excerpt_more' );


add_filter( 'the_content_more_link', 'ragnar_modify_read_more_link' );
function ragnar_modify_read_more_link() {
return '<div class="ragnar-read-more"><a class="more-link" href="' . get_permalink() . '">'.esc_html__('Continua a leggere','ragnar').'</a></div>';
}

add_filter('dynamic_sidebar_params','ragnar_blog_widgets');
 
/* Register our callback function */
function ragnar_blog_widgets($params) {	 
 
     global $blog_widget_num; //Our widget counter variable
 
     //Check if we are displaying "Footer Sidebar"
      if(isset($params[0]['id']) && $params[0]['id'] == 'sidebar-delas-blog'){
         $blog_widget_num++;
		$divider = 2; //This is number of widgets that should fit in one row		
 
         //If it's third widget, add last class to it
         if($blog_widget_num % $divider == 0){
	    $class = 'class="last '; 
	    $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);
	 }
 
	}
 
      return $params;
}

/*reading time*/
function ragnar_estimated_reading_time( $id) {
	$post = get_post($id);
    $words = str_word_count( strip_tags( $post-> post_content ) );
    $minutes = floor( $words / 200 );
	if($minutes < 1) $minutes = 1;
	wp_reset_postdata(); 
    return $minutes;
}

/*post options*/
function ragnar_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function ragnar_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    ragnar_set_post_views($post_id);
}
add_action( 'wp_head', 'ragnar_track_post_views');

function ragnar_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*globals*/

function ragnar_globals($var){
	global $ragnar_data;
	if(!empty($ragnar_data[$var])){
		return true;
	}

}

function ragnar_data($data){
	$ragnar_data = get_option(RAGNAR_OPTIONS);
	if(isset($ragnar_data[$data])){
		return $ragnar_data[$data];	
	} else {
		return '';	
	}
}

function ragnar_block_one(){
global $ragnar_data;
?>
	<div class="block1">
	  <div class="block1_inner">
		<a href="<?php echo esc_url($ragnar_data['block1_link1']) ?>" title="Image">
		
			<div class="block1_img">
				<img src="<?php echo esc_url($ragnar_data['block1_img1']) ?>" alt="<?php echo esc_html($ragnar_data['block1_text1']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($ragnar_data['block1_text1']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($ragnar_data['block1_lower_text1']) ?></p>
				</div>
			</div>									
		</a>
		<a target="_blank" href="<?php echo esc_url($ragnar_data['block1_link2']) ?>" title="Image" >							
			
			<div class="block1_img">
				<img src="<?php echo esc_url($ragnar_data['block1_img2']) ?>" alt="<?php echo esc_html($ragnar_data['block1_text2']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($ragnar_data['block1_text2']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($ragnar_data['block1_lower_text2']) ?></p>
				</div>
			</div>									
			
		</a>
		<a href="<?php echo esc_url($ragnar_data['block1_link3']) ?>" title="Image" >								
			<div class="block1_img">
				<img src="<?php echo esc_url($ragnar_data['block1_img3']) ?>" alt="<?php echo esc_html($ragnar_data['block1_text3']) ?>">
			</div>
			
			<div class="block1_all_text">
				<div class="block1_text">
					<p><?php echo esc_html($ragnar_data['block1_text3']) ?></p>
				</div>
				<div class="block1_lower_text">
					<p><?php echo esc_html($ragnar_data['block1_lower_text3']) ?></p>
				</div>
			</div>
			
		</a>	
      </div>		
	</div>
<?php
}


function ragnar_block_two(){
global $ragnar_data;
?>
	<div class="block2">
		<div class="block2_content">
			<div class="block2_text">
				<p><?php ragnar_security($ragnar_data['block2_text']) ?></p>
			</div>					
			<div class="block2_img">
				<img class="block2_img_big" src="<?php echo esc_url($ragnar_data['block2_img']) ?>" alt="Image">
			</div>						
		</div>								
	</div>
<?php
}

/*import plugins*/

add_action( 'tgmpa_register', 'ragnar_required_plugins' );

function ragnar_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
		
        array(
            'name'               => esc_attr__('Revolution Slider','ragnar'), // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => 'revslider.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),			
		array(
				'name'      => esc_attr__('Shortcode Ultimate','ragnar'),
				'slug'      => 'shortcodes-ultimate',
				'required'  => false,
			),		
		array(
				'name'      => esc_attr__('Contact Form 7','ragnar'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),			
		array(
				'name'      => esc_attr__('Facebook Page Like Widget','ragnar'),
				'slug'      => 'facebook-pagelike-widget',
				'required'  => false,
			),	
		array(
				'name'      => esc_attr__('Recent tweets widget','ragnar'),
				'slug'      => 'recent-tweets-widget',
				'required'  => false,
			),		
		array(
				'name'      => esc_attr__('MailPoet Newsletters','ragnar'),
				'slug'      => 'wysija-newsletters',
				'required'  => false,
			),			
		array(
				'name'      => esc_attr__('Instagram Feed','ragnar'),
				'slug'      => 'instagram-feed',
				'required'  => false,
			),			
		array(
				'name'      => esc_attr__('SoundCloud Shortcode','ragnar'),
				'slug'      => 'instagram-feed',
				'required'  => false,
			),	
			
			
			
				
    );

    $config = array(
        'id'           => 'ragnar',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => get_template_directory() . '/includes/plugins/',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'ragnar' ),
            'menu_title'                      => __( 'Install Plugins', 'ragnar' ),
            'installing'                      => __( 'Installing Plugin: %s', 'ragnar' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'ragnar' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'ragnar' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'ragnar' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'ragnar' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'ragnar' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'ragnar' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'ragnar' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'ragnar' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'ragnar' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'ragnar' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'ragnar' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'ragnar' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'ragnar' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'ragnar' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
?>