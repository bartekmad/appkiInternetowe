<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/smarty.class.php';
//include _ROOT_PATH.'/app/security/check.php';

function pobierzParametry(&$form){
    $form['kwotaTankowania'] = isset($_REQUEST['kwotaTankowania']) ? $_REQUEST['kwotaTankowania'] : null;
    $form['cenaZaLitr'] = isset($_REQUEST['cenaZaLitr']) ? $_REQUEST['cenaZaLitr'] : null;
    $form['stanPoczatkowy'] = isset($_REQUEST['stanPoczatkowy']) ? $_REQUEST['stanPoczatkowy'] : null;
    $form['dataTankowania'] = isset($_REQUEST['dataTankowania']) ? $_REQUEST['dataTankowania'] : null;
}

function czyWpisaneWartosci(&$form)
{
    return (isset($form['kwotaTankowania']) && isset($form['cenaZaLitr']) && isset($form['stanPoczatkowy']) && isset($form['dataTankowania']));
}

function waliduj(&$form,&$messages){
	
        $walidacja = true;
        
        if ($form['kwotaTankowania'] == "")
        {
            $messages [] = 'Nie podano kwoty tankowania!';
            $walidacja = false;
	}
	if ($form['cenaZaLitr'] == "")
        {
            $messages [] = 'Nie podano ceny za litr!';
            $walidacja = false;
	}
        if ($form['stanPoczatkowy'] == "")
        {
            $messages [] = 'Nie podano stanu licznika!';
            $walidacja = false;
	}
	if ($form['dataTankowania'] == "")
        {
            $messages [] = 'Nie podano daty tankowania!';
            $walidacja = false;
	}

	if ($walidacja == false)
        {
            return false;
        }

        $form['kwotaTankowania'] = floatval(str_replace(',', '.', $form['kwotaTankowania']));
	$form['cenaZaLitr'] = floatval(str_replace(',', '.', $form['cenaZaLitr']));
	if (!is_float($form['kwotaTankowania']))
        {
            $messages [] = 'Kwota tankowania powinna być liczbą!';
            $walidacja = false;
	}
	if (!is_float($form['cenaZaLitr']))
        {
            $messages [] = 'Cena za litr powinna być liczbą!';
            $walidacja = false;
	}	
        if (!is_numeric($form['stanPoczatkowy']))
        {
            $messages [] = 'Stan licznika powinna być liczbą!';
            $walidacja = false;
	}

	if ($walidacja == false)
        {
            return false;
        }
	else
        {
            return true;
        }
}

function process(&$form,&$messages,&$result){
	global $role;
	
	$form['kwotaTankowania'] = floatval($form['kwotaTankowania']);
	$form['cenaZaLitr'] = floatval($form['cenaZaLitr']);
        $form['stanPoczatkowy'] = intval($form['stanPoczatkowy']);
        $form['stanPoczatkowy'] = strval($form['stanPoczatkowy']);
	
        $result = $form['kwotaTankowania'] / $form['cenaZaLitr'];
}

function zwalidujIWykonaj(&$form,&$messages,&$result)
{
    if (waliduj($form,$messages))
    {
        process($form,$messages,$result);
    }
}

$kwotaTankowania = null;
$cenaZaLitr = null;
$stanPoczatkowy = null;
$dataTankowania = null;
$result = null;
$messages = array();

pobierzParametry($form);
if (czyWpisaneWartosci($form))
{
    zwalidujIWykonaj($form, $messages, $result);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator spalania - wprowadzanie danych');

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);

$smarty->display(_ROOT_PATH.'/app/calc.tpl');