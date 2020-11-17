<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-17 12:48:25
  from 'C:\wamp64\www\appkiInternetowe\app\wybor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb3c699d71df6_68765415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5e651e34c31a550420a1c56137b1651a27b6929' => 
    array (
      0 => 'C:\\wamp64\\www\\appkiInternetowe\\app\\wybor.tpl',
      1 => 1605617304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb3c699d71df6_68765415 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17706839495fb3c699d42aa4_52063403', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_17706839495fb3c699d42aa4_52063403 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17706839495fb3c699d42aa4_52063403',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div style="width:90%; margin: 2em auto;">
    
    <a href="../app/calc.php" class="pure-button">Przejdź do wprowadzania danych</a>
    <a href="<?php echo '<?php ';?>
print(_APP_ROOT); <?php echo '?>';?>
/app/wyswietlanie.php" class="pure-button">Przejdź do wyświetlania danych</a>
    <!--<a href="<?php echo '<?php ';?>
print(_APP_ROOT); <?php echo '?>';?>
/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>-->
</div>
    
<?php
}
}
/* {/block 'content'} */
}
