<?php
require_once 'init.php';

switch ($action) {
    default :
        include 'check.php';
        $ctrl = new app\controllers\CalcCtrl ();
        $ctrl->generujWidok ();
    break;
    case 'login' :
	$ctrl = new app\controllers\LoginCtrl();
	$ctrl->doLogin();
	break;
    case 'calcCompute' :
        include 'check.php';
        $ctrl = new app\controllers\CalcCtrl ();
        $ctrl->wykonaj ();
    break;
    case 'wyswietlDane' :
        include 'check.php';
        $ctrl = new app\controllers\WyswietlanieCtrl ();
        $ctrl->wykonaj ();
    break;
    case 'wprowadzDane' :
        include 'check.php';
        $ctrl = new app\controllers\CalcCtrl ();
        $ctrl->generujWidok ();
    break;
}
