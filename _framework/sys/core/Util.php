<?php

class Util {
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
	
	public function obfuscate($string) {
		$return = '';
		for ($i=0; $i<strlen($string); $i++){
			 $return .= "&#" . ord($string[$i]) . ";";
		}
		
		// Return
		return $return;
	}
}