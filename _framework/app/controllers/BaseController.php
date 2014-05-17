<?php

class BaseController {
	public $template = 'default';
	public $nav;
	
	public function __construct() {
		
		$this->template = new View();
	}
	
	public function pageSetup($view, $title, $data = array()) {
		View::assign('title', $title);
		View::render($view, $data);
	}
	
	/**
	 * Render the loaded template.
	 */
	public function __deconstruct() {
		// Render the template when the class is destroyed
		$this->template->render();
	}
}