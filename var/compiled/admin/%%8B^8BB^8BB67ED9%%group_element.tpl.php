<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:08
         compiled from views/block_manager/components/group_element.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'views/block_manager/components/group_element.tpl', 31, false),array('modifier', 'strpos', 'views/block_manager/components/group_element.tpl', 68, false),array('modifier', 'escape', 'views/block_manager/components/group_element.tpl', 73, false),array('modifier', 'default', 'views/block_manager/components/group_element.tpl', 75, false),array('modifier', 'lower', 'views/block_manager/components/group_element.tpl', 78, false),array('modifier', 'is_array', 'views/block_manager/components/group_element.tpl', 82, false),array('modifier', 'yaml_unserialize', 'views/block_manager/components/group_element.tpl', 83, false),array('modifier', 'truncate', 'views/block_manager/components/group_element.tpl', 85, false),array('modifier', 'trim', 'views/block_manager/components/group_element.tpl', 147, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('editing_block','editing_block','delete','delete','direction','vertical','horizontal','wrapper','active','disabled','active','disabled','hidden','pending','new','active','disabled','hidden','pending','notify_customer','notify_orders_department','notify_vendor','notify_supplier','active','disabled','hidden','pending','new','active','disabled','hidden','pending','notify_customer','notify_orders_department','notify_vendor','notify_supplier','wrapper','editing_block','no_blocks'));
?>
<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block_data']):
?>
<?php if (( $this->_tpl_vars['block_data']['text_id'] == $this->_tpl_vars['blocks_target'] || $this->_tpl_vars['block_data']['block_id'] == $this->_tpl_vars['blocks_target'] ) && $this->_tpl_vars['block_data']['block_type'] == 'G'): ?>
	<?php if ($this->_tpl_vars['block_data']['text_id']): ?>
	<div id="<?php echo $this->_tpl_vars['blocks_target']; ?>
_column_holder"<?php if ($this->_tpl_vars['main_class']): ?> class="<?php echo $this->_tpl_vars['main_class']; ?>
"<?php endif; ?>>
		<div class="block-manager">
			<?php if ($this->_tpl_vars['block_data']['text_id'] == 'product_details'): ?>
				<input type="hidden" name="block_positions[]" class="block-position" value="<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" />
				<?php $this->assign('def_id', "block_content_".($this->_tpl_vars['block_data']['block_id']), false); ?>
			<?php else: ?>
				<?php $this->assign('def_id', $this->_tpl_vars['block_data']['text_id'], false); ?>
			<?php endif; ?>
			<h2 class="clear">
				<?php if (! $this->_tpl_vars['simple']): ?>
				<div class="float-right">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/object_group.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['update_block'],'id' => ($this->_tpl_vars['block_data']['block_id']).($this->_tpl_vars['block_data']['block_type'])."_".($this->_tpl_vars['location']),'no_table' => true,'but_name' => "dispatch[block_manager.update]",'href' => "block_manager.update?block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;location=".($this->_tpl_vars['location'])."&amp;selected_section=".($this->_tpl_vars['location']),'header_text' => (fn_get_lang_var('editing_block', $this->getLanguage())).": ".($this->_tpl_vars['block_data']['description']),'opener_ajax_class' => "cm-ajax",'link_class' => "cm-ajax-force",'picker_meta' => "cm-clear-content")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
				<?php endif; ?>
				<?php echo $this->_tpl_vars['block_data']['description']; ?>

			</h2>
			<input type="hidden" name="group_id_<?php echo $this->_tpl_vars['def_id']; ?>
" value="<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" />
			<div id="<?php echo $this->_tpl_vars['def_id']; ?>
" class="cm-sortable-items grab-items <?php if ($this->_tpl_vars['block_data']['text_id'] == 'product_details'): ?>cm-product-details<?php endif; ?>">
	<?php else: ?>
	<div id="blocks_group_<?php echo $this->_tpl_vars['blocks_target']; ?>
" class="cm-list-box cm-group-box block-container base-block">
		<div class="block-manager">
			<input type="hidden" name="block_positions[]" class="block-position" value="<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" />
			<h4 class="group-header <?php if ($this->_tpl_vars['show_for_location'] && $this->_tpl_vars['block_data']['location'] != $this->_tpl_vars['show_for_location']): ?>cm-fixed-block<?php endif; ?>">
			<?php if (! $this->_tpl_vars['simple']): ?>
			<div class="float-right">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/object_group.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['update_block'],'id' => ($this->_tpl_vars['block_data']['block_id']).($this->_tpl_vars['block_data']['block_type'])."_".($this->_tpl_vars['location']),'no_table' => true,'but_name' => "dispatch[block_manager.update]",'href' => "block_manager.update?block_id=".($this->_tpl_vars['block_data']['block_id'])."&amp;location=".($this->_tpl_vars['location'])."&amp;selected_section=".($this->_tpl_vars['location']),'header_text' => (fn_get_lang_var('editing_block', $this->getLanguage())).": ".($this->_tpl_vars['block_data']['description']),'opener_ajax_class' => "cm-ajax",'link_class' => "cm-ajax-force",'picker_meta' => "cm-clear-content")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php if (( $this->_tpl_vars['location'] == 'all_pages' || $this->_tpl_vars['block_data']['location'] != 'all_pages' ) && ! $this->_tpl_vars['block_data']['properties']['static_block']): ?>
					<a class="cm-confirm" href="<?php echo fn_url("block_manager.delete?selected_section=".($this->_tpl_vars['location'])."&amp;block_id=".($this->_tpl_vars['block_data']['block_id'])); ?>
"><img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/icon_delete.gif" width="12" height="18" border="0" title="<?php echo fn_get_lang_var('delete', $this->getLanguage()); ?>
" alt="<?php echo fn_get_lang_var('delete', $this->getLanguage()); ?>
" class="valign" /></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<span>
				<?php $this->assign('block_content_id', "block_content_".($this->_tpl_vars['block_data']['block_id']), false); ?>
				<img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/icon_show.gif" width="13" height="13" border="0" alt="" id="on_<?php echo $this->_tpl_vars['block_content_id']; ?>
" class="cm-combination cm-save-state<?php if ($_COOKIE[$this->_tpl_vars['block_content_id']]): ?> hidden<?php endif; ?>" /><img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/icon_hide.gif" width="13" height="13" border="0" alt="" id="off_<?php echo $this->_tpl_vars['block_content_id']; ?>
" class="cm-combination cm-save-state<?php if (! $_COOKIE[$this->_tpl_vars['block_content_id']]): ?> hidden<?php endif; ?>" />
				<?php echo $this->_tpl_vars['block_data']['description']; ?>

			</span>
			</h4>
			<input type="hidden" name="group_id_<?php echo $this->_tpl_vars['block_content_id']; ?>
" value="<?php echo $this->_tpl_vars['block_data']['block_id']; ?>
" />
			<div id="<?php echo $this->_tpl_vars['block_content_id']; ?>
" class="cm-sortable-items cm-decline-group group-content grab-items <?php if (! $_COOKIE[$this->_tpl_vars['block_content_id']]): ?> hidden<?php endif; ?>">
	<?php endif; ?>

			<?php if (! $this->_tpl_vars['simple']): ?>
			<div class="info-line clear">
				<?php if ($this->_tpl_vars['block_data']['properties']['block_order']): ?>
					<p<?php if (! $this->_tpl_vars['block_data']['properties']['wrapper']): ?> class="float-left"<?php endif; ?>>
						<label><?php echo fn_get_lang_var('direction', $this->getLanguage()); ?>
:</label>
						<?php if ($this->_tpl_vars['block_data']['properties']['block_order'] == 'V'): ?><?php echo fn_get_lang_var('vertical', $this->getLanguage()); ?>
<?php else: ?><?php echo fn_get_lang_var('horizontal', $this->getLanguage()); ?>
<?php endif; ?>
					</p>
				<?php endif; ?>

				<?php if ($this->_tpl_vars['block_data']['properties']['wrapper']): ?>
					<p class="float-left">
						<label><?php echo fn_get_lang_var('wrapper', $this->getLanguage()); ?>
:</label>
						<?php echo $this->_tpl_vars['block_data']['properties']['wrapper']; ?>

					</p>
				<?php endif; ?>
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
			</div>
			<?php endif; ?>

			<div class="cm-list-box list-box-invisible"></div>
			<?php $this->assign('_not_empty', false, false); ?>
			<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['inner_block']):
?>
				<?php if ($this->_tpl_vars['inner_block']['group_id'] == $this->_tpl_vars['block_data']['block_id']): ?>
					<?php if ($this->_tpl_vars['inner_block']['block_type'] == 'B'): ?>
						<?php if ($this->_tpl_vars['inner_block']['text_id'] == 'central_content'): ?>
							<div class="cm-list-box central-content">
								<h3><?php echo $this->_tpl_vars['inner_block']['description']; ?>
</h3>
								<input type="hidden" name="block_positions[]" class="block-position" value="<?php echo $this->_tpl_vars['inner_block']['block_id']; ?>
" />
								<div class="block-content clear">
								<?php if ($this->_tpl_vars['inner_block']['properties']['wrapper']): ?>
									<p><label><?php echo fn_get_lang_var('wrapper', $this->getLanguage()); ?>
:</label>
									<?php echo $this->_tpl_vars['inner_block']['properties']['wrapper']; ?>
</p>
								<?php endif; ?>

								<?php if (! $this->_tpl_vars['simple']): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/object_group.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['update_block'],'id' => ($this->_tpl_vars['inner_block']['block_id']).($this->_tpl_vars['inner_block']['block_type'])."_".($this->_tpl_vars['location']),'no_table' => true,'but_name' => "dispatch[block_manager.update]",'href' => "block_manager.update?block_id=".($this->_tpl_vars['inner_block']['block_id'])."&amp;location=".($this->_tpl_vars['location']),'header_text' => (fn_get_lang_var('editing_block', $this->getLanguage())).": ".($this->_tpl_vars['inner_block']['description']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
								<?php endif; ?>
								</div>
							</div>
							<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
								<?php if ($this->_tpl_vars['_block']['text_id'] == 'product_details'): ?>
									<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/group_element.tpl", 'smarty_include_vars' => array('blocks_target' => $this->_tpl_vars['_block']['block_id'],'main_class' => "product-tabs")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
						<?php else: ?>
							<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/block_element.tpl", 'smarty_include_vars' => array('block_data' => $this->_tpl_vars['inner_block'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<?php endif; ?>
					<?php elseif ($this->_tpl_vars['inner_block']['text_id'] != 'product_details'): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/group_element.tpl", 'smarty_include_vars' => array('blocks_target' => $this->_tpl_vars['inner_block']['block_id'],'main_class' => "")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['inner_block']['block_type'] == 'B' && ! $this->_tpl_vars['inner_block']['disabled'] || $this->_tpl_vars['inner_block']['block_type'] == 'G'): ?>
						<?php $this->assign('_not_empty', true, false); ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<p class="no-items<?php if ($this->_tpl_vars['_not_empty']): ?> hidden<?php endif; ?>"><?php echo fn_get_lang_var('no_blocks', $this->getLanguage()); ?>
</p>
			<div class="cm-list-box list-box-invisible"></div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>