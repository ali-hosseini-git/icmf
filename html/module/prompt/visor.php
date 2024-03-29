<?php
Define('ConfFile', "$settings[moduleAddress]/$sysVar[op]/config/config");
$config = ConfFile . ".php";

if(file_exists($config)){
	require_once ($config);

	/* Model */
	$subSystem = $settings[moduleAddress] . "/" . $settings[moduleName] . "/" . $settings[modelAddress] . "/" . $settings[moduleName] . $settings[ext2];
	if(file_exists($subSystem)){
		require_once ($subSystem);
		$m_prompt = new m_prompt();
		$system->run($subSystem, 'On');
	}else{
		$system->run($subSystem, 'Off');
	}

	/* Controller */
	$subSystem = $settings[moduleAddress] . "/" . $settings[moduleName] . "/" . $settings[moduleController] . "/" . $settings[moduleName] . $settings[ext2];
	if(file_exists($subSystem)){
		require_once ($subSystem);
		$c_prompt = new c_prompt();
		$system->run($subSystem, 'On');
	}else{
		$system->run($subSystem, 'Off');
	}


}else{
	die("$sysVar[op] sub system is down !");
}
?>