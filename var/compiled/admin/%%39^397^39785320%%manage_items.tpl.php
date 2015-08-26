<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:13
         compiled from views/block_manager/manage_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'views/block_manager/manage_items.tpl', 1, false),array('modifier', 'fn_url', 'views/block_manager/manage_items.tpl', 2, false),)), $this); ?>
<div id="content_edit_block_picker_<?php echo $this->_tpl_vars['block']['block_id']; ?>
">
<form action="<?php echo fn_url(""); ?>
" method="post" class="cm-form-highlight" name="block_<?php echo $this->_tpl_vars['location']; ?>
_<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
_update_form">
<input type="hidden" name="block_id" value="<?php echo $this->_tpl_vars['block']['block_id']; ?>
" />
<input type="hidden" name="block_location" value="<?php echo $this->_tpl_vars['block']['location']; ?>
" />
<input type="hidden" name="redirect_location" value="<?php echo $this->_tpl_vars['location']; ?>
" />
<input type="hidden" name="object_id" value="<?php echo $this->_tpl_vars['object_id']; ?>
" />
<input type="hidden" name="redirect_url" value="<?php echo $this->_tpl_vars['redir_url']; ?>
" />
<input type="hidden" name="is_manage" value="Y" />

<?php if ($this->_tpl_vars['block']['properties']['per_object']): ?>
	<fieldset>
		<textarea id="block_text_<?php echo $this->_tpl_vars['block']['block_id']; ?>
" name="block_items[block_data][block_text]" cols="65" rows="8" class="cm-wysiwyg input-textarea"><?php echo $this->_tpl_vars['block']['item_ids']['block_text']; ?>
</textarea>
	<fieldset>
<?php else: ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/pagination.tpl", 'smarty_include_vars' => array('save_current_page' => true,'disable_history' => true,'div_id' => "block_content_".($this->_tpl_vars['block']['block_id'])."_picker")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['block_settings']['dynamic'][$this->_tpl_vars['block']['properties']['list_object']]['picker_props']['picker'], 'smarty_include_vars' => array('data_id' => "added_".($this->_tpl_vars['location'])."_".($this->_tpl_vars['block']['block_id']),'input_name' => 'block_items','item_ids' => $this->_tpl_vars['block_items'],'no_js' => true,'positions' => true,'view_mode' => smarty_modifier_default(@$this->_tpl_vars['block_settings']['dynamic'][$this->_tpl_vars['block']['properties']['list_object']]['picker_props']['params']['view_mode'], 'list'),'params_array' => $this->_tpl_vars['block_settings']['dynamic'][$this->_tpl_vars['block']['properties']['list_object']]['picker_props']['params'],'start_pos' => $this->_tpl_vars['start_position'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/pagination.tpl", 'smarty_include_vars' => array('disable_history' => true,'div_id' => "block_content_".($this->_tpl_vars['block']['block_id'])."_picker")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<div class="buttons-container">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/save_cancel.tpl", 'smarty_include_vars' => array('but_name' => "dispatch[block_manager.add_items]",'cancel_action' => 'close')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</form>
<!--content_edit_block_picker_<?php echo $this->_tpl_vars['block']['block_id']; ?>
--></div>