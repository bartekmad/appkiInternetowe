{extends file="../templates/main.tpl"}

{block name=content}

<form class="pure-form pure-form-stacked" action="{$app_url}/app/security/login.php" method="post">
    <fieldset>
        <label for="id_login">login: </label>
        <input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
        <label for="id_pass">pass: </label>
        <input id="id_pass" type="password" name="pass" />
    </fieldset>
    <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
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

</div>

{/block}