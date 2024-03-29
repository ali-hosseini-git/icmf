<?php

class seo extends system{

	public $table = "seo";
	public $dom;
	public $xpath;
	public $url;
	public $content;
	public $title;
	public $description;
	public $robots;
	public $keywords;
	public $author;
	public $image;

	function seo($url=null, $content=null){


		$this->table = $this->tablePrefix . $this->table;

		$this->url = trim($url, '/');
		$this->content = $content;

		$content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
		$this->dom = new DOMDocument('1.0', 'UTF-8');
		@$this->dom->loadHTML($content);
		$this->xpath = new DOMXPath($this->dom);
	}

	public function scan($mode=null){
		global $system, $settings, $lang;

		$timeStamp = time();
		
		// Load data from database
		$info = $system->dbm->db->informer("`$this->table`", "`domain` = '$settings[domainName]' AND `url` = '$this->url'");
//		echo "<div style='direction: ltr'>";
		if($info['id']){
			if($info['timeStamp'] < $timeStamp - 864000){
				$system->dbm->db->update("`$this->table`", "`timeStamp` = $timeStamp, `viewCount` = `viewCount`+1", "`url` = '$this->url'");
			}

			$info = $system->dbm->db->informer("`$this->table`", "`url` = '$this->url'");
		}else{
			$this->title = $info['title'] = @trim(preg_replace('/\s+/', ' ', $this->titleMaker('best')));
			$this->description = $info['description'] = @trim(preg_replace('/\s+/', ' ', $this->metaDescriptionMaker('best')));
			$this->robots = $info['robots'] = @trim(preg_replace('/\s+/', ' ', $this->robots()));
			$this->keywords = $keywords = @trim(preg_replace('/\s+/', ' ', $this->metaKeywordMaker('silent')));
			$this->author = $info['author'] = @trim(preg_replace('/\s+/', ' ', $this->author()));
			$this->image = $info['image'] = @trim(preg_replace('/\s+/', ' ', $this->image()));

			$permission = $system->dbm->db->informer("`access`", "`op` = '$_GET[op]' AND `mode` = '$_GET[mode]'");

			if($this->url && $permission['mur'] == 1 && $permission['mux'] == 1){
				if($mode == 'add' && $this->robots != 'NOINDEX, FOLLOW'){
					$system->dbm->db->insert("`$this->table`", "`active`, `timeStamp`, `owner`, `group`, `or`, `ow`, `ox`, `gr`, `gx`, `tr`, `tx`, `ur`, `ux`, `domain`, `url`, `referer`, `viewCount`, `title`, `description`, `robots`, `image`, `author`, `word1`, `word2`, `word3`, `word4`, `word5`, `word6`, `word7`, `word8`, `word9`, `word10`", "1, $timeStamp, $permission[owner], $permission[group], $permission[mor], $permission[mow], $permission[mox], $permission[mgr], $permission[mgx], $permission[mtr], $permission[mtx], $permission[mur], $permission[mux], '$settings[domain]', '$this->url', '$_SERVER[HTTP_REFERER]', 1, '$this->title', '$this->description', '$this->robots', '$this->image', '$this->author', '$keywords[0]', '$keywords[1]', '$keywords[2]', '$keywords[3]', '$keywords[4]', '$keywords[5]', '$keywords[6]', '$keywords[7]', '$keywords[8]', '$keywords[9]'");
				}
			}
		}

//		echo '<br>';
//		echo 'id: ' . $info['id'] . '<br>';
//		echo 'domain: ' . $info['domain'] . '<br>';
//		echo 'url: ' . $this->url . $info['url'] . '<br>';
//		echo 'title: ' . $info['title'] . '<br>';
//		echo 'description: ' . $info['description'] . '<br>';
//		echo 'robots: ' . $info['robots'] . '<br>';
//		echo 'image: ' . $info['image'] . '<br>';
//		echo 'author: ' . $info['author'] . '<br>';
//		echo "</div>";
		return $info;
	}

	public function body(){

		$body = $this->xpath->evaluate('//body'); //get body tag
		$body = $body->item(0);
		return $body->nodeValue;
	}

	public function text(){
		return preg_replace('/\s+/', ' ', strip_tags($this->body()));
	}

	public function meta($name){

		$tags = $this->xpath->evaluate('//meta'); //get meta tag
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a meta tag
			if($tag->getAttribute('name') == $name)
			$values = $tag->getAttribute('content');
		}
		return $values;
	}

	public function metaKeywordMaker($mode){
		global $settings;

		if(empty($this->url)){
			return $settings[keyWords];
		}else{
			//			return $this->p($type);
			$arrB = $this->strong();
			if(count($arrB) < 10){
				$ps = $this->p('all');
				if(is_array($ps)){
					foreach ($ps as $p){
						$words = preg_split("/[\s:,.?!]+/", strip_tags($p));
						$words = array_count_values($words);
						foreach ($words as $word=>$count){
							if(strlen($word) > 7){
								$word = preg_replace('/\s\s+/', '',$word);
								$word = trim($word);
								$word = str_replace(array('،', '؟'), '', $word);
								$arrW[$word] = $count;
							}
						}
					}

					//					print_r($arrW);
					@arsort($arrW);
					$arrW = @array_keys($arrW);
				}
			}

			if(count($arrB) > 0 && count($arrW) > 0){
				//			print "1<br>";
				$out = array_merge($arrB, $arrW);
			}elseif(count($arrB) == 0 && count($arrW) > 0){
				//			print "2<br>";
				$out = $arrW;
			}elseif(count($arrB) > 0 && count($arrW) == 0){
				//			print "3<br>";
				$out = $arrB;
			}

			if($mode == 'silent'){
				return @array_slice($out, 0, 10);
			}else{
				//			print implode(', ', array_slice($out, 0, 10));
				return @implode(', ', array_slice($out, 0, 10));
			}
		}

	}

	public function metaDescriptionMaker($type='best'){
		global $settings, $lang;

		if(empty($this->url)){
			return $settings[description];
		}else{
			if(!empty($_GET['p'])){
				return $lang['page'] . ' ' . $_GET['p'] . ' ' . $lang['from'] . ' ' . $lang[$_GET['op']];
			}else{
				return $this->p($type);
			}
		}
	}

	public function title(){

		$title = $this->xpath->evaluate('//title'); //get title tag
		$title = $title->item(0);
		return $title->nodeValue;
	}

	public function titleMaker($type='best'){
		global $settings, $lang;

		if(empty($this->url)){
			return $settings['siteName'] . ' - ' . $settings['websiteTitle'];
		}else{
			if(!empty($_GET['p'])){
				return $settings['siteName'] . ' - ' . $lang['page'] . ' ' . $_GET['p'] . ' ' . $lang[$_GET['op']];
			}

			$tags = $this->xpath->evaluate('//h1');
			for($i = 0; $i < $tags->length; $i++){
				$tag = $tags->item($i);
				if($tag->getAttribute('class') == 'title'){
					return $settings['siteName'] . ' - ' . $tag->nodeValue;
				}
			}

			if($this->h1($type)){
				return $settings['siteName'] . ' - ' . $this->h1($type);
			}elseif($this->h2($type)){
				return $settings['siteName'] . ' - ' . $this->h2($type);
			}elseif($this->h3($type)){
				return $settings['siteName'] . ' - ' . $this->h3($type);
			}elseif($this->h4($type)){
				return $settings['siteName'] . ' - ' . $this->h4($type);
			}elseif($this->h5($type)){
				return $settings['siteName'] . ' - ' . $this->h5($type);
			}elseif($this->h6($type)){
				return $settings['siteName'] . ' - ' . $this->h6($type);
			}else{
				return $settings['siteName'] . ' - ' . $settings['websiteTitle'];
			}
		}
	}

	private function similar($object, $type='best'){
		switch ($type){
			case "first":
				return $object[0];
				break;
			case "second":
				return $object[1];
				break;
			case "third":
				return $object[2];
				break;
			case "last":
				return end($object);
				break;
			case "firstNotNull":
				return current(array_filter($object));
				break;
			case "all":
				return $object;
				break;
			case "random":
				$rand = array_rand($object);
				return $object[$rand];
				break;
			default:
			case "best":
				if(is_array($object)){
					foreach($object as $obj){
						$words = explode(" ", $obj);
						foreach ($words as $word){
							$word = trim($word, ".");
							$word = trim($word, ",");
							if(strlen($word) > 7){
								// print "$obj => $word => " . substr_count(strip_tags($this->body()), $word) . "<br>";
								$best[$obj] = $best[$obj] + substr_count(strip_tags($this->body()), $word);
							}
						}
						// print "----------------<br>";
					}
				}
				$out = @array_keys($best, max($best));
				return $out[0];
				break;
		}
	}

	public function div(){

		$tags = $this->xpath->evaluate('//div');//get all div tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i);//select an div tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, 'all');
	}

	public function a($type='best'){

		$tags = $this->xpath->evaluate('//a'); //get all a tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select an a tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, 'all');
	}

	public function h1($type='best'){

		$tags = $this->xpath->evaluate('//h1'); //get all h1 tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a h1 tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function h2($type='best'){

		$tags = $this->xpath->evaluate('//h2'); //get all h2 tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a h2 tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function h3($type='best'){

		$tags = $this->xpath->evaluate('//h3'); //get all h3 tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a h3 tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function h4($type='best'){

		$tags = $this->xpath->evaluate('//h4'); //get all h4 tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a h4 tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function h5($type='best'){

		$tags = $this->xpath->evaluate('//h5'); //get all h5 tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a h5 tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function h6($type='best'){

		$tags = $this->xpath->evaluate('//h6'); //get all h6 tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a h6 tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function p($type='first'){

		$tags = $this->xpath->evaluate('//p'); //get all p tags		
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a p tag
			//			similar_text($tag->nodeValue, $this->title, $percent);
			//			if($percent > 10)
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
			return $this->similar($values, $type);
	}

	public function strong($type='all'){

		$tags = $this->xpath->evaluate('//strong'); //get all strong tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a strong tag
			$values[] = preg_replace('/\s\s+/', '', $tag->nodeValue);
		}

		$tags = $this->xpath->evaluate('//b'); //get all b tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a b tag
			$values[] = preg_replace('/\s\s+/', '', $tag->nodeValue);
		}

		if(count($values) > 0){
			$values = array_unique($values);
			return $this->similar($values, 'all');
		}
	}

	public function li($type='best'){

		$tags = $this->xpath->evaluate('//li'); //get all li tags
		for($i = 0; $i < $tags->length; $i++){
			$tag = $tags->item($i); //select a li tag
			$values[] = $tag->nodeValue;
		}
		if(count($values) > 0)
		return $this->similar($values, 'all');
	}

	public function images($type='first'){
		global $settings;

		$tags = $this->xpath->evaluate('//img'); //get img tag
		if ($tags->length) {
			for($i = 0; $i < $tags->length; $i++){
				$tag = $tags->item($i); //select an img tag
				$values[] = $tag->getAttribute('src');
			}
		}else{
			$values[] = 'http://' . $settings['domainName'] . '/theme/' . $settings['theme'] . '/img/logo.png';
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function image($type='first'){
		global $settings;

		$tag = $this->xpath->query('//img[@class="mainImage"]');
		if($tag->length){
			$values[] = $tag->item(0)->getAttribute('src');
		}else{
			$values[] = $this->images('firstNotNull');
		}
		if(count($values) > 0)
		return $this->similar($values, $type);
	}

	public function author(){
		global $settings;

		if($tag = $this->xpath->query('//a[@class="author"]')){
			if ($tag->length) {
				return $tag->item(0)->getAttribute('href');
			}else {
				return $settings['googleAuthor'];
			}
		}
	}

	public function robots(){
		global $settings;

		if($tag = $this->xpath->query('//div[@id="paginatePage"]')){
			if ($tag->length) {
				return 'NOINDEX, FOLLOW';
			}else{
				return $settings['robots'];
			}
		}
	}
	
	public function findTag ($filter){
		
		if($tag = $this->xpath->query($filter)){
			if ($tag->length) {
				return $tag;
			}
		}
	}

}

?>