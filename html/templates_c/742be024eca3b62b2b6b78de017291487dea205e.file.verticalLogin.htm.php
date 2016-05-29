<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:20:13
         compiled from "module/userMan/view/tpl/verticalLogin.htm" */ ?>
<?php /*%%SmartyHeaderCode:2124547146574977e550fcc9-93902910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '742be024eca3b62b2b6b78de017291487dea205e' => 
    array (
      0 => 'module/userMan/view/tpl/verticalLogin.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2124547146574977e550fcc9-93902910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977e5546033_68777795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977e5546033_68777795')) {function content_574977e5546033_68777795($_smarty_tpl) {?><br>

<div class="margin1">
	<input id="loginUserName" name="loginUserName" class="cell94" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['userName'];?>
/<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
" maxlength="100" required>
</div>
<div class="margin1">
	<input id="loginPassword" name="loginPassword" class="cell94" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['password'];?>
" type="password" maxlength="20" required>
</div>
<div class="margin1 h36">
	&nbsp;
</div>
<div class="margin1">
	<button onclick="
			$('#content').farajax('loader', 'userMan/c_login',
				   'userName=' + document.getElementById('loginUserName').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['userName'];?>
<>Multi<>1<>ce<>100' +
				   '&amp;password=' + document.getElementById('loginPassword').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['password'];?>
<>Multi<>1<>ce<>20'			   
			);
			$('#loginGate').farajax('loader', '/pageLoader/v_load/loginGate');
	 	"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['login'];?>
</span></button>
</div>
<br><br>
<div class="margin1">
	[<a href="/userMan/v_changePass" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['lang']->value['forgetPassword'];?>
</a>] 
</div>

<?php }} ?>