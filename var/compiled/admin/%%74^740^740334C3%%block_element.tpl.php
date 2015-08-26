<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:08
         compiled from views/block_manager/components/block_element.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'views/block_manager/components/block_element.tpl', 13, false),array('modifier', 'default', 'views/block_manager/components/block_element.tpl', 29, false),array('modifier', 'fn_check_static_location', 'views/block_manager/components/block_element.tpl', 52, false),array('modifier', 'fn_check_view_permissions', 'views/block_manager/components/block_element.tpl', 82, false),array('modifier', 'replace', 'views/block_manager/components/block_element.tpl', 109, false),array('modifier', 'strpos', 'views/block_manager/components/block_element.tpl', 326, false),array('modifier', 'escape', 'views/block_manager/components/block_element.tpl', 331, false),array('modifier', 'lower', 'views/block_manager/components/block_element.tpl', 336, false),array('modifier', 'is_array', 'views/block_manager/components/block_element.tpl', 340, false),array('modifier', 'yaml_unserialize', 'views/block_manager/components/block_element.tpl', 341, false),array('modifier', 'truncate', 'views/block_manager/components/block_element.tpl', 343, false),array('modifier', 'trim', 'views/block_manager/components/block_element.tpl', 405, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('delete','delete','content','filling','appearance','wrapper','enable_for_this_page','items_in_block','remove_this_item','remove_this_item','editing_block','manage_products','text_switch_to_details_page','assigned_to_objects','assigned_to_objects','assign_to_all','remove_this_item','remove_this_item','remove_from_all','remove_this_item','remove_this_item','remove_this_item','remove_this_item','edit','remove_this_item','remove_this_item','editing_block','active','disabled','active','disabled','hidden','pending','new','active','disabled','hidden','pending','notify_customer','notify_orders_department','notify_vendor','notify_supplier','active','disabled','hidden','pending','new','active','disabled','hidden','pending','notify_customer','notify_orders_department','notify_vendor','notify_supplier','editing_block'));
?>
<?php if ($this->_tpl_vars['block_data'] && ! $this->_tpl_vars['block_data']['disabled']): ?>

<?php $this->assign('editable', true, false); ?>
<?php if ($this->_tpl_vars['simple'] && ( $this->_tpl_vars['show_for_location'] && $this->_tpl_vars['block_data']['location'] != $this->_tpl_vars['show_for_location'] )): ?>
	<?php $this->assign('editable', false, false); ?>
<?php endif; ?>

<div class="cm-list-box<?php if ($this->_tpl_vars['block_data']['properties']['static_block']): ?> cm-tabs-block<?php endif; ?> base-block">
	<input type="hidden" name="block_positions[]" class="block-position" value="<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" />

	<?php echo ''; ?><?php if ($this->_tpl_vars['editable'] && ( $this->_tpl_vars['location'] == 'all_pages' || $this->_tpl_vars['block_data']['location'] != 'all_pages' ) && ! $this->_tpl_vars['block_data']['properties']['static_block']): ?><?php echo '<div><a class="float-right cm-confirm delete-block" href="'; ?><?php echo fn_url("block_manager.delete?selected_section=".($this->_tpl_vars['location'])."&amp;block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;redirect_url=".($this->_tpl_vars['redirect_url'])); ?><?php echo '"><img src="'; ?><?php echo $this->_tpl_vars['images_dir']; ?><?php echo '/icons/icon_delete.gif" width="12" height="18" border="0" title="'; ?><?php echo fn_get_lang_var('delete', $this->getLanguage()); ?><?php echo '" alt="'; ?><?php echo fn_get_lang_var('delete', $this->getLanguage()); ?><?php echo '" /></a></div>'; ?><?php endif; ?><?php echo '<h4 '; ?><?php if ($this->_tpl_vars['show_for_location'] && $this->_tpl_vars['block_data']['location'] != $this->_tpl_vars['show_for_location']): ?><?php echo 'class="cm-fixed-block"'; ?><?php endif; ?><?php echo '><span>'; ?><?php $this->assign('block_content_id', "block_content_".($this->_tpl_vars['block_data']['block_id']), false); ?><?php echo ''; ?><?php if ($this->_tpl_vars['editable'] && ! $this->_tpl_vars['block_data']['properties']['static_block']): ?><?php echo '<img src="'; ?><?php echo $this->_tpl_vars['images_dir']; ?><?php echo '/icons/icon_show.gif" width="13" height="13" border="0" alt="" id="on_'; ?><?php echo $this->_tpl_vars['block_content_id']; ?><?php echo '" class="cm-combination cm-save-state'; ?><?php if ($_COOKIE[$this->_tpl_vars['block_content_id']]): ?><?php echo ' hidden'; ?><?php endif; ?><?php echo '" /><img src="'; ?><?php echo $this->_tpl_vars['images_dir']; ?><?php echo '/icons/icon_hide.gif" width="13" height="13" border="0" alt="" id="off_'; ?><?php echo $this->_tpl_vars['block_content_id']; ?><?php echo '" class="cm-combination cm-save-state'; ?><?php if (! $_COOKIE[$this->_tpl_vars['block_content_id']]): ?><?php echo ' hidden'; ?><?php endif; ?><?php echo '" />'; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['block_data']['description']; ?><?php echo '</span></h4>'; ?>


	<div id="<?php echo $this->_tpl_vars['block_content_id']; ?>
" class="block-container clear<?php if (! $_COOKIE[$this->_tpl_vars['block_content_id']]): ?> hidden<?php endif; ?>">
		<div class="block-content">
		<?php if (! $this->_tpl_vars['block_data']['properties']['static_block']): ?>
			<?php if ($this->_tpl_vars['block_data']['properties']['list_object']): ?>
				<p><label><?php echo fn_get_lang_var('content', $this->getLanguage()); ?>
:</label>
				<span class="lowercase"><?php echo smarty_modifier_default(@$this->_tpl_vars['block_data']['properties']['content_name'], @$this->_tpl_vars['block_data']['properties']['list_object']); ?>
</span></p>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['block_data']['properties']['fillings']): ?>
				<p><label><?php echo fn_get_lang_var('filling', $this->getLanguage()); ?>
:</label>
				<?php echo $this->_tpl_vars['block_data']['properties']['fillings']; ?>
</p>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['block_data']['properties']['appearances']): ?>
				<p><label><?php echo fn_get_lang_var('appearance', $this->getLanguage()); ?>
:</label>
				<?php echo $this->_tpl_vars['block_data']['properties']['appearances']; ?>
</p>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['block_data']['properties']['wrapper']): ?>
				<p><label><?php echo fn_get_lang_var('wrapper', $this->getLanguage()); ?>
:</label>
				<?php echo $this->_tpl_vars['block_data']['properties']['wrapper']; ?>
</p>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['simple'] && $this->_tpl_vars['editable']): ?>
			<p><label for="enable_block_<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
"><?php echo fn_get_lang_var('enable_for_this_page', $this->getLanguage()); ?>
:</label>
			<input id="enable_block_<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" type="checkbox" name="enable_block_<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" value="Y" <?php if ($this->_tpl_vars['block_data']['assigned'] == 'Y'): ?>checked="checked"<?php endif; ?> onclick="jQuery.ajaxRequest('<?php echo fn_url("block_manager.enable_disable?location=".($this->_tpl_vars['location'])."&amp;object_id=".($this->_tpl_vars['object_id'])."&amp;block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;enable=", 'A', 'rel', '&'); ?>
' + (this.checked ? this.value : 'N'), <?php echo '{method: \'POST\', cache: false}'; ?>
);" /></p>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['block_data']['properties']['fillings'] == 'manually' && ( ( fn_check_static_location($this->_tpl_vars['block_data']['location']) && $this->_tpl_vars['editable'] ) || ( ! fn_check_static_location($this->_tpl_vars['block_data']['location']) && $this->_tpl_vars['editable'] && $this->_tpl_vars['simple'] ) )): ?>
				<div class="info-line">
					<div class="float-right">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['block_settings']['dynamic'][$this->_tpl_vars['block_data']['properties']['list_object']]['picker_props']['picker'], 'smarty_include_vars' => array('data_id' => ($this->_tpl_vars['block_data']['block_id']).($this->_tpl_vars['block_data']['block_type'])."_".($this->_tpl_vars['block_data']['location']),'checkbox_name' => 'block_items','extra_var' => "dispatch=block_manager.add_items&object_id=".($this->_tpl_vars['object_id'])."&block_id=".($this->_tpl_vars['block_data']['block_id'])."&block_location=".($this->_tpl_vars['block_data']['location'])."&redirect_location=".($this->_tpl_vars['location'])."&redirect_url=".($this->_tpl_vars['redirect_url']),'no_container' => true,'view_mode' => 'button','params_array' => $this->_tpl_vars['block_settings']['dynamic'][$this->_tpl_vars['block_data']['properties']['list_object']]['picker_props']['params'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					<?php echo fn_get_lang_var('items_in_block', $this->getLanguage()); ?>
:&nbsp;
					<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('but_text' => "&nbsp;&nbsp;".($this->_tpl_vars['block_data']['items_count'])."&nbsp;", 'but_href' => "block_manager.manage_items?block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;object_id=".($this->_tpl_vars['object_id'])."&amp;location=".($this->_tpl_vars['location'])."&amp;redir_url=".($this->_tpl_vars['redirect_url']), 'but_role' => 'link', 'but_meta' => "text-button cm-dialog-opener", 'but_rev' => "content_edit_block_picker_".($this->_tpl_vars['block_data']['block_id']), )); ?>

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
					<div class="hidden" id="content_edit_block_picker_<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" title="<?php echo fn_get_lang_var('editing_block', $this->getLanguage()); ?>
">
					</div>
				</div>
			<?php elseif (! $this->_tpl_vars['simple'] && ! fn_check_static_location($this->_tpl_vars['block_data']['location'])): ?>
				<div class="info-line">
					<?php $this->assign('but_text', smarty_modifier_replace(fn_get_lang_var('manage_products', $this->getLanguage()), 'products', $this->_tpl_vars['block_data']['location']), false); ?>
					<?php echo smarty_modifier_replace(fn_get_lang_var('text_switch_to_details_page', $this->getLanguage()), "[product]", $this->_tpl_vars['block_data']['location']); ?>
.
					<p>
					<?php if ($this->_tpl_vars['block_data']['assigned_to']): ?>
						<a href="<?php echo fn_url(($this->_tpl_vars['block_data']['location']).".manage?b_id=".($this->_tpl_vars['block_data']['block_id'])); ?>
"><?php echo smarty_modifier_replace(fn_get_lang_var('assigned_to_objects', $this->getLanguage()), "[objects]", $this->_tpl_vars['block_data']['assigned_to']); ?>
</a>
					<?php else: ?>
						<?php echo smarty_modifier_replace(fn_get_lang_var('assigned_to_objects', $this->getLanguage()), "[objects]", $this->_tpl_vars['block_data']['assigned_to']); ?>

					<?php endif; ?>
					</p>
					<p class="right">
						<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('but_text' => fn_get_lang_var('assign_to_all', $this->getLanguage()), 'but_href' => "block_manager.bulk_actions.assign_to_all?block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;selected_section=".($this->_tpl_vars['_REQUEST']['selected_section']), 'but_role' => 'simple', )); ?>

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

<?php endif; ?><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>&nbsp;/<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('but_text' => fn_get_lang_var('remove_from_all', $this->getLanguage()), 'but_href' => "block_manager.bulk_actions.remove_from_all?block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;selected_section=".($this->_tpl_vars['_REQUEST']['selected_section']), 'but_role' => 'simple', )); ?>

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
					</p>
					<p class="right"><?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('but_text' => $this->_tpl_vars['but_text'], 'but_href' => ($this->_tpl_vars['block_data']['location']).".manage", 'but_role' => 'simple', )); ?>

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

<?php endif; ?><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?></p>
				</div>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['block_data']['properties']['fillings'] == 'manually' && $this->_tpl_vars['block_settings']['dynamic'][$this->_tpl_vars['block_data']['properties']['list_object']]['picker_props']['picker'] || $this->_tpl_vars['block_data']['properties']['per_object']): ?>
				<?php if ($this->_tpl_vars['block_data']['properties']['per_object'] && $this->_tpl_vars['simple']): ?>
					<div class="info-line">
						<?php $this->assign('info_line_button_text', fn_get_lang_var('edit', $this->getLanguage()), false); ?>
						<?php $this->assign('additional_url_params', "&product_id=".($this->_tpl_vars['object_id']), false); ?>
						<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('but_text' => $this->_tpl_vars['info_line_button_text'], 'but_href' => "block_manager.manage_items?block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;location=".($this->_tpl_vars['location'])."&object_id=".($this->_tpl_vars['object_id'])."&redir_url=".($this->_tpl_vars['redirect_url']).($this->_tpl_vars['additional_url_params']), 'but_role' => 'link', 'but_meta' => "text-button cm-dialog-opener", 'but_rev' => "content_edit_block_picker_".($this->_tpl_vars['block_data']['block_id']), )); ?>

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
						<div class="hidden" id="content_edit_block_picker_<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" title="<?php echo fn_get_lang_var('editing_block', $this->getLanguage()); ?>
"></div>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if (! $this->_tpl_vars['simple']): ?>
			<div class="break">
				<div class="float-right">
				<?php if ($this->_tpl_vars['block_data']['location'] == 'all_pages' && $this->_tpl_vars['_REQUEST']['selected_section'] && $this->_tpl_vars['_REQUEST']['selected_section'] != 'all_pages'): ?>
					<?php if ($this->_tpl_vars['block_data']['status'] == 'A'): ?>
						<?php $this->assign('_block_id', $this->_tpl_vars['block_data']['block_id'], false); ?>
					<?php else: ?>
						<?php $this->assign('_block_id', 0, false); ?>
					<?php endif; ?>

					<?php if (strpos($this->_tpl_vars['block_data']['disabled_locations'], $this->_tpl_vars['_REQUEST']['selected_section']) === false && $this->_tpl_vars['block_data']['status'] == 'A'): ?>
						<?php $this->assign('status', 'A', false); ?>
					<?php else: ?>
						<?php $this->assign('status', 'D', false); ?>
					<?php endif; ?>
					<?php $this->assign('lang_active', smarty_modifier_escape(fn_get_lang_var('active', $this->getLanguage()), 'dquotes'), false); ?>
					<?php $this->assign('lang_disabled', smarty_modifier_escape(fn_get_lang_var('disabled', $this->getLanguage()), 'dquotes'), false); ?>
					<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('id' => $this->_tpl_vars['_block_id'], 'status' => $this->_tpl_vars['status'], 'object_id_name' => 'block_id', 'table' => 'blocks', 'update_controller' => 'block_manager', 'items_status' => "A: \"".($this->_tpl_vars['lang_active'])."\", D: \"".($this->_tpl_vars['lang_disabled'])."\"", 'extra' => "&amp;selected_location=".($this->_tpl_vars['_REQUEST']['selected_section'])."&amp;block_location=".($this->_tpl_vars['block_data']['location']), )); ?><?php $this->assign('prefix', smarty_modifier_default(@$this->_tpl_vars['prefix'], 'select'), false); ?>
<div class="select-popup-container <?php echo $this->_tpl_vars['popup_additional_class']; ?>
">
	<?php if (! $this->_tpl_vars['hide_for_vendor']): ?>
	<div <?php if ($this->_tpl_vars['id']): ?>id="sw_<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_wrap"<?php endif; ?> class="selected-status status-<?php if ($this->_tpl_vars['suffix']): ?><?php echo $this->_tpl_vars['suffix']; ?>
-<?php endif; ?><?php echo smarty_modifier_lower($this->_tpl_vars['status']); ?>
<?php if ($this->_tpl_vars['id']): ?> cm-combo-on cm-combination<?php endif; ?>">
		<a <?php if ($this->_tpl_vars['id']): ?>class="cm-combo-on<?php if (! $this->_tpl_vars['popup_disabled']): ?> cm-combination<?php endif; ?>"<?php endif; ?>>
	<?php endif; ?>
		<?php if ($this->_tpl_vars['items_status']): ?>
			<?php if (! is_array($this->_tpl_vars['items_status'])): ?>
				<?php $this->assign('items_status', smarty_modifier_yaml_unserialize($this->_tpl_vars['items_status']), false); ?>
			<?php endif; ?>
			<?php echo smarty_modifier_truncate($this->_tpl_vars['items_status'][$this->_tpl_vars['status']], 12, ".."); ?>

		<?php else: ?>
			<?php if ($this->_tpl_vars['status'] == 'A'): ?>
				<?php echo fn_get_lang_var('active', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'D'): ?>
				<?php echo fn_get_lang_var('disabled', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'H'): ?>
				<?php echo fn_get_lang_var('hidden', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'P'): ?>
				<?php echo fn_get_lang_var('pending', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'N'): ?>
				<?php echo fn_get_lang_var('new', $this->getLanguage()); ?>

			<?php endif; ?>
		<?php endif; ?>
	<?php if (! $this->_tpl_vars['hide_for_vendor']): ?>
		</a>
	</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['id'] && ! $this->_tpl_vars['hide_for_vendor']): ?>
		<?php $this->assign('_update_controller', smarty_modifier_default(@$this->_tpl_vars['update_controller'], 'tools'), false); ?>
		<?php if ($this->_tpl_vars['table'] && $this->_tpl_vars['object_id_name']): ?><?php ob_start(); ?>&amp;table=<?php echo $this->_tpl_vars['table']; ?>
&amp;id_name=<?php echo $this->_tpl_vars['object_id_name']; ?>
<?php $this->_smarty_vars['capture']['_extra'] = ob_get_contents(); ob_end_clean(); ?><?php endif; ?>
		<div id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_wrap" class="popup-tools cm-popup-box cm-smart-position hidden">
			<div class="status-scroll-y">
			<ul class="cm-select-list">
			<?php if ($this->_tpl_vars['items_status']): ?>
				<?php $_from = $this->_tpl_vars['items_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['st'] => $this->_tpl_vars['val']):
?>
				<li><a class="status-link-<?php echo smarty_modifier_lower($this->_tpl_vars['st']); ?>
 <?php if ($this->_tpl_vars['status'] == $this->_tpl_vars['st']): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;status=".($this->_tpl_vars['st']).($this->_smarty_vars['capture']['_extra']).($this->_tpl_vars['extra'])); ?>
" onclick="return fn_check_object_status(this, '<?php echo smarty_modifier_lower($this->_tpl_vars['st']); ?>
');" name="update_object_status_callback"><?php echo $this->_tpl_vars['val']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<li><a class="status-link-a <?php if ($this->_tpl_vars['status'] == 'A'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=A"); ?>
" onclick="return fn_check_object_status(this, 'a');" name="update_object_status_callback"><?php echo fn_get_lang_var('active', $this->getLanguage()); ?>
</a></li>
				<li><a class="status-link-d <?php if ($this->_tpl_vars['status'] == 'D'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=D"); ?>
" onclick="return fn_check_object_status(this, 'd');" name="update_object_status_callback"><?php echo fn_get_lang_var('disabled', $this->getLanguage()); ?>
</a></li>
				<?php if ($this->_tpl_vars['hidden']): ?>
				<li><a class="status-link-h <?php if ($this->_tpl_vars['status'] == 'H'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=H"); ?>
" onclick="return fn_check_object_status(this, 'h');" name="update_object_status_callback"><?php echo fn_get_lang_var('hidden', $this->getLanguage()); ?>
</a></li>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['status'] == 'N'): ?>
				<li><a class="status-link-p <?php if ($this->_tpl_vars['status'] == 'P'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=P"); ?>
" onclick="return fn_check_object_status(this, 'p');" name="update_object_status_callback"><?php echo fn_get_lang_var('pending', $this->getLanguage()); ?>
</a></li>
				<?php endif; ?>
			<?php endif; ?>
			</ul>
			</div>
			<?php ob_start(); ?>
			<?php if ($this->_tpl_vars['notify']): ?>
				<li class="select-field">
					<input type="checkbox" name="__notify_user" id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify" value="Y" class="checkbox" checked="checked" onclick="$('input[name=__notify_user]').attr('checked', this.checked);" />
					<label for="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify"><?php echo smarty_modifier_default(@$this->_tpl_vars['notify_text'], fn_get_lang_var('notify_customer', $this->getLanguage())); ?>
</label>
				</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['notify_department']): ?>
				<li class="select-field notify-department">
					<input type="checkbox" name="__notify_department" id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_department" value="Y" class="checkbox" checked="checked" onclick="$('input[name=__notify_department]').attr('checked', this.checked);" />
					<label for="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_department"><?php echo fn_get_lang_var('notify_orders_department', $this->getLanguage()); ?>
</label>
				</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['notify_supplier']): ?>
				<li class="select-field notify-department">
					<input type="checkbox" name="__notify_supplier" id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_supplier" value="Y" class="checkbox" checked="checked" onclick="$('input[name=__notify_supplier]').attr('checked', this.checked);" />
					<label for="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_supplier"><?php if (@PRODUCT_TYPE == 'MULTIVENDOR' || @PRODUCT_TYPE == 'MULTISHOP'): ?><?php echo fn_get_lang_var('notify_vendor', $this->getLanguage()); ?>
<?php else: ?><?php echo fn_get_lang_var('notify_supplier', $this->getLanguage()); ?>
<?php endif; ?></label>
				</li>
			<?php endif; ?>
			<?php $this->_smarty_vars['capture']['list_items'] = ob_get_contents(); ob_end_clean(); ?>
			
			<?php if (trim($this->_smarty_vars['capture']['list_items'])): ?>
			<ul class="cm-select-list select-list-tools">
				<?php echo $this->_smarty_vars['capture']['list_items']; ?>

			</ul>
			<?php endif; ?>
		</div>
		<?php if (! $this->_smarty_vars['capture']['avail_box']): ?>
		<script type="text/javascript">
		//<![CDATA[
		<?php echo '
		function fn_check_object_status(obj, status) 
		{
			if ($(obj).hasClass(\'cm-active\')) {
				$(obj).removeClass(\'cm-ajax\');
				return false;
			}
			fn_update_object_status(obj, status);
			return true;
		}
		function fn_update_object_status_callback(data, params) 
		{
			if (data.return_status && params.obj) {
				fn_update_object_status(params.obj, data.return_status.toLowerCase());
			}
		}
		function fn_update_object_status(obj, status)
		{
			var upd_elm_id = $(obj).parents(\'.cm-popup-box:first\').attr(\'id\');
			var upd_elm = $(\'#\' + upd_elm_id);
			upd_elm.hide();
			$(obj).attr(\'href\', fn_query_remove($(obj).attr(\'href\'), [\'notify_user\', \'notify_department\']));
			if ($(\'input[name=__notify_user]:checked\', upd_elm).length) {
				$(obj).attr(\'href\', $(obj).attr(\'href\') + \'&notify_user=Y\');
			}
			if ($(\'input[name=__notify_department]:checked\', upd_elm).length) {
				$(obj).attr(\'href\', $(obj).attr(\'href\') + \'&notify_department=Y\');
			}
			if ($(\'input[name=__notify_supplier]:checked\', upd_elm).length) {
				$(obj).attr(\'href\', $(obj).attr(\'href\') + \'&notify_supplier=Y\');
			}
			$(\'.cm-select-list li a\', upd_elm).removeClass(\'cm-active\').addClass(\'cm-ajax\');
			$(\'.status-link-\' + status, upd_elm).addClass(\'cm-active\');
			$(\'#sw_\' + upd_elm_id + \' a\').text($(\'.status-link-\' + status, upd_elm).text());
			'; ?>

			$('#sw_' + upd_elm_id).removeAttr('class').addClass('selected-status status-<?php if ($this->_tpl_vars['suffix']): ?><?php echo $this->_tpl_vars['suffix']; ?>
-<?php endif; ?>' + status + ' ' + $('#sw_' + upd_elm_id + ' a').attr('class'));
			<?php echo '
		}
		'; ?>

		//]]>
		</script>
		<?php ob_start(); ?>Y<?php $this->_smarty_vars['capture']['avail_box'] = ob_get_contents(); ob_end_clean(); ?>
		<?php endif; ?>
	<?php endif; ?>
</div><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
				<?php else: ?>
					<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('id' => $this->_tpl_vars['block_data']['block_id'], 'status' => $this->_tpl_vars['block_data']['status'], 'object_id_name' => 'block_id', 'table' => 'blocks', )); ?><?php $this->assign('prefix', smarty_modifier_default(@$this->_tpl_vars['prefix'], 'select'), false); ?>
<div class="select-popup-container <?php echo $this->_tpl_vars['popup_additional_class']; ?>
">
	<?php if (! $this->_tpl_vars['hide_for_vendor']): ?>
	<div <?php if ($this->_tpl_vars['id']): ?>id="sw_<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_wrap"<?php endif; ?> class="selected-status status-<?php if ($this->_tpl_vars['suffix']): ?><?php echo $this->_tpl_vars['suffix']; ?>
-<?php endif; ?><?php echo smarty_modifier_lower($this->_tpl_vars['status']); ?>
<?php if ($this->_tpl_vars['id']): ?> cm-combo-on cm-combination<?php endif; ?>">
		<a <?php if ($this->_tpl_vars['id']): ?>class="cm-combo-on<?php if (! $this->_tpl_vars['popup_disabled']): ?> cm-combination<?php endif; ?>"<?php endif; ?>>
	<?php endif; ?>
		<?php if ($this->_tpl_vars['items_status']): ?>
			<?php if (! is_array($this->_tpl_vars['items_status'])): ?>
				<?php $this->assign('items_status', smarty_modifier_yaml_unserialize($this->_tpl_vars['items_status']), false); ?>
			<?php endif; ?>
			<?php echo smarty_modifier_truncate($this->_tpl_vars['items_status'][$this->_tpl_vars['status']], 12, ".."); ?>

		<?php else: ?>
			<?php if ($this->_tpl_vars['status'] == 'A'): ?>
				<?php echo fn_get_lang_var('active', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'D'): ?>
				<?php echo fn_get_lang_var('disabled', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'H'): ?>
				<?php echo fn_get_lang_var('hidden', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'P'): ?>
				<?php echo fn_get_lang_var('pending', $this->getLanguage()); ?>

			<?php elseif ($this->_tpl_vars['status'] == 'N'): ?>
				<?php echo fn_get_lang_var('new', $this->getLanguage()); ?>

			<?php endif; ?>
		<?php endif; ?>
	<?php if (! $this->_tpl_vars['hide_for_vendor']): ?>
		</a>
	</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['id'] && ! $this->_tpl_vars['hide_for_vendor']): ?>
		<?php $this->assign('_update_controller', smarty_modifier_default(@$this->_tpl_vars['update_controller'], 'tools'), false); ?>
		<?php if ($this->_tpl_vars['table'] && $this->_tpl_vars['object_id_name']): ?><?php ob_start(); ?>&amp;table=<?php echo $this->_tpl_vars['table']; ?>
&amp;id_name=<?php echo $this->_tpl_vars['object_id_name']; ?>
<?php $this->_smarty_vars['capture']['_extra'] = ob_get_contents(); ob_end_clean(); ?><?php endif; ?>
		<div id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_wrap" class="popup-tools cm-popup-box cm-smart-position hidden">
			<div class="status-scroll-y">
			<ul class="cm-select-list">
			<?php if ($this->_tpl_vars['items_status']): ?>
				<?php $_from = $this->_tpl_vars['items_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['st'] => $this->_tpl_vars['val']):
?>
				<li><a class="status-link-<?php echo smarty_modifier_lower($this->_tpl_vars['st']); ?>
 <?php if ($this->_tpl_vars['status'] == $this->_tpl_vars['st']): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;status=".($this->_tpl_vars['st']).($this->_smarty_vars['capture']['_extra']).($this->_tpl_vars['extra'])); ?>
" onclick="return fn_check_object_status(this, '<?php echo smarty_modifier_lower($this->_tpl_vars['st']); ?>
');" name="update_object_status_callback"><?php echo $this->_tpl_vars['val']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<li><a class="status-link-a <?php if ($this->_tpl_vars['status'] == 'A'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=A"); ?>
" onclick="return fn_check_object_status(this, 'a');" name="update_object_status_callback"><?php echo fn_get_lang_var('active', $this->getLanguage()); ?>
</a></li>
				<li><a class="status-link-d <?php if ($this->_tpl_vars['status'] == 'D'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=D"); ?>
" onclick="return fn_check_object_status(this, 'd');" name="update_object_status_callback"><?php echo fn_get_lang_var('disabled', $this->getLanguage()); ?>
</a></li>
				<?php if ($this->_tpl_vars['hidden']): ?>
				<li><a class="status-link-h <?php if ($this->_tpl_vars['status'] == 'H'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=H"); ?>
" onclick="return fn_check_object_status(this, 'h');" name="update_object_status_callback"><?php echo fn_get_lang_var('hidden', $this->getLanguage()); ?>
</a></li>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['status'] == 'N'): ?>
				<li><a class="status-link-p <?php if ($this->_tpl_vars['status'] == 'P'): ?>cm-active<?php else: ?>cm-ajax<?php endif; ?>"<?php if ($this->_tpl_vars['status_rev']): ?> rev="<?php echo $this->_tpl_vars['status_rev']; ?>
"<?php endif; ?> href="<?php echo fn_url(($this->_tpl_vars['_update_controller']).".update_status?id=".($this->_tpl_vars['id'])."&amp;table=".($this->_tpl_vars['table'])."&amp;id_name=".($this->_tpl_vars['object_id_name'])."&amp;status=P"); ?>
" onclick="return fn_check_object_status(this, 'p');" name="update_object_status_callback"><?php echo fn_get_lang_var('pending', $this->getLanguage()); ?>
</a></li>
				<?php endif; ?>
			<?php endif; ?>
			</ul>
			</div>
			<?php ob_start(); ?>
			<?php if ($this->_tpl_vars['notify']): ?>
				<li class="select-field">
					<input type="checkbox" name="__notify_user" id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify" value="Y" class="checkbox" checked="checked" onclick="$('input[name=__notify_user]').attr('checked', this.checked);" />
					<label for="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify"><?php echo smarty_modifier_default(@$this->_tpl_vars['notify_text'], fn_get_lang_var('notify_customer', $this->getLanguage())); ?>
</label>
				</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['notify_department']): ?>
				<li class="select-field notify-department">
					<input type="checkbox" name="__notify_department" id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_department" value="Y" class="checkbox" checked="checked" onclick="$('input[name=__notify_department]').attr('checked', this.checked);" />
					<label for="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_department"><?php echo fn_get_lang_var('notify_orders_department', $this->getLanguage()); ?>
</label>
				</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['notify_supplier']): ?>
				<li class="select-field notify-department">
					<input type="checkbox" name="__notify_supplier" id="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_supplier" value="Y" class="checkbox" checked="checked" onclick="$('input[name=__notify_supplier]').attr('checked', this.checked);" />
					<label for="<?php echo $this->_tpl_vars['prefix']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
_notify_supplier"><?php if (@PRODUCT_TYPE == 'MULTIVENDOR' || @PRODUCT_TYPE == 'MULTISHOP'): ?><?php echo fn_get_lang_var('notify_vendor', $this->getLanguage()); ?>
<?php else: ?><?php echo fn_get_lang_var('notify_supplier', $this->getLanguage()); ?>
<?php endif; ?></label>
				</li>
			<?php endif; ?>
			<?php $this->_smarty_vars['capture']['list_items'] = ob_get_contents(); ob_end_clean(); ?>
			
			<?php if (trim($this->_smarty_vars['capture']['list_items'])): ?>
			<ul class="cm-select-list select-list-tools">
				<?php echo $this->_smarty_vars['capture']['list_items']; ?>

			</ul>
			<?php endif; ?>
		</div>
		<?php if (! $this->_smarty_vars['capture']['avail_box']): ?>
		<script type="text/javascript">
		//<![CDATA[
		<?php echo '
		function fn_check_object_status(obj, status) 
		{
			if ($(obj).hasClass(\'cm-active\')) {
				$(obj).removeClass(\'cm-ajax\');
				return false;
			}
			fn_update_object_status(obj, status);
			return true;
		}
		function fn_update_object_status_callback(data, params) 
		{
			if (data.return_status && params.obj) {
				fn_update_object_status(params.obj, data.return_status.toLowerCase());
			}
		}
		function fn_update_object_status(obj, status)
		{
			var upd_elm_id = $(obj).parents(\'.cm-popup-box:first\').attr(\'id\');
			var upd_elm = $(\'#\' + upd_elm_id);
			upd_elm.hide();
			$(obj).attr(\'href\', fn_query_remove($(obj).attr(\'href\'), [\'notify_user\', \'notify_department\']));
			if ($(\'input[name=__notify_user]:checked\', upd_elm).length) {
				$(obj).attr(\'href\', $(obj).attr(\'href\') + \'&notify_user=Y\');
			}
			if ($(\'input[name=__notify_department]:checked\', upd_elm).length) {
				$(obj).attr(\'href\', $(obj).attr(\'href\') + \'&notify_department=Y\');
			}
			if ($(\'input[name=__notify_supplier]:checked\', upd_elm).length) {
				$(obj).attr(\'href\', $(obj).attr(\'href\') + \'&notify_supplier=Y\');
			}
			$(\'.cm-select-list li a\', upd_elm).removeClass(\'cm-active\').addClass(\'cm-ajax\');
			$(\'.status-link-\' + status, upd_elm).addClass(\'cm-active\');
			$(\'#sw_\' + upd_elm_id + \' a\').text($(\'.status-link-\' + status, upd_elm).text());
			'; ?>

			$('#sw_' + upd_elm_id).removeAttr('class').addClass('selected-status status-<?php if ($this->_tpl_vars['suffix']): ?><?php echo $this->_tpl_vars['suffix']; ?>
-<?php endif; ?>' + status + ' ' + $('#sw_' + upd_elm_id + ' a').attr('class'));
			<?php echo '
		}
		'; ?>

		//]]>
		</script>
		<?php ob_start(); ?>Y<?php $this->_smarty_vars['capture']['avail_box'] = ob_get_contents(); ob_end_clean(); ?>
		<?php endif; ?>
	<?php endif; ?>
</div><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
				<?php endif; ?>
				</div>

				<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/object_group.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['update_block'],'id' => ($this->_tpl_vars['block_data']['block_id']).($this->_tpl_vars['block_data']['block_type'])."_".($this->_tpl_vars['location']),'no_table' => true,'but_name' => "dispatch[block_manager.update]",'href' => "block_manager.update?block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;location=".($this->_tpl_vars['location'])."&amp;selected_section=".($this->_tpl_vars['location']),'header_text' => (fn_get_lang_var('editing_block', $this->getLanguage())).": ".($this->_tpl_vars['block_data']['description']),'opener_ajax_class' => "cm-ajax",'link_class' => "cm-ajax-force",'picker_meta' => "cm-clear-content")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			<?php endif; ?>

		<?php endif; ?>
		</div>
	</div>

	<div class="block-bottom"><p class="no-margin">&nbsp;</p></div>
</div>
<?php endif; ?>