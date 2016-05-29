<?php
function compress($string) {

	// remove comments
	$string = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $string);
	// Remove whitespace
	//	$string = str_replace(array("\r\n", "\r", "\n", "\t", 'Â  ', 'Â Â Â  ', 'Â Â Â  '), '', $string);

	return $string;
}
require_once '../../../config/config.php';

function loadFiles(){
	
	$files = array(
		'../../../kernel/lib/xorg/bootstrap-rtl/assets/js/jquery.js',
		'../../../kernel/lib/xorg/isotope/jquery.isotope.min.js',
		'../../../kernel/lib/xorg/isotope/isotope.pkgd.min.js',
		'../../../kernel/lib/xorg/isotope/isotope.js',
// 		'../../../kernel/lib/xorg/jQuery/plugin/address/jquery.address-1.5.min.js',
// 		'../../../kernel/lib/xorg/jQuery/plugin/showLoading/jquery.showLoading.min.js',
// 		'../../../kernel/lib/xorg/ajax/ajax.js',
// 		'../../../kernel/lib/xorg/jQuery/plugin/scrollTo/jquery.scrollTo-1.4.3.1-min.js',
// 		'../../../kernel/lib/xorg/global/disableScroll.js',
// 		'../../../kernel/lib/xorg/jQuery/plugin/mcdropdown/jquery.mcdropdown.min.js',
// 		'../../../kernel/lib/xorg/jQuery/plugin/mcdropdown/jquery.bgiframe.js',
//  	'../../../kernel/lib/xorg/jQuery/plugin/showPassword/jquery.showpassword.min.js',
			
		'../../../kernel/lib/xorg/bootstrap-rtl/assets/js/html5shiv.js',
		'../../../kernel/lib/xorg/bootstrap-rtl/assets/js/respond.min.js',
		
		'startUp.js',
		'custom.js'
		
		);
	if ($settings['lang'] == 'ltr')
		$files[] = '../../../kernel/lib/xorg/bootstrap/bootstrap.min.js';
	else
		$files[] = '../../../kernel/lib/xorg/bootstrap-rtl/dist/js/bootstrap.min.js';
		
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