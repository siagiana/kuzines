<?php
require "lessc.inc.php";

function outputCompileLess($inputFile) {
	// load the cache
	$cacheFile = $inputFile.".cache";

	if (file_exists($cacheFile)) {
		$cache = unserialize(file_get_contents($cacheFile));
	} else {
		$cache = $inputFile;
	}

	$less = new lessc;
	$newCache = $less->cachedCompile($cache);

	header("Content-type: text/css", true);
	if (!is_array($cache) or $newCache["updated"] > $cache["updated"]) {
		file_put_contents($cacheFile, serialize($newCache));
		echo $newCache['compiled'];
	}
	else
	{
		echo $cache['compiled'];
	}
}

$inputFile = $_SERVER['QUERY_STRING'];
if ( ! empty($inputFile))
{
	outputCompileLess($inputFile);
}