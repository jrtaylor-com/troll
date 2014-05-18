<?php

class Util {
	/*************************
	 * Get the display name of a kingdom prefering cached value
	 * 
	 * @param int $id
	 * @return string
	 ************************/
	public function getKingdomNameById($id) {
		// Check cache
		if ($cached = Cache::get('KingdomNameList')) {
			$kingdoms = $cached;
		} else {
			$kingdoms = Request::get('getKingdomsList');
		}
		
		// Process kingdom data
		$list = array();
		foreach ($kingdoms->Kingdoms as $k) {
			$list[$k->KingdomId] = $k->KingdomName;
		}
		
		// Cache results
		if (!$cached) {
			Cache::put('KingdomNameList', json_encode($kingdoms));
		}
		
		// Return
		return (!empty($list[$id])) ? $list[$id] : '';
	}
	
	/*************************
	 * Return ord obfuscated string
	 * 
	 * @param string $string
	 * @return string
	 ************************/
	public function obfuscate($string) {
		// Init
		$return = '';
		
		// Convert characters
		for ($i=0; $i<strlen($string); $i++){
			 $return .= "&#" . ord($string[$i]) . ";";
		}
		
		// Return
		return $return;
	}
}