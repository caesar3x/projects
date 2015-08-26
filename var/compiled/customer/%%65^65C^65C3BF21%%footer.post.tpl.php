<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:06
         compiled from addons/google_analytics/hooks/index/footer.post.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'trim', 'addons/google_analytics/hooks/index/footer.post.tpl', 17, false),array('function', 'set_id', 'addons/google_analytics/hooks/index/footer.post.tpl', 17, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?>
<script type="text/javascript">
//<![CDATA[
	var _gaq = _gaq || [];
	_gaq.push(["_setAccount", "<?php echo $this->_tpl_vars['addons']['google_analytics']['tracking_code']; ?>
"]);
	_gaq.push(["_trackPageview"]);
	
	(function() <?php echo $this->_tpl_vars['ldelim']; ?>

		var ga = document.createElement("script");
		ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
		ga.setAttribute("async", "true");
		document.documentElement.firstChild.appendChild(ga);
	<?php echo $this->_tpl_vars['rdelim']; ?>
)();
//]]>
</script>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="addons/google_analytics/hooks/index/footer.post.tpl" id="<?php echo smarty_function_set_id(array('name' => "addons/google_analytics/hooks/index/footer.post.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>