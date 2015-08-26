<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:20
         compiled from views/products/components/product_images.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'reset', 'views/products/components/product_images.tpl', 8, false),array('modifier', 'trim', 'views/products/components/product_images.tpl', 93, false),array('function', 'script', 'views/products/components/product_images.tpl', 58, false),array('function', 'set_id', 'views/products/components/product_images.tpl', 93, false),)), $this); ?>
<?php ob_start(); ?>
<?php $this->assign('th_size', '30', false); ?>

<?php if ($this->_tpl_vars['product']['main_pair']['icon'] || $this->_tpl_vars['product']['main_pair']['detailed']): ?>
	<?php $this->assign('image_pair_var', $this->_tpl_vars['product']['main_pair'], false); ?>
<?php elseif ($this->_tpl_vars['product']['option_image_pairs']): ?>
	<?php $this->assign('image_pair_var', reset($this->_tpl_vars['product']['option_image_pairs']), false); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['image_pair_var']['image_id'] == 0): ?>
	<?php $this->assign('image_id', $this->_tpl_vars['image_pair_var']['detailed_id'], false); ?>
<?php else: ?>
	<?php $this->assign('image_id', $this->_tpl_vars['image_pair_var']['image_id'], false); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('obj_id' => ($this->_tpl_vars['product']['product_id'])."_".($this->_tpl_vars['image_id']),'images' => $this->_tpl_vars['image_pair_var'],'object_type' => 'detailed_product','show_thumbnail' => 'Y','image_width' => $this->_tpl_vars['settings']['Thumbnails']['product_details_thumbnail_width'],'image_height' => $this->_tpl_vars['settings']['Thumbnails']['product_details_thumbnail_height'],'rel' => "preview[product_images]",'wrap_image' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_from = $this->_tpl_vars['product']['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image_pair']):
?>
	<?php if ($this->_tpl_vars['image_pair']): ?>
		<?php if ($this->_tpl_vars['image_pair']['image_id'] == 0): ?>
			<?php $this->assign('image_id', $this->_tpl_vars['image_pair']['detailed_id'], false); ?>
		<?php else: ?>
			<?php $this->assign('image_id', $this->_tpl_vars['image_pair']['image_id'], false); ?>
		<?php endif; ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('images' => $this->_tpl_vars['image_pair'],'object_type' => 'detailed_product','link_class' => 'hidden','show_thumbnail' => 'Y','detailed_link_class' => 'hidden','obj_id' => ($this->_tpl_vars['product']['product_id'])."_".($this->_tpl_vars['image_id']),'image_width' => $this->_tpl_vars['settings']['Thumbnails']['product_details_thumbnail_width'],'image_height' => $this->_tpl_vars['settings']['Thumbnails']['product_details_thumbnail_height'],'rel' => "preview[product_images]",'wrap_image' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['image_pair_var'] && $this->_tpl_vars['product']['image_pairs']): ?>
	<?php if ($this->_tpl_vars['settings']['Appearance']['thumbnails_gallery'] == 'Y'): ?>
	<input type="hidden" name="no_cache" value="1" />
	<?php echo '<ul id="product_thumbnails" class="center jcarousel-skin"><li>'; ?><?php if ($this->_tpl_vars['image_pair_var']['image_id'] == 0): ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair_var']['detailed_id'], false); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair_var']['image_id'], false); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('images' => $this->_tpl_vars['image_pair_var'],'object_type' => 'detailed_product','link_class' => "cm-thumbnails-mini cm-cur-item",'image_width' => $this->_tpl_vars['th_size'],'image_height' => $this->_tpl_vars['th_size'],'show_thumbnail' => 'Y','show_detailed_link' => false,'make_box' => true,'obj_id' => ($this->_tpl_vars['product']['product_id'])."_".($this->_tpl_vars['img_id'])."_mini",'wrap_image' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</li>'; ?><?php $_from = $this->_tpl_vars['product']['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image_pair']):
?><?php echo ''; ?><?php if ($this->_tpl_vars['image_pair']): ?><?php echo '<li>'; ?><?php if ($this->_tpl_vars['image_pair']['image_id'] == 0): ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair']['detailed_id'], false); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair']['image_id'], false); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('images' => $this->_tpl_vars['image_pair'],'object_type' => 'detailed_product','link_class' => "cm-thumbnails-mini",'image_width' => $this->_tpl_vars['th_size'],'image_height' => $this->_tpl_vars['th_size'],'show_thumbnail' => 'Y','show_detailed_link' => false,'make_box' => true,'obj_id' => ($this->_tpl_vars['product']['product_id'])."_".($this->_tpl_vars['img_id'])."_mini",'wrap_image' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</li>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</ul>'; ?>


		<?php echo smarty_function_script(array('src' => "js/jquery.jcarousel.js"), $this);?>


	<?php else: ?>
		<div class="center" id="product_thumbnails" style="width: <?php echo $this->_tpl_vars['settings']['Thumbnails']['product_details_thumbnail_width']; ?>
px;">
		<?php echo ''; ?><?php if ($this->_tpl_vars['image_pair_var']['image_id'] == 0): ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair_var']['detailed_id'], false); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair_var']['image_id'], false); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('images' => $this->_tpl_vars['image_pair_var'],'object_type' => 'detailed_product','link_class' => "cm-thumbnails-mini cm-cur-item",'image_width' => $this->_tpl_vars['th_size'],'image_height' => $this->_tpl_vars['th_size'],'show_thumbnail' => 'Y','show_detailed_link' => false,'obj_id' => ($this->_tpl_vars['product']['product_id'])."_".($this->_tpl_vars['img_id'])."_mini",'make_box' => true,'wrap_image' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['product']['image_pairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image_pair']):
?><?php echo ''; ?><?php if ($this->_tpl_vars['image_pair']): ?><?php echo ''; ?><?php if ($this->_tpl_vars['image_pair']['image_id'] == 0): ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair']['detailed_id'], false); ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php $this->assign('img_id', $this->_tpl_vars['image_pair']['image_id'], false); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('images' => $this->_tpl_vars['image_pair'],'object_type' => 'detailed_product','link_class' => "cm-thumbnails-mini",'image_width' => $this->_tpl_vars['th_size'],'image_height' => $this->_tpl_vars['th_size'],'show_thumbnail' => 'Y','show_detailed_link' => false,'obj_id' => ($this->_tpl_vars['product']['product_id'])."_".($this->_tpl_vars['img_id'])."_mini",'make_box' => true,'wrap_image' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

	    </div>
	<?php endif; ?>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/previewer.tpl", 'smarty_include_vars' => array('rel' => "preview[product_images]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_script(array('src' => "js/product_image_gallery.js"), $this);?>


<script type="text/javascript">
//<![CDATA[
jQuery.ceProductImageGallery();
//]]>
</script>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="views/products/components/product_images.tpl" id="<?php echo smarty_function_set_id(array('name' => "views/products/components/product_images.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>