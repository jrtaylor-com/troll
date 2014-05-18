<?php defined('APPPATH') or die('No direct script access.');

class ParkController extends BaseController {
	/*************************
	 * Display park info
	 * 
	 * @params $array $params
	 * @return string
	 ************************/
	public function info($params) {
		// Get park info
		$info = Request::get('getParkDetails', array('ParkId' => $params[0]));
		
		// Required vars for roster request
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
		
		// Get park roster
		$roster = Request::get('getParkRoster', $required_roster_vars);
		
		// Page setup
		$this->pageSetup('park_info', 'Park Information', array(
			'roster'   => $roster,
			'base_url' => Config::get('site.base_url')
		));
	}
}
