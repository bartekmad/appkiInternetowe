{extends file="../templates/main.html"}

{block name=content}

<div style="width:90%; margin: 2em auto;">
    <a href="{$conf->app_url}/app/calc.php" class="pure-button">Przejdź do wprowadzania danych</a>
    <a href="{$conf->app_url}/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
</div>
    
{/block}