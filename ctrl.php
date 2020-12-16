<?php
require_once 'init.php';

switch ($action) {
    default :
	include_once $conf->root_path.'/app/controllers/CalcCtrl.class.php';
            $ctrl = new CalcCtrl ();
            $ctrl->generujWidok ();
    break;
    case 'calcCompute' :
	include_once $conf->root_path.'/app/controllers/CalcCtrl.class.php';
            $ctrl = new CalcCtrl ();
            $ctrl->wykonaj ();
    break;
    case 'wyswietlDane' :
	include_once $conf->root_path.'/app/controllers/WyswietlanieCtrl.class.php';
            $ctrl = new WyswietlanieCtrl ();
            $ctrl->wykonaj ();
    break;
    case 'wprowadzDane' :
	include_once $conf->root_path.'/app/controllers/CalcCtrl.class.php';
            $ctrl = new CalcCtrl ();
            $ctrl->generujWidok ();
    break;
}
