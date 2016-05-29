<?php
function compress($string) {

	// remove comments
	$string = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $string);
	// Remove whitespace
	//	$string = str_replace(array("\r\n", "\r", "\n", "\t", 'Â  ', 'Â Â Â  ', 'Â Â Â  '), '', $string);

	return $string;
}

function loadFiles(){

	$files = array(
		'../../../kernel/lib/xorg/jQuery/jquery.min.js',
		'../../../kernel/lib/xorg/bootstrap/bootstrap.min.js',
		
		'../../../kernel/lib/xorg/bootstrap/extension/jqBootstrapValidation/jqBootstrapValidation.js',
		'../../../kernel/lib/xorg/bootstrap/extension/table/bootstrap-table.min.js',
		'../../../kernel/lib/xorg/bootstrap/extension/table/locale/bootstrap-table-fa-IR.min.js',
		'../../../kernel/lib/xorg/bootstrap/extension/table/extensions/export/bootstrap-table-export.min.js',
		'../../../kernel/lib/xorg/bootstrap/extension/table/extensions/export/tableExport.min.js',
		'../../../kernel/lib/xorg/bootstrap/extension/table/extensions/multiple-sort/bootstrap-table-multiple-sort.min.js',
		'../../../kernel/lib/xorg/bootstrap/extension/table/extensions/toolbar/bootstrap-table-toolbar.min.js',
		'../../../kernel/lib/xorg/jQuery/plugin/isotope/isotope.pkgd.min.js',
		'../../../kernel/lib/xorg/jQuery/plugin/isotope/packery-mode.pkgd.min.js',
		
		'main.js',
		'startUp.js'
		);

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