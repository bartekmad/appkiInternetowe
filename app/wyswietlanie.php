<?php
require_once dirname(__FILE__).'/../config.php';
require_once $conf->root_path.'/class/WyswietlanieCtrl.class.php';

$ctrl = new WyswietlanieCtrl();
$ctrl->wykonaj();