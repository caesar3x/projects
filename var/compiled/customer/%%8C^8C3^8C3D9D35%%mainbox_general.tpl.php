<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from blocks/wrappers/mainbox_general.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'blocks/wrappers/mainbox_general.tpl', 11, false),array('function', 'set_id', 'blocks/wrappers/mainbox_general.tpl', 11, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?><?php if ($this->_tpl_vars['anchor']): ?>
<a name="<?php echo $this->_tpl_vars['anchor']; ?>
"></a>
<?php endif; ?>
<div class="mainbox-container<?php if ($this->_tpl_vars['details_page']): ?> details-page<?php endif; ?>">
	<?php if ($this->_tpl_vars['title']): ?>
	<h1 class="mainbox-title"><span><?php echo $this->_tpl_vars['title']; ?>
</span></h1>
	<?php endif; ?>
	<div class="mainbox-body"><?php echo $this->_tpl_vars['content']; ?>
</div>
</div>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/wrappers/mainbox_general.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/wrappers/mainbox_general.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>