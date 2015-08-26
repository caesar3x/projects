<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from addons/news_and_emails/blocks/news.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'addons/news_and_emails/blocks/news.tpl', 8, false),array('modifier', 'fn_url', 'addons/news_and_emails/blocks/news.tpl', 9, false),array('modifier', 'trim', 'addons/news_and_emails/blocks/news.tpl', 21, false),array('function', 'set_id', 'addons/news_and_emails/blocks/news.tpl', 21, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('view_all'));
?>
<?php  ob_start();  ?><?php ob_start(); ?>
<?php if ($this->_tpl_vars['items']): ?>
<ul class="site-news">
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['site_news'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['site_news']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['site_news']['iteration']++;
?>
	<li>
		<strong><?php echo smarty_modifier_date_format($this->_tpl_vars['news']['date'], $this->_tpl_vars['settings']['Appearance']['date_format']); ?>
</strong>
		<a href="<?php echo fn_url("news.view?news_id=".($this->_tpl_vars['news']['news_id'])); ?>
"><?php echo $this->_tpl_vars['news']['news']; ?>
</a>
	</li>
	<?php if (! ($this->_foreach['site_news']['iteration'] == $this->_foreach['site_news']['total'])): ?>
	<li class="delim"></li>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>

<p class="right">
	<a href="<?php echo fn_url("news.list"); ?>
" class="extra-link"><?php echo fn_get_lang_var('view_all', $this->getLanguage()); ?>
</a>
</p>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/news_and_emails/blocks/news.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/news_and_emails/blocks/news.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>