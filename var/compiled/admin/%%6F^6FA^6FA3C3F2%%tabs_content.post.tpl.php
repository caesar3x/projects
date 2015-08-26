<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:43
         compiled from addons/tags/hooks/pages/tabs_content.post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'script', 'addons/tags/hooks/pages/tabs_content.post.tpl', 7, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('popular_tags','none','my_tags'));
?>
<?php  ob_start();  ?>
<?php if ($this->_tpl_vars['addons']['tags']['tags_for_pages'] == 'Y'): ?>
	<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('object' => $this->_tpl_vars['page_data'], 'input_name' => 'page_data', )); ?>
<div id="content_tags">

<?php echo smarty_function_script(array('src' => "addons/tags/js/tags_autocomplete.js"), $this);?>


<fieldset>
	<div class="form-field">
		<label><?php echo fn_get_lang_var('popular_tags', $this->getLanguage()); ?>
:</label>
		<?php if ($this->_tpl_vars['object']['tags']['popular']): ?>
			<?php $_from = $this->_tpl_vars['object']['tags']['popular']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tags'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tags']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tags']['iteration']++;
?>
				<?php echo $this->_tpl_vars['tag']['tag']; ?>
(<?php echo $this->_tpl_vars['tag']['popularity']; ?>
) <?php if (! ($this->_foreach['tags']['iteration'] == $this->_foreach['tags']['total'])): ?>,<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
			<?php echo fn_get_lang_var('none', $this->getLanguage()); ?>

		<?php endif; ?>
	</div>

	<div class="form-field">
		<label><?php echo fn_get_lang_var('my_tags', $this->getLanguage()); ?>
:</label>
		<input id="elm_my_tags" type="text" class="input-text-large" name="<?php echo $this->_tpl_vars['input_name']; ?>
[tags]" value="<?php $_from = $this->_tpl_vars['object']['tags']['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tags'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tags']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tags']['iteration']++;
?><?php echo $this->_tpl_vars['tag']['tag']; ?>
<?php if (! ($this->_foreach['tags']['iteration'] == $this->_foreach['tags']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?>" />
	</div>
</fieldset>

</div>
<?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
<?php endif; ?><?php  ob_end_flush();  ?>