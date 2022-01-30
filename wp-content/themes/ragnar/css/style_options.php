<?php
global $ragnar_data; 
$use_bg = ''; $background = ''; $custom_bg = ''; $body_face = ''; $use_bg_full = ''; $bg_img = ''; $bg_prop = '';



if(isset($ragnar_data['background_image_full'])) {
	$use_bg_full = $ragnar_data['background_image_full'];
	
}

if(isset($ragnar_data['use_boxed'])){
	$use_boxed = $ragnar_data['use_boxed'];
}
else{
	$use_boxed = 0;
}

if($use_bg_full) {


	if($use_bg_full && isset($ragnar_data['use_boxed']) && $ragnar_data['use_boxed'] == 1) {
		$bg_img = $ragnar_data['image_background'];
		$bg_prop = '';
	}

	

	
	$background = 'url('. $bg_img .') '.$bg_prop ;

}


	
	if(isset($ragnar_data['google_menu_custom']) && $ragnar_data['google_menu_custom'] != ''){
		$font_menu = explode(':',$ragnar_data['google_menu_custom']);
		if(count($font_menu)>1) {
			$font_menu = $font_menu[0];
		}
		else{
			$font_menu = $ragnar_data['google_menu_custom'];
		}
	}		
	
	if(isset($ragnar_data['google_quote_custom']) && $ragnar_data['google_quote_custom'] != ''){
		$font_quote = explode(':',$ragnar_data['google_quote_custom']);
		if(count($font_quote)>1) {
			$font_quote = $font_quote[0];
		}
		else{
			$font_quote = $ragnar_data['google_quote_custom'];
		}
	}

	if(isset($ragnar_data['google_heading_custom']) && $ragnar_data['google_heading_custom'] != ''){
	
		$font_heading = explode(':',$ragnar_data['google_heading_custom']);

		if(count($font_heading)>1) {
			$font_heading = $font_heading[0];
		}
		else{
			$font_heading= $ragnar_data['google_heading_custom'];
		}	
	}

	if(isset($ragnar_data['google_body_custom']) && $ragnar_data['google_body_custom'] != ''){
		$font_body = explode(':',$ragnar_data['google_body_custom']);
		if(count($font_body)>1) {
			$font_body = $font_body[0];
		}
		else{
			$font_body = $ragnar_data['google_body_custom'];
		}
	}
	
	if(!empty($ragnar_data['default_font_m'])){ 
		$ragnar_fonts_m = 'text-gyre-adventor-r, text-gyre-adventor-b ,text-gyre-adventor-i,'; 
	} else {
		$ragnar_fonts_m = '';
	}

	if(!empty($ragnar_data['default_font_h'])){ 
		$ragnar_fonts_h = 'text-gyre-adventor-r, text-gyre-adventor-b ,text-gyre-adventor-i,'; 
	} else {
		$ragnar_fonts_h = '';
	}	
?>

@font-face {
font-family:"text-gyre-adventor-r";
src:url("<?php echo get_template_directory_uri() ?>/css/fonts/texgyreadventor-regular.woff") format("woff");
font-style: normal;
font-weight: normal;
}
@font-face {
font-family:"text-gyre-adventor-i";
src:url("<?php echo get_template_directory_uri() ?>/css/fonts/texgyreadventor-italic.woff") format("woff");
font-style: italic;
font-weight: normal;
}

@font-face {
font-family:"text-gyre-adventor-b";
src:url("<?php echo get_template_directory_uri() ?>/css/fonts/texgyreadventor-bold.woff") format("woff");
font-style: normal;
font-weight: bold;
}


.block_footer_text, .quote-category .blogpostcategory {font-family: <?php echo $font_quote; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}
body {	 
	background:<?php echo $ragnar_data['body_background_color'].' '.$background ?>  !important;
	color:<?php echo $ragnar_data['body_font']['color']; ?>;
	font-family: <?php echo $font_body; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;
	font-size: <?php echo $ragnar_data['body_font']['size']; ?>;
	font-weight: normal;
}

::selection { background: #000; color:#fff; text-shadow: none; }

h1, h2, h3, h4, h5, h6, .block1 p, .hebe .tp-tab-desc {font-weight:normal;font-style: normal; font-family:<?php echo $ragnar_fonts_h ?>  <?php echo $font_heading; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif; }
h1 { 	
	color:<?php echo $ragnar_data['heading_font_h1']['color']; ?>;
	font-size: <?php echo $ragnar_data['heading_font_h1']['size'] ?> !important;
	}
	
h2, .term-description p { 	
	color:<?php echo $ragnar_data['heading_font_h2']['color']; ?>;
	font-size: <?php echo $ragnar_data['heading_font_h2']['size'] ?> !important;
	}

h3 { 	
	color:<?php echo $ragnar_data['heading_font_h3']['color']; ?>;
	font-size: <?php echo $ragnar_data['heading_font_h3']['size'] ?> !important;
	}

h4 { 	
	color:<?php echo $ragnar_data['heading_font_h4']['color']; ?>;
	font-size: <?php echo $ragnar_data['heading_font_h4']['size'] ?> !important;
	}	
	
h5 { 	
	color:<?php echo $ragnar_data['heading_font_h5']['color']; ?>;
	font-size: <?php echo $ragnar_data['heading_font_h5']['size'] ?> !important;
	}	

h6 { 	
	color:<?php echo $ragnar_data['heading_font_h6']['color']; ?>;
	font-size: <?php echo $ragnar_data['heading_font_h6']['size'] ?> !important;
	}	

.top-wrapper .social_icons a i, .top-wrapper .widget_search form input#s {color:<?php echo $ragnar_data['body_box_coler']; ?>;}
i.fa.fa-search.search-desktop{color:<?php echo $ragnar_data['body_box_coler']; ?> !important;}
	
.pagenav a {font-style: normal; font-family:<?php echo $ragnar_fonts_m ?> <?php echo $font_menu; ?> !important;
			  font-size: <?php echo $ragnar_data['menu_font']['size'] ?>;
			  font-weight:normal;
			  color:<?php echo $ragnar_data['menu_font']['color'] ?>;
}
.block1_lower_text p,.widget_wysija_cont .updated, .widget_wysija_cont .login .message, p.edd-logged-in, #edd_login_form, #edd_login_form p  {font-family: <?php echo $font_body; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif !important;color:#444;font-size:14px;}

a, select, input, textarea, button{ color:<?php echo $ragnar_data['body_link_coler']; ?>;}
h3#reply-title, select, input, textarea, button, .link-category .title a, .wttitle h4 a{font-family: <?php echo $font_body; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}

.block2_text p, .su-quote-has-cite span {font-family: <?php echo $font_quote; ?>, "Helvetica Neue", Arial, Helvetica, Verdana, sans-serif;}



/* ***********************
--------------------------------------
------------MAIN COLOR----------
--------------------------------------
*********************** */

a:hover, span, .current-menu-item a, .blogmore, .more-link, .pagenav.fixedmenu li a:hover, .widget ul li a:hover,.pagenav.fixedmenu li.current-menu-item > a,.block2_text a,
.blogcontent a, .sentry a, .post-meta a:hover, .sidebar .social_icons i:hover,.blog_social .addthis_toolbox a:hover, .addthis_toolbox a:hover, .content.blog .single-date, a.post-meta-author, .block1_text p,
.grid .blog-category a, .pmc-main-menu li.colored a, .top-wrapper .social_icons a i:hover, #footer a:hover, .copyright a, .footer-social a span:hover, .footer-social a:hover

{
	color:<?php echo $ragnar_data['mainColor']; ?>;
}
#footer a:hover{color:<?php echo $ragnar_data['mainColor']; ?> !important;}
.su-quote-style-default  {border-left:5px solid <?php echo $ragnar_data['mainColor']; ?>;}
.addthis_toolbox a i:hover {color:<?php echo $ragnar_data['mainColor']; ?> !important;}
 
/* ***********************
--------------------------------------
------------BACKGROUND MAIN COLOR----------
--------------------------------------
*********************** */

.top-cart, .widget_tag_cloud a:hover, .sidebar .widget_search #searchsubmit,
.specificComment .comment-reply-link:hover, #submit:hover,  .wpcf7-submit:hover, #submit:hover,
.link-title-previous:hover, .link-title-next:hover, .specificComment .comment-edit-link:hover, .specificComment .comment-reply-link:hover, h3#reply-title small a:hover, .pagenav li a:after,
.widget_wysija_cont .wysija-submit,.widget ul li:before, #footer .widget_search #searchsubmit,.blogpost .tags a:hover,
.mainwrap.single-default.sidebar .link-title-next:hover, .mainwrap.single-default.sidebar .link-title-previous:hover,  .top-search-form i:hover, .edd-submit.button.blue:hover,
ul#menu-top-menu, a.catlink:hover, #commentform #submit, input[type="submit"]
  {
	background:<?php echo $ragnar_data['mainColor']; ?> ;
}
.pagenav  li li a:hover {background:none;}
.edd-submit.button.blue:hover, .cart_item.edd_checkout a:hover {background:<?php echo $ragnar_data['mainColor']; ?> !important;}
.link-title-previous:hover, .link-title-next:hover {color:#fff;}
#headerwrap {background:<?php echo $ragnar_data['menu_background_color']; ?>;}


#ragnar-slider-wrapper, .ragnar-rev-slider {padding-top:<?php echo $ragnar_data['rev_slider_margin']; ?>px;}

 /* ***********************
--------------------------------------
------------BOXED---------------------
-----------------------------------*/
<?php if($use_boxed == 0 &&  isset($ragnar_data['use_background']) && $ragnar_data['use_background'] == 1){ ?>
	body, .cf, .mainwrap, .post-full-width, .titleborderh2, .sidebar, div#ragnar-slider-wrapper, .block1 a, .block2   {
	background:<?php echo $ragnar_data['body_background_color'].' '.$background ?>  !important; 
	}
	
<?php	} ?>
 <?php if(isset($ragnar_data['use_boxed']) &&  $use_boxed == 1){ ?>
header,.outerpagewrap{background:none !important;}

@media screen and (min-width:1240px){
body {width:1240px !important;margin:0 auto !important;}
.top-nav ul{margin-right: -21px !important;}
.mainwrap.shop {float:none;}
.pagenav.fixedmenu { width: 1240px !important;}
.bottom-support-tab,.totop{right:5px;}
<?php if($use_bg_full){ ?>
	body {
	background:<?php echo $ragnar_data['body_background_color'].' '.$background ?>  !important; 
	background-attachment:fixed !important;
	background-size:cover !important; 
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	}	
<?php	} ?>
 <?php if(!$use_bg_full){ ?>
	body {
	background:<?php echo $ragnar_data['body_background_color'].' '.$background ?>  !important; 
	
	}
	
<?php	} ?>	
}
<?php } ?>
  <?php if(!empty($amory_data['image_background_header'])){ ?>
	header {
	background:<?php echo $amory_data['body_background_color'].' url('. $amory_data['image_background_header'] .')'; ?>  !important; 
	background-attachment:fixed !important;
	width:100%;
	-webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.2);
	box-shadow:	0px 0px 5px 1px rgba(0,0,0,0.2);
	float:left;
	}	
	.top-wrapper ,.logo-wrapper , div#logo{background:none;}
<?php	} ?>
 <?php if(empty($amory_data['use_menu_back']) && !empty($amory_data['image_background_header'])){ ?>
	#headerwrap {background:none;}
<?php	} ?>
<?php if(is_active_sidebar( 'ragnar_sidebar-under-header-left') || is_active_sidebar( 'ragnar-sidebar-under-header-fullwidth' )) {?>
	.sidebars-wrap.top {padding-top: 0px !important;}
<?php } ?>
 <?php if(is_active_sidebar( 'ragnar-sidebar-footer-fullwidth' ) || is_active_sidebar( 'ragnar-sidebar-footer-left' )){ ?>
	.sidebars-wrap.bottom {margin-top: 0px !important;padding-bottom:75px;}
<?php } ?>
 
.top-wrapper {background:<?php echo $ragnar_data['top_menu_background_color']; ?>;}

.pagenav {background:<?php echo $ragnar_data['menu_background_color']; ?>;border-top:<?php echo $ragnar_data['menu_top_border']; ?>px solid #000;border-bottom:<?php echo $ragnar_data['menu_bottom_border']; ?>px solid #000;} 
 


/* ***********************
--------------------------------------
------------CUSTOM CSS----------
--------------------------------------
*********************** */

<?php echo ragnar_stripText($ragnar_data['custom_style']) ?>