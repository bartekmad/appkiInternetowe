<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function pobierzParametry(&$kwotaTankowania,&$cenaZaLitr,&$stanPoczatkowy,&$dataTankowania){
	$kwotaTankowania = isset($_REQUEST['kwotaTankowania']) ? $_REQUEST['kwotaTankowania'] : null;
	$cenaZaLitr = isset($_REQUEST['cenaZaLitr']) ? $_REQUEST['cenaZaLitr'] : null;
        $stanPoczatkowy = isset($_REQUEST['stanPoczatkowy']) ? $_REQUEST['stanPoczatkowy'] : null;
	$dataTankowania = isset($_REQUEST['dataTankowania']) ? $_REQUEST['dataTankowania'] : null;
}

function czyWpisaneWartosci(&$kwotaTankowania,&$cenaZaLitr,&$stanPoczatkowy,&$dataTankowania)
{
    return (isset($kwotaTankowania) && isset($cenaZaLitr) && isset($stanPoczatkowy) && isset($dataTankowania));
}

function waliduj(&$kwotaTankowania,&$cenaZaLitr,&$stanPoczatkowy,&$dataTankowania,&$messages){
	
        $walidacja = true;
        
        if ($kwotaTankowania == "")
        {
            $messages [] = 'Nie podano kwoty tankowania!';
            $walidacja = false;
	}
	if ($cenaZaLitr == "")
        {
            $messages [] = 'Nie podano ceny za litr!';
            $walidacja = false;
	}
        if ($stanPoczatkowy == "")
        {
            $messages [] = 'Nie podano stanu licznika!';
            $walidacja = false;
	}
	if ($dataTankowania == "")
        {
            $messages [] = 'Nie podano daty tankowania!';
            $walidacja = false;
	}

	if ($walidacja == false)
        {
            return false;
        }

        $kwotaTankowania = floatval(str_replace(',', '.', $kwotaTankowania));
	$cenaZaLitr = floatval(str_replace(',', '.', $cenaZaLitr));
	if (!is_float($kwotaTankowania))
        {
            $messages [] = 'Kwota tankowania powinna być liczbą!';
            $walidacja = false;
	}
	if (!is_float($cenaZaLitr))
        {
            $messages [] = 'Cena za litr powinna być liczbą!';
            $walidacja = false;
	}	
        if (!is_numeric($stanPoczatkowy))
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

function process(&$kwotaTankowania,&$cenaZaLitr,&$stanPoczatkowy,&$dataTankowania,&$messages,&$result){
	global $role;
	
	$kwotaTankowania = floatval($kwotaTankowania);
	$cenaZaLitr = floatval($cenaZaLitr);
        $stanPoczatkowy = intval($stanPoczatkowy);
        $dataTankowania = strval($dataTankowania);
	
        $result = $kwotaTankowania / $cenaZaLitr;
}

function zwalidujIWykonaj(&$kwotaTankowania,&$cenaZaLitr,&$stanPoczatkowy,$dataTankowania,&$messages,&$result)
{
    if (waliduj($kwotaTankowania,$cenaZaLitr,$stanPoczatkowy,$dataTankowania,$messages))
    {
        process($kwotaTankowania,$cenaZaLitr,$stanPoczatkowy,$dataTankowania,$messages,$result);
    }
}

$kwotaTankowania = null;
$cenaZaLitr = null;
$stanPoczatkowy = null;
$dataTankowania = null;
$result = null;
$messages = array();

pobierzParametry($kwotaTankowania,$cenaZaLitr,$stanPoczatkowy,$dataTankowania);
if (czyWpisaneWartosci($kwotaTankowania, $cenaZaLitr, $stanPoczatkowy, $dataTankowania))
{
    zwalidujIWykonaj($kwotaTankowania, $cenaZaLitr, $stanPoczatkowy, $dataTankowania, $messages, $result);
}

include 'calc_view.php';