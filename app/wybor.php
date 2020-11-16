<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Wybór operacji</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button">Przejdź do wprowadzania danych</a>
        <a href="<?php print(_APP_ROOT); ?>/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

</body>
</html>
