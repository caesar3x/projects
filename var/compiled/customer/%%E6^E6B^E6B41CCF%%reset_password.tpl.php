<?php /* Smarty version 2.6.18, created on 2015-06-08 19:45:41
         compiled from buttons/reset_password.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'buttons/reset_password.tpl', 4, false),array('function', 'set_id', 'buttons/reset_password.tpl', 4, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('recover_password'));
?>
<?php ob_start(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('but_text' => fn_get_lang_var('recover_password', $this->getLanguage()),'but_onclick' => $this->_tpl_vars['but_onclick'],'but_href' => $this->_tpl_vars['but_href'],'but_target' => $this->_tpl_vars['but_target'],'but_role' => $this->_tpl_vars['but_role'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="buttons/reset_password.tpl" id="<?php echo smarty_function_set_id(array('name' => "buttons/reset_password.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>