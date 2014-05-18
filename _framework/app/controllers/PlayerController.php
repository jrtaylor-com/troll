<?php

class PlayerController extends BaseController {
	/*************************
	 * Display player info
	 * 
	 * @params $array $params
	 * @return string
	 ************************/
	public function info($params) {
		// Get everything for full player detail page
		$info       = Request::get('getPlayerInfo', array('MundaneId' => $params[0], 'Token' => ''));
		$park       = Request::get('getParkShortInfo', array('ParkId' => $info->Player->ParkId));
		$attendance = Request::get('getPlayerAttendance', array('MundaneId' => $params[0]));
		$class      = Request::get('getPlayerClass', array('MundaneId' => $params[0]));
		
		// Page setup
		$this->pageSetup('player_info', 'Player Details', array(
			'info'       => $info,
			'park'       => $park,
			'class'      => $class,
			'attendance' => $attendance,
			'base_url'   => Config::get('site.base_url')
		));
	}
	
	/*************************
	 * Display player class info
	 * 
	 * @params $array $params
	 * @return string
	 ************************/
	public function classes($params) {
		// Get class info
		$class = Request::get('getPlayerClass', array('MundaneId' => $params[0]));
		
		// Page setup
		$this->pageSetup('player_classes', 'Played Classes', array(
			'class' => $class
		));
	}
	
	/*************************
	 * Display player attendance info
	 * 
	 * @params $array $params
	 * @return string
	 ************************/
	public function attendance($params) {
		// Get attendance info
		$attendance = Request::get('getPlayerAttendance', array('MundaneId' => $params[0]));
		
		// Page setup
		$this->pageSetup('player_attendance', 'Player Attendance', array(
			'attendance' => $attendance
		));
	}
	
	/*************************
	 * Display player awards info
	 * 
	 * @params $array $params
	 * @return string
	 ************************/
	public function awards($params) {
		// Get awards info
		$awards = Request::get('getPlayerAwards', array('MundaneId' => $params[0], 'AwardsId' => ((!empty($params[1])) ? $params[1] : '')));
		
		// Page setup
		$this->pageSetup('player_awards', 'Player Awards', array(
			'awards' => $awards
		));
	}
	
	/*************************
	 * Display player notes info
	 * 
	 * @params $array $params
	 * @return string
	 ************************/
	public function notes($params) {
		// Get notes 
		$notes = Request::get('getPlayerNotes', array('MundaneId' => $params[0]));
		
		// Page setup
		$this->pageSetup('player_notes', 'Player Notes', array(
			'notes' => $notes
		));
	}
}
