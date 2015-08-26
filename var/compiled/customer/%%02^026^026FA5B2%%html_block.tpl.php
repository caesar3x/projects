<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from blocks/html_block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'unescape', 'blocks/html_block.tpl', 5, false),array('modifier', 'trim', 'blocks/html_block.tpl', 6, false),array('function', 'set_id', 'blocks/html_block.tpl', 6, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?>
<div class="wysiwyg-content">
<?php echo smarty_modifier_unescape($this->_tpl_vars['items']['block_text']); ?>

</div><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/html_block.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/html_block.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>