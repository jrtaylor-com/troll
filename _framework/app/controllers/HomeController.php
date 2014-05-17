<?php

class HomeController extends BaseController {
	public function index() {
		$kingdoms = Request::get('getKingdomsList');
		
		$this->pageSetup('kingdom_list', 'Kingdoms of Amtgard', array(
			'kingdoms' => $kingdoms,
			'base_url' => Config::get('site.base_url')
		));
	}
}
