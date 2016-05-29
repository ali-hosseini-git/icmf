<?php
Define("postConfFile", "$settings[moduleAddress]/$sysVar[op]/config/config");
$config = postConfFile . ".php";

if(file_exists($config)){
	require_once ($config);

	/* Model */
	$subSystem = $settings[moduleAddress] . "/" . $settings[moduleName] . "/" . $settings[modelAddress] . "/" . $settings[moduleName] . $settings[ext2];
	if(file_exists($subSystem)){
		require_once ($subSystem);
		$m_post = new m_post();
		$system->run($subSystem, 'On');
	}else{
		$system->run($subSystem, 'Off');
	}

	/* Controller */
	$subSystem = $settings[moduleAddress] . "/" . $settings[moduleName] . "/" . $settings[moduleController] . "/" . $settings[moduleName] . $settings[ext2];
	if(file_exists($subSystem)){
		require_once ($subSystem);
		$c_post = new c_post();
		$system->run($subSystem, 'On');
	}else{
		$system->run($subSystem, 'Off');
	}


}else{
	die("Post sub system is down !");
}
?>