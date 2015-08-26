<?php /* Smarty version 2.6.18, created on 2015-06-05 22:09:53
         compiled from addons/banners/pickers/banners_picker_contents.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_is_empty', 'addons/banners/pickers/banners_picker_contents.tpl', 1, false),array('modifier', 'escape', 'addons/banners/pickers/banners_picker_contents.tpl', 6, false),array('modifier', 'fn_url', 'addons/banners/pickers/banners_picker_contents.tpl', 31, false),array('modifier', 'default', 'addons/banners/pickers/banners_picker_contents.tpl', 42, false),array('function', 'cycle', 'addons/banners/pickers/banners_picker_contents.tpl', 40, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('text_items_added','banner','no_items','add_banners','add_banners_and_close'));
?>

<?php if (! $this->_tpl_vars['_REQUEST']['extra']): ?>
<script type="text/javascript">
//<![CDATA[
lang.text_items_added = '<?php echo smarty_modifier_escape(fn_get_lang_var('text_items_added', $this->getLanguage()), 'javascript'); ?>
';
<?php echo '
	function fn_form_post_banners_form(frm, elm) 
	{
		var banners = {};

		if ($(\'input.cm-item:checked\', $(frm)).length > 0) {
			$(\'input.cm-item:checked\', $(frm)).each( function() {
				var id = $(this).val();
				banners[id] = $(\'#banner_\' + id).text();
			});

			jQuery.add_js_item(frm.attr(\'rev\'), banners, \'b\', null);

			jQuery.showNotifications({\'notification\': {\'type\': \'N\', \'title\': lang.notice, \'message\': lang.text_items_added, \'save_state\': false}});
		}

		return false;
	}
'; ?>

//]]>
</script>
<?php endif; ?>
</head>

<form action="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['_REQUEST']['extra'])); ?>
" rev="<?php echo $this->_tpl_vars['_REQUEST']['data_id']; ?>
" method="post" name="banners_form">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table">
<tr>
	<th>
		<input type="checkbox" name="check_all" value="Y" class="checkbox cm-check-items" /></th>
	<th><?php echo fn_get_lang_var('banner', $this->getLanguage()); ?>
</th>
</tr>
<?php $_from = $this->_tpl_vars['banners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner']):
?>
<tr <?php echo smarty_function_cycle(array('values' => "class=\"table-row\", "), $this);?>
>
	<td>
		<input type="checkbox" name="<?php echo smarty_modifier_default(@$this->_tpl_vars['_REQUEST']['checkbox_name'], 'banners_ids'); ?>
[]" value="<?php echo $this->_tpl_vars['banner']['banner_id']; ?>
" class="checkbox cm-item" /></td>
	<td id="banner_<?php echo $this->_tpl_vars['banner']['banner_id']; ?>
" width="100%"><?php echo $this->_tpl_vars['banner']['banner']; ?>
</td>
</tr>
<?php endforeach; else: ?>
<tr class="no-items">
	<td colspan="2"><p><?php echo fn_get_lang_var('no_items', $this->getLanguage()); ?>
</p></td>
</tr>
<?php endif; unset($_from); ?>
</table>

<?php if ($this->_tpl_vars['banners']): ?>
<div class="buttons-container">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/add_close.tpl", 'smarty_include_vars' => array('but_text' => fn_get_lang_var('add_banners', $this->getLanguage()),'but_close_text' => fn_get_lang_var('add_banners_and_close', $this->getLanguage()),'is_js' => fn_is_empty($this->_tpl_vars['_REQUEST']['extra']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php endif; ?>

</form>