<?php
require_once dirname(__FILE__).'/../config.php';
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';

$smarty = new Smarty();

$smarty->assign('conf',$conf);
$smarty->assign('page_title','Kalkulator spalania - wyświetlanie danych');

$smarty->display($conf->root_path.'/templates/wybor.tpl');
?>