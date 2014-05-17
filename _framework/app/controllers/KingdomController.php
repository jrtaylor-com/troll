<?php

class KingdomController extends BaseController {
	public function index() {
		$kingdoms = Request::get('getKingdomsList');
		
		$this->pageSetup('kingdom_list', 'Kingdoms of Amtgard', array(
			'kingdoms' => $kingdoms,
			'base_url' => Config::get('site.base_url')
		));
	}
	
	public function info($params) {
		$info = Request::get('getParkInfo', array('KingdomId' => $params[0]));
		$info->kingdom_name = Util::getKingdomNameById($params[0]);
		
		$this->pageSetup('kingdom_info', $info->Parks{0}->Name . ' - ' . $info->Parks{0}->Title, array(
			'info'     => $info,
			'base_url' => Config::get('site.base_url')
		));
	}
}
