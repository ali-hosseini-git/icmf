<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:19:54
         compiled from "module/comment/view/tpl/object/showListObjectSimple.htm" */ ?>
<?php /*%%SmartyHeaderCode:1713813423574977d2c21784-76404628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e90adcfa03c0ba870dd7bf86be2c557fb9d25652' => 
    array (
      0 => 'module/comment/view/tpl/object/showListObjectSimple.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1713813423574977d2c21784-76404628',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'entityList' => 1,
    'entityItem' => 1,
    'title' => 1,
    'lang' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977d2db5f65_82934723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977d2db5f65_82934723')) {function content_574977d2db5f65_82934723($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/lab/www/icmf/html/kernel/lib/xorg/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_truncate')) include '/lab/www/icmf/html/kernel/lib/xorg/smarty/plugins/modifier.truncate.php';
?>
<?php  $_smarty_tpl->tpl_vars['entityItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entityItem']->_loop = false;
 $_smarty_tpl->tpl_vars['entityKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['entityList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entityItem']->key => $_smarty_tpl->tpl_vars['entityItem']->value){
$_smarty_tpl->tpl_vars['entityItem']->_loop = true;
 $_smarty_tpl->tpl_vars['entityKey']->value = $_smarty_tpl->tpl_vars['entityItem']->key;
?>
<?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['entityItem']->value['title'],' ','-'), true, 0);?>
<div id="row<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['id'];?>
" class="clearFix blockquote boxShadow" style="margin-bottom: 3px;">
	<div class="paddy2 clearFix curvedFull" style="background: #e9e9e9;">
		<div class="row cell95">
			<?php if (isset($_smarty_tpl->tpl_vars['entityItem']->value['firstName'])||isset($_smarty_tpl->tpl_vars['entityItem']->value['lastName'])){?>
			<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['entityItem']->value['lastName'];?>

			<?php }else{ ?>
			<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['email'];?>

			<?php }?>
		</div>
		<div class="row cell5 left">
			<?php if ($_smarty_tpl->tpl_vars['entityItem']->value['op']=='crm'){?>
			&nbsp;
			<?php }else{ ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['op'];?>
/c_showListObject/<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['opid'];?>
_<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="fa fa-arrow-left x1_5" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['readMore'];?>
"></a>
			<?php }?>
		</div>
	</div>
	<div>
		<p>
			<?php if ($_smarty_tpl->tpl_vars['entityItem']->value['op']=='crm'){?>
			<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['text'];?>

			<?php }else{ ?>
			<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['entityItem']->value['text'],100," ...",true);?>

			<?php }?>
		</p>
	</div>
	<div class="left thin">
		<?php echo $_smarty_tpl->tpl_vars['entityItem']->value['timeStamp'];?>

	</div>
</div>
<?php } ?><?php }} ?>