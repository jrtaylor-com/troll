<?php 

class Cache {
	public static $cache_time = 14400;
	public static $cache_ext  = '.txt';
	public static $cache_path = CACHEPATH;
	
	/*************************
	 * Getcache file if exists, delete it if it has expired
	 * 
	 * @param string $key
	 * return array
	 ************************/
	public function get($key) {
		$file = Cache::$cache_path . Cache::cleanKey($key) . Cache::$cache_ext;
		if (file_exists($file)) {
			// check if file is expired
			if ((time() - Cache::$cache_time) < filemtime($file)) {
				// Grab the data
				$return = file_get_contents($file);
				
				// Return the decoded contents
				return json_decode($return);
			} else {
				// Delete the old file
				unlink($file);
			}
		}
		
		// Return
		return FALSE;
	}
	
	/*************************
	 * Put contents into cache file
	 * 
	 * @param string $key
	 * @param string $value - should be json
	 * return boolean
	 ************************/
	public function put($key, $value) {
		$file = Cache::$cache_path . Cache::cleanKey($key) . Cache::$cache_ext;
		
		// Delete file if it exists
		if (file_exists($file)) {
			unlink($file);
		}
		
		// Write the new file
		$resource = fopen($file, 'w') or die('Could not write cache file.');
		fwrite($resource, $value);
		fclose($resource);
		
		// Return
		return TRUE;
	}
	
	/*************************
	 * Remove slashes and ampersands from key
	 * 
	 * @param string $key
	 * return boolean
	 ************************/
	public function cleanKey($key) {
		return str_replace(array('\\', '/', '&', '='), '-', $key);
	}
}