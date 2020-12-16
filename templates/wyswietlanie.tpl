{extends file="../templates/main.html"}

{block name=content}

<form action="{$conf->action_url}wprowadzDane" method="post">
    <button type="submit" class="pure-button pure-button-primary">Przejdź do wprowadzania danych</button>
</form>

<table class="tg">
    <thead>
        <tr>
            <th class="tg-0lax">lp.</th>
            <th class="tg-0lax">data</th>
            <th class="tg-0lax">kwota</th>
            <th class="tg-0lax">cena za litr</th>
            <th class="tg-0lax">litry</th>
            <th class="tg-0lax">stan licznika start</th>
            <th class="tg-0lax">stan licznika stop</th>
            <th class="tg-0lax">km przejechane</th>
            <th class="tg-0lax">cena za 100km</th>
            <th class="tg-0lax">spalanie na 100km</th>
        </tr>
    </thead>
    <tbody>
        {if $result}
            {if ($result->num_rows > 0)}
                {while $dana = $result->fetch_assoc()}
                    <tr>
                        {$litry = $dana["KWOTA"] / $dana["CENA_LITR"]}
                        {$km = $dana["STAN_STOP"] - $dana["STAN_START"]}
                        {$cena_100 = $dana["KWOTA"] / $km * 100}
                        {$spalanie_100 = $litry / $km * 100}
                        {$czyPusta = $dana["STAN_STOP"] != null}
                        <td class="tg-0lax">{$dana["ID"]}</td>
                        <td class="tg-0lax">{$dana["DATA"]}</td>
                        <td class="tg-0lax">{$dana["KWOTA"]} zł</td>
                        <td class="tg-0lax">{$dana["CENA_LITR"]} zł</td>
                        <td class="tg-0lax">{round($litry, 2)}</td>
                        <td class="tg-0lax">{$dana["STAN_START"]}</td>
                        <td class="tg-0lax">{$dana["STAN_STOP"]}</td>
                        <td class="tg-0lax">{if $czyPusta}{$km}{/if}</td>
                        <td class="tg-0lax">{if $czyPusta}{round($cena_100, 2)} zł{/if}</td>
                        <td class="tg-0lax">{if $czyPusta}{round($spalanie_100, 2)} zł{/if}</td>
                    </tr>
                {/while}
            {/if}
        {/if}
    </tbody>
</table>
    
{/block}