<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:09
         compiled from views/block_manager/specific_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'views/block_manager/specific_settings.tpl', 3, false),array('function', 'html_checkboxes', 'views/block_manager/specific_settings.tpl', 38, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('specific_settings'));
?>
<?php  ob_start();  ?>
<?php if ($this->_tpl_vars['spec_settings'] && ( ( count($this->_tpl_vars['spec_settings']) > 1 && $this->_tpl_vars['spec_settings']['settings'] ) || ( ! $this->_tpl_vars['spec_settings']['settings'] ) )): ?>
<div id="toggle_<?php echo $this->_tpl_vars['s_set_id']; ?>
">
<div class="specific-settings float-left" id="container_<?php echo $this->_tpl_vars['s_set_id']; ?>
">
<a id="sw_additional_<?php echo $this->_tpl_vars['s_set_id']; ?>
" class="cm-combo-on|off cm-combination"><?php echo fn_get_lang_var('specific_settings', $this->getLanguage()); ?>
</a>
<img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/section_collapsed.gif" width="7" height="9" border="0" alt="" id="on_additional_<?php echo $this->_tpl_vars['s_set_id']; ?>
" class="cm-combination" />
<img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/section_expanded.gif" width="7" height="9" border="0" alt="" id="off_additional_<?php echo $this->_tpl_vars['s_set_id']; ?>
" class="cm-combination hidden" />
</div>

<div class="hidden" id="additional_<?php echo $this->_tpl_vars['s_set_id']; ?>
">
<?php $_from = $this->_tpl_vars['spec_settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['set_name'] => $this->_tpl_vars['_option']):
?>
	<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('set_name' => $this->_tpl_vars['set_name'], 'option' => $this->_tpl_vars['_option'], 'block' => $this->_tpl_vars['block'], 'set_id' => $this->_tpl_vars['s_set_id'], )); ?><?php if ($this->_tpl_vars['option']['force_open']): ?>
<script type="text/javascript">
	$('#additional_<?php echo $this->_tpl_vars['set_id']; ?>
').show();
</script>
<?php endif; ?>
<div class="form-field">
<?php if (! $this->_tpl_vars['option']['hide_label']): ?>
	<label for="spec_<?php echo $this->_tpl_vars['set_name']; ?>
_<?php echo $this->_tpl_vars['set_id']; ?>
"<?php if ($this->_tpl_vars['option']['required']): ?> class="cm-required"<?php endif; ?>><?php if ($this->_tpl_vars['option']['option_name']): ?><?php echo fn_get_lang_var($this->_tpl_vars['option']['option_name'], $this->getLanguage()); ?>
<?php else: ?><?php echo fn_get_lang_var($this->_tpl_vars['set_name'], $this->getLanguage()); ?>
<?php endif; ?>:</label>
<?php endif; ?>

<?php if ($this->_tpl_vars['option']['type'] == 'checkbox'): ?>
	<input type="hidden" name="block[<?php echo $this->_tpl_vars['set_name']; ?>
]" value="N" />
	<input type="checkbox" class="checkbox" name="block[<?php echo $this->_tpl_vars['set_name']; ?>
]" value="Y" id="spec_<?php echo $this->_tpl_vars['set_name']; ?>
_<?php echo $this->_tpl_vars['set_id']; ?>
" <?php if ($this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']] && $this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']] == 'Y' || ! $this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']] && $this->_tpl_vars['option']['default_value'] == 'Y'): ?>checked="checked"<?php endif; ?> />

<?php elseif ($this->_tpl_vars['option']['type'] == 'selectbox'): ?>
	<select id="spec_<?php echo $this->_tpl_vars['set_name']; ?>
_<?php echo $this->_tpl_vars['set_id']; ?>
" name="block[<?php echo $this->_tpl_vars['set_name']; ?>
]">
	<?php $_from = $this->_tpl_vars['option']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<option value="<?php echo $this->_tpl_vars['k']; ?>
" <?php if ($this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']] && $this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']] == $this->_tpl_vars['k'] || ! $this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']] && $this->_tpl_vars['option']['default_value'] == $this->_tpl_vars['k']): ?>selected="selected"<?php endif; ?>><?php if ($this->_tpl_vars['option']['no_lang']): ?><?php echo $this->_tpl_vars['v']; ?>
<?php else: ?><?php echo fn_get_lang_var($this->_tpl_vars['v'], $this->getLanguage()); ?>
<?php endif; ?></option>
	<?php endforeach; endif; unset($_from); ?>
	</select>
<?php elseif ($this->_tpl_vars['option']['type'] == 'input' || $this->_tpl_vars['option']['type'] == 'input_long'): ?>
	<input id="spec_<?php echo $this->_tpl_vars['set_name']; ?>
_<?php echo $this->_tpl_vars['set_id']; ?>
" class="input-text<?php if ($this->_tpl_vars['option']['type'] == 'input_long'): ?>-long<?php endif; ?>" name="block[<?php echo $this->_tpl_vars['set_name']; ?>
]" value="<?php if ($this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']]): ?><?php echo $this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']]; ?>
<?php else: ?><?php echo $this->_tpl_vars['option']['default_value']; ?>
<?php endif; ?>" />

<?php elseif ($this->_tpl_vars['option']['type'] == 'multiple_checkboxes'): ?>

	<?php echo smarty_function_html_checkboxes(array('name' => "block[".($this->_tpl_vars['set_name'])."]",'options' => $this->_tpl_vars['option']['values'],'columns' => 4,'selected' => $this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']]), $this);?>

<?php elseif ($this->_tpl_vars['option']['type'] == 'text' || $this->_tpl_vars['option']['type'] == 'simple_text'): ?>
	<textarea id="spec_<?php echo $this->_tpl_vars['set_name']; ?>
_<?php echo $this->_tpl_vars['set_id']; ?>
" name="block[<?php echo $this->_tpl_vars['set_name']; ?>
]" cols="55" rows="8" class="<?php if ($this->_tpl_vars['option']['type'] == 'text'): ?>cm-wysiwyg<?php endif; ?> input-textarea-long"><?php echo $this->_tpl_vars['block']['properties'][$this->_tpl_vars['set_name']]; ?>
</textarea>
	<?php if ($this->_tpl_vars['option']['type'] == 'text'): ?>
		
		<!--processForm-->
	<?php endif; ?>
<?php endif; ?>
</div><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
<?php endforeach; endif; unset($_from); ?>
</div>
<!--toggle_<?php echo $this->_tpl_vars['s_set_id']; ?>
--></div>
<?php else: ?>
<div id="toggle_<?php echo $this->_tpl_vars['s_set_id']; ?>
"><!--toggle_<?php echo $this->_tpl_vars['s_set_id']; ?>
--></div>
<?php endif; ?>
<?php  ob_end_flush();  ?>