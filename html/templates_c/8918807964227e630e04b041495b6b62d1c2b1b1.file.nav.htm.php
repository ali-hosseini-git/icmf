<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 17:13:58
         compiled from "theme/digiseo/tpl/common/nav.htm" */ ?>
<?php /*%%SmartyHeaderCode:1437689852574977d2f1f529-77640321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8918807964227e630e04b041495b6b62d1c2b1b1' => 
    array (
      0 => 'theme/digiseo/tpl/common/nav.htm',
      1 => 1464438915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1437689852574977d2f1f529-77640321',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977d2f2cb57_68065653',
  'variables' => 
  array (
    'lang' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977d2f2cb57_68065653')) {function content_574977d2f2cb57_68065653($_smarty_tpl) {?><nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="about">درباره ما</a></li>
            <li><a href="contact">تماس با ما</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          	<li class="dropdown">
            	<a class="dropdown-toggle" href="#" data-toggle="dropdown">ورود <strong class="caret"></strong></a>
            	<div class="dropdown-menu">
              		<form action="[YOUR ACTION]" method="post">
						<input id="email" name="email" type="email" size="30" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
">
						<input id="password" name="password" type="password" size="30" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['password'];?>
">
						<input id="rememberMe" name="rememberMe" type="checkbox" value="1">
						<label class="string optional" for="rememberMe"> مرا به خاطر بسپار</label>
						<input name="commit" class="btn btn-primary" type="submit"  value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['submit'];?>
">
					</form>
					<a href="">ثبت نام</a>
            	</div>
          	</li>
          	<li class="divider-vertical"></li>
          	<li>
        		<a href="#" class="navbar-brand">
					<img src="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/logo.png">
				</a>
			</li>
        </ul>
    </div>
</nav><?php }} ?>