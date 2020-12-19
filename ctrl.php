<?php
require_once 'init.php';

getConf()->login_action = 'login';

getRouter()->setDefaultRoute('wprowadzanie');
getRouter()->setLoginRoute('login');
getRouter()->addRoute('wprowadzanie', 'CalcCtrl', ['user','admin']);
getRouter()->addRoute('wykonaj', 'CalcCtrl', ['user','admin']);
getRouter()->addRoute('wyswietl', 'WyswietlanieCtrl', ['user','admin']);
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl', ['user','admin']);
getRouter()->go();