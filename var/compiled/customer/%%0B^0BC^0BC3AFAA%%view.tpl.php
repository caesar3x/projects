<?php /* Smarty version 2.6.18, created on 2015-05-07 03:22:02
         compiled from addons/news_and_emails/views/news/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'addons/news_and_emails/views/news/view.tpl', 9, false),array('modifier', 'unescape', 'addons/news_and_emails/views/news/view.tpl', 13, false),array('modifier', 'trim', 'addons/news_and_emails/views/news/view.tpl', 26, false),array('block', 'hook', 'addons/news_and_emails/views/news/view.tpl', 16, false),array('function', 'set_id', 'addons/news_and_emails/views/news/view.tpl', 26, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('date_added','site_news'));
?>
<?php ob_start(); ?>
<?php if ($this->_tpl_vars['news']): ?>

<div class="wysiwyg-content">
	<?php ob_start(); ?>
	<div id="content_news">
		<h5 class="info-field-title">
			<em class="float-right"><?php echo fn_get_lang_var('date_added', $this->getLanguage()); ?>
: <?php echo smarty_modifier_date_format($this->_tpl_vars['news']['date'], ($this->_tpl_vars['settings']['Appearance']['date_format'])); ?>
</em>
			<?php echo $this->_tpl_vars['news']['news']; ?>

		</h5>
		<div class="info-field-body wysiwyg-content">
			<?php echo smarty_modifier_unescape($this->_tpl_vars['news']['description']); ?>

		</div>
	</div>
	<?php $this->_tag_stack[] = array('hook', array('name' => "news:view")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php if ($this->_tpl_vars['addons']['discussion']['status'] == 'A'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/discussion/hooks/news/view.post.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	
	<?php $this->_smarty_vars['capture']['tabsbox'] = ob_get_contents(); ob_end_clean(); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/tabsbox.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['tabsbox'],'active_tab' => $this->_tpl_vars['_REQUEST']['selected_section'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php ob_start(); ?><?php echo fn_get_lang_var('site_news', $this->getLanguage()); ?>
<?php $this->_smarty_vars['capture']['mainbox_title'] = ob_get_contents(); ob_end_clean(); ?>

<?php endif; ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/news_and_emails/views/news/view.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/news_and_emails/views/news/view.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>