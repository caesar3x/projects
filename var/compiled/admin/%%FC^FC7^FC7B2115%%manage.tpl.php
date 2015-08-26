<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:08
         compiled from views/block_manager/manage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'views/block_manager/manage.tpl', 5, false),array('modifier', 'fn_to_json', 'views/block_manager/manage.tpl', 6, false),array('modifier', 'escape', 'views/block_manager/manage.tpl', 13, false),array('modifier', 'empty_tabs', 'views/block_manager/manage.tpl', 314, false),array('modifier', 'in_array', 'views/block_manager/manage.tpl', 321, false),array('block', 'hook', 'views/block_manager/manage.tpl', 182, false),array('function', 'script', 'views/block_manager/manage.tpl', 317, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('not_applicable','text_position_updating','new_block','add_block','new_group','add_group','new_block','add_block','new_group','add_group','editing_location','blocks'));
?>
<?php $__parent_tpl_vars = $this->_tpl_vars; ?>

<script type="text/javascript">
//<![CDATA[
	var check_parent_url = '<?php echo fn_url("block_manager.check_parent", 'A', 'rel', '&'); ?>
';
	var settings = <?php echo fn_to_json($this->_tpl_vars['block_settings']['dynamic']); ?>
;
	<?php $_from = $this->_tpl_vars['block_settings']['additional']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['section'] => $this->_tpl_vars['section_data']):
?>
		<?php $_from = $this->_tpl_vars['section_data']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['object_name'] => $this->_tpl_vars['listed_block']):
?>
			settings['<?php echo $this->_tpl_vars['object_name']; ?>
'] = <?php echo $this->_tpl_vars['listed_block']; ?>
;
		<?php endforeach; endif; unset($_from); ?>
	<?php endforeach; endif; unset($_from); ?>
	
	lang.not_applicable = '<?php echo smarty_modifier_escape(fn_get_lang_var('not_applicable', $this->getLanguage()), 'javascript'); ?>
';

	block_properties = new Array();
	block_location = new Array();
	block_properties_used = new Array();

	<?php echo '
	function fn_check_block_params(new_block, location, block_id, owner, block_type)
	{
		var selected_status = new Array();

		var prefix = location + \'_\' + block_id + block_type + \'_\';
		var prop = new_block ? \'\' : block_properties[prefix];
		var prop_used = new_block ? \'\' : block_properties_used[prefix];
		var setting_name = \'\';

		selected_status[\'locations\'] = new Array();

		// Define selected location (tab)
		if (_id = $(\'#add_selected_section_\' + block_id + block_type).val()) {
			selected_status[\'locations\'].push(_id);
		}

		section = $(\'#\' + prefix + \'block_object\').val();

		if (!settings[section]) {
			dis = true;
			section = \'products\';
		} else {
			dis = false;
		}

		if (prop !== \'\' && prop_used == false) {
			selected_status = prop;
			block_properties_used[prefix] = true;
		} else {
			for (setting_name in settings[section]) {
				var _val = $(\'#\'  + prefix + \'id_\' + setting_name).val();

				if (!_val || !settings[section][setting_name][_val]) {
					for (var kk in settings[section][setting_name]) {
						_val = kk;
						break;
					}
				}

				selected_status[setting_name] = _val;
			}
		}

		for (setting_name in settings[section]) {
			// Disable static block
			current_dis = (setting_name) == \'positions\' ? false : dis;

			$(\'#\' + prefix + \'id_\' + setting_name).attr(\'disabled\', current_dis);
			var setting = settings[section][setting_name];
			var select = document.getElementById(prefix + \'id_\' + setting_name);

			if (select && select.options) {
				i = 0;
				value = selected_status[setting_name] || $(select).val();
				select.options.length = 0;

				if (current_dis != true) {
					// Check current setting (selectbox), and rebuild selectbox
					for (val in setting) {
						// object, need check condition
						add_option = true;
						if ($(setting[val]).length == 1) {
							for (cond in setting[val].conditions) {
								add_option = false;
								if (selected_status[cond]) {
									for (var ii in setting[val].conditions[cond]) {
										if (setting[val].conditions[cond][ii] == selected_status[cond]) {
											add_option = true;
											break;
										}
									}
								}
							}
						}

						// Check if filling applicable to certain locations only
						if (setting_name == \'fillings\' && setting[val][\'locations\'] && jQuery.inArray(location, setting[val][\'locations\']) == -1) {
							add_option = false;
						}

						if (add_option == true) {
							select.options[i] = new Option(setting[val][\'name\'] || setting[val], val);
							i++;
						}
					}

					selected_status[setting_name] = value;
					$(select).val(value);
					$(\'option\', $(select)).each( function() {
						if (this.value == value) {
							this.defaultSelected = true;
						}
					});

					if (owner && select.options.length != 0) {
						if (select.id == prefix + \'id_fillings\' && owner.id != prefix + \'id_positions\' && owner.id != prefix + \'id_appearances\') {
							fn_get_specific_settings($(select).val(), block_id, \'fillings\', block_type);
						} else if (select.id == prefix + \'id_appearances\') {
							fn_get_specific_settings($(select).val(), block_id, \'appearances\', block_type);
						}
					}
				}

				if (select.options.length == 0 || current_dis == true) {
					// disabled option
					select.options[i] = new Option(lang.not_applicable, \'\');
					select.disabled = true;
					if (select.id == prefix + \'id_fillings\') {
						$(\'#toggle_\' + block_id + block_type + \'_fillings\').empty();
					} else if (select.id == prefix + \'id_appearances\') {
						$(\'#toggle_\' + block_id + block_type + \'_appearances\').empty();
					}
				}
			}
		}

		return true;
	}

	function fn_get_specific_settings(value, block_id, type, block_type)
	{
		'; ?>

		jQuery.ajaxRequest('<?php echo fn_url("block_manager.specific_settings?type=", 'A', 'rel', '&'); ?>
' + type + '&value=' + value + '&block_id=' + block_id + '&block_type=' + block_type, {
		<?php echo '
			result_ids: \'toggle_\' + block_id + block_type + \'_\' + type,
			caching: true,
			callback: function() {
				if ($(\'#toggle_\' + block_id + block_type + \'_\' + type).html() == \'\') {
					$(\'#container_\' + block_id + block_type + \'_\' + type).hide();
				} else {
					$(\'#container_\' + block_id + block_type + \'_\' + type).show();
				}
			}
		});
	}

	function fn_check_block_parent(block_id, holder, location, object_id)
	{
		var data_obj = {};
		data_obj[\'block_id\'] = block_id;
		data_obj[\'object_id\'] = object_id;
		data_obj[\'location\'] = location;
		jQuery.ajaxRequest(check_parent_url, {caching: false, data: data_obj, callback: fn_check_block_parent_callback, select_id: holder.id});
	}

	function fn_check_block_parent_callback(data, params)
	{
		if (typeof(data.confirm_text) != \'undefined\') {
			$(\'#\' + params.select_id + \'_rewrite\').val(confirm(data.confirm_text) ? \'Y\' : \'N\');
		}
	}
	'; ?>

//]]>
</script>
<?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>

<?php ob_start(); ?>
<?php ob_start(); ?>
<div id="content_<?php echo $this->_tpl_vars['location']; ?>
">
<div class="block-manager"><div class="clear"></div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/group_element.tpl", 'smarty_include_vars' => array('blocks_target' => 'top','main_class' => "")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="clear">
	<?php $this->_tag_stack[] = array('hook', array('name' => "block_manager:columns")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/group_element.tpl", 'smarty_include_vars' => array('blocks_target' => 'left','main_class' => "float-left")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/group_element.tpl", 'smarty_include_vars' => array('blocks_target' => 'central','main_class' => "float-left")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/group_element.tpl", 'smarty_include_vars' => array('blocks_target' => 'right','main_class' => "float-left")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/components/group_element.tpl", 'smarty_include_vars' => array('blocks_target' => 'bottom','main_class' => "")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('object_id' => '0', )); ?><script type="text/javascript">
//<![CDATA[
(function($)<?php echo $this->_tpl_vars['ldelim']; ?>

	var text_position_updating = '<?php echo smarty_modifier_escape(fn_get_lang_var('text_position_updating', $this->getLanguage()), 'javascript'); ?>
';
	var selected_section = '<?php echo $this->_tpl_vars['location']; ?>
';
	var update_pos_url = '<?php echo fn_url("block_manager.save_layout", 'A', 'rel', "&"); ?>
';
	var block_object_id = '<?php echo $this->_tpl_vars['object_id']; ?>
';
	var h_height = 100;
	var h_width = 300;

<?php echo '

	var methods = {
		init: function() {
			$(\'.cm-sortable-items\').sortable({
				placeholder: \'ui-select\',
				handle: \'h4:not(.cm-fixed-block)\',
				tolerance: \'intersect\',
				items: \'> .cm-list-box\', // only direct children are allowed to be sortable items
				opacity: 0.5,
				helper: function(e, elm) {
					var drag_height = $(elm).height() > h_height ? h_height : $(elm).height();
					var jelm = $(\'<div class="ui-drag"></div>\');
					jelm.css({\'height\': drag_height, \'width\' : h_width});

					return jelm;
				},
				stop: function(e, ui) {
					$(\'div.cm-sortable-items\').each(function() {
						$(\'.cm-list-box\', this).length == 2 ? $(\'p.no-items\', this).show() : $(\'p.no-items\', this).hide();
					});

					methods.save_positions($(\'input.block-position:hidden\', ui.item).val());
				},
				start: function(e, ui) {
					// we can\'t drag group to another group
					var selector = ui.item.hasClass(\'cm-group-box\') ? \'.cm-sortable-items:not(.cm-decline-group)\' : \'.cm-sortable-items\';

					$(this).sortable(\'option\', \'connectWith\', selector);
					$(this).sortable(\'refresh\');
				}
			});
		},

		save_positions: function(block_id, user_choice) {
			var positions = [];
			var str_positions;

			$(\'.grab-items\').each(function() {
				var self = this;
				var group_id = $(\'input[name=group_id_\' + self.id + \']\').val();
				if (!positions[group_id]) {
					positions[group_id] = [];
				}
				$(\'#\' + self.id + \' :input\').filter(\'.block-position\').each(function() {
					if ($(this).parents(\'.grab-items:first\').attr(\'id\') == self.id) {
						positions[group_id].push($(this).val());
					}
				});
			});

			var data_obj = {};
			for (var section in positions) {
				if (positions[section].length) {
					data_obj[\'block_positions[\' + section.str_replace(\'block_content_\', \'\') + \']\'] = positions[section].join(\',\');
				}
			}
			data_obj[\'add_selected_section\'] = selected_section;
			data_obj[\'block_id\'] = block_id || 0;
			data_obj[\'object_id\'] = block_object_id;
			if (typeof(user_choice) != \'undefined\') {
				data_obj[\'user_choice\'] = user_choice;
			}

			jQuery.ajaxRequest(update_pos_url, {method: \'post\', caching: false, message: text_position_updating, data: data_obj, callback: function(data) {
				if (typeof(data.confirm_text) != \'undefined\') {
					methods.save_positions(block_id, confirm(data.confirm_text) ? \'Y\' : \'N\');
				}
			}});

			return true;
		}
	}


	$(document).ready(function(){
		methods.init();
	});
'; ?>

<?php echo $this->_tpl_vars['rdelim']; ?>
)(jQuery);
//]]>
</script><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
</div>

<?php ob_start(); ?>
	<?php ob_start(); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/update.tpl", 'smarty_include_vars' => array('add_block' => true,'block_type' => 'B','block' => null)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $this->_smarty_vars['capture']['add_new_picker'] = ob_get_contents(); ob_end_clean(); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/popupbox.tpl", 'smarty_include_vars' => array('id' => 'add_new_block','text' => fn_get_lang_var('new_block', $this->getLanguage()),'content' => $this->_smarty_vars['capture']['add_new_picker'],'link_text' => fn_get_lang_var('add_block', $this->getLanguage()),'act' => 'general')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php ob_start(); ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/block_manager/update.tpl", 'smarty_include_vars' => array('add_block' => true,'block_type' => 'G','block' => null)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $this->_smarty_vars['capture']['add_new_picker'] = ob_get_contents(); ob_end_clean(); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/popupbox.tpl", 'smarty_include_vars' => array('id' => 'add_new_group','text' => fn_get_lang_var('new_group', $this->getLanguage()),'content' => $this->_smarty_vars['capture']['add_new_picker'],'link_text' => fn_get_lang_var('add_group', $this->getLanguage()),'act' => 'general')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->_smarty_vars['capture']['tools'] = ob_get_contents(); ob_end_clean(); ?>

<div class="buttons-container cm-toggle-button buttons-bg">
	<div class="float-right">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/popupbox.tpl", 'smarty_include_vars' => array('id' => 'add_new_block','text' => fn_get_lang_var('new_block', $this->getLanguage()),'link_text' => fn_get_lang_var('add_block', $this->getLanguage()),'act' => 'general')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/popupbox.tpl", 'smarty_include_vars' => array('id' => 'add_new_group','text' => fn_get_lang_var('new_group', $this->getLanguage()),'link_text' => fn_get_lang_var('add_group', $this->getLanguage()),'act' => 'general')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
</div>

<?php $this->_smarty_vars['capture']['tabsbox'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>
	<?php ob_start(); ?>
		<img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/icon_list.gif" width="18" height="17" border="0" />
	<?php $this->_smarty_vars['capture']['_link_text'] = ob_get_contents(); ob_end_clean(); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/popupbox.tpl", 'smarty_include_vars' => array('id' => "tab_".($this->_tpl_vars['location']),'text' => (fn_get_lang_var('editing_location', $this->getLanguage())).": ".(fn_get_lang_var($this->_tpl_vars['location'], $this->getLanguage())),'act' => 'edit','picker_meta' => "cm-clear-content",'href' => "block_manager.update_location?location=".($this->_tpl_vars['location']),'opener_ajax_class' => "cm-ajax",'link_class' => "cm-ajax-force",'link_text' => $this->_smarty_vars['capture']['_link_text'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->_smarty_vars['capture']['active_tab_extra'] = ob_get_contents(); ob_end_clean(); ?>
<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('content' => $this->_smarty_vars['capture']['tabsbox'], 'active_tab' => $this->_tpl_vars['location'], 'active_tab_extra' => $this->_smarty_vars['capture']['active_tab_extra'], )); ?>
<?php if (! $this->_tpl_vars['active_tab']): ?>
	<?php $this->assign('active_tab', $this->_tpl_vars['_REQUEST']['selected_section'], false); ?>
<?php endif; ?>

<?php $this->assign('empty_tab_ids', smarty_modifier_empty_tabs($this->_tpl_vars['content']), false); ?>

<?php if ($this->_tpl_vars['navigation']['tabs']): ?>
<?php echo smarty_function_script(array('src' => "js/tabs.js"), $this);?>

<div class="tabs cm-j-tabs<?php if ($this->_tpl_vars['track']): ?> cm-track<?php endif; ?>">
	<ul>
	<?php $_from = $this->_tpl_vars['navigation']['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tab']):
        $this->_foreach['tabs']['iteration']++;
?>
		<?php if (( ! $this->_tpl_vars['tabs_section'] || $this->_tpl_vars['tabs_section'] == $this->_tpl_vars['tab']['section'] ) && ( $this->_tpl_vars['tab']['hidden'] || ! smarty_modifier_in_array($this->_tpl_vars['key'], $this->_tpl_vars['empty_tab_ids']) )): ?>
		<li id="<?php echo $this->_tpl_vars['key']; ?>
<?php echo $this->_tpl_vars['id_suffix']; ?>
" class="<?php if ($this->_tpl_vars['tab']['hidden'] == 'Y'): ?>hidden <?php endif; ?><?php if ($this->_tpl_vars['tab']['js']): ?>cm-js<?php elseif ($this->_tpl_vars['tab']['ajax']): ?>cm-js cm-ajax<?php endif; ?><?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['active_tab']): ?> cm-active<?php endif; ?>"><a <?php if ($this->_tpl_vars['tab']['href']): ?>href="<?php echo fn_url($this->_tpl_vars['tab']['href']); ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['tab']['title']; ?>
</a><?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['active_tab']): ?><?php echo $this->_tpl_vars['active_tab_extra']; ?>
<?php endif; ?></li>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>
<div class="cm-tabs-content">
	<?php echo $this->_tpl_vars['content']; ?>

</div>
<?php else: ?>
	<?php echo $this->_tpl_vars['content']; ?>

<?php endif; ?><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>

<?php $this->_smarty_vars['capture']['mainbox'] = ob_get_contents(); ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/mainbox.tpl", 'smarty_include_vars' => array('title' => fn_get_lang_var('blocks', $this->getLanguage()),'content' => $this->_smarty_vars['capture']['mainbox'],'tools' => $this->_smarty_vars['capture']['tools'],'select_languages' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>