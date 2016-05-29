<?php
class m_watchDog extends masterModule{

	public $moduleName = "watchDog";
	public $watchDog = "watchDog";

	function m_watchDog(){

	}

	// List Poll
	public function m_list($filter = null){
		global $system, $lang, $settings;

		$filter = !empty($filter) ? $system->filterSplitter($filter) : null;
		$system->xorg->pagination->paginateStart("watchDog", "c_list", "`owner`, `id`, `active`, `agent`, `version`, `ip`, `reffer`, `host`, `os`, `op`, `mode`, `title`", "`$this->watchDog`", "1 $filter", "`timeStamp` DESC", "", "", "", "", 100, 7);

		$count = 1;
		while ($row = $system->dbm->db->fetch_array()){

			$entityList[$count][num] = $count;
			$entityList[$count][active] = $row[active];
			$entityList[$count][id] = $row[id];
			$entityList[$count][user] = $row[owner];
			$entityList[$count][agent] = $row[agent];
			$entityList[$count][version] = $row[version];
			$entityList[$count][ip] = $row[ip];
			$entityList[$count][reffer] = $row[reffer];
			$entityList[$count][host] = $row[host];
			$entityList[$count][os] = $row[os];
			$entityList[$count][op] = $row[op];
			$entityList[$count][mode] = $row[mode];
			$entityList[$count][title] = $row[title];

			$count++;
		}
		$system->xorg->smarty->assign("navigation", $system->xorg->pagination->renderFullNav());
		$system->xorg->smarty->assign("chart", $system->xorg->htmlElements->chartElement->bar("فراگامان شریف", "فراگامان"));
		$system->xorg->smarty->assign("entityList", $entityList);
		$system->xorg->smarty->display($settings[moduleAddress] . "/" . $this->moduleName . "/view/tpl/list" . $settings[ext4]);
	}

}
?>