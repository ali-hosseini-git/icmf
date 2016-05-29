<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:19:54
         compiled from "theme/digiseo/tpl/common/head.htm" */ ?>
<?php /*%%SmartyHeaderCode:1697449050574977d2e6a995-81472111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f348d5d1ce1824a97b6556cd146e69f1f3b4896' => 
    array (
      0 => 'theme/digiseo/tpl/common/head.htm',
      1 => 1462795158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1697449050574977d2e6a995-81472111',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sysVar' => 1,
    'title' => 1,
    'settings' => 0,
    'description' => 1,
    'robots' => 1,
    'googleAuthor' => 1,
    'type' => 1,
    'image' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977d2f0f141_83248816',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977d2f0f141_83248816')) {function content_574977d2f0f141_83248816($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/lab/www/icmf/html/kernel/lib/xorg/smarty/plugins/modifier.truncate.php';
?><!DOCTYPE html>

<?php if ($_smarty_tpl->tpl_vars['sysVar']->value['op']=='post'){?>
<html lang="fa" itemscope itemtype="http://schema.org/Article">
<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('Article', true, 0);?>
<?php }elseif($_smarty_tpl->tpl_vars['sysVar']->value['op']=='shop'){?>
<html lang="fa" itemscope itemtype="http://schema.org/Product">
<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('Product', true, 0);?>
<?php }else{ ?>
<html lang="fa" itemscope itemtype="http://schema.org/WebPage">
<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('WebPage', true, 0);?>
<?php }?>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<base href="http://<?php echo $_smarty_tpl->tpl_vars['settings']->value['domain'];?>
/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/img/icon/favicons/favicon.png">

	<?php $_smarty_tpl->tpl_vars['description'] = new Smarty_variable(smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['description']->value),150,'',true), true, 0);?>
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
	<meta name="generator" content="<?php echo $_smarty_tpl->tpl_vars['settings']->value['author'];?>
">
	<meta name="robots" content="<?php echo $_smarty_tpl->tpl_vars['robots']->value;?>
">
	<meta name="author"	content="<?php echo $_smarty_tpl->tpl_vars['settings']->value['author'];?>
">
	 
	<link rel="author" href="<?php echo $_smarty_tpl->tpl_vars['googleAuthor']->value;?>
/posts">
	<link rel="publisher" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['googlePublisher'];?>
">
	
	<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
">
	<meta property="og:type" content="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"> 
	<meta property="og:url" content="http://<?php echo $_smarty_tpl->tpl_vars['settings']->value['domain'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
">
	<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
">
	<meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
	<meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['settings']->value['domainName'];?>
">
	
	<meta itemprop="name" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"> 
	<meta itemprop="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
	<meta itemprop="image" content="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
">
	
	<?php if ($_smarty_tpl->tpl_vars['type']->value=='Article'){?>
	<meta name="twitter:card" content="summary_large_image"> 
	<meta name="twitter:site" content="@<?php echo $_smarty_tpl->tpl_vars['settings']->value['twitterPublisher'];?>
"> 
	<meta name="twitter:title" content="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
"> 
	<meta name="twitter:description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
"> 
	<meta name="twitter:creator" content="@"> 
	<meta name="twitter:image:src" content="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
">
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['type']->value=='Product'){?>
	<meta name="twitter:data1" content="$3"> 
	<meta name="twitter:label1" content="Price"> 
	<meta name="twitter:data2" content="Black"> 
	<meta name="twitter:label2" content="Color">
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['type']->value=='Article'){?>
	<meta property="article:published_time" content=""> 
	<meta property="article:modified_time" content=""> 
	<meta property="article:section" content=""> 
	<meta property="article:tag" content="">
	<?php }elseif($_smarty_tpl->tpl_vars['type']->value=='Product'){?>
	<meta property="og:price:amount" content=""> 
	<meta property="og:price:currency" content="">
	<?php }?>
	<meta property="fb:admins" content="<?php echo $_smarty_tpl->tpl_vars['settings']->value['facebookAdminID'];?>
">
	
	
	<link rel="stylesheet" href="theme/<?php echo $_smarty_tpl->tpl_vars['settings']->value['theme'];?>
/style/style.php" type="text/css">
	<?php echo $_smarty_tpl->getSubTemplate ("theme/".((string)$_smarty_tpl->tpl_vars['settings']->value['theme'])."/tpl/common/googleAnalytic.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head><?php }} ?>