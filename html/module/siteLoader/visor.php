<?php
Define("siteLoaderConfFile","$settings[moduleAddress]/$sysVar[op]/config/config");
$config = siteLoaderConfFile . ".php";

if(file_exists($config)){
	require_once ($config);

	/* Model */
	$subSystem = $settings[moduleAddress] . "/" . $settings[moduleName] . "/" . $settings[modelAddress] . "/" . $settings[moduleName] . $settings[ext2];
	if(file_exists($subSystem)){
		require_once ($subSystem);
		$m_siteLoader = new m_siteLoader();
		$system->run($subSystem, 'On');
	}else{
		$system->run($subSystem, 'Off');
	}

	/* Controller */
	$subSystem = $settings[moduleAddress] . "/" . $settings[moduleName] . "/" . $settings[moduleController] . "/" . $settings[moduleName] . $settings[ext2];
	if(file_exists($subSystem)){
		require_once ($subSystem);
		$c_siteLoader = new c_siteLoader();
		$system->run($subSystem, 'On');
	}else{
		$system->run($subSystem, 'Off');
	}


}else{
	die("<br>SiteLoader sub system is down !<br>");
}
?>