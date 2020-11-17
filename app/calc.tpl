{extends file="../templates/main.html"}

{block name=content}

<div style="width:90%; margin: 2em auto;">
    <a href="../app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
    <!--<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>-->
</div>

<form class="pure-form pure-form-stacked" action="{$app_url}/app/calc.php" method="post">
    <fieldset>
        <label for="id_kwotaTankowania">Kwota tankowania: </label>
        <input id="id_kwotaTankowania" type="text" name="kwotaTankowania" value="{$form['kwotaTankowania']}" >
        <label for="id_cenaZaLitr">Cena za litr paliwa: </label>
        <input id="id_cenaZaLitr" type="text" name="cenaZaLitr" value="{$form['cenaZaLitr']}">
        <label for="id_stanPoczatkowy">Stan licznika początkowy: </label>
        <input id="id_stanPoczatkowy" type="number" name="stanPoczatkowy" pattern="[0-9]" value="{$form['stanPoczatkowy']}">
        <label for="id_dataTankowania">Data tankowania: </label>
        <input id="id_dataTankowania" type="date" name="dataTankowania" value="{$form['dataTankowania']}">
    </fieldset>
    <input type="submit" value="Wpisz dane do bazy" class="pure-button pure-button-primary" />
</form>

<div class="messages">
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4>Wynik</h4>
	<p class="res">
	{$result}
	</p>
{/if}

</div>

{/block}