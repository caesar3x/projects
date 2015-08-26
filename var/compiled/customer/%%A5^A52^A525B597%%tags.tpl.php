<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:20
         compiled from addons/tags/views/tags/components/tags.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'script', 'addons/tags/views/tags/components/tags.tpl', 5, false),array('function', 'set_id', 'addons/tags/views/tags/components/tags.tpl', 40, false),array('modifier', 'fn_url', 'addons/tags/views/tags/components/tags.tpl', 7, false),array('modifier', 'escape', 'addons/tags/views/tags/components/tags.tpl', 16, false),array('modifier', 'trim', 'addons/tags/views/tags/components/tags.tpl', 40, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('popular_tags','none','my_tags','sign_in_to_enter_tags','save_tags'));
?>
<?php ob_start(); ?>
<div id="content_tags">
	
	<?php echo smarty_function_script(array('src' => "addons/tags/js/tags_autocomplete.js"), $this);?>


    <form action="<?php echo fn_url(""); ?>
" method="post" name="add_tags_form">
		<input type="hidden" name="redirect_url" value="<?php echo $this->_tpl_vars['config']['current_url']; ?>
" />
		<input type="hidden" name="tags_data[object_type]" value="<?php echo $this->_tpl_vars['object_type']; ?>
" />
		<input type="hidden" name="tags_data[object_id]" value="<?php echo $this->_tpl_vars['object_id']; ?>
" />
		<input type="hidden" name="selected_section" value="tags" />
		<div class="form-field">
			<label><?php echo fn_get_lang_var('popular_tags', $this->getLanguage()); ?>
:</label>
			<?php if ($this->_tpl_vars['object']['tags']['popular']): ?>
				<?php $_from = $this->_tpl_vars['object']['tags']['popular']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tags'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tags']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tags']['iteration']++;
?>
					<?php $this->assign('tag_name', smarty_modifier_escape($this->_tpl_vars['tag']['tag'], 'url'), false); ?>
					<a href="<?php echo fn_url("tags.view?tag=".($this->_tpl_vars['tag_name'])); ?>
"><?php echo $this->_tpl_vars['tag']['tag']; ?>
</a> <?php if (! ($this->_foreach['tags']['iteration'] == $this->_foreach['tags']['total'])): ?>,<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php else: ?>
				<?php echo fn_get_lang_var('none', $this->getLanguage()); ?>

			<?php endif; ?>
		</div>

		<div class="form-field">
			<label><?php echo fn_get_lang_var('my_tags', $this->getLanguage()); ?>
:</label>
			<?php if ($this->_tpl_vars['auth']['user_id']): ?>
				<input id="elm_my_tags" type="text" class="input-text-large" name="tags_data[values]" value="<?php $_from = $this->_tpl_vars['object']['tags']['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tags'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tags']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tag']):
        $this->_foreach['tags']['iteration']++;
?><?php echo $this->_tpl_vars['tag']['tag']; ?>
<?php if (! ($this->_foreach['tags']['iteration'] == $this->_foreach['tags']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?>" />

			<?php else: ?>
				<?php $this->assign('return_current_url', smarty_modifier_escape($this->_tpl_vars['config']['current_url'], 'url'), false); ?>
				<a class="text-button" href="<?php if ($this->_tpl_vars['controller'] == 'auth' && $this->_tpl_vars['mode'] == 'login_form'): ?><?php echo fn_url($this->_tpl_vars['config']['current_url']); ?>
<?php else: ?><?php echo fn_url("auth.login_form?return_url=".($this->_tpl_vars['return_current_url'])); ?>
<?php endif; ?>"><?php echo fn_get_lang_var('sign_in_to_enter_tags', $this->getLanguage()); ?>
</a>
			<?php endif; ?>
		</div>

		<div class="buttons-container">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('but_text' => fn_get_lang_var('save_tags', $this->getLanguage()),'but_name' => "dispatch[tags.update]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</form>
</div>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/tags/views/tags/components/tags.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/tags/views/tags/components/tags.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>