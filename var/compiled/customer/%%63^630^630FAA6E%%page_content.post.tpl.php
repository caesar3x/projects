<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:24
         compiled from addons/tags/hooks/pages/page_content.post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'addons/tags/hooks/pages/page_content.post.tpl', 7, false),array('function', 'set_id', 'addons/tags/hooks/pages/page_content.post.tpl', 7, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('tags'));
?>
<?php ob_start(); ?>
<?php if ($this->_tpl_vars['addons']['tags']['tags_for_pages'] == 'Y'): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/subheader.tpl", 'smarty_include_vars' => array('title' => fn_get_lang_var('tags', $this->getLanguage()))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/tags/views/tags/components/tags.tpl", 'smarty_include_vars' => array('object_type' => 'A','object_id' => $this->_tpl_vars['page']['page_id'],'object' => $this->_tpl_vars['page'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/tags/hooks/pages/page_content.post.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/tags/hooks/pages/page_content.post.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>