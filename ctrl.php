<?php
require_once 'init.php';

switch ($action) {
    default :
        $ctrl = new app\controllers\CalcCtrl ();
        $ctrl->generujWidok ();
    break;
    case 'calcCompute' :
        $ctrl = new app\controllers\CalcCtrl ();
        $ctrl->wykonaj ();
    break;
    case 'wyswietlDane' :
        $ctrl = new app\controllers\WyswietlanieCtrl ();
        $ctrl->wykonaj ();
    break;
    case 'wprowadzDane' :
        $ctrl = new app\controllers\CalcCtrl ();
        $ctrl->generujWidok ();
    break;
}
