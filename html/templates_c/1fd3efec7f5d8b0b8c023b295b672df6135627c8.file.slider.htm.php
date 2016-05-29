<?php /* Smarty version Smarty-3.1.14, created on 2016-05-28 15:19:54
         compiled from "theme/digiseo/tpl/common/slider.htm" */ ?>
<?php /*%%SmartyHeaderCode:623892293574977d2f2e954-20152316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fd3efec7f5d8b0b8c023b295b672df6135627c8' => 
    array (
      0 => 'theme/digiseo/tpl/common/slider.htm',
      1 => 1463893614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '623892293574977d2f2e954-20152316',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'jsonList' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_574977d30403f5_89694942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574977d30403f5_89694942')) {function content_574977d30403f5_89694942($_smarty_tpl) {?><div id="carousel1" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="overItem container">
			<div class="row">
				<div class="row col-xs-8 col-md-8">
					<div class="container">
						<h1>تحلیل وضعیت سئو سایت شما، کاملا رایگان و اتوماتیک</h1>
						<br>
					</div>
					<div class="container">
						<input id="website" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['website'];?>
">
						<br>
					</div>
					<div class="row col-xs-6 col-md-6">
						<div class="container">
							<form role="form">
								<div class="form-group">
									<input id="firstName" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['firstName'];?>
">
								</div>
								<div class="form-group">
									<input id="lastName" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lastName'];?>
">
								</div>
								<div class="form-group">
									<input id="email" type="email" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
">
								</div>
								<div class="checkbox">
									<label><input type="checkbox"> Remember me</label>
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
					<div class="row col-xs-6 col-md-6">
						<div class="container">
							<form role="form">
								<div class="form-group">
									<input id="firstName" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['firstName'];?>
">
								</div>
								<div class="form-group">
									<input id="lastName" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['lastName'];?>
">
								</div>
								<div class="form-group">
									<input id="email" type="email" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['email'];?>
">
								</div>
								<div class="checkbox">
									<label><input type="checkbox"> Remember me</label>
								</div>
								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xs-4 col-md-4">
					<div class="container someAudit">
						A
					</div>
				</div>
			</div>
		</div>
		<div class="item active">
			<div class="slide1"></div>
		</div>
		<div class="item">
			<div class="slide2"></div>
		</div>
		<div class="item">
			<div class="slide3"></div>
		</div>
	</div>
	<!-- News ticker -->
	<!--
	<div class="newsTicker container">
		<div class="row">
			<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = json_decode($_smarty_tpl->tpl_vars['jsonList']->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
			    <div class="col-xs-3 col-md-3">
			    	<div class="postItem">
				    	<b class="specialFont">
				    		<a href="post/c_showListObject/<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['post']->value->title;?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value->title;?>
</a>
				    	</b>
				    	<br><br>
				    	<div class="text-center">
					    	<img src="<?php echo $_smarty_tpl->tpl_vars['post']->value->contentPath;?>
" width="90%">
				    	</div>
				    	<p><?php echo $_smarty_tpl->tpl_vars['post']->value->brief;?>
</p>
				    </div>
			    </div>
			<?php } ?>
		</div>
	</div>
	-->
	<!-- /News ticker -->
</div><?php }} ?>