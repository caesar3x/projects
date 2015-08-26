<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:20
         compiled from common_templates/previewer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'script', 'common_templates/previewer.tpl', 8, false),array('function', 'set_id', 'common_templates/previewer.tpl', 8, false),array('modifier', 'trim', 'common_templates/previewer.tpl', 8, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?>
<script type="text/javascript">
//<![CDATA[
	var rel = "<?php echo $this->_tpl_vars['rel']; ?>
";
//]]>
</script>
<?php echo smarty_function_script(array('src' => "js/previewers/".($this->_tpl_vars['settings']['Appearance']['default_image_previewer']).".previewer.js"), $this);?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="common_templates/previewer.tpl" id="<?php echo smarty_function_set_id(array('name' => "common_templates/previewer.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>