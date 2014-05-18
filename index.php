<?php 
// Check PHP version
version_compare(PHP_VERSION, '5.2', '<') and exit('TROLL requires PHP 5.2 or newer.');

// Error reporting
error_reporting(E_ALL & ~E_NOTICE);

// Define our base variables
// TODO update paths throughout
// $application = '_framework/app';
// $system      = '_framework/sys';

// TODO replace all window \\ with something that is cross platform
define('APPPATH', dirname(__FILE__) . '/_framework/');
define('BASEPATH', dirname(__FILE__));
define('CACHEPATH', dirname(__FILE__) . '/cache/');

// define install directory name to be stripped from route processing
define('INSTALLEDIN', 'trolldev');

include('./_framework/sys/core/Config.php');
include('./_framework/sys/core/Cache.php');
include('./_framework/sys/core/Route.php');
include('./_framework/sys/core/Request.php');
include('./_framework/sys/core/View.php');
include('./_framework/sys/core/Util.php');
//include('testing.php');

// TODO setup a method in Route that will convert hyphened names to camelcase
Route::run();

// Initialize.
//require SYSPATH.'bootstrap.php';

// TODO move this stuff below into bootstrap
if (!empty(Route::$controller) and file_exists(APPPATH . 'app/controllers/' . ucfirst(Route::$controller) . 'Controller.php')) {
	// Load base controller
	include(APPPATH . 'app/controllers/BaseController.php');
	
	include(APPPATH . 'app/controllers/' . ucfirst(Route::$controller) . 'Controller.php');
	// Check if class exists
	if (class_exists(ucfirst(Route::$controller) . 'Controller')) {
		$class = ucfirst(Route::$controller) . 'Controller';
		$controller = new $class();
		if (is_callable(array($controller, Route::$method))) {
			$method = Route::$method;
			$controller->$method(Route::$params);
		} else {
			echo 'Method does not exist';
		}
	} else {
		'Controller is not defined.';
	}
} else {
	echo 'Controller file missing.';
}