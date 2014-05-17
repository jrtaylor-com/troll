<?php

class Config {
	public static function get($key) {
		$parts  = explode('.', $key);
		$config = self::parseFile($parts[0]);
		if (count((array)$parts) == 1) {
			return $config;
		} else {
			$shift = array_shift($parts);
			return self::getValue($parts, $config);
		}
	}
	
	public static function parseFile($file) {
		ob_start();
		include BASEPATH . '/_framework/config/' . $file . '.php';
		ob_end_clean();
		return $config;
	}
	
	public static function getValue($index, $value) {
		if(is_array($index) and count($index)) {
			$current_index = array_shift($index);
		}
		if(is_array($index) and count($index) and is_array($value[$current_index]) and count($value[$current_index])) {
			return self::getValue($index, $value[$current_index]);
		} elseif (count($index) == 1 and !is_array($value[$current_index])) {
			return self::getValue($index, $value[$current_index]);
		} else {
			return (!empty($value[$current_index])) ? $value[$current_index] : NULL;
		}
	}
}