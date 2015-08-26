<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:05
         compiled from blocks/categories_emenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'blocks/categories_emenu.tpl', 9, false),array('function', 'set_id', 'blocks/categories_emenu.tpl', 9, false),)), $this); ?>
<?php ob_start(); ?>
<div class="clear">
	<ul id="vmenu_<?php echo $this->_tpl_vars['block']['block_id']; ?>
" class="dropdown dropdown-vertical">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/categories/components/menu_items.tpl", 'smarty_include_vars' => array('items' => $this->_tpl_vars['items'],'separated' => true,'submenu' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</ul>
</div>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/categories_emenu.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/categories_emenu.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>