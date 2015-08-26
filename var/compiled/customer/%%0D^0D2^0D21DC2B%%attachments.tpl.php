<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:20
         compiled from addons/attachments/blocks/product_tabs/attachments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'formatfilesize', 'addons/attachments/blocks/product_tabs/attachments.tpl', 8, false),array('modifier', 'fn_url', 'addons/attachments/blocks/product_tabs/attachments.tpl', 8, false),array('modifier', 'trim', 'addons/attachments/blocks/product_tabs/attachments.tpl', 12, false),array('function', 'set_id', 'addons/attachments/blocks/product_tabs/attachments.tpl', 12, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('download'));
?>
<?php  ob_start();  ?><?php ob_start(); ?>
<?php if ($this->_tpl_vars['attachments_data']): ?>
<div id="content_attachments">
<?php $_from = $this->_tpl_vars['attachments_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
<p>
<?php echo $this->_tpl_vars['file']['description']; ?>
 (<?php echo $this->_tpl_vars['file']['filename']; ?>
, <?php echo smarty_modifier_formatfilesize($this->_tpl_vars['file']['filesize']); ?>
) [<a href="<?php echo fn_url("attachments.getfile?attachment_id=".($this->_tpl_vars['file']['attachment_id'])); ?>
"><?php echo fn_get_lang_var('download', $this->getLanguage()); ?>
</a>]
</p>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/attachments/blocks/product_tabs/attachments.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/attachments/blocks/product_tabs/attachments.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>