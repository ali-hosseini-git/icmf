<?php 
class lang extends system{
	
	public $table = "lang";
	private $userSettings = "userSettings";
	
	function lang(){
		
		$this->table = $this->tablePrefix . $this->table;
	}
	
	public function langMan(){
		global $system, $settings;
		
		if(!empty($_SESSION['lang'])){
			$langCode = $_SESSION['lang'];
		}else{
			echo 'lang: ' . $settings['lang'];
			$langCode = $settings['lang'];
		}
		
		$system->dbm->db->select("`code`, `translate`", "`$this->table`", "`langCode` = '$langCode'");
		while($row = $system->dbm->db->fetch_array()){
			$lang[$row[code]] = $row[translate];
		}
		
		if(file_exists($settings['cacheDir'] . '/lang.php')){
			if(filemtime($settings['cacheDir'] . '/lang.php') < (time()-2592000)){
				file_put_contents($settings['cacheDir'] . '/lang.php', '<?php $lang=' . var_export($lang, true) . '; ?>');
			}
		}else{
			file_put_contents($settings['cacheDir'] . '/lang.php', '<?php $lang=' . var_export($lang, true) . '; ?>');
		}
	}
	
}
?>