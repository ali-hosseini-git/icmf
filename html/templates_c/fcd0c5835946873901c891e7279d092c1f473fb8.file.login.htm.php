<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:19:54
         compiled from "module/userMan/view/tpl/login.htm" */ ?>
<?php /*%%SmartyHeaderCode:1783841474574977d2abae44-38129265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcd0c5835946873901c891e7279d092c1f473fb8' => 
    array (
      0 => 'module/userMan/view/tpl/login.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1783841474574977d2abae44-38129265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977d2c1a398_57206825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977d2c1a398_57206825')) {function content_574977d2c1a398_57206825($_smarty_tpl) {?>
<div class="row cell20">
	<input id="loginUserName" name="loginUserName" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['userName'];?>
/<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
" maxlength="100" required>
</div>
<div class="row cell20">
	<input id="loginPassword" name="loginPassword" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['password'];?>
" type="password" maxlength="20" required>
</div>
<div class="row cell10">
	<button onclick="
			$('#login').farajax('loader', '/userMan/c_login',
				   'userName=' + document.getElementById('loginUserName').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['userName'];?>
<>Multi<>1<>ce<>100' +
				   '&amp;password=' + document.getElementById('loginPassword').value + '::<?php echo $_smarty_tpl->tpl_vars['lang']->value['password'];?>
<>Multi<>1<>ce<>20'			   
			);
			$('#loginGate').farajax('loader', '/pageLoader/v_load/loginGate');
	 	"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['login'];?>
</span></button>
</div>
<div class="row cell50" style="line-height: 45px;">
	[<a href="/userMan/v_signUp" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['lang']->value['signUp'];?>
</a>] [<a href="/userMan/v_changePass" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['lang']->value['forgetPassword'];?>
</a>] 
</div>
<br class="clear">

<?php }} ?>