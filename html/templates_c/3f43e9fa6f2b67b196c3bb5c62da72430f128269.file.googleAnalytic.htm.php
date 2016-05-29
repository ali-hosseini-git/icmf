<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:19:54
         compiled from "theme/digiseo/tpl/common/googleAnalytic.htm" */ ?>
<?php /*%%SmartyHeaderCode:1680669973574977d2f12a39-97475881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f43e9fa6f2b67b196c3bb5c62da72430f128269' => 
    array (
      0 => 'theme/digiseo/tpl/common/googleAnalytic.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1680669973574977d2f12a39-97475881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977d2f1d640_66273922',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977d2f1d640_66273922')) {function content_574977d2f1d640_66273922($_smarty_tpl) {?><script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $_smarty_tpl->tpl_vars['settings']->value['googleAccount'];?>
']);
		  _gaq.push(['_setDomainName', '<?php echo $_smarty_tpl->tpl_vars['settings']->value['googleDomainName'];?>
']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
</script><?php }} ?>