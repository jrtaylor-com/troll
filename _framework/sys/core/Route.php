<?php 


class Route {
	/*************************
	 * URI used to determine routing
	 ************************/
	public static $current_uri;
	
	/*************************
	 * Current controller
	 ************************/
	public static $controller;
	
	/*************************
	 * Method being called
	 ************************/
	public static $method;
	
	/*************************
	 * All URI parameters sent after controller and method
	 ************************/
	public static $params = array();
	
	/*************************
	 * Setup routing values
	 * 
	 * @return void
	 ************************/
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
			// TODO: We didn't really use an index method in every controller so maybe something else?
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
	
	/*************************
	 * Load routing and set current URI
	 * 
	 * @return string
	 ************************/
	public function run() {
		// Load everything
		self::get();
		
		// Return current URI without installed directory in string
		return self::$current_uri = rtrim(ltrim(str_replace(INSTALLEDIN, '', $_SERVER['REQUEST_URI']), "/ \t\n\r"), "/ \t\n\r");
	}
}