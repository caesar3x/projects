<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from common_templates/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'common_templates/search.tpl', 1, false),array('modifier', 'fn_get_subcategories', 'common_templates/search.tpl', 16, false),array('modifier', 'escape', 'common_templates/search.tpl', 17, false),array('modifier', 'truncate', 'common_templates/search.tpl', 17, false),array('modifier', 'trim', 'common_templates/search.tpl', 35, false),array('block', 'hook', 'common_templates/search.tpl', 9, false),array('function', 'set_id', 'common_templates/search.tpl', 35, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('search','all_categories','search','search','advanced_search'));
?>
<?php ob_start(); ?><form action="<?php echo fn_url(""); ?>
" name="search_form" method="get">
<input type="hidden" name="subcats" value="Y" />
<input type="hidden" name="status" value="A" />
<input type="hidden" name="pshort" value="Y" />
<input type="hidden" name="pfull" value="Y" />
<input type="hidden" name="pname" value="Y" />
<input type="hidden" name="pkeywords" value="Y" />
<input type="hidden" name="search_performed" value="Y" />
<?php $this->_tag_stack[] = array('hook', array('name' => "search:additional_fields")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> 

<span class="search-products-text"><?php echo fn_get_lang_var('search', $this->getLanguage()); ?>
:</span>
<?php $this->_tag_stack[] = array('hook', array('name' => "search:search_inputs")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if (! $this->_tpl_vars['settings']['General']['search_objects']): ?>
<select	name="cid" class="search-selectbox">
	<option	value="0">- <?php echo fn_get_lang_var('all_categories', $this->getLanguage()); ?>
 -</option>
	<?php $_from = fn_get_subcategories(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
	<option	value="<?php echo $this->_tpl_vars['cat']['category_id']; ?>
" <?php if ($this->_tpl_vars['cat']['disabled']): ?>disabled="disabled"<?php endif; ?> <?php if ($this->_tpl_vars['mode'] == 'search' && $this->_tpl_vars['_REQUEST']['cid'] == $this->_tpl_vars['cat']['category_id']): ?>selected="selected"<?php elseif ($this->_tpl_vars['_REQUEST']['category_id'] == $this->_tpl_vars['cat']['category_id']): ?>selected="selected"<?php endif; ?> title="<?php echo smarty_modifier_escape($this->_tpl_vars['cat']['category'], 'html'); ?>
"><?php echo smarty_modifier_truncate(smarty_modifier_escape($this->_tpl_vars['cat']['category'], 'html'), 100, "...", true); ?>
</option>
	<?php endforeach; endif; unset($_from); ?>
</select>
<?php endif; ?>

<?php echo '<input type="text" name="q" value="'; ?><?php echo $this->_tpl_vars['search']['q']; ?><?php echo '" onfocus="this.select();" class="search-input" />'; ?><?php if ($this->_tpl_vars['settings']['General']['search_objects']): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/go.tpl", 'smarty_include_vars' => array('but_name' => "search.results",'alt' => fn_get_lang_var('search', $this->getLanguage()))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/go.tpl", 'smarty_include_vars' => array('but_name' => "products.search",'alt' => fn_get_lang_var('search', $this->getLanguage()))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if (! $this->_tpl_vars['hide_advanced_search']): ?><?php echo '<a href="'; ?><?php echo fn_url("products.search"); ?><?php echo '" class="search-advanced">'; ?><?php echo fn_get_lang_var('advanced_search', $this->getLanguage()); ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</form><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="common_templates/search.tpl" id="<?php echo smarty_function_set_id(array('name' => "common_templates/search.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>