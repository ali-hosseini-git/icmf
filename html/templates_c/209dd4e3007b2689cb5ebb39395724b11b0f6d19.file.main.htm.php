<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:19:54
         compiled from "theme/digiseo/tpl/common/main.htm" */ ?>
<?php /*%%SmartyHeaderCode:72167391574977d2dbb8f9-63678635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '209dd4e3007b2689cb5ebb39395724b11b0f6d19' => 
    array (
      0 => 'theme/digiseo/tpl/common/main.htm',
      1 => 1463641018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72167391574977d2dbb8f9-63678635',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'lang' => 0,
    'sections' => 1,
    'section' => 1,
    'center' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977d2e66654_65454432',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977d2e66654_65454432')) {function content_574977d2e66654_65454432($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/common/head.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body id="body" style="direction: <?php echo $_smarty_tpl->tpl_vars['lang']->value['direction'];?>
;">
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['sections']->value['nav']){?>
<?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/common/nav.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['sections']->value['slider']){?>
<header class="header"><?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/common/slider.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</header>
<?php }?>

<!-- Wrapper -->
<div id="wrapper" class="wrapper">
	<main>
		
		<?php if ($_smarty_tpl->tpl_vars['section']->value['right']||$_smarty_tpl->tpl_vars['section']->value['left']){?>
		<div class="row">
		<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['sections']->value['right']){?>
			<section id="rightBox" class="col-xs-<?php echo $_smarty_tpl->tpl_vars['sections']->value['rightWidth'];?>
 col-md-<?php echo $_smarty_tpl->tpl_vars['sections']->value['rightWidth'];?>
">
				<aside id="rightAsideContent" class="asideContent">
					<?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/customise/rightBox.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</aside>
			</section>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['sections']->value['center']){?>
			<section id="centerBox" class="col-xs-<?php echo $_smarty_tpl->tpl_vars['sections']->value['centerWidth'];?>
 col-md-<?php echo $_smarty_tpl->tpl_vars['sections']->value['centerWidth'];?>
">
				<div id="content" class="content">
					<?php echo $_smarty_tpl->tpl_vars['center']->value;?>

				</div>
			</section>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['sections']->value['left']){?>
	
			<section id="leftBox" class="col-xs-<?php echo $_smarty_tpl->tpl_vars['sections']->value['leftWidth'];?>
 col-md-<?php echo $_smarty_tpl->tpl_vars['sections']->value['leftWidth'];?>
">
				<aside id="leftAsideContent" class="asideContent">
					<?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/customise/leftBox.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				</aside>
			</section>
			<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['section']->value['right']||$_smarty_tpl->tpl_vars['section']->value['left']){?>
		</div>
		<?php }?>
		
	</main>
</div>
<!--/Wrapper-->
<!-- Footer -->
<footer id="footer" class="footer">
	<?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/common/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</footer>
<!-- /Footer -->
<!-- Copyright -->
<section id="copyright" class="copyright text-center module-small bg-light p-t-30 p-b-30">
	<?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/common/copyright.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</section>
<!-- /Copyright -->
<script src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/js/js.php"></script>
<?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/common/googlePlus.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>