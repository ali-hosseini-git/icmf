<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 17:18:51
         compiled from "theme/digiseo/tpl/common/sendMessage.htm" */ ?>
<?php /*%%SmartyHeaderCode:8359229295749928e43d985-63205824%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b5f4fa0f3676c62b16748100f810bdf35d8e5ac' => 
    array (
      0 => 'theme/digiseo/tpl/common/sendMessage.htm',
      1 => 1464439713,
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
<?php if ($_valid && !is_callable('content_5749928e48d1f5_97169866')) {function content_5749928e48d1f5_97169866($_smarty_tpl) {?><div class="paddy1 clearFix">
	<div class="row cell20"><?php echo $_smarty_tpl->tpl_vars['lang']->value['userName'];?>
:</div>
	<div class="row cell80"><input class="curvedFull" id="userName" name="userName" maxlength="45"></div>
</div>
<div class="paddy1 clearFix">
	<div class="row cell20"><?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
:</div>
	<div class="row cell80"><input class="curvedFull" id="email" name="email" maxlength="100"></div>
</div>
<div class="paddy1 clearFix">
	<div class="row cell20"><?php echo $_smarty_tpl->tpl_vars['lang']->value['subject'];?>
:</div>
	<div class="row cell80"><input class="curvedFull" id="subject" name="subject" maxlength="100"></div>
</div>
<div class="paddy1 clearFix">
	<div class="row cell20">
		<?php echo $_smarty_tpl->tpl_vars['lang']->value['message'];?>
:
	</div>
	<div class="row cell80"><textarea id="message" name="message" class="input curvedFull" rows="5" cols="20"></textarea></div>
</div>
<div class="footBtnSendpaddy5">
	<button class="footBtn" style="height: 50px;" onclick="$('#content').farajax('loader', '/contact/c_sendMessage', 'userName=' + document.getElementById('userName').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['userName'];?>
<>Multi<>1<>nce<>45' + '&amp;email=' + document.getElementById('email').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
<>Mail<>1<>nce<>45' + '&amp;subject=' + document.getElementById('subject').value	+ '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['subject'];?>
<>Multi<>1<>ce<>100' + '&amp;message=' + document.getElementById('message').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['message'];?>
<>Multi<>1<>ce<>1000');">
		<span><?php echo $_smarty_tpl->tpl_vars['lang']->value['send'];?>
</span>
	</button>
</div>
<div style="padding: 5px;">
	<button onclick="$('#content').farajax('loader', '/contact/c_sendMessage', 'subject=' + document.getElementById('subject').value	+ '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['subject'];?>
<>Multi<>1<>ce<>100' + '&amp;message=' + document.getElementById('message').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['message'];?>
<>Multi<>1<>ce<>1000');">
		<span><?php echo $_smarty_tpl->tpl_vars['lang']->value['send'];?>
</span>
	</button>
</div>
<!-- 
<div class="paddy1">
	<?php echo $_smarty_tpl->tpl_vars['lang']->value['carbonCopy'];?>
: <input id="carbonCopy" name="carbonCopy" class="input" type="checkbox" value="0" onchange="checkBoxToggle('carbonCopy');">
</div>
--><?php }} ?>