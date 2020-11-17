<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-17 11:09:32
  from 'C:\wamp64\www\appkiInternetowe\app\security\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fb3af6c3f5102_55045005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3de69275a101dd40a2fbcc5cc9a85de0da803aec' => 
    array (
      0 => 'C:\\wamp64\\www\\appkiInternetowe\\app\\security\\login.html',
      1 => 1605611182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb3af6c3f5102_55045005 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10643070335fb3af6c3424b3_35424674', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_10643070335fb3af6c3424b3_35424674 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10643070335fb3af6c3424b3_35424674',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/security/login.php" method="post">
    <fieldset>
        <label for="id_login">login: </label>
        <input id="id_login" type="text" name="login" value="<?php echo '<?php ';?>
out($form['login']); <?php echo '?>';?>
" />
        <label for="id_pass">pass: </label>
        <input id="id_pass" type="password" name="pass" />
    </fieldset>
    <input type="submit" value="zaloguj" class="pure-button pure-button-primary"/>
</form>

<div class="messages">
<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

</div>

<?php
}
}
/* {/block 'content'} */
}
