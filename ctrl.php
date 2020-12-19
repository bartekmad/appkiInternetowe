<?php
require_once 'init.php';

getConf()->login_action = 'login';

switch ($action) {
    default :
        control('app\\controllers', 'CalcCtrl',	'generujWidok', ['user','admin']);
    case 'calcCompute' :
        control(null, 'CalcCtrl', 'wykonaj', ['user','admin']);
    case 'wprowadzDane' :
        control(null, 'CalcCtrl', 'generujWidok', ['user','admin']);
    case 'wyswietlDane' :
        control('app\\controllers', 'WyswietlanieCtrl',	'wykonaj', ['user','admin']);
    case 'login' :
	control('app\\controllers', 'LoginCtrl', 'doLogin');
    case 'logout' : 
	control(null, 'LoginCtrl', 'doLogout', ['user','admin']);
}
