{extends file="../templates/main.html"}

{block name=content}

<div style="width:90%; margin: 2em auto;">
    <a href="{$conf->app_url}/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
</div>

<form class="pure-form pure-form-stacked" action="{$conf->app_url}/app/calc.php" method="post">
    <fieldset>
        <label for="id_kwotaTankowania">Kwota tankowania: </label>
        <input id="id_kwotaTankowania" type="text" name="kwotaTankowania" value="{$form->kwotaTankowania}">
        <label for="id_cenaZaLitr">Cena za litr paliwa: </label>
        <input id="id_cenaZaLitr" type="text" name="cenaZaLitr" value="{$form->cenaZaLitr}">
        <label for="id_stanPoczatkowy">Stan licznika początkowy: </label>
        <input id="id_stanPoczatkowy" type="number" name="stanPoczatkowy" value="{$form->stanPoczatkowy}">
        <label for="id_dataTankowania">Data tankowania: </label>
        <input id="id_dataTankowania" type="date" name="dataTankowania" value="{$form->dataTankowania}">
    </fieldset>
    <button type="submit" class="pure-button pure-button-primary">Wpisz dane do bazy</button>
</form>

<div class="messages">
    {if $messages->isError()}
        <h4>Wystąpiły błędy: </h4>
        <ol class="err">
            {foreach $messages->getErrors() as $err}
                {strip}
                    <li>{$err}</li>
                {/strip}
            {/foreach}
        </ol>
    {/if}

    {if $result}
        <h4>Wynik</h4>
        <p class="res">
            {$result}
        </p>
    {/if}
</div>

{/block}