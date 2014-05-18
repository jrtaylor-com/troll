<?php

class View {
	/*************************
	 * Default base template
	 ************************/
	private $layout = 'default';
	
	/*************************
	 * Assigned vars
	 ************************/
	protected static $vars;
	
	/*************************
	 * View file
	 ************************/
	private $template;
	
	/*************************
	 * View content
	 ************************/
	private $content;
	
	public function __construct() {
		try {
			$file = APPPATH . 'app/views/templates/' . $this->layout . '.php';

			if (file_exists($file)) {
				$this->template = $file;
			} else {
				throw new Exception('Template ' . $layout . ' not found!');
			}
		}
		catch (Exception $e) {
			echo $e->errorMessage();
		}
	}
	
	/*************************
	 * Add key value pair to class var
	 * 
	 * @param string $key
	 * @param string $value
	 * @return void
	 ************************/
	public static function assign($key, & $value) {
		self::$vars[$key] = & $value;
	}
	
	/*************************
	 * Get view's parsed content and load into class $content var to be passed to base template
	 * 
	 * @param string $view - Name of view file without extension
	 * @param array $data
	 * @return void/string
	 ************************/
	public static function render($view, $data = NULL) {
		try {
			// Extract vars
			if (!empty($data) and is_array($data)) {
				extract($data);
			}
			// View exists
			$file   = APPPATH . 'app/views/' . $view . '.php';
			$output = '';
			if (file_exists($file)) {
				ob_start();
				include($file);
				$output = ob_get_contents();
				ob_end_clean();
			} else {
				throw new Exception('Template ' . $layout . ' not found!');
			}
			
			View::assign('content', $output);
		} catch (Exception $e) {
			return $e->errorMessage();
		}
	}
	
	/*************************
	 * When no more calls to class exists render the template with content
	 * 
	 * @return string
	 ************************/
	public function __destruct() {
		if (is_array(View::$vars)) {
			extract(View::$vars);
		}
		include($this->template);
	}
}