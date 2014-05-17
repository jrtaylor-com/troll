<?php

class PlayerController extends BaseController {
	public function index() {
		echo 'In the controller'; 
		// TODO, what to display here?
		include(APPPATH . 'app\\views\\player.php');
	}
	
	public function classes($params) {
		$class = Request::get('getPlayerClass', array('MundaneId' => $params[0]));
		
		$this->pageSetup('player_classes', 'Played Classes', array(
			'class' => $class
		));
	}
	
	public function attendance($params) {
		$attendance = Request::get('getPlayerAttendance', array('MundaneId' => $params[0]));
		
		$this->pageSetup('player_attendance', 'Player Attendance', array(
			'attendance' => $attendance
		));
	}
	
	public function awards($params) {
		$awards = Request::get('getPlayerAwards', array('MundaneId' => $params[0], 'AwardsId' => ((!empty($params[1])) ? $params[1] : '')));
		
		$this->pageSetup('player_awards', 'Player Awards', array(
			'awards' => $awards
		));
	}
	
	public function info($params) {
		$info       = Request::get('getPlayerInfo', array('MundaneId' => $params[0], 'Token' => ''));
		$park       = Request::get('getParkShortInfo', array('ParkId' => $info->Player->ParkId));
		$attendance = Request::get('getPlayerAttendance', array('MundaneId' => $params[0]));
		$class      = Request::get('getPlayerClass', array('MundaneId' => $params[0]));
		
		$this->pageSetup('player_info', 'Player Details', array(
			'info'       => $info,
			'park'       => $park,
			'class'      => $class,
			'attendance' => $attendance,
			'base_url'   => Config::get('site.base_url')
		));
	}
	
	public function notes($params) {
		$notes = Request::get('getPlayerNotes', array('MundaneId' => $params[0]));
		
		$this->pageSetup('player_notes', 'Player Notes', array(
			'notes' => $notes
		));
	}
}
