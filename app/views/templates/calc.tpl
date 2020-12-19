{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
    <a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
    <span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>    
    
<form action="{$conf->action_url}wyswietl" method="post">
    <button type="submit" class="pure-button pure-button-primary">Przejdź do wyświetlania danych</button>
</form>

<form class="pure-form pure-form-stacked" action="{$conf->action_url}calcCompute" method="post">
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

{include file='messages.tpl'}
    
<div class="messages inf">
    {if $result}
        <h4>Wynik</h4>
        <p class="res">
            {$result}
        </p>
    {/if}
</div>

{/block}