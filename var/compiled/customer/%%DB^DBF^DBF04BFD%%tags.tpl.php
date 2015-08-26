<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:20
         compiled from addons/tags/blocks/product_tabs/tags.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'addons/tags/blocks/product_tabs/tags.tpl', 7, false),array('function', 'set_id', 'addons/tags/blocks/product_tabs/tags.tpl', 7, false),)), $this); ?>
<?php ob_start(); ?>
<?php if ($this->_tpl_vars['addons']['tags']['tags_for_products'] == 'Y'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/tags/views/tags/components/tags.tpl", 'smarty_include_vars' => array('object' => $this->_tpl_vars['product'],'object_id' => $this->_tpl_vars['product']['product_id'],'object_type' => 'P')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/tags/blocks/product_tabs/tags.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/tags/blocks/product_tabs/tags.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>