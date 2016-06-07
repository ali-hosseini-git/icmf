<?php

if(file_exists(visor . ".php"))
require_once(visor . ".php");

switch ($sysVar[mode]){
	// Show about us page (stored in theme/theme-name/tpl/customize) 
	case "v_about":
		$system->xorg->smarty->display($settings['customiseTpl'] . 'about' . $settings['ext4']);
		break;
	// Send a new message
	case "v_sendMessage":
		$system->xorg->smarty->display($settings['commonTpl'] . 'sendMessage' . $settings['ext4']);
		break;
	case "c_sendMessage":
		
		$c_contact->c_sendMessage($_POST);
		break;
	case "c_listMessage":
		$c_contact->c_listMessage();		
		break;
	case "c_showMessage":
		$id = $system->utility->filter->queryString('id');
		$c_contact->c_showMessage($id);
		break;
	case "v_contact":
		$system->xorg->smarty->display($settings['customiseTpl'] . "contactUs" . $settings['ext4']);
		break;
	default:
		$system->xorg->smarty->display($settings['commonTpl'] . "404" . $settings['ext4']);
		break;
}

?>