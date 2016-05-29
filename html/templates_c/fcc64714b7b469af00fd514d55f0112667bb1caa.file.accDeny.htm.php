<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:20:13
         compiled from "module/userMan/view/tpl/accDeny.htm" */ ?>
<?php /*%%SmartyHeaderCode:1893549399574977e5483800-12249066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcc64714b7b469af00fd514d55f0112667bb1caa' => 
    array (
      0 => 'module/userMan/view/tpl/accDeny.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1893549399574977e5483800-12249066',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977e54a50f4_38335350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977e54a50f4_38335350')) {function content_574977e54a50f4_38335350($_smarty_tpl) {?><p>
	<?php echo $_smarty_tpl->tpl_vars['lang']->value['accDeny'];?>

</p>
<div class="clearFix">
	<div class="row cell50">
		<div class="paddy10">
			<div class="curvedFull whiteFrame paddy10 h300">
				<?php echo $_smarty_tpl->getSubTemplate ("module/userMan/view/tpl/signUp.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			</div>
		</div>
	</div>
	<div class="row cell50">
		<div class="paddy10">
			<div class="curvedFull whiteFrame paddy10 h300">
				<h1><?php echo $_smarty_tpl->tpl_vars['lang']->value['login'];?>
</h1>
				<?php echo $_smarty_tpl->getSubTemplate ("module/userMan/view/tpl/verticalLogin.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			</div>
		</div>
	</div>
</div> <?php }} ?>