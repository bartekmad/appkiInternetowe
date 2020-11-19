<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-19 21:20:28
  from 'C:\wamp64\www\appkiInternetowe\templates\wyswietlanie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb6e19c182f14_26243782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28a9cc7139776ebf8c243bed1b51fc832a918769' => 
    array (
      0 => 'C:\\wamp64\\www\\appkiInternetowe\\templates\\wyswietlanie.tpl',
      1 => 1605820826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb6e19c182f14_26243782 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18866131435fb6e19be2d364_16346568', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_18866131435fb6e19be2d364_16346568 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18866131435fb6e19be2d364_16346568',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="width:90%; margin: 2em auto;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" class="pure-button">Przejdź do wprowadzania danych</a>
</div>

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
        <?php if ($_smarty_tpl->tpl_vars['result']->value) {?>
            <?php if (($_smarty_tpl->tpl_vars['result']->value->num_rows > 0)) {?>
                <?php while ($_prefixVariable1 = $_smarty_tpl->tpl_vars['result']->value->fetch_assoc()) {
$_smarty_tpl->_assignInScope('dana', $_prefixVariable1);?>
                    <tr>
                        <?php $_smarty_tpl->_assignInScope('litry', $_smarty_tpl->tpl_vars['dana']->value["KWOTA"]/$_smarty_tpl->tpl_vars['dana']->value["CENA_LITR"]);?>
                        <?php $_smarty_tpl->_assignInScope('km', $_smarty_tpl->tpl_vars['dana']->value["STAN_STOP"]-$_smarty_tpl->tpl_vars['dana']->value["STAN_START"]);?>
                        <?php $_smarty_tpl->_assignInScope('cena_100', $_smarty_tpl->tpl_vars['dana']->value["KWOTA"]/$_smarty_tpl->tpl_vars['km']->value*100);?>
                        <?php $_smarty_tpl->_assignInScope('spalanie_100', $_smarty_tpl->tpl_vars['litry']->value/$_smarty_tpl->tpl_vars['km']->value*100);?>
                        <?php $_smarty_tpl->_assignInScope('czyPusta', $_smarty_tpl->tpl_vars['dana']->value["STAN_STOP"] != null);?>
                        <td class="tg-0lax"><?php echo $_smarty_tpl->tpl_vars['dana']->value["ID"];?>
</td>
                        <td class="tg-0lax"><?php echo $_smarty_tpl->tpl_vars['dana']->value["DATA"];?>
</td>
                        <td class="tg-0lax"><?php echo $_smarty_tpl->tpl_vars['dana']->value["KWOTA"];?>
 zł</td>
                        <td class="tg-0lax"><?php echo $_smarty_tpl->tpl_vars['dana']->value["CENA_LITR"];?>
 zł</td>
                        <td class="tg-0lax"><?php echo round($_smarty_tpl->tpl_vars['litry']->value,2);?>
</td>
                        <td class="tg-0lax"><?php echo $_smarty_tpl->tpl_vars['dana']->value["STAN_START"];?>
</td>
                        <td class="tg-0lax"><?php echo $_smarty_tpl->tpl_vars['dana']->value["STAN_STOP"];?>
</td>
                        <td class="tg-0lax"><?php if ($_smarty_tpl->tpl_vars['czyPusta']->value) {
echo $_smarty_tpl->tpl_vars['km']->value;
}?></td>
                        <td class="tg-0lax"><?php if ($_smarty_tpl->tpl_vars['czyPusta']->value) {
echo round($_smarty_tpl->tpl_vars['cena_100']->value,2);?>
 zł<?php }?></td>
                        <td class="tg-0lax"><?php if ($_smarty_tpl->tpl_vars['czyPusta']->value) {
echo round($_smarty_tpl->tpl_vars['spalanie_100']->value,2);?>
 zł<?php }?></td>
                    </tr>
                <?php }?>

            <?php }?>
        <?php }?>
    </tbody>
</table>
    
<?php
}
}
/* {/block 'content'} */
}
