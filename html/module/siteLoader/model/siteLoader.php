<?php
class m_siteLoader {
	private $curl;
	private $enableProxy;
	private $proxy;
	private $protocol;
	private $timeout;
	private $agent;
	function __construct() {
	
		$this->timeout = 300;
	}
	private function proxy() {
		$this->proxy = array ();
	}
	private function protocol($protocol = null) {
		$this->protocol = ! empty ( $protocol ) ? $protocol : 'HTTP';
	}
	private function refer() {
		$refer = array (
				'http://yjc.com',
				'http://fararu.com',
				'http://mobyte.ir',
				'http://irannovin.net',
				'http://landaelectronic.com',
				'http://akasi.net',
				'http://majidonline.com' 
		);
		
		return $refer [array_rand ( $refer )];
	}
	public function m_load($url) {
		global $system, $settings;
		
		set_time_limit ( 0 );
		$curl = curl_init ();
		curl_setopt ( $curl, CURLOPT_URL, $url );
		if ($this->enableProxy)
			curl_setopt ( $curl, CURLOPT_PROXY, $this->proxy );
		curl_setopt ( $curl, CURLOPT_PROXYTYPE, $this->protocol );
		curl_setopt ( $curl, CURLOPT_USERAGENT, $this->agent );
		curl_setopt ( $curl, CURLOPT_REFERER, $this->refer() );
		curl_setopt ( $curl, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt ( $curl, CURLOPT_MAXREDIRS, 2 );
		curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $this->timeout );
		
		echo curl_exec ( $curl );
		curl_close ( $curl );
		
		return $out;
	}
}
?>