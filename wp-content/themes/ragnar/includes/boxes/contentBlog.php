<?php $postmeta = get_post_custom(get_the_id()); ?>


<?php
if ( has_post_format( 'gallery' , get_the_id())) { 
?>

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
		if ($attachments) {?>
			<div id="slider-category" class="slider-category">	
				<ul id="slider" class="bxslider">
					<?php 
						foreach ($attachments as  $image_url) {
						

							?>	
								<li>
									<img src="<?php echo esc_url( $image_url) ?>" alt="<?php ?>"/>							
								</li>
								<?php } ?>
				</ul>

			</div>
		<?php } ?>

	<?php } 
	if ( has_post_format( 'video' , get_the_id())) { ?>
	<div class="slider-category">
		<?php
		if(!empty($postmeta["video_post_url"][0])) {
			echo do_shortcode('[video src='.esc_url($postmeta["video_post_url"][0]).' width=800 height=490]');
		}
		else{ 
			  $image = 'http://placehold.it/800x490';  ?>
		<?php } ?>	
	</div>
	<?php } 
	if ( has_post_format( 'link' , get_the_id())) {
	?>
	<?php 
	} 				
	?>
	<?php if ( has_post_format( 'audio' , get_the_id())) {?>
		<div class="audioPlayerWrap">
			<div class="audioPlayer">
				<?php 
				if(isset($postmeta["audio_post_url"][0]))
					echo do_shortcode('[soundcloud  params="auto_play=false&hide_related=false&visual=true" width="100%" height="150"]'. esc_url($postmeta["audio_post_url"][0]) .'[/soundcloud]') ?>
			</div>
		</div>		
	<?php
	}
	?>					


	<?php
	if ( !get_post_format() || has_post_format( 'quote' , get_the_id()) || has_post_format( 'link' , get_the_id())) {?>

		<?php if(ragnar_getImage(get_the_id(), 'ragnar-postGridBlock-2') != '' && (!isset($postmeta["ragnar_featured_category"][0]) || $postmeta["ragnar_featured_category"][0] == 1)) { ?>	
			<div class="blogimage">		
				<?php 
					if(isset($postmeta["link_post_url"][0])){
						$link = $postmeta["link_post_url"][0];
					} else {
						$link = "#";
					}				
				?>
				<?php if(has_post_format( 'link' , get_the_id())) { ?>	
					<a href="<?php echo esc_url($link); ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>"><?php echo ragnar_getImage(get_the_id(), 'ragnar-postGridBlock-2'); ?></a>
				<?php } if (has_post_format( 'quote' , get_the_id())) { ?>
					<?php  echo ragnar_getImage(get_the_id(), 'ragnar-postGridBlock-2'); ?>
				<?php }  if (!get_post_format() ) { ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>"><?php echo ragnar_getImage(get_the_id(), 'ragnar-postGridBlock-2'); ?></a>
				<?php } ?>
			</div>
		<?php } ?>

	<?php } ?>
