<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:20
         compiled from common_templates/tabsbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'empty_tabs', 'common_templates/tabsbox.tpl', 7, false),array('modifier', 'in_array', 'common_templates/tabsbox.tpl', 14, false),array('modifier', 'fn_url', 'common_templates/tabsbox.tpl', 19, false),array('modifier', 'trim', 'common_templates/tabsbox.tpl', 42, false),array('function', 'script', 'common_templates/tabsbox.tpl', 10, false),array('function', 'set_id', 'common_templates/tabsbox.tpl', 42, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?><?php if (! $this->_tpl_vars['active_tab']): ?>
	<?php $this->assign('active_tab', $this->_tpl_vars['_REQUEST']['selected_section'], false); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['navigation']['tabs']): ?>

<?php $this->assign('empty_tab_ids', smarty_modifier_empty_tabs($this->_tpl_vars['content']), false); ?>
<?php $this->assign('_tabs', false, false); ?>

<?php echo smarty_function_script(array('src' => "js/tabs.js"), $this);?>

<div class="tabs clear cm-j-tabs<?php if ($this->_tpl_vars['track']): ?> cm-track<?php endif; ?>">
	<ul <?php if ($this->_tpl_vars['tabs_section']): ?>id="tabs_<?php echo $this->_tpl_vars['tabs_section']; ?>
"<?php endif; ?>>
	<?php $_from = $this->_tpl_vars['navigation']['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tabs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tabs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tab']):
        $this->_foreach['tabs']['iteration']++;
?>
		<?php if (( ( ! $this->_tpl_vars['tabs_section'] && ! $this->_tpl_vars['tab']['section'] ) || ( $this->_tpl_vars['tabs_section'] == $this->_tpl_vars['tab']['section'] ) ) && ! smarty_modifier_in_array($this->_tpl_vars['key'], $this->_tpl_vars['empty_tab_ids'])): ?>
		<?php if (! $this->_tpl_vars['active_tab']): ?>
			<?php $this->assign('active_tab', $this->_tpl_vars['key'], false); ?>
		<?php endif; ?>
		<?php $this->assign('_tabs', true, false); ?>
		<li id="<?php echo $this->_tpl_vars['key']; ?>
" class="<?php if ($this->_tpl_vars['tab']['js']): ?>cm-js<?php elseif ($this->_tpl_vars['tab']['ajax']): ?>cm-js cm-ajax<?php endif; ?><?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['active_tab']): ?> cm-active<?php endif; ?>"><a<?php if ($this->_tpl_vars['tab']['href']): ?> href="<?php echo fn_url($this->_tpl_vars['tab']['href']); ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['tab']['title']; ?>
</a></li>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>

<?php if ($this->_tpl_vars['_tabs']): ?>
<div class="cm-tabs-content clear" id="tabs_content">
	<?php echo $this->_tpl_vars['content']; ?>

</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['onclick']): ?>
<script>
	//<![CDATA[
	var hndl = <?php echo $this->_tpl_vars['ldelim']; ?>

		'tabs_<?php echo $this->_tpl_vars['tabs_section']; ?>
': <?php echo $this->_tpl_vars['onclick']; ?>

	<?php echo $this->_tpl_vars['rdelim']; ?>

	//]]>
</script>
<?php endif; ?>
<?php else: ?>
	<?php echo $this->_tpl_vars['content']; ?>

<?php endif; ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="common_templates/tabsbox.tpl" id="<?php echo smarty_function_set_id(array('name' => "common_templates/tabsbox.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>