<?php /* Smarty version Smarty-3.1.14, created on 2016-06-07 17:17:19
         compiled from "theme/digiseo/tpl/common/sendMessage.htm" */ ?>
<?php /*%%SmartyHeaderCode:8359229295749928e43d985-63205824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b5f4fa0f3676c62b16748100f810bdf35d8e5ac' => 
    array (
      0 => 'theme/digiseo/tpl/common/sendMessage.htm',
      1 => 1465303607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8359229295749928e43d985-63205824',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5749928e48d1f5_97169866',
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5749928e48d1f5_97169866')) {function content_5749928e48d1f5_97169866($_smarty_tpl) {?><form action="contact/c_sendMessage" method="post">
	<div>
		<div><?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
:</div>
		<div><input name="email" type="email" maxlength="100"></div>
	</div>
	<div>
		<div><?php echo $_smarty_tpl->tpl_vars['lang']->value['subject'];?>
:</div>
		<div><input name="subject" maxlength="100"></div>
	</div>
	<div>
		<div>
			<?php echo $_smarty_tpl->tpl_vars['lang']->value['message'];?>
:
		</div>
		<div>
			<textarea name="message" rows="5" cols="20"></textarea>
		</div>
	</div>
	<div>
		<button>
			<span><?php echo $_smarty_tpl->tpl_vars['lang']->value['send'];?>
</span>
		</button>
	</div>
</form><?php }} ?>