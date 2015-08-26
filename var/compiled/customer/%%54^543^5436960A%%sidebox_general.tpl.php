<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from blocks/wrappers/sidebox_general.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'blocks/wrappers/sidebox_general.tpl', 3, false),array('modifier', 'trim', 'blocks/wrappers/sidebox_general.tpl', 7, false),array('function', 'set_id', 'blocks/wrappers/sidebox_general.tpl', 7, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?>
<div class="<?php echo smarty_modifier_default(@$this->_tpl_vars['sidebox_wrapper'], "sidebox-wrapper"); ?>
 <?php if ($this->_tpl_vars['hide_wrapper']): ?>hidden cm-hidden-wrapper<?php endif; ?>">
	<h3 class="sidebox-title<?php if ($this->_tpl_vars['header_class']): ?> <?php echo $this->_tpl_vars['header_class']; ?>
<?php endif; ?>"><span><?php echo $this->_tpl_vars['title']; ?>
</span></h3>
	<div class="sidebox-body"><?php echo smarty_modifier_default(@$this->_tpl_vars['content'], "&nbsp;"); ?>
</div>
	<div class="sidebox-bottom"><span>&nbsp;</span></div>
</div><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/wrappers/sidebox_general.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/wrappers/sidebox_general.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>