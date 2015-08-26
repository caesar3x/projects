<?php /* Smarty version 2.6.18, created on 2015-06-08 19:45:41
         compiled from views/auth/recover_password.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'views/auth/recover_password.tpl', 4, false),array('modifier', 'trim', 'views/auth/recover_password.tpl', 20, false),array('function', 'set_id', 'views/auth/recover_password.tpl', 20, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('text_recover_password_notice','email','recover_password'));
?>
<?php ob_start(); ?>
<div class="login">
<form name="recoverfrm" action="<?php echo fn_url(""); ?>
" method="post">

<p><?php echo fn_get_lang_var('text_recover_password_notice', $this->getLanguage()); ?>
</p>
<div class="center">
	<div class="recover-password">
		<label class="strong cm-trim" for="login_id"><?php echo fn_get_lang_var('email', $this->getLanguage()); ?>
:</label>
		<p class="break"><input type="text" id="login_id" name="user_email" size="30" value="" class="input-text cm-focus" /></p>
	</div>
	
	<div class="buttons-container">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/reset_password.tpl", 'smarty_include_vars' => array('but_name' => "dispatch[auth.recover_password]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
</div>
</form>
</div>

<?php ob_start(); ?><?php echo fn_get_lang_var('recover_password', $this->getLanguage()); ?>
<?php $this->_smarty_vars['capture']['mainbox_title'] = ob_get_contents(); ob_end_clean(); ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="views/auth/recover_password.tpl" id="<?php echo smarty_function_set_id(array('name' => "views/auth/recover_password.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>