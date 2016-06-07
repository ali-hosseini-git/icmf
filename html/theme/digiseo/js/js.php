<?php

function compress($string) {

	// remove comments
	$string = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $string);
	// Remove whitespace
	//	$string = str_replace(array("\r\n", "\r", "\n", "\t", 'Â  ', 'Â Â Â  ', 'Â Â Â  '), '', $string);

	return $string;
}

function loadFiles(){	
	$files = array();
	
	// Framework JS
	$files[] = '../../../kernel/lib/xorg/jQuery/jquery-1.10.2.min.js';
	$files[] = '../../../kernel/lib/xorg/jQuery/jquery-migrate-1.0.0.min.js';
	$files[] = '../../../kernel/lib/xorg/bootstrap/bootstrap.min.js';
	$files[] = '../../../kernel/lib/xorg/jQuery/plugin/address/jquery.address-1.5.js';
	$files[] = '../../../kernel/lib/xorg/jQuery/plugin/scrollTo/jquery.scrollTo-1.4.3.1-min.js';
	$files[] = '../../../kernel/lib/xorg/jQuery/plugin/showLoading/jquery.showLoading.min.js';
	$files[] = '../../../kernel/lib/xorg/ajax/ajax.js';
	
	
	// Modules JS
	$moduelDir = 'modules';
	$jss = array_diff(scandir('modules'), array('..', '.'));
	foreach ($jss as $js){
		$files[] = $moduelDir . '/' . $js;
	}
	
	// Theme JS
	$files[] = 'regional.js';
	$files[] = 'startUp.js';
	
	foreach ($files as $file){
		$string .= file_get_contents($file);
	}

	return compress($string);
}

if(extension_loaded('zlib')){
	ob_start('ob_gzhandler');
}

header ('content-type: text/javascript; charset: UTF-8');
header ('cache-control: must-revalidate');
$offset = 168 * 60 * 60;
$expire = 'expires: ' . gmdate ('D, d M Y H:i:s', time() + $offset) . ' GMT';
header ($expire);
ob_start();

require_once '../../../config/config.php';

// Developer mode
if($settings['mode'] == 'dev'){
	if (file_exists('../../../tmp/cache/js.js')) {
		unlink('../../../tmp/cache/js.js');
	}
}

if(file_exists('../../../tmp/cache/js.js')){
	if(filemtime('../../../tmp/cache/js.js') < (time()-2592000)){
		file_put_contents('../../../tmp/cache/js.js', loadFiles());		
	}
}else{
	file_put_contents('../../../tmp/cache/js.js', loadFiles());
}
include ('../../../tmp/cache/js.js');
if(extension_loaded('zlib')){ob_end_flush();}
?>