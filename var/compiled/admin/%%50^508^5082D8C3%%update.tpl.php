<?php /* Smarty version 2.6.18, created on 2015-05-01 16:41:15
         compiled from addons/banners/views/banners/update.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'addons/banners/views/banners/update.tpl', 1, false),array('modifier', 'fn_url', 'addons/banners/views/banners/update.tpl', 9, false),array('modifier', 'fn_parse_date', 'addons/banners/views/banners/update.tpl', 60, false),array('modifier', 'date_format', 'addons/banners/views/banners/update.tpl', 60, false),array('modifier', 'fn_explode_localizations', 'addons/banners/views/banners/update.tpl', 94, false),array('modifier', 'escape', 'addons/banners/views/banners/update.tpl', 104, false),array('modifier', 'is_array', 'addons/banners/views/banners/update.tpl', 129, false),array('modifier', 'yaml_unserialize', 'addons/banners/views/banners/update.tpl', 130, false),array('modifier', 'lower', 'addons/banners/views/banners/update.tpl', 133, false),array('function', 'math', 'addons/banners/views/banners/update.tpl', 76, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('name','type','graphic_banner','text_banner','image','description','open_in_new_window','url','creation_date','calendar','calendar','weekday_abr_0','weekday_abr_1','weekday_abr_2','weekday_abr_3','weekday_abr_4','weekday_abr_5','weekday_abr_6','month_name_abr_1','month_name_abr_2','month_name_abr_3','month_name_abr_4','month_name_abr_5','month_name_abr_6','month_name_abr_7','month_name_abr_8','month_name_abr_9','month_name_abr_10','month_name_abr_11','month_name_abr_12','localization','multiple_selectbox_notice','active','hidden','disabled','status','active','hidden','pending','disabled','new_banner','editing_banner'));
?>


<?php $this->assign('b_type', smarty_modifier_default(@$this->_tpl_vars['banner']['type'], 'G'), false); ?>

<?php ob_start(); ?>

<form action="<?php echo fn_url(""); ?>
" method="post" class="cm-form-highlight" name="banners_form" enctype="multipart/form-data" class="cm-form-highlight">
<input type="hidden" name="fake" value="1" />
<input type="hidden" name="banner_id" value="<?php echo $this->_tpl_vars['_REQUEST']['banner_id']; ?>
" />

<div class="form-field">
	<label for="banner" class="cm-required"><?php echo fn_get_lang_var('name', $this->getLanguage()); ?>
:</label>
	<input type="text" name="banner_data[banner]" id="banner" value="<?php echo $this->_tpl_vars['banner']['banner']; ?>
" size="25" class="input-text-large main-input" />
</div>

<div class="form-field">
	<label for="type" class="cm-required"><?php echo fn_get_lang_var('type', $this->getLanguage()); ?>
:</label>
	<select name="banner_data[type]" id="type" class="input-text" onchange="$('#banner_graphic').toggle();  $('#banner_text').toggle(); $('#banner_url').toggle();  $('#banner_target').toggle();">
		<option <?php if ($this->_tpl_vars['banner']['type'] == 'G'): ?>selected="selected"<?php endif; ?> value="G"><?php echo fn_get_lang_var('graphic_banner', $this->getLanguage()); ?>

		<option <?php if ($this->_tpl_vars['banner']['type'] == 'T'): ?>selected="selected"<?php endif; ?> value="T"><?php echo fn_get_lang_var('text_banner', $this->getLanguage()); ?>

	</select>
</div>

<div class="form-field <?php if ($this->_tpl_vars['b_type'] != 'G'): ?>hidden<?php endif; ?>" id="banner_graphic">
	<label><?php echo fn_get_lang_var('image', $this->getLanguage()); ?>
:</label>
	<div class="float-left">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/attach_images.tpl", 'smarty_include_vars' => array('image_name' => 'banners_main','image_object_type' => 'promo','image_pair' => $this->_tpl_vars['banner']['main_pair'],'image_object_id' => $this->_tpl_vars['banner']['banner_id'],'no_detailed' => true,'hide_titles' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
</div>

<div class="form-field <?php if ($this->_tpl_vars['b_type'] == 'G'): ?>hidden<?php endif; ?>" id="banner_text">
	<label for="man_descr"><?php echo fn_get_lang_var('description', $this->getLanguage()); ?>
:</label>
	<div class="break">
		<textarea id="man_descr" name="banner_data[description]" cols="35" rows="8" class="cm-wysiwyg input-textarea-long"><?php echo $this->_tpl_vars['banner']['description']; ?>
</textarea>
		
	</div>
</div>

<div class="form-field <?php if ($this->_tpl_vars['b_type'] == 'T'): ?>hidden<?php endif; ?>" id="banner_target">
	<label for="elm_banner_target"><?php echo fn_get_lang_var('open_in_new_window', $this->getLanguage()); ?>
:</label>
	<input type="hidden" name="banner_data[target]" value="T" />
	<input type="checkbox" name="banner_data[target]" id="elm_banner_target" value="B" <?php if ($this->_tpl_vars['banner']['target'] == 'B'): ?>checked="checked"<?php endif; ?> class="checkbox" />
</div>

<div class="form-field <?php if ($this->_tpl_vars['b_type'] == 'T'): ?>hidden<?php endif; ?>" id="banner_url">
	<label for="url"><?php echo fn_get_lang_var('url', $this->getLanguage()); ?>
:</label>
	<input type="text" name="banner_data[url]" id="url" value="<?php echo $this->_tpl_vars['banner']['url']; ?>
" size="25" class="input-text" />
</div>

<div class="form-field">
	<label for="timestamp_<?php echo $this->_tpl_vars['banner']['banner_id']; ?>
"><?php echo fn_get_lang_var('creation_date', $this->getLanguage()); ?>
:</label>
	<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('date_id' => "timestamp_".($this->_tpl_vars['banner']['banner_id']), 'date_name' => "banner_data[timestamp]", 'date_val' => smarty_modifier_default(@$this->_tpl_vars['banner']['timestamp'], @TIME), 'start_year' => $this->_tpl_vars['settings']['Company']['company_start_year'], )); ?><?php if ($this->_tpl_vars['settings']['Appearance']['calendar_date_format'] == 'month_first'): ?>
	<?php $this->assign('date_format', "%m/%d/%Y", false); ?>
<?php else: ?>
	<?php $this->assign('date_format', "%d/%m/%Y", false); ?>
<?php endif; ?>

<input type="text" id="<?php echo $this->_tpl_vars['date_id']; ?>
" name="<?php echo $this->_tpl_vars['date_name']; ?>
" class="input-text<?php if ($this->_tpl_vars['date_meta']): ?> <?php echo $this->_tpl_vars['date_meta']; ?>
<?php endif; ?> cm-calendar" value="<?php if ($this->_tpl_vars['date_val']): ?><?php echo smarty_modifier_date_format(fn_parse_date($this->_tpl_vars['date_val']), ($this->_tpl_vars['date_format'])); ?>
<?php endif; ?>" <?php echo $this->_tpl_vars['extra']; ?>
 size="10" />&nbsp;<img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/calendar.png" class="cm-external-focus calendar-but" rev="<?php echo $this->_tpl_vars['date_id']; ?>
" title="<?php echo fn_get_lang_var('calendar', $this->getLanguage()); ?>
" alt="<?php echo fn_get_lang_var('calendar', $this->getLanguage()); ?>
" />

<script type="text/javascript">
//<![CDATA[

var config = <?php echo $this->_tpl_vars['ldelim']; ?>
<?php echo $this->_tpl_vars['rdelim']; ?>
;
config = <?php echo $this->_tpl_vars['ldelim']; ?>

			changeMonth: true,
			duration: 'fast',
			changeYear: true,
			numberOfMonths: 1,
			selectOtherMonths: true,
			showOtherMonths: true,
			firstDay: <?php if ($this->_tpl_vars['settings']['Appearance']['calendar_week_format'] == 'sunday_first'): ?>0<?php else: ?>1<?php endif; ?>,
			dayNames: ['<?php echo fn_get_lang_var('weekday_abr_0', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('weekday_abr_1', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('weekday_abr_2', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('weekday_abr_3', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('weekday_abr_4', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('weekday_abr_5', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('weekday_abr_6', $this->getLanguage()); ?>
'],
			monthNamesShort: ['<?php echo fn_get_lang_var('month_name_abr_1', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_2', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_3', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_4', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_5', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_6', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_7', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_8', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_9', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_10', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_11', $this->getLanguage()); ?>
', '<?php echo fn_get_lang_var('month_name_abr_12', $this->getLanguage()); ?>
'],
			yearRange: '<?php echo smarty_modifier_default(@$this->_tpl_vars['start_year'], @$this->_tpl_vars['settings']['Company']['company_start_year']); ?>
:<?php echo smarty_function_math(array('equation' => "x+y",'x' => smarty_modifier_default(@$this->_tpl_vars['end_year'], 1),'y' => smarty_modifier_date_format(@TIME, "%Y")), $this);?>
',
			dateFormat: '<?php if ($this->_tpl_vars['settings']['Appearance']['calendar_date_format'] == 'month_first'): ?>mm/dd/yy<?php else: ?>dd/mm/yy<?php endif; ?>'
		<?php echo $this->_tpl_vars['rdelim']; ?>
;

if (jQuery.ua.browser == 'Internet Explorer') <?php echo $this->_tpl_vars['ldelim']; ?>

	$(window).load(function()<?php echo $this->_tpl_vars['ldelim']; ?>

		$('#<?php echo $this->_tpl_vars['date_id']; ?>
').datepicker(config);
	<?php echo $this->_tpl_vars['rdelim']; ?>
);
<?php echo $this->_tpl_vars['rdelim']; ?>
 else <?php echo $this->_tpl_vars['ldelim']; ?>

	$('#<?php echo $this->_tpl_vars['date_id']; ?>
').datepicker(config);
<?php echo $this->_tpl_vars['rdelim']; ?>



//]]>
</script><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
</div>

<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('data_name' => "banner_data[localization]", 'data_from' => $this->_tpl_vars['banner']['localization'], )); ?>
<?php $this->assign('data', fn_explode_localizations($this->_tpl_vars['data_from']), false); ?>

<?php if ($this->_tpl_vars['localizations']): ?>
<?php if (! $this->_tpl_vars['no_div']): ?>
<div class="form-field">
	<label for="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo fn_get_lang_var('localization', $this->getLanguage()); ?>
:</label>
<?php endif; ?>
		<?php if (! $this->_tpl_vars['disabled']): ?><input type="hidden" name="<?php echo $this->_tpl_vars['data_name']; ?>
" value="" /><?php endif; ?>
		<select	name="<?php echo $this->_tpl_vars['data_name']; ?>
[]" multiple="multiple" size="3" id="<?php echo smarty_modifier_default(@$this->_tpl_vars['id'], @$this->_tpl_vars['data_name']); ?>
" class="<?php if ($this->_tpl_vars['disabled']): ?>elm-disabled<?php else: ?>input-text<?php endif; ?>" <?php if ($this->_tpl_vars['disabled']): ?>disabled="disabled"<?php endif; ?>>
			<?php $_from = $this->_tpl_vars['localizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['loc']):
?>
			<option	value="<?php echo $this->_tpl_vars['loc']['localization_id']; ?>
" <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p_loc']):
?><?php if ($this->_tpl_vars['p_loc'] == $this->_tpl_vars['loc']['localization_id']): ?>selected="selected"<?php endif; ?><?php endforeach; endif; unset($_from); ?>><?php echo smarty_modifier_escape($this->_tpl_vars['loc']['localization']); ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
		</select>
<?php if (! $this->_tpl_vars['no_div']): ?>
<?php echo fn_get_lang_var('multiple_selectbox_notice', $this->getLanguage()); ?>

</div>
<?php endif; ?>
<?php endif; ?>
<?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>

<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('input_name' => "banner_data[status]", 'id' => 'banner_data', 'obj_id' => $this->_tpl_vars['banner']['banner_id'], 'obj' => $this->_tpl_vars['banner'], 'hidden' => true, )); ?>

<?php if ($this->_tpl_vars['display'] == 'select'): ?>
<select name="<?php echo $this->_tpl_vars['input_name']; ?>
" <?php if ($this->_tpl_vars['input_id']): ?>id="<?php echo $this->_tpl_vars['input_id']; ?>
"<?php endif; ?>>
	<option value="A" <?php if ($this->_tpl_vars['obj']['status'] == 'A'): ?>selected="selected"<?php endif; ?>><?php echo fn_get_lang_var('active', $this->getLanguage()); ?>
</option>
	<?php if ($this->_tpl_vars['hidden']): ?>
	<option value="H" <?php if ($this->_tpl_vars['obj']['status'] == 'H'): ?>selected="selected"<?php endif; ?>><?php echo fn_get_lang_var('hidden', $this->getLanguage()); ?>
</option>
	<?php endif; ?>
	<option value="D" <?php if ($this->_tpl_vars['obj']['status'] == 'D'): ?>selected="selected"<?php endif; ?>><?php echo fn_get_lang_var('disabled', $this->getLanguage()); ?>
</option>
</select>
<?php else: ?>
<div class="form-field">
	<label class="cm-required"><?php echo fn_get_lang_var('status', $this->getLanguage()); ?>
:</label>
	<div class="select-field">
		<?php if ($this->_tpl_vars['items_status']): ?>
			<?php if (! is_array($this->_tpl_vars['items_status'])): ?>
				<?php $this->assign('items_status', smarty_modifier_yaml_unserialize($this->_tpl_vars['items_status']), false); ?>
			<?php endif; ?>
			<?php $_from = $this->_tpl_vars['items_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['status_cycle'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['status_cycle']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['st'] => $this->_tpl_vars['val']):
        $this->_foreach['status_cycle']['iteration']++;
?>
			<input type="radio" name="<?php echo $this->_tpl_vars['input_name']; ?>
" id="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_<?php echo smarty_modifier_lower($this->_tpl_vars['st']); ?>
" <?php if ($this->_tpl_vars['obj']['status'] == $this->_tpl_vars['st'] || ( ! $this->_tpl_vars['obj']['status'] && ($this->_foreach['status_cycle']['iteration'] <= 1) )): ?>checked="checked"<?php endif; ?> value="<?php echo $this->_tpl_vars['st']; ?>
" class="radio" /><label for="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_<?php echo smarty_modifier_lower($this->_tpl_vars['st']); ?>
"><?php echo $this->_tpl_vars['val']; ?>
</label>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
		<input type="radio" name="<?php echo $this->_tpl_vars['input_name']; ?>
" id="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_a" <?php if ($this->_tpl_vars['obj']['status'] == 'A' || ! $this->_tpl_vars['obj']['status']): ?>checked="checked"<?php endif; ?> value="A" class="radio" /><label for="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_a"><?php echo fn_get_lang_var('active', $this->getLanguage()); ?>
</label>

		<?php if ($this->_tpl_vars['hidden']): ?>
		<input type="radio" name="<?php echo $this->_tpl_vars['input_name']; ?>
" id="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_h" <?php if ($this->_tpl_vars['obj']['status'] == 'H'): ?>checked="checked"<?php endif; ?> value="H" class="radio" /><label for="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_h"><?php echo fn_get_lang_var('hidden', $this->getLanguage()); ?>
</label>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['obj']['status'] == 'P'): ?>
		<input type="radio" name="<?php echo $this->_tpl_vars['input_name']; ?>
" id="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_p" checked="checked" value="P" class="radio" /><label for="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_p"><?php echo fn_get_lang_var('pending', $this->getLanguage()); ?>
</label>
		<?php endif; ?>

		<input type="radio" name="<?php echo $this->_tpl_vars['input_name']; ?>
" id="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_d" <?php if ($this->_tpl_vars['obj']['status'] == 'D'): ?>checked="checked"<?php endif; ?> value="D" class="radio" /><label for="<?php echo $this->_tpl_vars['id']; ?>
_<?php echo smarty_modifier_default(@$this->_tpl_vars['obj_id'], 0); ?>
_d"><?php echo fn_get_lang_var('disabled', $this->getLanguage()); ?>
</label>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?><?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>

<div class="buttons-container buttons-bg">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/save_cancel.tpl", 'smarty_include_vars' => array('but_name' => "dispatch[banners.update]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

</form>
<?php $this->_smarty_vars['capture']['mainbox'] = ob_get_contents(); ob_end_clean(); ?>

<?php if ($this->_tpl_vars['mode'] == 'add'): ?>
	<?php $this->assign('title', fn_get_lang_var('new_banner', $this->getLanguage()), false); ?>
<?php else: ?>
	<?php $this->assign('title', (fn_get_lang_var('editing_banner', $this->getLanguage())).": ".($this->_tpl_vars['banner']['banner']), false); ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/mainbox.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['title'],'content' => $this->_smarty_vars['capture']['mainbox'],'select_languages' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
