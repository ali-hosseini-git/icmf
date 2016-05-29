<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:20:13
         compiled from "module/userMan/view/tpl/signUp.htm" */ ?>
<?php /*%%SmartyHeaderCode:1203427118574977e54a8cc8-01082728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0f298e4be26a0a2097f1180727d0ca7e4c250c6' => 
    array (
      0 => 'module/userMan/view/tpl/signUp.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1203427118574977e54a8cc8-01082728',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'securityQuestion' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977e550d201_91140157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977e550d201_91140157')) {function content_574977e550d201_91140157($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['lang']->value['signUp'];?>
</h1>
<br>
<div class="margin1">
	<input id="signupEmail" class="cell94" name="signupEmail" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
" type="email" maxlength="100" pattern="^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$" title="لطفا ایمیل خود را به درستی وارد نمایید" required="required">
</div>
<div class="margin1">
	<input id="signupPassword" class="cell94 rtl" name="signupPassword" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['password'];?>
" type="password" maxlength="20" data-typetoggle="#show-password" required="required" onmouseover="$(this).prop('type', 'text');" onmouseleave="$(this).prop('type', 'password');">
</div>
<div class="margin1">
	
	<input id="securityQuestion" class="cell94" name="securityQuestion" placeholder="<?php echo $_smarty_tpl->tpl_vars['securityQuestion']->value['question'];?>
" type="text" maxlength="200" required="required">
	<input id="securityId" class="cell94" name="securityId" value="<?php echo $_smarty_tpl->tpl_vars['securityQuestion']->value['id'];?>
" type="hidden" maxlength="11">
	
</div>
<div class="margin1">
	<button onclick="
		$('#content').farajax('loader', '/userMan/c_signUp',
				'email=' + $('#signupEmail').val() + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
<>Mail<>1<>ce<>100' +
			   	'&password=' + $('#signupPassword').val() + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['password'];?>
<>Multi<>1<>ce<>45' + 
			   	'&securityQuestion=' + $('#securityQuestion').val() + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['securityQuestion'];?>
<>Multi<>1<>ce<>100' +
			   	'&securityId=' + $('#securityId').val() + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['securityId'];?>
<>Multi<>1<>nce<>11'
		);
	"><?php echo $_smarty_tpl->tpl_vars['lang']->value['submit'];?>

	</button>
</div>
<br><br>
<div class="margin1">
	[<a href="pageLoader/v_load/rules" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['lang']->value['rules'];?>
</a>] 
</div><?php }} ?>