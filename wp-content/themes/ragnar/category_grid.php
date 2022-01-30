<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!ragnar_globals('use_fullwidth')) echo 'sidebar' ?> grid">
	<div class="main clearfix">		
		<div class="content blog">
			<div id="pmc-tabs">
				<?php if(is_front_page()) { ?>
				<ul>
				<li><a class="tab1" href="#tabs-1"><?php esc_html_e('Recent posts','ragnar'); ?></a></li>
				<li><a class="tab2" href="#tabs-2"><?php esc_html_e('Popular posts','ragnar'); ?></a></li>
				</ul>
				<?php } ?>
				<div class="pmc-tabs">
					<div id="tabs-1" >
					<?php  get_template_part('category_grid_latest','latest-post'); ?>
					</div>
					<?php if(is_front_page()) { ?>
					<div id="tabs-2" >
					<?php get_template_part('category_grid_popular','popular-post'); ?>
					</div>
					<?php } ?>
				</div>
			</div>		
			<div class="infinity-more"><?php esc_html_e('Load more posts','ragnar'); ?></div>
				<div class="navi-grid">
	<?php
		get_template_part('includes/wp-pagenavi','navigation');
		if(function_exists('ragnar_wp_pagenavi')) { ragnar_wp_pagenavi(); }
	?>
	</div>
		</div>
		<!-- sidebar -->
		<?php if(!ragnar_globals('use_fullwidth')) { ?>
			<?php if(is_active_sidebar( 'ragnar_sidebar')) { ?>
				<div class="sidebar">	
					<?php dynamic_sidebar( 'ragnar_sidebar' ); ?>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>											
