
<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!ragnar_globals('use_fullwidth')) echo 'sidebar' ?> default">
	<div class="main clearfix">
		<div class="pad"></div>			
		<div class="content blog">
		<h1>Press</h1>

			<?php if (have_posts()) : ?>
			<?php
			add_filter( 'shortcode_atts_gallery', 'ragnar_gallery' );
			function ragnar_gallery( $out )
			{
				remove_filter( current_filter(), __FUNCTION__ );
				$out['size'] = 'ragnar-news';
				return $out;
			}		
			?>
			<?php while (have_posts()) : the_post(); ?>
			<?php if(is_sticky(get_the_id())) { ?>
			<div class="ragnar_sticky">
			<?php } ?>
			<?php
			$postmeta = get_post_custom(get_the_id()); 

			?>

			<?php if ( !get_post_format() ) {?>
		

			<div class="press-item">
									
				<?php if(ragnar_getImage(get_the_id(), 'ragnar-postBlock') != '') { ?>	

					<a class="overdefultlink" href="<?php the_permalink() ?>">
					<div class="overdefult">
					</div>
					</a>


					<?php
					
					$thumbnail_press = get_field('thumbnail_press');
					$thumbnail_press = $thumbnail_press['url'];

					?>
			


					<div class="blogimage">	
						<div class="loading"></div>		
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>">
							<?php //echo ragnar_getImage(get_the_id(), 'ragnar-postBlock'); ?>
							<img src="<?php echo $thumbnail_press;?>" alt="">
						</a>
					</div>

					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 5); ?></a></h2>

					<?php } ?>
					
			</div> <!-- press-item -->
			
			<?php } ?>		
			<?php if(is_sticky()) { ?>
				</div>
			<?php } ?>
			
				<?php endwhile; ?>
				
					<?php
					
						get_template_part('includes/wp-pagenavi','navigation');
						if(function_exists('ragnar_wp_pagenavi')) { ragnar_wp_pagenavi(); }
					?>
					
					<?php else : ?>
					
						<div class="postcontent">
							<h1><?php ragnar_security(ragnar_data('errorpagetitle')) ?></h1>
							<div class="posttext">
								<?php ragnar_security(ragnar_data('errorpage')) ?>
							</div>
						</div>
						
					<?php endif; ?>
				
		</div>
		<!-- sidebar -->
		<?php if(!ragnar_globals('use_fullwidth')) { ?>
			<?php if(is_active_sidebar( 'ragnar_sidebar')) { ?>
				<div class="sidebar">	
					<?php dynamic_sidebar( 'about' ); ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	
</div>											
