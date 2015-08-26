<?php /* Smarty version 2.6.18, created on 2015-05-02 01:56:36
         compiled from addons/news_and_emails/views/news/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'addons/news_and_emails/views/news/list.tpl', 10, false),array('modifier', 'fn_url', 'addons/news_and_emails/views/news/list.tpl', 15, false),array('modifier', 'unescape', 'addons/news_and_emails/views/news/list.tpl', 18, false),array('modifier', 'trim', 'addons/news_and_emails/views/news/list.tpl', 28, false),array('block', 'hook', 'addons/news_and_emails/views/news/list.tpl', 17, false),array('function', 'set_id', 'addons/news_and_emails/views/news/list.tpl', 28, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('date_added','more_w_ellipsis','site_news'));
?>
<?php ob_start(); ?>
<?php if ($this->_tpl_vars['news']): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/pagination.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['n']):
?>
<a name="<?php echo $this->_tpl_vars['n']['news_id']; ?>
"></a>
<h5 class="info-field-title">
	<em class="float-right"><?php echo fn_get_lang_var('date_added', $this->getLanguage()); ?>
: <?php echo smarty_modifier_date_format($this->_tpl_vars['n']['date'], ($this->_tpl_vars['settings']['Appearance']['date_format'])); ?>
</em>
	<?php echo $this->_tpl_vars['n']['news']; ?>

</h5>
<div class="info-field-body wysiwyg-content">
<?php if ($this->_tpl_vars['n']['separate'] == 'Y'): ?>
	<a href="<?php echo fn_url("news.view?news_id=".($this->_tpl_vars['n']['news_id'])); ?>
"><?php echo fn_get_lang_var('more_w_ellipsis', $this->getLanguage()); ?>
</a>
<?php else: ?>
	<?php $this->_tag_stack[] = array('hook', array('name' => "news:list")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		<?php echo smarty_modifier_unescape($this->_tpl_vars['n']['description']); ?>

	<?php if ($this->_tpl_vars['addons']['discussion']['status'] == 'A'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/discussion/hooks/news/list.post.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>
</div>
<?php endforeach; endif; unset($_from); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/pagination.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>

<?php ob_start(); ?><?php echo fn_get_lang_var('site_news', $this->getLanguage()); ?>
<?php $this->_smarty_vars['capture']['mainbox_title'] = ob_get_contents(); ob_end_clean(); ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/news_and_emails/views/news/list.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/news_and_emails/views/news/list.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>