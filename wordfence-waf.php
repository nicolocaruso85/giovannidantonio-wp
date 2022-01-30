<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

if (file_exists('/home/giovannidantonio/www/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '/home/giovannidantonio/www/wp-content/wflogs/');
	include_once '/home/giovannidantonio/www/wp-content/plugins/wordfence/waf/bootstrap.php';
}
?>