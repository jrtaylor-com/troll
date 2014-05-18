<?php

class Config {
	/*************************
	 * Retrieve the value of config based on input
	 * 
	 * @param string $key - dot seperator for array traversal
	 * @return array/string
	 ************************/
	public static function get($key) {
		// Convert a possible dot syntax string into array
		$parts  = explode('.', $key);
		
		// First array value should be our config file name, retrieve it
		$config = self::parseFile($parts[0]);
		
		// If we aren't traversing return the entire config
		if (count((array)$parts) == 1) {
			return $config;
		} else {
			// Shift off the file name
			$shift = array_shift($parts);
			
			// Return value after traversing array
			return self::getValue($parts, $config);
		}
	}
	
	/*************************
	 * Retrieve parsed config file contents
	 * 
	 * @param string $file - name of config file without extension
	 * @return array
	 ************************/
	public static function parseFile($file) {
		// Parse our config file
		ob_start();
		include BASEPATH . '/_framework/config/' . $file . '.php';
		ob_end_clean();
		
		// Return $config from file
		return $config;
	}
	
	/*************************
	 * Traverse config array
	 * 
	 * @param string $index - name of config file without extension
	 * @param string $value - name of config file without extension
	 * @return array/string
	 ************************/
	public static function getValue($index, $value) {
		// If there is more to traverse then update current_index
		if(is_array($index) and count($index)) {
			$current_index = array_shift($index);
		}
		
		// Determine if we are still traversing or if we are returning the final value
		if(is_array($index) and count($index) and is_array($value[$current_index]) and count($value[$current_index])) {
			return self::getValue($index, $value[$current_index]);
		} elseif (count($index) == 1 and !is_array($value[$current_index])) {
			// Allow an array value to be returned
			return self::getValue($index, $value[$current_index]);
		} else {
			// Final value returned to caller
			return (!empty($value[$current_index])) ? $value[$current_index] : NULL;
		}
	}
}