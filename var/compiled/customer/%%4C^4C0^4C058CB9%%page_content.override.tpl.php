<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:24
         compiled from addons/form_builder/hooks/pages/page_content.override.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'hook', 'addons/form_builder/hooks/pages/page_content.override.tpl', 6, false),array('modifier', 'unescape', 'addons/form_builder/hooks/pages/page_content.override.tpl', 8, false),array('modifier', 'default', 'addons/form_builder/hooks/pages/page_content.override.tpl', 12, false),array('modifier', 'fn_url', 'addons/form_builder/hooks/pages/page_content.override.tpl', 23, false),array('modifier', 'md5', 'addons/form_builder/hooks/pages/page_content.override.tpl', 40, false),array('modifier', 'fn_get_simple_countries', 'addons/form_builder/hooks/pages/page_content.override.tpl', 113, false),array('modifier', 'fn_get_all_states', 'addons/form_builder/hooks/pages/page_content.override.tpl', 122, false),array('modifier', 'trim', 'addons/form_builder/hooks/pages/page_content.override.tpl', 152, false),array('function', 'split', 'addons/form_builder/hooks/pages/page_content.override.tpl', 71, false),array('function', 'script', 'addons/form_builder/hooks/pages/page_content.override.tpl', 131, false),array('function', 'set_id', 'addons/form_builder/hooks/pages/page_content.override.tpl', 155, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('continue','text_mandatory_fields','select','confirm','select_country','select_state','submit'));
?>
<?php ob_start(); ?>
<?php if ($this->_tpl_vars['page']['page_type'] == @PAGE_TYPE_FORM): ?>
	<?php if ($this->_tpl_vars['_REQUEST']['sent'] == 'Y'): ?>

		<?php $this->_tag_stack[] = array('hook', array('name' => "pages:form_sent")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>		
		<?php $this->assign('form_submit_const', @FORM_SUBMIT, false); ?>
		<p><?php echo smarty_modifier_unescape($this->_tpl_vars['page']['form']['general'][$this->_tpl_vars['form_submit_const']]); ?>
</p>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

		<p class="center">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('but_text' => fn_get_lang_var('continue', $this->getLanguage()),'but_href' => smarty_modifier_default(@$this->_tpl_vars['continue_url'], @$this->_tpl_vars['index_script']),'but_role' => 'action')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</p>
	<?php else: ?>

	<?php echo fn_get_lang_var('text_mandatory_fields', $this->getLanguage()); ?>

	<p>&nbsp;</p>
	<?php echo smarty_modifier_unescape($this->_tpl_vars['page']['description']); ?>

	<p>&nbsp;</p>

	<?php ob_start(); ?>

	<form action="<?php echo fn_url(""); ?>
" method="post" name="forms_form" enctype="multipart/form-data">
	<input type="hidden" name="fake" value="1" />
	<input type="hidden" name="page_id" value="<?php echo $this->_tpl_vars['page']['page_id']; ?>
" />

	<?php $_from = $this->_tpl_vars['page']['form']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element_id'] => $this->_tpl_vars['element']):
?>


	<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_SEPARATOR): ?>
	<hr width="100%" />


	<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_HEADER): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/subheader.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['element']['description'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


	<?php elseif ($this->_tpl_vars['element']['element_type'] != @FORM_IP_ADDRESS && $this->_tpl_vars['element']['element_type'] != @FORM_REFERER): ?>
		<div class="form-field">
			<label for="<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_FILE): ?>type_<?php echo md5("fb_files[".($this->_tpl_vars['element']['element_id'])."]"); ?>
<?php else: ?>elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
<?php endif; ?>" class="<?php if ($this->_tpl_vars['element']['required'] == 'Y'): ?>cm-required<?php endif; ?><?php if ($this->_tpl_vars['element']['element_type'] == @FORM_EMAIL): ?> cm-email<?php endif; ?><?php if ($this->_tpl_vars['element']['element_type'] == @FORM_PHONE): ?> cm-phone<?php endif; ?><?php if ($this->_tpl_vars['element']['element_type'] == @FORM_EMAIL_CONFIRM): ?> cm-confirm-email<?php endif; ?> <?php if ($this->_tpl_vars['element']['element_type'] == @FORM_COUNTRIES): ?> cm-location-billing cm-country <?php endif; ?> <?php if ($this->_tpl_vars['element']['element_type'] == @FORM_STATES): ?> cm-location-billing cm-state <?php endif; ?> <?php if ($this->_tpl_vars['element']['element_type'] == @FORM_MULTIPLE_CB): ?>cm-multiple-checkboxes<?php endif; ?>"><?php echo $this->_tpl_vars['element']['description']; ?>
:</label>

			<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_SELECT): ?>
				<select id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]">
				<option label="" value="">- <?php echo fn_get_lang_var('select', $this->getLanguage()); ?>
 -</option>
				<?php $_from = $this->_tpl_vars['element']['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['var']):
?>
				<option value="<?php echo $this->_tpl_vars['var']['element_id']; ?>
" <?php if ($this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']] == $this->_tpl_vars['var']['element_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['var']['description']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_RADIO): ?>
				<?php $_from = $this->_tpl_vars['element']['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rd'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rd']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['var']):
        $this->_foreach['rd']['iteration']++;
?>
				<input class="radio" <?php if (( ! $this->_tpl_vars['form_values'] && $this->_foreach['rd']['iteration'] == 1 ) || ( $this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']] == $this->_tpl_vars['var']['element_id'] )): ?>checked="checked"<?php endif; ?> type="radio" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" value="<?php echo $this->_tpl_vars['var']['element_id']; ?>
" />&nbsp;<?php echo $this->_tpl_vars['var']['description']; ?>
&nbsp;&nbsp;
				<?php endforeach; endif; unset($_from); ?>
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_CHECKBOX): ?>
				<input type="hidden" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" value="N" />
				<input id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" class="checkbox" <?php if ($this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']] == 'Y'): ?>checked="checked"<?php endif; ?> type="checkbox" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" value="Y" />
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_MULTIPLE_SB): ?>
				<select id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
][]" multiple="multiple" >
				<?php $_from = $this->_tpl_vars['element']['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['var']):
?>
				<option value="<?php echo $this->_tpl_vars['var']['element_id']; ?>
" <?php if ($this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']] == $this->_tpl_vars['var']['element_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['var']['description']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_MULTIPLE_CB): ?>
				<?php echo smarty_function_split(array('data' => $this->_tpl_vars['element']['variants'],'size' => '4','assign' => 'splitted_variants'), $this);?>

				<table cellpadding="0" cellspacing="0" border="0">
				<?php $_from = $this->_tpl_vars['splitted_variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['variants']):
?>
				<tr>
					<?php $_from = $this->_tpl_vars['variants']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['var']):
?>
					<td>
						<?php if ($this->_tpl_vars['var']): ?><input class="form-checkbox" type="checkbox" <?php if ($this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']] == $this->_tpl_vars['var']['element_id']): ?>checked="checked"<?php endif; ?> id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
_<?php echo $this->_tpl_vars['var']['element_id']; ?>
" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
][]" value="<?php echo $this->_tpl_vars['var']['element_id']; ?>
" />&nbsp;<?php echo $this->_tpl_vars['var']['description']; ?>
&nbsp;&nbsp;&nbsp;<?php else: ?>&nbsp;<?php endif; ?>
					</td>
					<?php endforeach; endif; unset($_from); ?>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_INPUT): ?>
				<input id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" class="input-text" size="50" type="text" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" value="<?php echo $this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']]; ?>
" />
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_TEXTAREA): ?>
				<textarea id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" class="input-textarea" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" cols="67" rows="10"><?php echo $this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']]; ?>
</textarea>
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_DATE): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/calendar.tpl", 'smarty_include_vars' => array('date_name' => "form_values[".($this->_tpl_vars['element']['element_id'])."]",'date_id' => "elm_".($this->_tpl_vars['element']['element_id']),'date_val' => $this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_EMAIL || $this->_tpl_vars['element']['element_type'] == @FORM_NUMBER || $this->_tpl_vars['element']['element_type'] == @FORM_PHONE || $this->_tpl_vars['element']['element_type'] == @FORM_EMAIL_CONFIRM): ?>
				
				
				<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_EMAIL || $this->_tpl_vars['element']['element_type'] == @FORM_EMAIL_CONFIRM): ?>
				<input type="hidden" name="customer_email" value="<?php echo $this->_tpl_vars['element']['element_id']; ?>
" />
				<?php endif; ?>
				<input id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" class="input-text<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_EMAIL_CONFIRM): ?>-medium<?php endif; ?>" size="50" type="text" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" value="<?php echo $this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']]; ?>
" />
				
				<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_EMAIL_CONFIRM): ?>
				<?php echo fn_get_lang_var('confirm', $this->getLanguage()); ?>
: <input id="confirm_elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" class="input-text-medium" type="text" name="" value="" />
				<?php endif; ?>
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_COUNTRIES): ?>
				<select id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" class="cm-location-billing">
					<option value="">- <?php echo fn_get_lang_var('select_country', $this->getLanguage()); ?>
 -</option>
					<?php $this->assign('countries', fn_get_simple_countries(1), false); ?>
					<?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ccode'] => $this->_tpl_vars['country']):
?>
					<option value="<?php echo $this->_tpl_vars['ccode']; ?>
" <?php if (( $this->_tpl_vars['form_values'][$this->_tpl_vars['elm_id']] && $this->_tpl_vars['form_values'][$this->_tpl_vars['elm_id']] == $this->_tpl_vars['ccode'] ) || ( ! $this->_tpl_vars['form_values'] && $this->_tpl_vars['ccode'] == $this->_tpl_vars['settings']['General']['default_country'] )): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['country']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				
				
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_STATES): ?>

				<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/profiles/components/profiles_scripts.tpl", 'smarty_include_vars' => array('states' => fn_get_all_states(@CART_LANGUAGE, false, true))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

				<select id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]">
					<option label="" value="">- <?php echo fn_get_lang_var('select_state', $this->getLanguage()); ?>
 -</option>
				</select>
				<input type="text" class="input-text hidden" id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
_d" name="form_values[<?php echo $this->_tpl_vars['element']['element_id']; ?>
]" size="32" maxlength="64" value="<?php echo $this->_tpl_vars['form_values'][$this->_tpl_vars['elm_id']]; ?>
" disabled="disabled" />
				<input type="hidden" id="elm_<?php echo $this->_tpl_vars['element']['element_id']; ?>
_default" value="<?php echo $this->_tpl_vars['form_values'][$this->_tpl_vars['elm_id']]; ?>
" />
			
			<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_FILE): ?>
				<?php echo smarty_function_script(array('src' => "js/fileuploader_scripts.js"), $this);?>

				<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/fileuploader.tpl", 'smarty_include_vars' => array('var_name' => "fb_files[".($this->_tpl_vars['element']['element_id'])."]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>

			<?php $this->_tag_stack[] = array('hook', array('name' => "pages:form_elements")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		</div>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['settings']['Image_verification']['use_for_form_builder'] == 'Y'): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image_verification.tpl", 'smarty_include_vars' => array('id' => "forms_".($this->_tpl_vars['page']['page_id']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>

	<div class="buttons-container">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('but_role' => 'submit','but_text' => fn_get_lang_var('submit', $this->getLanguage()),'but_name' => "dispatch[pages.send_form]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>

	</form>

	<?php $this->_smarty_vars['capture']['group'] = ob_get_contents(); ob_end_clean(); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/group.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['group'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php if ($this->_tpl_vars['addons']['polls']['status'] == 'A'): ?><?php ob_start(); $this->_in_capture[] = 'ec900a4e059a0f93ab44a359c4d137c9';
$_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/polls/hooks/pages/page_content.override.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->_tpl_vars['addon_content'] = ob_get_contents(); ob_end_clean(); array_pop($this->_in_capture); if (!empty($this->_scripts['ec900a4e059a0f93ab44a359c4d137c9'])) { echo implode("\n", $this->_scripts['ec900a4e059a0f93ab44a359c4d137c9']); unset($this->_scripts['ec900a4e059a0f93ab44a359c4d137c9']); }
 ?><?php else: ?><?php $this->assign('addon_content', "", false); ?><?php endif; ?><?php if (trim($this->_tpl_vars['addon_content'])): ?><?php echo $this->_tpl_vars['addon_content']; ?>
<?php else: ?><?php $this->_tag_stack[] = array('hook', array('name' => "pages:page_content")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['addons']['tags']['status'] == 'A'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/tags/hooks/pages/page_content.post.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/form_builder/hooks/pages/page_content.override.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/form_builder/hooks/pages/page_content.override.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>