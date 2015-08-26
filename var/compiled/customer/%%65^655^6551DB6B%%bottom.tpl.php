<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from bottom.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'hook', 'bottom.tpl', 8, false),array('modifier', 'fn_url', 'bottom.tpl', 11, false),array('modifier', 'date_format', 'bottom.tpl', 16, false),array('modifier', 'defined', 'bottom.tpl', 24, false),array('modifier', 'fn_check_meta_redirect', 'bottom.tpl', 30, false),array('modifier', 'trim', 'bottom.tpl', 32, false),array('function', 'set_id', 'bottom.tpl', 32, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('skin_by'));
?>
<?php ob_start(); ?>
<div class="bottom-search center">
	<span class="float-left">&nbsp;</span>
	<span class="float-right">&nbsp;</span>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/search.tpl", 'smarty_include_vars' => array('hide_advanced_search' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php $this->_tag_stack[] = array('hook', array('name' => "index:bottom_links")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<p class="quick-links">
	<?php $_from = $this->_tpl_vars['quick_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
		<a href="<?php echo fn_url($this->_tpl_vars['link']['param']); ?>
"><?php echo $this->_tpl_vars['link']['descr']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
</p>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_tag_stack[] = array('hook', array('name' => "index:bottom")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<p class="bottom-copyright class">&copy; <?php if (smarty_modifier_date_format(@TIME, "%Y") != $this->_tpl_vars['settings']['Company']['company_start_year']): ?><?php echo $this->_tpl_vars['settings']['Company']['company_start_year']; ?>
-<?php endif; ?><?php echo smarty_modifier_date_format(@TIME, "%Y"); ?>
 <?php echo $this->_tpl_vars['settings']['Company']['company_name']; ?>
.
</p>
<?php if ($this->_tpl_vars['addons']['affiliate']['status'] == 'A'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/affiliate/hooks/index/bottom.post.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['manifest']['copyright']): ?>
<p class="bottom-copyright mini"><?php echo fn_get_lang_var('skin_by', $this->getLanguage()); ?>
&nbsp;<a href="<?php echo $this->_tpl_vars['manifest']['copyright_url']; ?>
"><?php echo $this->_tpl_vars['manifest']['copyright']; ?>
</a></p>
<?php endif; ?>

<?php if (defined('DEBUG_MODE')): ?>
<div class="bug-report">
	<input type="button" onclick="window.open('bug_report.php','popupwindow','width=700,height=450,toolbar=yes,status=no,scrollbars=yes,resizable=no,menubar=yes,location=no,direction=no');" value="Report a bug" />
</div>
<?php endif; ?>

<?php if (fn_check_meta_redirect($this->_tpl_vars['_REQUEST']['meta_redirect_url'])): ?>
	<meta http-equiv="refresh" content="1;url=<?php echo fn_url(fn_check_meta_redirect($this->_tpl_vars['_REQUEST']['meta_redirect_url'])); ?>
" />
<?php endif; ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="bottom.tpl" id="<?php echo smarty_function_set_id(array('name' => "bottom.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>