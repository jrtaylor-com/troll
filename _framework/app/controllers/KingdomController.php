<?php

class KingdomController extends BaseController {
	/*************************
	 * Display list of kingdoms
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
	
	/*************************
	 * Display kingdom info
	 * 
	 * @params $array $params
	 * @return string
	 ************************/
	public function info($params) {
		// Get park info
		$info = Request::get('getParkInfo', array('KingdomId' => $params[0]));
		
		// Get kingdom display name for Title
		$info->kingdom_name = Util::getKingdomNameById($params[0]);
		
		// Page setup
		$this->pageSetup('kingdom_info', $info->Parks{0}->Name . ' - ' . $info->Parks{0}->Title, array(
			'info'     => $info,
			'base_url' => Config::get('site.base_url')
		));
	}
}
