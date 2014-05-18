<?php

class BaseController {
	/*************************
	 * Default base template
	 ************************/
	public $template = 'default';
	
	/*************************
	 * Store nav
	 ************************/
	 // TODO are we even using this yet?
	public $nav;
	
	public function __construct() {
		// Init view
		$this->template = new View();
	}
	
	/*************************
	 * Setup page values to be rendered
	 * 
	 * @param string $view - name of view file without extension. Expected /view directory, can give path to file from there
	 * @param string $title - Meta title to be used in header
	 * @param string $data - Variables passed to view for parsing
	 * @return string
	 ************************/
	public function pageSetup($view, $title, $data = array()) {
		View::assign('title', $title);
		View::render($view, $data);
	}
	
	/*************************
	 * Render the page when no more calls to class
	 * 
	 * @return string
	 ************************/
	public function __deconstruct() {
		// Render the template when the class is destroyed
		$this->template->render();
	}
}