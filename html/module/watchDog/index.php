<?php

if(file_exists(visor . ".php"))
require_once(visor . ".php");

switch ($sysVar[mode]){
	// List watchDog
	case "c_list":
		$c_watchDog->c_list($_POST[filter]);
		break;
	default:
		$system->xorg->smarty->display($settings[commonTpl] . "404" . $settings[ext4]);
		break;
}

?>