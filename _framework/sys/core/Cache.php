<?php defined('APPPATH') or die('No direct script access.');

class Cache {
	/*************************
	 * Default time to keep cached file before re-requesting data
	 ************************/
	public static $cache_time = 14400;
	
	
	/*************************
	 * Extension used for cache files
	 ************************/
	public static $cache_ext  = '.txt';
	
	/*************************
	 * Path to Cache directory
	 ************************/
	public static $cache_path = CACHEPATH;
	
	/*************************
	 * Getcache file if exists, delete it if it has expired
	 * 
	 * @param string $key - Filename to be used for cache file excluding extension
	 * @return array
	 ************************/
	public static function get($key) {
		$file = Cache::$cache_path . Cache::cleanKey($key) . Cache::$cache_ext;
		if (file_exists($file)) {
			// Check if file is expired
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
	 * @return boolean
	 ************************/
	public static function put($key, $value) {
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
	 * @return boolean
	 ************************/
	public static function cleanKey($key) {
		return str_replace(array(' ', '"', '\'', '&', '/', '\\', '?', '#', '='), '-', $key);
	}
}
