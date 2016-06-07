<?php

if(file_exists(visor . ".php"))
require_once(visor . ".php");

switch ($sysVar[mode]){
	// Load website with curl 
	case "c_load":
		echo $c_siteLoader->c_load($_GET['filter']);
		break;
	default:
		$system->xorg->smarty->display($settings['commonTpl'] . "404" . $settings['ext4']);
		break;
}

?>