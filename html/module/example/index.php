<?php
if (file_exists ( visor . ".php" ))
	require_once (visor . ".php");

switch ($sysVar [mode]) {
	// ##########################
	// Object (example) #
	// ##########################
	// View a single object
	case 'c_viewObject' :
		
		break;
	case 'v_addObject' :
		$system->xorg->smarty->display("$settings[moduleAddress]/$settings[moduleName]/$settings[viewAddress]/$settings[tplAddress]/object/add" . $settings['ext4']);
		
		break;
	// Add object
	case 'c_addObject' :
		
		break;
	// Edit object
	case 'v_editObject' :
		
		break;
	case 'c_editObject' :
		
		break;
	// Delete object
	case 'c_delObject' :
		
		break;
	// List object
	case 'c_listObject' :
		
		break;
	default :
		break;
}