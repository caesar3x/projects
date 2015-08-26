<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from buttons/go.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'buttons/go.tpl', 3, false),array('function', 'set_id', 'buttons/go.tpl', 3, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?><input type="image" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/go.gif" alt="<?php echo $this->_tpl_vars['alt']; ?>
" title="<?php echo $this->_tpl_vars['alt']; ?>
" class="go-button" />
<input type="hidden" name="dispatch" value="<?php echo $this->_tpl_vars['but_name']; ?>
" /><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="buttons/go.tpl" id="<?php echo smarty_function_set_id(array('name' => "buttons/go.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>