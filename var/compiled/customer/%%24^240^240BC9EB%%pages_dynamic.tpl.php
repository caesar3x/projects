<?php /* Smarty version 2.6.18, created on 2015-05-12 17:24:30
         compiled from blocks/pages_dynamic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'blocks/pages_dynamic.tpl', 9, false),array('function', 'set_id', 'blocks/pages_dynamic.tpl', 9, false),)), $this); ?>
<?php ob_start(); ?>
<?php if ($this->_tpl_vars['items']): ?>
<ul>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/pages/components/pages_tree.tpl", 'smarty_include_vars' => array('tree' => $this->_tpl_vars['items'],'root' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</ul>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/pages_dynamic.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/pages_dynamic.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>