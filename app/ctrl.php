<?php
require_once dirname (__FILE__).'/../config.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    default :
	include_once $conf->root_path.'/class/CalcCtrl.class.php';
            $ctrl = new CalcCtrl ();
            $ctrl->generujWidok ();
    break;
    case 'calcCompute' :
	include_once $conf->root_path.'/class/CalcCtrl.class.php';
            $ctrl = new CalcCtrl ();
            $ctrl->wykonaj ();
    break;
    case 'wyswietlDane' :
	include_once $conf->root_path.'/class/WyswietlanieCtrl.class.php';
            $ctrl = new WyswietlanieCtrl ();
            $ctrl->wykonaj ();
    break;
    case 'wprowadzDane' :
	include_once $conf->root_path.'/class/CalcCtrl.class.php';
            $ctrl = new CalcCtrl ();
            $ctrl->generujWidok ();
    break;
}
