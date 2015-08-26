<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:08
         compiled from addons/banners/pickers/banners_picker.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'addons/banners/pickers/banners_picker.tpl', 1, false),array('modifier', 'default', 'addons/banners/pickers/banners_picker.tpl', 1, false),array('modifier', 'implode', 'addons/banners/pickers/banners_picker.tpl', 11, false),array('modifier', 'fn_get_banner_name', 'addons/banners/pickers/banners_picker.tpl', 26, false),array('modifier', 'escape', 'addons/banners/pickers/banners_picker.tpl', 31, false),array('modifier', 'fn_check_view_permissions', 'addons/banners/pickers/banners_picker.tpl', 91, false),array('function', 'math', 'addons/banners/pickers/banners_picker.tpl', 3, false),array('function', 'script', 'addons/banners/pickers/banners_picker.tpl', 7, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('position_short','name','no_items','add_banners','remove_this_item','remove_this_item','add_banners'));
?>
<?php  ob_start();  ?>
<?php echo smarty_function_math(array('equation' => "rand()",'assign' => 'rnd'), $this);?>

<?php $this->assign('data_id', ($this->_tpl_vars['data_id'])."_".($this->_tpl_vars['rnd']), false); ?>
<?php $this->assign('view_mode', smarty_modifier_default(@$this->_tpl_vars['view_mode'], 'mixed'), false); ?>

<?php echo smarty_function_script(array('src' => "js/picker.js"), $this);?>


<?php if ($this->_tpl_vars['view_mode'] != 'button'): ?>
	<?php if (! $this->_tpl_vars['positions']): ?>
	<input id="b<?php echo $this->_tpl_vars['data_id']; ?>
_ids" type="hidden" name="<?php echo $this->_tpl_vars['input_name']; ?>
" value="<?php if ($this->_tpl_vars['item_ids']): ?><?php echo implode(",", $this->_tpl_vars['item_ids']); ?>
<?php endif; ?>" />
	<?php endif; ?>
	
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table">
	<tr>
		<?php if ($this->_tpl_vars['positions']): ?><th><?php echo fn_get_lang_var('position_short', $this->getLanguage()); ?>
</th><?php endif; ?>
		<th width="100%"><?php echo fn_get_lang_var('name', $this->getLanguage()); ?>
</th>
		<th>&nbsp;</th>
	</tr>
	<tbody id="<?php echo $this->_tpl_vars['data_id']; ?>
"<?php if (! $this->_tpl_vars['item_ids']): ?> class="hidden"<?php endif; ?>>
	<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('banner_id' => ($this->_tpl_vars['ldelim'])."banner_id".($this->_tpl_vars['rdelim']), 'holder' => $this->_tpl_vars['data_id'], 'input_name' => $this->_tpl_vars['input_name'], 'clone' => true, 'hide_link' => $this->_tpl_vars['hide_link'], 'hide_delete_button' => $this->_tpl_vars['hide_delete_button'], 'position_field' => $this->_tpl_vars['positions'], 'position' => '0', )); ?>

<?php if ($this->_tpl_vars['banner_id'] == '0'): ?>
	<?php $this->assign('banner', $this->_tpl_vars['default_name'], false); ?>
<?php else: ?>
	<?php $this->assign('banner', smarty_modifier_default(fn_get_banner_name($this->_tpl_vars['banner_id']), ($this->_tpl_vars['ldelim'])."banner".($this->_tpl_vars['rdelim'])), false); ?>
<?php endif; ?>

<tr <?php if (! $this->_tpl_vars['clone']): ?>id="<?php echo $this->_tpl_vars['holder']; ?>
_<?php echo $this->_tpl_vars['banner_id']; ?>
" <?php endif; ?>class="cm-js-item<?php if ($this->_tpl_vars['clone']): ?> cm-clone hidden<?php endif; ?>">
	<?php if ($this->_tpl_vars['position_field']): ?><td><input type="text" name="<?php echo $this->_tpl_vars['input_name']; ?>
[<?php echo $this->_tpl_vars['banner_id']; ?>
]" value="<?php echo smarty_function_math(array('equation' => "a*b",'a' => $this->_tpl_vars['position'],'b' => 10), $this);?>
" size="3" class="input-text-short" <?php if ($this->_tpl_vars['clone']): ?>disabled="disabled"<?php endif; ?> /></td><?php endif; ?>
	<td><a href="<?php echo fn_url("banners.update?banner_id=".($this->_tpl_vars['banner_id'])); ?>
"><?php echo smarty_modifier_escape($this->_tpl_vars['banner']); ?>
</a></td>
	<td><?php if (! $this->_tpl_vars['hide_delete_button'] && ! $this->_tpl_vars['view_only']): ?><a onclick="jQuery.delete_js_item('<?php echo $this->_tpl_vars['holder']; ?>
', '<?php echo $this->_tpl_vars['banner_id']; ?>
', 'b'); return false;"><img width="12" height="18" border="0" class="hand valign" alt="" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/icon_delete.gif"/></a><?php else: ?>&nbsp;<?php endif; ?></td>
</tr><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
	<?php if ($this->_tpl_vars['item_ids']): ?>
	<?php $_from = $this->_tpl_vars['item_ids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['items']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p_id']):
        $this->_foreach['items']['iteration']++;
?>
		<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('banner_id' => $this->_tpl_vars['p_id'], 'holder' => $this->_tpl_vars['data_id'], 'input_name' => $this->_tpl_vars['input_name'], 'hide_link' => $this->_tpl_vars['hide_link'], 'hide_delete_button' => $this->_tpl_vars['hide_delete_button'], 'first_item' => ($this->_foreach['items']['iteration'] <= 1), 'position_field' => $this->_tpl_vars['positions'], 'position' => $this->_foreach['items']['iteration'], )); ?>

<?php if ($this->_tpl_vars['banner_id'] == '0'): ?>
	<?php $this->assign('banner', $this->_tpl_vars['default_name'], false); ?>
<?php else: ?>
	<?php $this->assign('banner', smarty_modifier_default(fn_get_banner_name($this->_tpl_vars['banner_id']), ($this->_tpl_vars['ldelim'])."banner".($this->_tpl_vars['rdelim'])), false); ?>
<?php endif; ?>

<tr <?php if (! $this->_tpl_vars['clone']): ?>id="<?php echo $this->_tpl_vars['holder']; ?>
_<?php echo $this->_tpl_vars['banner_id']; ?>
" <?php endif; ?>class="cm-js-item<?php if ($this->_tpl_vars['clone']): ?> cm-clone hidden<?php endif; ?>">
	<?php if ($this->_tpl_vars['position_field']): ?><td><input type="text" name="<?php echo $this->_tpl_vars['input_name']; ?>
[<?php echo $this->_tpl_vars['banner_id']; ?>
]" value="<?php echo smarty_function_math(array('equation' => "a*b",'a' => $this->_tpl_vars['position'],'b' => 10), $this);?>
" size="3" class="input-text-short" <?php if ($this->_tpl_vars['clone']): ?>disabled="disabled"<?php endif; ?> /></td><?php endif; ?>
	<td><a href="<?php echo fn_url("banners.update?banner_id=".($this->_tpl_vars['banner_id'])); ?>
"><?php echo smarty_modifier_escape($this->_tpl_vars['banner']); ?>
</a></td>
	<td><?php if (! $this->_tpl_vars['hide_delete_button'] && ! $this->_tpl_vars['view_only']): ?><a onclick="jQuery.delete_js_item('<?php echo $this->_tpl_vars['holder']; ?>
', '<?php echo $this->_tpl_vars['banner_id']; ?>
', 'b'); return false;"><img width="12" height="18" border="0" class="hand valign" alt="" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/icon_delete.gif"/></a><?php else: ?>&nbsp;<?php endif; ?></td>
</tr><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	</tbody>
	<tbody id="<?php echo $this->_tpl_vars['data_id']; ?>
_no_item"<?php if ($this->_tpl_vars['item_ids']): ?> class="hidden"<?php endif; ?>>
	<tr class="no-items">
		<td colspan="<?php if ($this->_tpl_vars['positions']): ?>3<?php else: ?>2<?php endif; ?>"><p><?php echo smarty_modifier_default(@$this->_tpl_vars['no_item_text'], fn_get_lang_var('no_items', $this->getLanguage())); ?>
</p></td>
	</tr>
	</tbody>
	</table>
<?php endif; ?>

<?php if ($this->_tpl_vars['view_mode'] != 'list'): ?>

	<?php if ($this->_tpl_vars['extra_var']): ?>
		<?php $this->assign('extra_var', smarty_modifier_escape($this->_tpl_vars['extra_var'], 'url'), false); ?>
	<?php endif; ?>

	<?php if (! $this->_tpl_vars['no_container']): ?><div class="buttons-container"><?php endif; ?><?php if ($this->_tpl_vars['picker_view']): ?>[<?php endif; ?>
		<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('but_id' => "opener_picker_".($this->_tpl_vars['data_id']), 'but_href' => fn_url("banners.picker?display=".($this->_tpl_vars['display'])."&amp;picker_for=".($this->_tpl_vars['picker_for'])."&amp;extra=".($this->_tpl_vars['extra_var'])."&amp;checkbox_name=".($this->_tpl_vars['checkbox_name'])."&amp;aoc=".($this->_tpl_vars['aoc'])."&amp;data_id=".($this->_tpl_vars['data_id'])), 'but_text' => smarty_modifier_default(@$this->_tpl_vars['but_text'], fn_get_lang_var('add_banners', $this->getLanguage())), 'but_role' => 'add', 'but_rev' => "content_".($this->_tpl_vars['data_id']), 'but_meta' => "cm-dialog-opener", )); ?>

<?php if ($this->_tpl_vars['but_role'] == 'text'): ?>
	<?php $this->assign('class', "text-link", false); ?>
<?php elseif ($this->_tpl_vars['but_role'] == 'delete'): ?>
	<?php $this->assign('class', "text-button-delete", false); ?>
<?php elseif ($this->_tpl_vars['but_role'] == 'add'): ?>
	<?php $this->assign('class', "text-button text-button-add", false); ?>
<?php elseif ($this->_tpl_vars['but_role'] == 'delete_item'): ?>
	<?php $this->assign('class', "text-button-delete-item", false); ?>
<?php elseif ($this->_tpl_vars['but_role'] == 'edit'): ?>
	<?php $this->assign('class', "text-button-edit", false); ?>
<?php elseif ($this->_tpl_vars['but_role'] == 'tool'): ?>
	<?php $this->assign('class', "tool-link", false); ?>
<?php elseif ($this->_tpl_vars['but_role'] == 'link'): ?>
	<?php $this->assign('class', "text-button-link", false); ?>
<?php elseif ($this->_tpl_vars['but_role'] == 'simple'): ?>
	<?php $this->assign('class', "text-button-simple", false); ?>
<?php else: ?>
	<?php $this->assign('class', "", false); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['but_name']): ?><?php $this->assign('r', $this->_tpl_vars['but_name'], false); ?><?php else: ?><?php $this->assign('r', $this->_tpl_vars['but_href'], false); ?><?php endif; ?>
<?php $this->assign('method', smarty_modifier_default(@$this->_tpl_vars['method'], 'POST'), false); ?>
<?php if (fn_check_view_permissions($this->_tpl_vars['r'], $this->_tpl_vars['method'])): ?>

<?php if ($this->_tpl_vars['but_name'] || $this->_tpl_vars['but_role'] == 'submit' || $this->_tpl_vars['but_role'] == 'button_main' || $this->_tpl_vars['but_type'] || $this->_tpl_vars['but_role'] == 'big'): ?> 
	<span <?php if ($this->_tpl_vars['but_css']): ?>style="<?php echo $this->_tpl_vars['but_css']; ?>
"<?php endif; ?> class="submit-button<?php if ($this->_tpl_vars['but_role'] == 'big'): ?>-big<?php endif; ?><?php if ($this->_tpl_vars['but_role'] == 'button_main'): ?> cm-button-main<?php endif; ?> <?php echo $this->_tpl_vars['but_meta']; ?>
"><input <?php if ($this->_tpl_vars['but_id']): ?>id="<?php echo $this->_tpl_vars['but_id']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_meta']): ?>class="<?php echo $this->_tpl_vars['but_meta']; ?>
"<?php endif; ?> type="<?php echo smarty_modifier_default(@$this->_tpl_vars['but_type'], 'submit'); ?>
"<?php if ($this->_tpl_vars['but_name']): ?> name="<?php echo $this->_tpl_vars['but_name']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['but_onclick']): ?> onclick="<?php echo $this->_tpl_vars['but_onclick']; ?>
;<?php if (! $this->_tpl_vars['allow_href']): ?> return false;<?php endif; ?>"<?php endif; ?> value="<?php echo $this->_tpl_vars['but_text']; ?>
" <?php if ($this->_tpl_vars['tabindex']): ?>tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_rev']): ?> rev="<?php echo $this->_tpl_vars['but_rev']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_disabled']): ?>disabled="disabled"<?php endif; ?> /></span>

<?php elseif ($this->_tpl_vars['but_role'] && $this->_tpl_vars['but_role'] != 'submit' && $this->_tpl_vars['but_role'] != 'action' && $this->_tpl_vars['but_role'] != "advanced-search" && $this->_tpl_vars['but_role'] != 'button'): ?> 
	<a <?php if ($this->_tpl_vars['but_id']): ?>id="<?php echo $this->_tpl_vars['but_id']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['but_href']): ?> href="<?php echo fn_url($this->_tpl_vars['but_href']); ?>
"<?php endif; ?><?php if ($this->_tpl_vars['but_onclick']): ?> onclick="<?php echo $this->_tpl_vars['but_onclick']; ?>
;<?php if (! $this->_tpl_vars['allow_href']): ?> return false;<?php endif; ?>"<?php endif; ?><?php if ($this->_tpl_vars['but_target']): ?> target="<?php echo $this->_tpl_vars['but_target']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['but_rev']): ?> rev="<?php echo $this->_tpl_vars['but_rev']; ?>
"<?php endif; ?> class="<?php echo $this->_tpl_vars['class']; ?>
<?php if ($this->_tpl_vars['but_meta']): ?> <?php echo $this->_tpl_vars['but_meta']; ?>
<?php endif; ?>"><?php if ($this->_tpl_vars['but_role'] == 'delete_item'): ?><img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/icon_delete.gif" width="12" height="18" border="0" alt="<?php echo fn_get_lang_var('remove_this_item', $this->getLanguage()); ?>
" title="<?php echo fn_get_lang_var('remove_this_item', $this->getLanguage()); ?>
" class="valign" /><?php else: ?><?php echo $this->_tpl_vars['but_text']; ?>
<?php endif; ?></a>

<?php elseif ($this->_tpl_vars['but_role'] == 'action' || $this->_tpl_vars['but_role'] == "advanced-search"): ?> 
	<a <?php if ($this->_tpl_vars['but_id']): ?>id="<?php echo $this->_tpl_vars['but_id']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['but_href']): ?> href="<?php echo fn_url($this->_tpl_vars['but_href']); ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_onclick']): ?>onclick="<?php echo $this->_tpl_vars['but_onclick']; ?>
;<?php if (! $this->_tpl_vars['allow_href']): ?> return false;<?php endif; ?>"<?php endif; ?> <?php if ($this->_tpl_vars['but_target']): ?>target="<?php echo $this->_tpl_vars['but_target']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_rev']): ?> rev="<?php echo $this->_tpl_vars['but_rev']; ?>
"<?php endif; ?> class="button<?php if ($this->_tpl_vars['but_meta']): ?> <?php echo $this->_tpl_vars['but_meta']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['but_text']; ?>
<?php if ($this->_tpl_vars['but_role'] == 'action'): ?>&nbsp;<img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/but_arrow.gif" width="8" height="7" border="0" alt=""/><?php endif; ?></a>
	
<?php elseif ($this->_tpl_vars['but_role'] == 'button'): ?>
	<input <?php if ($this->_tpl_vars['but_id']): ?>id="<?php echo $this->_tpl_vars['but_id']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_meta']): ?>class="<?php echo $this->_tpl_vars['but_meta']; ?>
"<?php endif; ?> type="button" <?php if ($this->_tpl_vars['but_onclick']): ?>onclick="<?php echo $this->_tpl_vars['but_onclick']; ?>
;<?php if (! $this->_tpl_vars['allow_href']): ?> return false;<?php endif; ?>"<?php endif; ?> value="<?php echo $this->_tpl_vars['but_text']; ?>
" <?php if ($this->_tpl_vars['tabindex']): ?>tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_rev']): ?> rev="<?php echo $this->_tpl_vars['but_rev']; ?>
"<?php endif; ?> />

<?php elseif ($this->_tpl_vars['but_role'] == 'icon'): ?> 
	<a <?php if ($this->_tpl_vars['but_id']): ?>id="<?php echo $this->_tpl_vars['but_id']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['but_href']): ?> href="<?php echo fn_url($this->_tpl_vars['but_href']); ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_onclick']): ?>onclick="<?php echo $this->_tpl_vars['but_onclick']; ?>
;<?php if (! $this->_tpl_vars['allow_href']): ?> return false;<?php endif; ?>"<?php endif; ?> <?php if ($this->_tpl_vars['but_target']): ?>target="<?php echo $this->_tpl_vars['but_target']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['but_rev']): ?> rev="<?php echo $this->_tpl_vars['but_rev']; ?>
"<?php endif; ?> class="<?php if ($this->_tpl_vars['but_meta']): ?> <?php echo $this->_tpl_vars['but_meta']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['but_text']; ?>
</a>

<?php elseif (! $this->_tpl_vars['but_role']): ?> 
	<input <?php if ($this->_tpl_vars['but_id']): ?>id="<?php echo $this->_tpl_vars['but_id']; ?>
"<?php endif; ?> class="default-button<?php if ($this->_tpl_vars['but_meta']): ?> <?php echo $this->_tpl_vars['but_meta']; ?>
<?php endif; ?>" type="submit" onclick="<?php echo $this->_tpl_vars['but_onclick']; ?>
;<?php if (! $this->_tpl_vars['allow_href']): ?> return false;<?php endif; ?>" value="<?php echo $this->_tpl_vars['but_text']; ?>
" <?php if ($this->_tpl_vars['but_rev']): ?> rev="<?php echo $this->_tpl_vars['but_rev']; ?>
"<?php endif; ?> />
<?php endif; ?>

<?php endif; ?><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
	<?php if ($this->_tpl_vars['picker_view']): ?>]<?php endif; ?><?php if (! $this->_tpl_vars['no_container']): ?></div><?php endif; ?>

	<div class="hidden" id="content_<?php echo $this->_tpl_vars['data_id']; ?>
" title="<?php echo smarty_modifier_default(@$this->_tpl_vars['but_text'], fn_get_lang_var('add_banners', $this->getLanguage())); ?>
">
	</div>

<?php endif; ?><?php  ob_end_flush();  ?>