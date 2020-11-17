<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/smarty.class.php';
//include _ROOT_PATH.'/app/security/check.php';

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator spalania - wprowadzanie danych');

$smarty->display(_ROOT_PATH.'/app/wybor.tpl');
?>