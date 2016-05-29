<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:20:13
         compiled from "theme/digiseo/tpl/common/watchDog.htm" */ ?>
<?php /*%%SmartyHeaderCode:1277611455574977e590e033-38984013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdc6f83acb4d32ef95b622910976f4352173a6a2' => 
    array (
      0 => 'theme/digiseo/tpl/common/watchDog.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1277611455574977e590e033-38984013',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'color' => 1,
    'icon' => 1,
    'settings' => 1,
    'title' => 1,
    'code' => 1,
    'lang' => 1,
    'message' => 1,
    'messageItem' => 1,
    'button' => 1,
    'command' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977e5995bd5_86187801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977e5995bd5_86187801')) {function content_574977e5995bd5_86187801($_smarty_tpl) {?>
<div class="paddy5 clearFix curvedTop" style="background-color: <?php echo $_smarty_tpl->tpl_vars['color']->value;?>
;">
	<div class="row cell90">
		<span>
			<?php if (isset($_smarty_tpl->tpl_vars['icon']->value)){?>
			<img src='theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/<?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
'>&nbsp;
			<?php }?>
		</span>
		<span class="specialFont">
			<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

		</span>
		<span class="displayNone">
			- <?php echo $_smarty_tpl->tpl_vars['code']->value;?>

		</span>
	</div>
	<div class="row cell10 left">
		<img id="closeModal" class="pointer" src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/close.png" alt="<?php echo $_smarty_tpl->tpl_vars['lang']->value['close'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['close'];?>
">
	</div>
</div>
<div class="paddy10">
	<?php  $_smarty_tpl->tpl_vars['messageItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['messageItem']->_loop = false;
 $_smarty_tpl->tpl_vars['messageKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['messageItem']->key => $_smarty_tpl->tpl_vars['messageItem']->value){
$_smarty_tpl->tpl_vars['messageItem']->_loop = true;
 $_smarty_tpl->tpl_vars['messageKey']->value = $_smarty_tpl->tpl_vars['messageItem']->key;
?>
	<div><?php echo $_smarty_tpl->tpl_vars['messageItem']->value;?>
</div>
	<?php } ?>
		<div class="center">
		<?php if (isset($_smarty_tpl->tpl_vars['button']->value)){?>
 			<?php  $_smarty_tpl->tpl_vars['buttonItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['buttonItem']->_loop = false;
 $_smarty_tpl->tpl_vars['buttonKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['button']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['buttonItem']->key => $_smarty_tpl->tpl_vars['buttonItem']->value){
$_smarty_tpl->tpl_vars['buttonItem']->_loop = true;
 $_smarty_tpl->tpl_vars['buttonKey']->value = $_smarty_tpl->tpl_vars['buttonItem']->key;
?>
 			<?php } ?>
		<?php }?>
	</div>
</div>
<commands value="<?php echo $_smarty_tpl->tpl_vars['command']->value;?>
">
<?php }} ?>