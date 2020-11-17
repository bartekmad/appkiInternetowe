<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-17 16:06:51
  from 'C:\wamp64\www\appkiInternetowe\templates\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb3f51b21dee3_28430609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fa3a9e9c03e5f83b9bbdb1884f8cb95faecfdf6' => 
    array (
      0 => 'C:\\wamp64\\www\\appkiInternetowe\\templates\\calc.tpl',
      1 => 1605629209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb3f51b21dee3_28430609 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18955266165fb3f51b108651_13741407', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_18955266165fb3f51b108651_13741407 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18955266165fb3f51b108651_13741407',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="width:90%; margin: 2em auto;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
</div>

<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
    <fieldset>
        <label for="id_kwotaTankowania">Kwota tankowania: </label>
        <input id="id_kwotaTankowania" type="text" name="kwotaTankowania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwotaTankowania;?>
">
        <label for="id_cenaZaLitr">Cena za litr paliwa: </label>
        <input id="id_cenaZaLitr" type="text" name="cenaZaLitr" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->cenaZaLitr;?>
">
        <label for="id_stanPoczatkowy">Stan licznika początkowy: </label>
        <input id="id_stanPoczatkowy" type="number" name="stanPoczatkowy" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->stanPoczatkowy;?>
">
        <label for="id_dataTankowania">Data tankowania: </label>
        <input id="id_dataTankowania" type="date" name="dataTankowania" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->dataTankowania;?>
">
    </fieldset>
    <button type="submit" class="pure-button pure-button-primary">Wpisz dane do bazy</button>
</form>

<div class="messages">
    <?php if ($_smarty_tpl->tpl_vars['messages']->value->isError()) {?>
        <h4>Wystąpiły błędy: </h4>
        <ol class="err">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['result']->value) {?>
        <h4>Wynik</h4>
        <p class="res">
            <?php echo $_smarty_tpl->tpl_vars['result']->value;?>

        </p>
    <?php }?>
</div>

<?php
}
}
/* {/block 'content'} */
}
