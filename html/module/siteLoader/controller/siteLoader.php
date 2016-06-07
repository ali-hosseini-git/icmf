<?php
class c_siteLoader extends m_siteLoader{

	public $active = 1;
	
	function __construct(){
		
	}
	
	public function c_load($url){
		
		return $this->m_load($url);
	}

}
?>