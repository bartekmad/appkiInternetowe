<?php
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
    <a href="<?php print(_APP_ROOT); ?>/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator</legend>
        <fieldset>
            <label for="id_kwotaTankowania">Kwota tankowania: </label>
            <input id="id_kwotaTankowania" type="text" name="kwotaTankowania" pattern="([0-9]{0,4}((.)[0-9]{0,2}))" value="<?php out($kwotaTankowania) ?>" />
            <label for="id_cenaZaLitr">Cena za litr paliwa: </label>
            <input id="id_cenaZaLitr" type="text" name="cenaZaLitr" pattern="([0-9]{0,1}((.)[0-9]{0,2}))" value="<?php out($cenaZaLitr) ?>" />
            <label for="id_stanPoczatkowy">Stan licznika początkowy: </label>
            <input id="id_stanPoczatkowy" type="number" name="stanPoczatkowy" pattern="[0-9]" value="<?php out($stanPoczatkowy) ?>" />
            <label for="id_dataTankowania">Data tankowania: </label>
            <input id="id_dataTankowania" type="date" name="dataTankowania" value="<?php out($dataTankowania) ?>" />
        </fieldset>	
    <input type="submit" value="Wpisz dane do bazy" class="pure-button pure-button-primary" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages))
{
    if (count ( $messages ) > 0)
    {
        echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
        foreach ( $messages as $key => $msg )
        {
            echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
    }
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</div>

</body>
</html>