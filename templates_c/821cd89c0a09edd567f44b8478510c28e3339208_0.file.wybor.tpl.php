<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-17 14:35:06
  from 'C:\wamp64\www\appkiInternetowe\templates\wybor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb3df9ae6f398_35425519',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '821cd89c0a09edd567f44b8478510c28e3339208' => 
    array (
      0 => 'C:\\wamp64\\www\\appkiInternetowe\\templates\\wybor.tpl',
      1 => 1605623476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb3df9ae6f398_35425519 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14240843965fb3df9ae31148_08329403', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_14240843965fb3df9ae31148_08329403 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14240843965fb3df9ae31148_08329403',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="width:90%; margin: 2em auto;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" class="pure-button">Przejdź do wprowadzania danych</a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
</div>
    
<?php
}
}
/* {/block 'content'} */
}
