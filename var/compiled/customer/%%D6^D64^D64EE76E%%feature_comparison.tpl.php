<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from blocks/feature_comparison.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'blocks/feature_comparison.tpl', 9, false),array('modifier', 'unescape', 'blocks/feature_comparison.tpl', 9, false),array('modifier', 'escape', 'blocks/feature_comparison.tpl', 22, false),array('modifier', 'trim', 'blocks/feature_comparison.tpl', 35, false),array('function', 'set_id', 'blocks/feature_comparison.tpl', 35, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('compare','clear_list','clear_list'));
?>
<?php ob_start(); ?>
<div id="comparison_list">

<?php if ($this->_tpl_vars['compared_products']): ?>
<ul class="bullets-list">
	<?php $_from = $this->_tpl_vars['compared_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
		<li><a <?php if ($this->_tpl_vars['product']['product_id'] == $this->_tpl_vars['new_product']): ?>id="blinking_elm<?php echo $this->_tpl_vars['block']['block_id']; ?>
"<?php endif; ?> href="<?php echo fn_url("products.view?product_id=".($this->_tpl_vars['product']['product_id'])); ?>
" class="underlined"><?php echo smarty_modifier_unescape($this->_tpl_vars['product']['product']); ?>
</a></li>
	<?php endforeach; endif; unset($_from); ?>
</ul>

<div class="clear">
	<div class="float-left">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('but_text' => fn_get_lang_var('compare', $this->getLanguage()),'but_href' => "product_features.compare",'but_role' => 'text')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>

	<div class="float-right">
		<?php if ($this->_tpl_vars['settings']['DHTML']['ajax_comparison_list'] == 'Y'): ?>
			<?php $this->assign('ajax_class', "cm-ajax", false); ?>
		<?php endif; ?>
		<?php $this->assign('c_url', smarty_modifier_escape($this->_tpl_vars['config']['current_url'], 'url'), false); ?>
		<?php if ($this->_tpl_vars['mode'] == 'compare'): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('but_text' => fn_get_lang_var('clear_list', $this->getLanguage()),'but_href' => "product_features.clear_list?redirect_url=".($this->_tpl_vars['index_script']),'but_role' => 'text')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "buttons/button.tpl", 'smarty_include_vars' => array('but_text' => fn_get_lang_var('clear_list', $this->getLanguage()),'but_href' => "product_features.clear_list?redirect_url=".($this->_tpl_vars['c_url']),'but_rev' => 'comparison_list','but_meta' => $this->_tpl_vars['ajax_class'],'but_role' => 'text')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
	</div>
</div>
<?php else: ?>
<?php ob_start(); ?>Y<?php $this->_smarty_vars['capture']['hide_wrapper'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>

<!--comparison_list--></div>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/feature_comparison.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/feature_comparison.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>