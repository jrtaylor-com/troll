<?php

class ParkController extends BaseController {
	public function index() {
		$kingdoms = Request::get('getKingdomsList');
		
		include(APPPATH . 'app\\views\\kingdom_list.php');
	}
	
	public function info($params) {
		$info = Request::get('getParkDetails', array('ParkId' => $params[0]));
		
		$required_roster_vars = array(
			'Id'                        => $params[0],
			'Type'                      => 'Park',
			'IncludeRetiredUnitMembers' => '',
			'Active'                    => '',
			'InActive'                  => '',
			'Waivered'                  => '',
			'UnWaivered'                => '',
			'Banned'                    => '',
			'DuesPaid'                  => '',
			'Token'                     => ''
		);
		$roster = Request::get('getParkRoster', $required_roster_vars);
		
		$this->pageSetup('park_info', 'Park Information', array(
			'roster'   => $roster,
			'base_url' => Config::get('site.base_url')
		));
	}
}
