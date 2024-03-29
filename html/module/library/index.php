<?php

if(file_exists(visor . ".php"))
require_once(visor . ".php");

switch ($sysVar[mode]){
	###########################
	# Category                #
	###########################
	case "v_category":
		$system->xorg->smarty->display("$settings[moduleAddress]/$settings[moduleName]/$settings[viewAddress]/$settings[tplAddress]/category" . $settings[ext4]);
		break;
		// Add Category
	case "v_addCategory":
		$system->xorg->smarty->assign("category", $system->xorg->combo(array('id', 'name'), $settings[libraryCategory]));
		$system->xorg->smarty->display("$settings[moduleAddress]/$settings[moduleName]/$settings[viewAddress]/$settings[tplAddress]/category/add" . $settings[ext4]);
		break;
	case "c_addCategory":
		$c_library->c_addCategory($_POST[name], $_POST[category]);
		break;
		// Edit Category
	case "v_editCategory":
		
		break;
	case "c_editCategory":

		break;
		// Del Category
	case "v_delCategory":
		
		break;
	case "c_delCategory":
		$c_article->c_delCategory($_POST[id]);
		break;
		// List Category
	case "c_listCategory":
		$system->xorg->smarty->assign("category", $system->xorg->combo(array('id', 'name'), $settings[libraryCategory]));
		$c_library->c_listCategory($_POST[filter]);
		break;
		// Activate Category
	case "c_activateCategory":
		$c_article->c_activateCategory($_POST[id]);
		break;
		// Deactive Category
	case "c_deactivateCategory":
		$c_article->c_deactivateCategory($_POST[id]);
		break;

		###########################
		# Object (e-book)         #
		###########################
	case "v_object":
		$system->xorg->smarty->display("$settings[moduleAddress]/$settings[moduleName]/$settings[viewAddress]/$settings[tplAddress]/object" . $settings[ext4]);
		break;
		// Add Object
	case "v_addObject":
		$system->xorg->smarty->assign("category", $system->xorg->combo(array('id', 'name'), $settings[libraryCategory]));
		$system->xorg->smarty->display("$settings[moduleAddress]/$settings[moduleName]/$settings[viewAddress]/$settings[tplAddress]/object/add" . $settings[ext4]);
		break;
	case "c_addObject":
		$c_library->c_addObject($_POST[name], $_POST[category], $_POST[filePath], $_POST[author], $_POST[price], $_POST['abstract'], $_POST[imagePath]);
		break;
		// Edit Object
	case "v_editObject":
		
		break;
	case "c_editObject":

		break;
		// Del Object
	case "v_delObject":
		
		break;
	case "c_delObject":
		$c_article->c_delObject($_POST[id]);
		break;
		// List Object
	case "c_listObject":
		$c_library->c_listObject('list', $_POST[filter]);
		break;
		// Show List Object
	case "c_showListObject":
		$c_library->c_listObject('showList', $_POST[filter]);
		break;
		// Show Object
	case "c_showObject":
		$c_library->c_showObject($_POST[id]);
		break;
		// Activate Object
	case "c_activateObject":
		$c_article->c_activateObject($_POST[id]);
		break;
		// Deactive Object
	case "c_deactivateObject":
		$c_article->c_deactivateObject($_POST[id]);
		break;

		###########################
		# Favorite                #
		###########################
		// Add Object to favorite
	case "v_addObjectToFavorite":
		$system->xorg->smarty->display("$settings[moduleAddress]/$settings[moduleName]/$settings[viewAddress]/$settings[tplAddress]/add" . $settings[ext4]);
		break;
	case "c_addObjectToFavorite":
		$c_article->c_addObjectToFavorite($_POST[name], $_POST[articleContent]);
		break;
		// Del Object from favorite
	case "c_delObjectFromFavorite":
		$c_article->c_delObjectFromFavorite($_POST[id]);
		break;
		// List favorite
	case "c_listFavorite":
		$c_article->c_listFavorite($_POST[filter]);
		break;
	default:
		$system->xorg->smarty->display($settings[commonTpl] . "404" . $settings[ext4]);
		break;
}

?>