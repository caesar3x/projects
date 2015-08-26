<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'top.tpl', 5, false),array('modifier', 'trim', 'top.tpl', 20, false),array('function', 'set_id', 'top.tpl', 20, false),)), $this); ?>
<?php ob_start(); ?>
<div class="header-helper-container">
	<div class="logo-image">
		<a href="<?php echo fn_url(""); ?>
"><img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/<?php echo $this->_tpl_vars['manifest']['Customer_logo']['filename']; ?>
" width="<?php echo $this->_tpl_vars['manifest']['Customer_logo']['width']; ?>
" height="<?php echo $this->_tpl_vars['manifest']['Customer_logo']['height']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['manifest']['Customer_logo']['alt']; ?>
" /></a>
	</div>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "top_quick_links.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "top_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div class="content-tools">
	<span class="float-left">&nbsp;</span>
	<span class="float-right">&nbsp;</span>
	<div class="content-tools-helper clear">
			
		
	</div>
</div><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="top.tpl" id="<?php echo smarty_function_set_id(array('name' => "top.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>