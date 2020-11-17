{extends file="../templates/main.html"}

{block name=content}

<div style="width:90%; margin: 2em auto;">
    
    <a href="../app/calc.php" class="pure-button">Przejdź do wprowadzania danych</a>
    <a href="<?php print(_APP_ROOT); ?>/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
    <!--<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>-->
</div>
    
{/block}