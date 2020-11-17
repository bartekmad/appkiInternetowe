<?php
require_once dirname(__FILE__).'/../config.php';
require_once $conf->root_path.'/class/CalcCtrl.class.php';

$ctrl = new CalcCtrl();
$ctrl->zwalidujIWykonaj();