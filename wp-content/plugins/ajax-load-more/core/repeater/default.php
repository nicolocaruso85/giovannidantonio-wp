<div class="press-item">

	<?php

		$thumbnail_press = get_field('thumbnail_press');
		$thumbnail_press = $thumbnail_press['url'];

	?>

	<div class="blogimage">	
				
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>">
			<img src="<?php echo $thumbnail_press;?>" alt="">
		</a>

	</div>

	<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','ragnar')?> <?php the_title_attribute(); ?>"><?php echo wp_trim_words(get_the_title(), 5); ?></a></h2>


</div>