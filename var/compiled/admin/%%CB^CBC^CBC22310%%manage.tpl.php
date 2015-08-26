<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:51
         compiled from addons/banners/views/banners/manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'addons/banners/views/banners/manage.tpl', 7, false),array('modifier', 'default', 'addons/banners/views/banners/manage.tpl', 27, false),array('modifier', 'lower', 'addons/banners/views/banners/manage.tpl', 30, false),array('modifier', 'is_array', 'addons/banners/views/banners/manage.tpl', 34, false),array('modifier', 'yaml_unserialize', 'addons/banners/views/banners/manage.tpl', 35, false),array('modifier', 'truncate', 'addons/banners/views/banners/manage.tpl', 37, false),array('modifier', 'trim', 'addons/banners/views/banners/manage.tpl', 99, false),array('modifier', 'fn_check_view_permissions', 'addons/banners/views/banners/manage.tpl', 179, false),array('modifier', 'substr_count', 'addons/banners/views/banners/manage.tpl', 183, false),array('modifier', 'replace', 'addons/banners/views/banners/manage.tpl', 184, false),array('modifier', 'defined', 'addons/banners/views/banners/manage.tpl', 196, false),array('function', 'cycle', 'addons/banners/views/banners/manage.tpl', 20, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('banner','type','status','graphic_banner','text_banner','active','disabled','hidden','pending','new','active','disabled','hidden','pending','notify_customer','notify_orders_department','notify_vendor','notify_supplier','delete','no_data','delete_selected','choose_action','or','tools','add','add_banner','or','tools','add','banners'));
?>


<?php ob_start(); ?>

<form action="<?php echo fn_url(""); ?>
" method="post" name="banners_form" class="cm-form-highlight" enctype="multipart/form-data">
<input type="hidden" name="fake" value="1" />

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table hidden-inputs">
<tr>
	<th class="center">
		<input type="checkbox" name="check_all" value="Y" class="checkbox cm-check-items" /></th>
	<th><?php echo fn_get_lang_var('banner', $this->getLanguage()); ?>
</th>
	<th><?php echo fn_get_lang_var('type', $this->getLanguage()); ?>
</th>
	<th width="100%"><?php echo fn_get_lang_var('status', $this->getLanguage()); ?>
</th>
	<th>&nbsp;</th>
</tr>
<?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner']):
?>
<tr <?php echo smarty_function_cycle(array('values' => "class=\"table-row\", "), $this);?>
>
	<td class="center">
		<input type="checkbox" name="banner_ids[]" value="<?php echo $this->_tpl_vars['banner']['banner_id']; ?>
" class="checkbox cm-item" /></td>
	<td>
		<input type="text" name="banners[<?php echo $this->_tpl_vars['banner']['banner_id']; ?>
][banner]" value="<?php echo $this->_tpl_vars['banner']['banner']; ?>
" size="20" class="input-text" /></td>
	<td class="nowrap"><?php if ($this->_tpl_vars['banner']['type'] == 'G'): ?><?php echo fn_get_lang_var('graphic_banner', $this->getLanguage()); ?>
<?php else: ?><?php echo fn_get_lang_var('text_banner', $this->getLanguage()); ?>
<?php endif; ?></td>
	<td>
		<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('id' => $this->_tpl_vars['banner']['banner_id'], 'status' => $this->_tpl_vars['banner']['status'], 'hidden' => true, 'object_id_name' => 'banner_id', 'table' => 'banners', )); ?><?php $this->assign('prefix', smarty_modifier_default(@$this->_tpl_vars['prefix'], 'select'), false); ?>
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
	</td>
	<td class="nowrap">
		<?php ob_start(); ?>
		<li><a class="cm-confirm" href="<?php echo fn_url("banners.delete?banner_id=".($this->_tpl_vars['banner']['banner_id'])); ?>
"><?php echo fn_get_lang_var('delete', $this->getLanguage()); ?>
</a></li>
		<?php $this->_smarty_vars['capture']['tools_items'] = ob_get_contents(); ob_end_clean(); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/table_tools_list.tpl", 'smarty_include_vars' => array('prefix' => $this->_tpl_vars['banner']['banner_id'],'tools_list' => $this->_smarty_vars['capture']['tools_items'],'href' => "banners.update?banner_id=".($this->_tpl_vars['banner']['banner_id']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
</tr>
<?php endforeach; else: ?>
<tr class="no-items">
	<td colspan="5"><p><?php echo fn_get_lang_var('no_data', $this->getLanguage()); ?>
</p></td>
</tr>
<?php endif; unset($_from); ?>
</table>

<?php if ($this->_tpl_vars['banners']): ?>
<div class="buttons-container buttons-bg">
	<div class="float-left">
		<?php ob_start(); ?>
		<ul>
			<li><a name="dispatch[banners.delete]" class="cm-process-items cm-confirm" rev="banners_form"><?php echo fn_get_lang_var('delete_selected', $this->getLanguage()); ?>
</a></li>
		</ul>
		<?php $this->_smarty_vars['capture']['tools_list'] = ob_get_contents(); ob_end_clean(); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/save.tpl", 'smarty_include_vars' => array('but_name' => "dispatch[banners.m_update]",'but_role' => 'button_main')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('prefix' => 'main', 'hide_actions' => true, 'tools_list' => $this->_smarty_vars['capture']['tools_list'], 'display' => 'inline', 'link_text' => fn_get_lang_var('choose_action', $this->getLanguage()), )); ?>

<?php if ($this->_tpl_vars['skip_check_permissions'] || fn_check_view_permissions($this->_tpl_vars['tools_list'])): ?>

<?php if ($this->_tpl_vars['tools_list'] && $this->_tpl_vars['prefix'] == 'main' && ! $this->_tpl_vars['only_popup']): ?> <?php echo fn_get_lang_var('or', $this->getLanguage()); ?>
 <?php endif; ?>

<?php if (substr_count($this->_tpl_vars['tools_list'], "<li") == 1): ?>
	<?php echo smarty_modifier_replace($this->_tpl_vars['tools_list'], "<ul>", "<ul class=\"cm-tools-list tools-list\">"); ?>

<?php else: ?>
	<div class="tools-container<?php if ($this->_tpl_vars['display']): ?> <?php echo $this->_tpl_vars['display']; ?>
<?php endif; ?>">
		<?php if (! $this->_tpl_vars['hide_tools'] && $this->_tpl_vars['tools_list']): ?>
		<div class="tools-content<?php if ($this->_tpl_vars['display']): ?> <?php echo $this->_tpl_vars['display']; ?>
<?php endif; ?>">
			<a class="cm-combo-on cm-combination <?php if ($this->_tpl_vars['override_meta']): ?><?php echo $this->_tpl_vars['override_meta']; ?>
<?php else: ?>select-button<?php endif; ?><?php if ($this->_tpl_vars['link_meta']): ?> <?php echo $this->_tpl_vars['link_meta']; ?>
<?php endif; ?>" id="sw_tools_list_<?php echo $this->_tpl_vars['prefix']; ?>
"><?php echo smarty_modifier_default(@$this->_tpl_vars['link_text'], fn_get_lang_var('tools', $this->getLanguage())); ?>
</a>
			<div id="tools_list_<?php echo $this->_tpl_vars['prefix']; ?>
" class="cm-tools-list popup-tools hidden cm-popup-box cm-smart-position">
					<?php echo $this->_tpl_vars['tools_list']; ?>

			</div>
		</div>
		<?php endif; ?>
		<?php if (! $this->_tpl_vars['hide_actions']): ?>
			<?php if (! ( defined('COMPANY_ID') && ! fn_check_view_permissions($this->_tpl_vars['tool_href']) )): ?>
		<span class="action-add">
			<a<?php if ($this->_tpl_vars['tool_id']): ?> id="<?php echo $this->_tpl_vars['tool_id']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['tool_href']): ?> href="<?php echo fn_url($this->_tpl_vars['tool_href']); ?>
"<?php endif; ?><?php if ($this->_tpl_vars['tool_onclick']): ?> onclick="<?php echo $this->_tpl_vars['tool_onclick']; ?>
; return false;"<?php endif; ?>><?php echo smarty_modifier_default(@$this->_tpl_vars['link_text'], fn_get_lang_var('add', $this->getLanguage())); ?>
</a>
		</span>
			<?php else: ?><?php endif; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php else: ?><?php endif; ?>
<?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
	</div>
</div>	
	<?php endif; ?>
</form>

<?php ob_start(); ?>
	<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('tool_href' => "banners.add", 'prefix' => 'top', 'hide_tools' => 'true', 'link_text' => fn_get_lang_var('add_banner', $this->getLanguage()), )); ?>

<?php if ($this->_tpl_vars['skip_check_permissions'] || fn_check_view_permissions($this->_tpl_vars['tools_list'])): ?>

<?php if ($this->_tpl_vars['tools_list'] && $this->_tpl_vars['prefix'] == 'main' && ! $this->_tpl_vars['only_popup']): ?> <?php echo fn_get_lang_var('or', $this->getLanguage()); ?>
 <?php endif; ?>

<?php if (substr_count($this->_tpl_vars['tools_list'], "<li") == 1): ?>
	<?php echo smarty_modifier_replace($this->_tpl_vars['tools_list'], "<ul>", "<ul class=\"cm-tools-list tools-list\">"); ?>

<?php else: ?>
	<div class="tools-container<?php if ($this->_tpl_vars['display']): ?> <?php echo $this->_tpl_vars['display']; ?>
<?php endif; ?>">
		<?php if (! $this->_tpl_vars['hide_tools'] && $this->_tpl_vars['tools_list']): ?>
		<div class="tools-content<?php if ($this->_tpl_vars['display']): ?> <?php echo $this->_tpl_vars['display']; ?>
<?php endif; ?>">
			<a class="cm-combo-on cm-combination <?php if ($this->_tpl_vars['override_meta']): ?><?php echo $this->_tpl_vars['override_meta']; ?>
<?php else: ?>select-button<?php endif; ?><?php if ($this->_tpl_vars['link_meta']): ?> <?php echo $this->_tpl_vars['link_meta']; ?>
<?php endif; ?>" id="sw_tools_list_<?php echo $this->_tpl_vars['prefix']; ?>
"><?php echo smarty_modifier_default(@$this->_tpl_vars['link_text'], fn_get_lang_var('tools', $this->getLanguage())); ?>
</a>
			<div id="tools_list_<?php echo $this->_tpl_vars['prefix']; ?>
" class="cm-tools-list popup-tools hidden cm-popup-box cm-smart-position">
					<?php echo $this->_tpl_vars['tools_list']; ?>

			</div>
		</div>
		<?php endif; ?>
		<?php if (! $this->_tpl_vars['hide_actions']): ?>
			<?php if (! ( defined('COMPANY_ID') && ! fn_check_view_permissions($this->_tpl_vars['tool_href']) )): ?>
		<span class="action-add">
			<a<?php if ($this->_tpl_vars['tool_id']): ?> id="<?php echo $this->_tpl_vars['tool_id']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['tool_href']): ?> href="<?php echo fn_url($this->_tpl_vars['tool_href']); ?>
"<?php endif; ?><?php if ($this->_tpl_vars['tool_onclick']): ?> onclick="<?php echo $this->_tpl_vars['tool_onclick']; ?>
; return false;"<?php endif; ?>><?php echo smarty_modifier_default(@$this->_tpl_vars['link_text'], fn_get_lang_var('add', $this->getLanguage())); ?>
</a>
		</span>
			<?php else: ?><?php endif; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php else: ?><?php endif; ?>
<?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
<?php $this->_smarty_vars['capture']['tools'] = ob_get_contents(); ob_end_clean(); ?>

<?php $this->_smarty_vars['capture']['mainbox'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/mainbox.tpl", 'smarty_include_vars' => array('title' => fn_get_lang_var('banners', $this->getLanguage()),'content' => $this->_smarty_vars['capture']['mainbox'],'tools' => $this->_smarty_vars['capture']['tools'],'select_languages' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
