<?php

$config =  array(
	'methods' => array(
		// Players
		'getPlayerClass' => array(
			'class_and_method'    => 'Player/GetPlayerClasses0',
			'required_parameters' => array('MundaneId')
		),
		'getPlayerAttendance' => array(
			'class_and_method'    => 'Player/AttendanceForPlayer0',
			'required_parameters' => array('MundaneId')
		),
		'getPlayerAwards' => array(
			'class_and_method'    => 'Player/AwardsForPlayer0',
			'required_parameters' => array('MundaneId', 'AwardsId')
		),
		'getPlayerInfo' => array(
			'class_and_method'    => 'Player/GetPlayer0',
			'required_parameters' => array('MundaneId', 'Token')
		),
		'getPlayerNotes' => array(
			'class_and_method'    => 'Player/GetNotes0',
			'required_parameters' => array('MundaneId')
		),
		
		// Parks
		'getParkOfficers' => array(
			'class_and_method'    => 'Park/GetOfficers0',
			'required_parameters' => array('ParkId')
		),
		'getParkShortInfo' => array(
			'class_and_method'    => 'Park/GetParkShortInfo0',
			'required_parameters' => array('ParkId')
		),
		'getParkDetails' => array(
			'class_and_method'    => 'Park/GetParkDetails0',
			'required_parameters' => array('ParkId')
		),
		'getParkConfiguration' => array(
			'class_and_method'    => 'Park/GetParkConfiguration0',
			'required_parameters' => array('ParkId')
		),
		'getParkDayAndLocation' => array(
			'class_and_method'    => 'Park/GetParkDays0',
			'required_parameters' => array('ParkId')
		),
		'getParkAuthorizations' => array(
			'class_and_method'    => 'Park/GetParkAuthorizations0',
			'required_parameters' => array('ParkId', 'KingdomId')
		),
		'getParkRoster' => array(
			'class_and_method'    => 'Report/GetPlayerRoster0',
			'required_parameters' => array('Id', 'Type', 'IncludeRetiredUnitMembers', 'Active', 'InActive', 'Waivered', 'UnWaivered', 'Banned', 'DuesPaid', 'Token')
		),
		
		// Kingdom
		'getKingdomsList' => array(
			'class_and_method'    => 'Kingdom/GetKingdoms0',
			'required_parameters' => array()
		),
		'getKingdomShortInfo' => array(
			'class_and_method'    => 'Kingdom/GetKingdomShortInfo0',
			'required_parameters' => array('KingdomId')
		),
		'getKingdomLongInfo' => array(
			'class_and_method'    => 'Kingdom/GetKingdomDetails0',
			'required_parameters' => array('KingdomId')
		),
		'getKingdomAwards' => array(
			'class_and_method'    => 'Kingdom/GetAwardList0',
			'required_parameters' => array('KingdomId', 'IsLadder', 'IsTitle')
		),
		'getParkTitles' => array(
			'class_and_method'    => 'Kingdom/GetKingdomParkTitles0',
			'required_parameters' => array('KingdomId')
		),
		'getKingdomConfiguration' => array(
			'class_and_method'    => 'Kingdom/GetKingdomAuthorizations0',
			'required_parameters' => array('KingdomId')
		),
		'getKingdomPrincipalities' => array(
			'class_and_method'    => 'Kingdom/GetPrincipalities0',
			'required_parameters' => array('KingdomId')
		),
		'getParkInfo' => array(
			'class_and_method'    => 'Kingdom/GetParks0',
			'required_parameters' => array('KingdomId')
		),
		'getKingdomOfficers' => array(
			'class_and_method'    => 'Kingdom/GetOfficers0',
			'required_parameters' => array('KingdomId')
		),
		'getParkLocations' => array(
			'class_and_method'    => 'Map/GetParkLocations0',
			'required_parameters' => array('KingdomId')
		)
	)
);