<?php
/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'ragnar_category_select_post_widget' );
/* Function that registers our widget. */
function ragnar_category_select_post_widget() {
	register_widget( 'ragnar_category_select_posts' );
}
class ragnar_category_select_posts extends WP_Widget {
	function ragnar_category_select_posts() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'category_select_posts', 'description' => esc_attr__('Displays the post image and excerpt from a selected category','ragnar') );
		/* Create the widget. */
		parent::__construct( 'category_select_posts-widget', esc_attr__('Ragnar - Premium Posts','ragnar'), $widget_ops, '' );
	}
	function widget( $args, $instance ) {
		global $pmc_data;
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		// to sure the number of posts displayed isn't negative or more than 10
		if ( !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 10 )
			$number = 10;
		//the query that will get post from a specific category. 
		//Wr slug the category because you actualy need the slug and not the name
		$args = array(
					'showposts' => $number,
					'post_status' => 'publish',
					'cat' => esc_attr($instance['category'] ),
					'post_type' => 'post',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',						
							'terms'    => array( 'post-format-quote'),
							'operator' => 'NOT IN'
						)
					),					
				);
				
		if($instance['post'] != 'none'){
			$args = array(
						'showposts' => $number,
						'post_status' => 'publish',
						'p' => esc_attr($instance['post'] ),
						'post_type' => 'post',				
					);		
		
		}
	
		$pc = new WP_Query($args);
		echo $before_widget; 
		//display the posts title as a link
		if ($pc->have_posts()) : 
		
				if ( $title ) echo $before_title . $title . $after_title; $i =0;
		?>
		
		
		<?php  while ($pc->have_posts()) : $pc->the_post();  
		$i++;
		$postmeta = get_post_custom(get_the_id());
		?>
				
			
				
		<?php if($i == 1 && $number > 1) {echo '<div class="widget-row">';} ?>
		<div class="widgett <?php if ( has_post_format( 'quote' , get_the_id())) echo 'quote-widget';?> <?php if ( has_post_format( 'link' , get_the_id())) echo 'link-widget';?>">		
			<?php if ( has_post_format( 'quote' , get_the_id())){ ?>
				<?php get_template_part('includes/boxes/loopBlogQuote'); ?>	
			<?php } ?>
			<?php if ( has_post_format( 'video' , get_the_id())) {?>
				
				<?php  
					if(!empty($postmeta["video_post_url"][0])) {
						$embed_code = wp_oembed_get(esc_url($postmeta["video_post_url"][0]));
						echo $embed_code ; ?>
					<div class="wttitle"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title(); ?>"><?php the_title(); ?></a></h4></div>
					<?php if(!empty($instance['excerpt']) && !(has_post_format( 'link' , get_the_id()))) { ?>
					<div class="pmc-excerpt"><?php echo wp_trim_words(get_the_excerpt(), esc_attr($instance['n_excerpt']),'...')  ?></div>
					<?php } 						
					}
				?>
			<?php }		
			if ( has_post_format( 'link' , get_the_id())) {
			$postmeta = get_post_custom(get_the_id()); 
			if(isset($postmeta["link_post_url"][0])){
				$link = $postmeta["link_post_url"][0];
			} else {
				$link = "#";
			}			
			?>
			<div class="link-category">
				<div class="blogpostcategory">
					<div class="topBlog">	
						<h2 class="title"><a href="<?php echo esc_url($link) ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>			
					<?php if(ragnar_getImage(get_the_id(), 'ragnar_blog') != '') { ?>	

					<a class="overdefultlink" href="<?php echo esc_url($link) ?>">
					<div class="overdefult">
					</div>
					</a>

					<div class="blogimage">		
						<a href="<?php echo esc_url($link) ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>"><?php echo ragnar_getImage(get_the_id(), 'ragnar_blog'); ?></a>
					</div>
					<?php } ?>												
				</div>
			</div>
			
			<?php 
			} 				
			if ( !get_post_format() || has_post_format( 'gallery' , get_the_id())) {
				$image=$comment_0=$comment_1=$comment_2= '';
				if ( has_post_thumbnail() ){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'ragnar-widget');
					$image = $image[0];}	
					?>			

					<div class="imgholder">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title(); ?>">
							<?php if (has_post_thumbnail( get_the_ID() )) echo '<img width="288px" height="155px" src = "'.$image.'" alt = "'.get_the_title().'">' ?>		
						</a>
					</div>
					<div class="wttitle"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title(); ?>"><?php the_title(); ?></a></h4></div>
					<?php if(!empty($instance['excerpt']) && !(has_post_format( 'link' , get_the_id()))) { ?>
					<div class="pmc-excerpt"><?php echo wp_trim_words(get_the_excerpt(), esc_attr($instance['n_excerpt']),'...')  ?></div>
					<?php } ?>	
			<?php } ?>
		</div>	
		<?php if($i == 2) {echo '</div>'; $i=0;} ?>	
		<?php  endwhile; ?>
	
		
		
		
	<?php
			wp_reset_query();  // Restore global post data stomped by the_post().
			endif;
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = $new_instance['number'];
		$instance['category'] = $new_instance['category'];	
		$instance['excerpt'] = $new_instance['excerpt'];	
		$instance['n_excerpt'] = $new_instance['n_excerpt'];		
		$instance['post'] = $new_instance['post'];		
		return $instance;
	}
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Post Widget', 'number' => 3, 'excerpt' => 0, 'n_excerpt' => 10,'post' => 'none','category' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_attr('Title:','ragnar') ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php echo esc_attr('Number of posts to show:','ragnar') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
			<br /><small><?php echo esc_attr('(at most 10)','ragnar') ?></small>
		</p>
		<p>
		<input id="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $instance['excerpt']); ?> />
		<label for="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>"><?php echo esc_attr('Show excpert?','ragnar') ?></label>
		</p>	
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'n_excerpt' )); ?>"><?php echo esc_attr('Number of words to show in excpert:','ragnar') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'n_excerpt' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'n_excerpt' )); ?>" value="<?php echo esc_attr($instance['n_excerpt']); ?>" size="3" />
		</p>			
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php echo esc_attr('Category to display','ragnar') ?></label>
			<?php $args = array(
							'name' => $this->get_field_name( 'category' ),
							'id' => $this->get_field_id( 'category' ),
							'selected' => esc_attr($instance['category'] ),
							'show_count' => 1,
							'value_field'	     => 'term_id'
						);
			?>
			<?php wp_dropdown_categories($args); ?>
			<br /><small><?php echo esc_attr('(select category to display)','ragnar') ?></small>
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'post' )); ?>"><?php echo esc_attr('Post to display','ragnar') ?></label>
		<select name="<?php echo esc_attr($this->get_field_name( 'post' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'post' )); ?>"> <option <?php selected( $instance['post'], 'none'); ?>value="none"><?php echo esc_attr('Display more then one post','ragnar') ?></option><?php global $post; $args = array( 'numberposts' => -1); $posts = get_posts($args); foreach( $posts as $post ) : setup_postdata($post); ?><option <?php selected( $instance['post'], $post->ID); ?>value="<?php echo esc_attr($post->ID); ?>"><?php the_title(); ?></option> <?php endforeach; ?> </select> 		
		</p>
		<p>
		<br /><small><?php echo esc_attr('Note: Quote post will not be displayed.','ragnar') ?></small>	
		<br />
		</p>	
		<?php
	}
	function slug($string)
	{
		$slug = trim($string);
		$slug= preg_replace('/[^a-zA-Z0-9 -]/','', $slug); // only take alphanumerical characters, but keep the spaces and dashes too...
		$slug= str_replace(' ','-', $slug); // replace spaces by dashes
		$slug= strtolower($slug); // make it lowercase
		return $slug;
	}
}
?>
