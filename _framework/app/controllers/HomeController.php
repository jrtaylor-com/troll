<?php

class HomeController extends BaseController {
	/*************************
	 * Default page - Display list of kingdoms
	 * 
	 * @return string
	 ************************/
	public function index() {
		// Get kingdom list
		$kingdoms = Request::get('getKingdomsList');
		
		// Page setup
		$this->pageSetup('kingdom_list', 'Kingdoms of Amtgard', array(
			'kingdoms' => $kingdoms,
			'base_url' => Config::get('site.base_url')
		));
	}
}
