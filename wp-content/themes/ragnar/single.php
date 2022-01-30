<?php get_header();  ?>
<?php
$posttags = wp_get_post_tags(get_the_id(), array( 'fields' => 'slugs' ));
$args = array( 
		'posts_per_page' => 9,
		'exclude' => array( get_the_id(),
		'tax_query'      => array(
			array(
				'taxonomy'  => 'post_tag',
				'field'     => 'slug',
				'terms'     => $posttags
			), 
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-quote', 'post-format-link' ),
				'operator' => 'NOT IN'
			)			
			)
		)
	);

$postslist = get_posts( $args ); 

?>	
<!-- main content start -->
<div class="mainwrap single-default <?php if(!ragnar_globals('use_fullwidth')) echo 'sidebar' ?>">
	<?php if (have_posts()) : while (have_posts()) : the_post();  $postmeta = get_post_custom(get_the_id());  
	?>
	<!--rev slider-->
	<?php
	if(isset($postmeta["custom_post_rev"][0]) && ($postmeta["custom_post_rev"][0] != 'empty')) { ?>
		<div id="ragnar-slider-wrapper" class="ragnar-rev-slider">
		<?php putRevSlider($postmeta["custom_post_rev"][0]); ?>
		</div>
		<?php
	}
	?>
	
	<div class="main clearfix">	
	<div class="content singledefult">
		<div class="postcontent singledefult" id="post-<?php  get_the_id(); ?>" <?php post_class(); ?>>		
			<div class="blogpost">		
				<div class="posttext">
					<div class="topBlog">	
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'ragnar' ) ) . '</em>'; ?> </div>
						<h1 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<?php if(ragnar_globals('display_post_meta')) { ?>
						<div class = "post-meta">
							<?php 
							$day = get_the_time('d');
							$month= get_the_time('m');
							$year= get_the_time('Y');
							?>
							<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_time('F j, Y') ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','ragnar'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>				
						</div>
						<?php } ?> <!-- end of post meta -->
					</div>			
					<?php if ( !has_post_format( 'gallery' , get_the_id())) { ?>
						
						<div class="blogsingleimage">			
							<?php if ( !get_post_format() || has_post_format( 'quote' , get_the_id()) || has_post_format( 'image' , get_the_id())) {?>
								<?php echo ragnar_getImage(get_the_id(), 'ragnar-postBlock'); ?>
							<?php } ?>
							
							<?php if ( has_post_format( 'video' , get_the_id())) {?>
							
								<?php  
									if(!empty($postmeta["video_post_url"][0])) {
										echo wp_oembed_get(esc_url($postmeta["video_post_url"][0]));
									}
								?>
							<?php } ?>	
							<?php if ( has_post_format( 'audio' , get_the_id())) {?>
							<div class="audioPlayer">
								<?php 
								if(isset($postmeta["audio_post_url"][0]))
									echo do_shortcode('[soundcloud  params="auto_play=false&hide_related=false&visual=true" width="100%" height="150"]'. esc_url($postmeta["audio_post_url"][0]) .'[/soundcloud]') ?>
							</div>
							<?php
							}
							?>	

						</div>
		

					<?php } else {?>

					<?php
						$attachments = '';
						add_filter( 'shortcode_atts_gallery', 'ragnar_gallery' );
						function ragnar_gallery( $out )
						{
							remove_filter( current_filter(), __FUNCTION__ );
							$out['size'] = 'ragnar-news';
							return $out;
						}
						$attachments =  get_post_gallery_images( $post->ID);
						if ($attachments) {
							?>
							<div class="category-slider" value="slider-category-<?php echo $post->ID ?>">
								<div id="slider-category" class="slider-category">
									<ul id="slider" class="slider-category-<?php echo $post->ID ?>">
										<?php 
											foreach ($attachments as  $image_url) { ?>	
												<li>
													<img src="<?php echo esc_url( $image_url) ?>" alt="<?php ?>"/>	
												</li>
												<?php } ?>
									</ul>
									<div class="bx-controls bx-has-pager bx-has-controls-direction">
										<div class="bx-pager bx-custom-pager">
											<?php
											foreach ($attachments as  $key=>$image_url) { ?>	
												<div class="bx-pager-item">
												<a data-slide-index="<?php echo esc_attr($key) ?>" href=""><img src="<?php echo esc_url( $image_url) ?>" alt="<?php ?>"/></a>
												</div>
												<?php 
											} ?>	
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

					<?php }  ?>
					<div class="sentry">
						<?php if ( has_post_format( 'video' , get_the_id()) ) {?>
							<div><?php the_content(); ?></div>
						<?php
						}
					    if ( has_post_format( 'audio' , get_the_id())) { ?>
							<div><?php the_content(); ?></div>
						<?php
						}						
						if(has_post_format( 'gallery' , get_the_id())){?>
							<div class="gallery-content"><?php the_content(); 	?></div>
						<?php } 
						if( !get_post_format() || has_post_format( 'quote' , get_the_id()) || has_post_format( 'image' , get_the_id())){?> 
						    <?php add_filter('the_content', 'ragnar_addlightbox'); ?>
							<div><?php the_content(); ?></div>		
						<?php } ?>
						<div class="post-page-links"><?php wp_link_pages(); ?></div>
						<div class="singleBorder"></div>
					</div>
				</div>
				
				<?php if(ragnar_globals('single_display_tags') && ( ! post_password_required() )) { ?>
				<?php if(has_tag()) { ?>
					<div class="tags"><?php the_tags('',' ',''); ?></div>	
				<?php } ?>
				<?php } ?>
				
				<?php if(ragnar_globals('single_display_post_meta')) { ?>
				<div class="blog-info">
					
				
					<?php if(ragnar_globals('single_display_socials') && ( ! post_password_required() )) { ?>
					<div class="blog_social"> <?php esc_html_e('Condividi: ','ragnar') . ragnar_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>	
					<?php } ?>
				
				</div>
				<?php } ?> <!-- end of blog-info -->
				
				<?php if(ragnar_globals('display_author_info') && get_the_author_meta('description')!= '' && ( ! post_password_required() )) { ?>
				<div class = "author-info-wrap">
					<div class="blogAuthor">
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_avatar(get_the_author_meta( 'ID' ), 100); ?></a>
					</div>
					<div class="authorBlogName">	
						<?php esc_html_e('Written by ','ragnar'); ?> <?php echo get_the_author(); ?>  
					</div>
					<div class = "bibliographical-info"><?php echo get_the_author_meta('description')?></div>
				</div>
				<?php } ?> <!-- end of author info -->
				
			</div>						
			
		</div>	
		
		<?php if(ragnar_globals('display_related')) { ?>
		<div class="titleborderOut">
			<div class="titleborder"></div>
		</div>
	
		<div class="relatedPosts">
			<div class="relatedtitle">
				<h4><?php  esc_html_e('Related Posts','ragnar'); ?></h4>
			</div>
			<div class="related">			
			<?php
			$count = 0;
			foreach($postslist as $ragnar_post) {
				//setup_postdata( $ragnar_post );
				if(!has_post_format( 'quote' , $ragnar_post->ID) && !has_post_format( 'link' , $ragnar_post->ID)) {
				//if(ragnar_getImage($ragnar_post->ID, 'ragnar-related') !=''){
					$image_related = get_the_post_thumbnail($ragnar_post->ID,'ragnar-related');
				//}
		
				if($count != 2){ ?>
					<div class="one_third">
				<?php } else { ?>
					<div class="one_third last">
				<?php } ?>
						<?php if(!empty($image_related)){ ?>
							<div class="image"><a href="<?php echo esc_url(get_permalink($ragnar_post->ID)) ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php echo esc_attr($ragnar_post->post_title); ?>"><?php ragnar_security($image_related) ?></a></div>
						<?php } ?>
						<h4><a href="<?php echo esc_url(get_permalink($ragnar_post->ID)) ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php echo esc_attr($ragnar_post->post_title); ?>"><?php echo esc_attr($ragnar_post->post_title); ?></a></h4>
						<?php
						$day = get_the_time('d',$ragnar_post->ID);
						$month= get_the_time('m',$ragnar_post->ID);
						$year= get_the_time('Y',$ragnar_post->ID);
						
						?>
						<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php echo esc_attr(date('F j, Y', strtotime($ragnar_post->post_date))) ?></a>						
					</div>
						
				<?php 
				if($count == 2){ break;}
				$count++;
				}
			} ?>
			</div>
			</div>
			<?php 
			wp_reset_postdata();
			
			?>	
		<?php } ?> <!-- end of related -->
		
		
		<?php comments_template(); ?>
		
		<?php if(ragnar_globals('single_display_post_navigation')) { ?>
		<div class = "post-navigation">
			<?php next_post_link('%link', '<div class="link-title-previous"><span>&#171; '.esc_html__('Previous post','ragnar').'</span><div class="prev-post-title">%title</div></div>' ,false,''); ?> 
			<?php previous_post_link('%link','<div class="link-title-next"><span>'.esc_html__('Next post','ragnar').' &#187;</span><div class="next-post-title">%title</div></div>',false,''); ?> 
		</div>
		<?php } ?> <!-- end of post navigation -->
		<?php endwhile; else: ?>
						
			<?php get_template_part('404','error-page'); ?>
		<?php endif; ?>
		</div>
		
		
	<?php if(!ragnar_globals('use_fullwidth')) { ?>
		<?php if(is_active_sidebar( 'ragnar_sidebar')) { ?>
			<div class="sidebar">	
				<?php dynamic_sidebar( 'ragnar_sidebar' ); ?>
			</div>
		<?php } ?>
	<?php } ?>
</div>
</div>
<?php get_footer(); ?>
