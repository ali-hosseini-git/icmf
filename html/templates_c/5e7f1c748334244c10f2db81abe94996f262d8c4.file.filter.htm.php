<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:30:47
         compiled from "module/post/view/tpl/object/filter.htm" */ ?>
<?php /*%%SmartyHeaderCode:192179654557497a5fb2d1d8-12662138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e7f1c748334244c10f2db81abe94996f262d8c4' => 
    array (
      0 => 'module/post/view/tpl/object/filter.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192179654557497a5fb2d1d8-12662138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contentType' => 1,
    'category' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_57497a5fb35d05_32739742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57497a5fb35d05_32739742')) {function content_57497a5fb35d05_32739742($_smarty_tpl) {?>
<div class="clearFix whiteFrame paddy5 curvedFull">
	<div class="row cell10">
		<?php echo $_smarty_tpl->tpl_vars['contentType']->value;?>

	</div>
	<div class="row cell20">
		<?php echo $_smarty_tpl->tpl_vars['category']->value;?>

	</div>
	<div class="row cell10">
		<button onclick="$('#content').farajax('loader', '/post/c_listObject/' + 'contentType=' + $('#contentType').val() + ',category=' + $('#category').val());">
			فیلتر
		</button>
	</div>
</div>

<br><?php }} ?>