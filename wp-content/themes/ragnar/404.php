<?php get_header(); ?>
<!-- top bar with breadcrumb -->
<div class = "outerpagewrap">
	<div class="pagewrap">
		<div class="pagecontent">
			<div class="pagecontentContent">
				<p><?php  echo ragnar_breadcrumb(); ?></p>
			</div>
		</div>
	</div>
</div> 

<!-- main content start -->			
<div id="mainwrap">
	<div id="main" class="clearfix">
		<div class="content fullwidth errorpage">
			<div class="postcontent">
				<h2><?php ragnar_security($ragnar_data['errorpagetitle']) ?></h2>
				<div class="posttext">
					<?php ragnar_security($ragnar_data['errorpage']) ?>
				</div>
				<div class="homeIcon"><a href="<?php echo esc_url(home_url('/')); ?>"></a></div>
			</div>							
		</div>
	</div>
</div>

<?php get_footer(); ?>