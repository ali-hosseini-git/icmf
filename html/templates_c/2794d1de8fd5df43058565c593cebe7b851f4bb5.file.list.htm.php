<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:30:47
         compiled from "module/post/view/tpl/object/list.htm" */ ?>
<?php /*%%SmartyHeaderCode:149711334557497a5fa71b61-70986174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2794d1de8fd5df43058565c593cebe7b851f4bb5' => 
    array (
      0 => 'module/post/view/tpl/object/list.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149711334557497a5fa71b61-70986174',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 1,
    'entityList' => 1,
    'entityItem' => 1,
    'settings' => 1,
    'navigation' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_57497a5fb291e0_01793663',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57497a5fb291e0_01793663')) {function content_57497a5fb291e0_01793663($_smarty_tpl) {?><div class="pageIn">
	<h2><?php echo $_smarty_tpl->tpl_vars['lang']->value['postList'];?>
</h2>
	<br>
	<?php echo $_smarty_tpl->getSubTemplate ("module/post/view/tpl/object/filter.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="listHeader clearFix">
		<div class="row cell5 center">#</div>
		<div class="row cell5 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['id'];?>
</div>
		<div class="row cell5 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['contentType'];?>
</div>
		<div class="row cell25 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['title'];?>
</div>
		<div class="row cell10 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['category'];?>
</div>
		<div class="row cell5 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['viewCount'];?>
</div>
		<div class="row cell15 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['startTime'];?>
</div>
		<div class="row cell5 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['dayCount'];?>
</div>
		<div class="row cell10 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['weight'];?>
</div>
		<div class="row cell15 center"><?php echo $_smarty_tpl->tpl_vars['lang']->value['properties'];?>
</div>
	</div>
	
	<?php  $_smarty_tpl->tpl_vars['entityItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entityItem']->_loop = false;
 $_smarty_tpl->tpl_vars['entityKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['entityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entityItem']->key => $_smarty_tpl->tpl_vars['entityItem']->value){
$_smarty_tpl->tpl_vars['entityItem']->_loop = true;
 $_smarty_tpl->tpl_vars['entityKey']->value = $_smarty_tpl->tpl_vars['entityItem']->key;
?>
	<div class="blockquote clearFix" id="row<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['id'];?>
">
		<div class="row cell5"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['num'];?>
</div>
		<div class="row cell5"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['id'];?>
</div>
		<div class="row cell5 center"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['contentType'];?>
</div>
		<div class="row cell25">
			<a href="/post/c_showListObject/id=<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['title'];?>
</a>
		</div>
		<div class="row cell10 center"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['category'];?>
&nbsp;</div>
		<div class="row cell5 center"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['viewCount'];?>
&nbsp;</div>
		<div class="row cell15 center"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['startTime'];?>
&nbsp;</div>
		<div class="row cell5 center"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['dayCount'];?>
&nbsp;</div>
		<div class="row cell10 center"><?php echo $_smarty_tpl->tpl_vars['entityItem']->value['weight'];?>
&nbsp;</div>
		<div class="row cell15 center">
			<a href="/post/c_showListObject/id=<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['id'];?>
">
				<img src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/information.png" title="" alt="">
			</a>
			<a href="/post/v_delObject/id=<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['id'];?>
">
				<img src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/delete.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['delete'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lang']->value['delete'];?>
">
			</a>
			<a href="/post/v_editObject/id=<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['id'];?>
">
				<img src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/edit.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['edit'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['lang']->value['edit'];?>
">
			</a>
			<?php if ($_smarty_tpl->tpl_vars['entityItem']->value['actvie']=='1'){?> 
			<img src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/powerOn.png">
			<?php }else{ ?>
			<img src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/powerOff.png">
			<?php }?>
		</div>
	</div>
	<?php } ?>
	<br>
	<div class="blockquote"><?php echo $_smarty_tpl->tpl_vars['navigation']->value;?>
</div>
	
</div><?php }} ?>