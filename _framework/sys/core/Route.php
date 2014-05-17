<?php 


class Route {
	public static $current_uri;
	
	public static $controller;
	
	public static $method;
	
	public static $params = array();
	
	public static $config;
	
	public function get() {
		// Set the uri
		self::$current_uri = rtrim(ltrim(str_replace(INSTALLEDIN, '', $_SERVER['REQUEST_URI']), "/ \t\n\r"), "/ \t\n\r");
		$route_parts = explode('/', self::$current_uri);
		
		// Set controller
		if (!empty($route_parts[0])) {
			self::$controller = $route_parts[0];
		} else {
			// Default to index if there is none
			self::$controller = 'home';
		}
		
		// Set method
		if (!empty($route_parts[1])) {
			self::$method = $route_parts[1];
		} else {
			// Default to index if there is none
			self::$method = 'index';
		}
		
		// Set params
		if (count((array)$route_parts) > 2) {
			foreach ((array)$route_parts as $k => $v) {
				if ($k > 1) {
					self::$params[] = $v;
				}
			}
		}
	}
	
	public function run() {
		// Load everything
		self::get();
		
		// Set routing config
		self::$config = '';
		return self::$current_uri = rtrim(ltrim(str_replace(INSTALLEDIN, '', $_SERVER['REQUEST_URI']), "/ \t\n\r"), "/ \t\n\r");
	}
}