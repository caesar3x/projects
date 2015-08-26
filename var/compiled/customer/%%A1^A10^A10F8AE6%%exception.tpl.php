<?php /* Smarty version 2.6.18, created on 2015-06-05 22:19:14
         compiled from exception.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', 'exception.tpl', 4, false),array('modifier', 'fn_url', 'exception.tpl', 37, false),array('modifier', 'defined', 'exception.tpl', 81, false),array('modifier', 'trim', 'exception.tpl', 95, false),array('function', 'set_id', 'exception.tpl', 95, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('access_denied','page_not_found','access_denied_text','page_not_found_text','go_back','go_to_the_homepage'));
?>
<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo smarty_modifier_lower(@CART_LANGUAGE); ?>
">
<head>
<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>

<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "meta.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link href="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/favicon.ico" rel="shortcut icon" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/styles.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/scripts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>

<body>
<div class="helper-container">
	<div id="container" class="container-long exception">
	<a name="top"></a>

	<div id="content" class="clear">
		<div class="central-column-long">
			<div class="central-content">

				<div class="exception-body">

				<h1><?php echo $this->_tpl_vars['exception_status']; ?>
</h1>

				<h2>
					<?php if ($this->_tpl_vars['exception_status'] == '403'): ?>
						<?php echo fn_get_lang_var('access_denied', $this->getLanguage()); ?>

					<?php elseif ($this->_tpl_vars['exception_status'] == '404'): ?>
						<?php echo fn_get_lang_var('page_not_found', $this->getLanguage()); ?>

					<?php endif; ?>
				</h2>

				<div class="exception-content">
					<?php if (@HTTPS === true): ?>
						<?php $this->assign('return_url', fn_url($this->_tpl_vars['config']['https_location']), false); ?>
					<?php else: ?>
						<?php $this->assign('return_url', fn_url($this->_tpl_vars['config']['http_location']), false); ?>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['exception_status'] == '403'): ?>
						<h3><?php echo fn_get_lang_var('access_denied_text', $this->getLanguage()); ?>
</h3>
					<?php elseif ($this->_tpl_vars['exception_status'] == '404'): ?>
						<h3><?php echo fn_get_lang_var('page_not_found_text', $this->getLanguage()); ?>
</h3>
					<?php endif; ?>
					
					<ul class="exception-menu">
						<li id="go_back"><a onclick="history.go(-1);"><?php echo fn_get_lang_var('go_back', $this->getLanguage()); ?>
</a></li>
						<li><a href="<?php echo $this->_tpl_vars['return_url']; ?>
"><?php echo fn_get_lang_var('go_to_the_homepage', $this->getLanguage()); ?>
</a></li>
					</ul>

					<script type="text/javascript">
					//<![CDATA[
					<?php echo '
					 jQuery.each(jQuery.browser, function(i, val) {
						if ((i == \'opera\') && (val == true)) {
							if (history.length == 0) {
								$(\'#go_back\').hide();
							}
						} else {
							if (history.length == 1) {
								$(\'#go_back\').hide();
							}
						}
					});
					'; ?>

					//]]>
					</script>
				</div>

					<div class="exception-logo">
						<a href="<?php echo $this->_tpl_vars['return_url']; ?>
"><img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/<?php echo $this->_tpl_vars['manifest']['Customer_logo']['filename']; ?>
" width="<?php echo $this->_tpl_vars['manifest']['Customer_logo']['width']; ?>
" height="<?php echo $this->_tpl_vars['manifest']['Customer_logo']['height']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['manifest']['Customer_logo']['alt']; ?>
" /></a>
					</div>

				</div>

			</div>
		</div>
	</div>

	<?php if (defined('TRANSLATION_MODE')): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/translate_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php if (defined('CUSTOMIZATION_MODE')): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/template_editor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php if (defined('CUSTOMIZATION_MODE') || defined('TRANSLATION_MODE')): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/design_mode_panel.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	</div>
</div>
</body>

</html>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="exception.tpl" id="<?php echo smarty_function_set_id(array('name' => "exception.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>