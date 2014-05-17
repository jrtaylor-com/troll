<?php

class Request {
	public function get($class, $params = array()) {
		// Config settings
		include(APPPATH . 'config/config.php');
		
		// Make sure we are using a valid method
		if (empty($config['methods'][$class]['class_and_method'])) {
			return FALSE;
		}
		
		// Make sure we have the required params
		foreach ((array)$config['methods'][$class]['required_parameters'] as $pk => $pv) {
			if (!array_key_exists($pv, $params)) {
				return $pv;
			}
		}
		
		// Build request params
		$params_string = '';
		if (count($params)) {
			foreach ($params as $k => $v) {
				$params_string .= '&' . $k . '=' . $v;
			}
		}
		
		// Check cache
		if ($cached = Cache::get($config['methods'][$class]['class_and_method'] . $params_string)) {
			return $cached;
		}
		
		//  Initiate curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'http://amtgard.com/ork/orkservice/Json/?call=' . $config['methods'][$class]['class_and_method'] . $params_string);
		
		// Execute
		$result = curl_exec($ch);
		if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200) {
			// Cache results
			Cache::put($config['methods'][$class]['class_and_method'] . $params_string, $result);
			
			// Return
			return json_decode($result, FALSE);
		}
	}
}