<?php

class View {
	private $layout = 'default';
	protected static $vars;
	private $template;
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
	
	public static function assign($key, & $value) {
		self::$vars[$key] = & $value;
	}
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
	
	public function __destruct() {
		if (is_array(View::$vars)) {
			extract(View::$vars);
		}
		include($this->template);
	}
}