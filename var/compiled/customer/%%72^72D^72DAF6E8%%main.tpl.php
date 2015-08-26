<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:05
         compiled from main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'main.tpl', 3, false),array('function', 'set_id', 'main.tpl', 58, false),array('modifier', 'trim', 'main.tpl', 7, false),array('block', 'hook', 'main.tpl', 8, false),)), $this); ?>
<?php ob_start(); ?>
<?php echo smarty_function_block(array('group' => 'top','assign' => 'top'), $this);?>

<?php echo smarty_function_block(array('group' => 'left','assign' => 'left'), $this);?>

<?php echo smarty_function_block(array('group' => 'right','assign' => 'right'), $this);?>

<?php echo smarty_function_block(array('group' => 'bottom','assign' => 'bottom'), $this);?>

<div id="container" class="container<?php if (! trim($this->_tpl_vars['left']) && ! trim($this->_tpl_vars['right'])): ?>-long<?php elseif (! trim($this->_tpl_vars['left'])): ?>-left<?php elseif (! trim($this->_tpl_vars['right'])): ?>-right<?php endif; ?>">
	<?php $this->_tag_stack[] = array('hook', array('name' => "index:main_content")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<div id="header"><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	
	<div id="content">
		<div class="content-helper clear">
			<?php if (trim($this->_tpl_vars['top'])): ?>
			<div class="header">
				<?php echo $this->_tpl_vars['top']; ?>

			</div>
			<?php endif; ?>
			
			<?php $this->_tag_stack[] = array('hook', array('name' => "index:columns")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<div class="central-column">
				<div class="central-content">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/breadcrumbs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/notification.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					
					<?php echo smarty_function_block(array('group' => 'central'), $this);?>

				</div>
			</div>
		
			<?php if (trim($this->_tpl_vars['left'])): ?>
			<div class="left-column">
				<?php echo $this->_tpl_vars['left']; ?>

			</div>
			<?php endif; ?>
			
			<?php if (trim($this->_tpl_vars['right'])): ?>
			<div class="right-column">
				<?php echo $this->_tpl_vars['right']; ?>

			</div>
			<?php endif; ?>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			
			<?php if (trim($this->_tpl_vars['bottom'])): ?>
			<div class="bottom clear-both">
				<?php echo $this->_tpl_vars['bottom']; ?>

			</div>
			<?php endif; ?>
		</div>
	</div>
	
	<div id="footer">
		<div class="footer-helper-container">
			<div class="footer-top-helper"><span class="float-left">&nbsp;</span><span class="float-right">&nbsp;</span></div>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "bottom.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<div class="footer-bottom-helper"><span class="float-left">&nbsp;</span><span class="float-right">&nbsp;</span></div>
		</div>
	</div>
</div><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="main.tpl" id="<?php echo smarty_function_set_id(array('name' => "main.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>