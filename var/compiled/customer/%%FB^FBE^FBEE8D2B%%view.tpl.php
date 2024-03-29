<?php /* Smarty version 2.6.18, created on 2015-05-01 18:02:37
         compiled from views/categories/view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'hook', 'views/categories/view.tpl', 1, false),array('function', 'math', 'views/categories/view.tpl', 3, false),array('function', 'split', 'views/categories/view.tpl', 4, false),array('function', 'set_id', 'views/categories/view.tpl', 70, false),array('modifier', 'count', 'views/categories/view.tpl', 3, false),array('modifier', 'default', 'views/categories/view.tpl', 3, false),array('modifier', 'unescape', 'views/categories/view.tpl', 7, false),array('modifier', 'fn_url', 'views/categories/view.tpl', 34, false),array('modifier', 'fn_get_products_views', 'views/categories/view.tpl', 53, false),array('modifier', 'trim', 'views/categories/view.tpl', 70, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('text_no_products'));
?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('hook', array('name' => "categories:view")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['subcategories'] || $this->_tpl_vars['category_data']['description'] || $this->_tpl_vars['category_data']['main_pair']): ?>
<?php echo smarty_function_math(array('equation' => "ceil(n/c)",'assign' => 'rows','n' => count($this->_tpl_vars['subcategories']),'c' => smarty_modifier_default(@$this->_tpl_vars['columns'], '2')), $this);?>

<?php echo smarty_function_split(array('data' => $this->_tpl_vars['subcategories'],'size' => $this->_tpl_vars['rows'],'assign' => 'splitted_subcategories'), $this);?>


<?php if ($this->_tpl_vars['category_data']['description'] && $this->_tpl_vars['category_data']['description'] != ""): ?>
	<div class="compact wysiwyg-content margin-bottom"><?php echo smarty_modifier_unescape($this->_tpl_vars['category_data']['description']); ?>
</div>
<?php endif; ?>


<div class="clear">
	<?php if ($this->_tpl_vars['category_data']['main_pair']): ?>
	<div class="image-border float-left margin-bottom">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('show_detailed_link' => true,'images' => $this->_tpl_vars['category_data']['main_pair'],'object_type' => 'detailed_category','no_ids' => true,'rel' => 'category_image','show_thumbnail' => 'Y','image_width' => $this->_tpl_vars['settings']['Thumbnails']['category_details_thumbnail_width'],'image_height' => $this->_tpl_vars['settings']['Thumbnails']['category_details_thumbnail_height'],'hide_if_no_image' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>

	<?php if ($this->_tpl_vars['category_data']['main_pair']['detailed_id']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/previewer.tpl", 'smarty_include_vars' => array('rel' => 'category_image')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['subcategories']): ?>
	<div class="subcategories">
	<?php if (count($this->_tpl_vars['subcategories']) < 6): ?>
		<ul>
	<?php endif; ?>
	<?php $_from = $this->_tpl_vars['splitted_subcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ssubcateg']):
?>
		<?php if (count($this->_tpl_vars['subcategories']) >= 6): ?>
			<div class="subcategories">
				<ul>
		<?php endif; ?>
			<?php $_from = $this->_tpl_vars['ssubcateg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ssubcateg'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ssubcateg']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category']):
        $this->_foreach['ssubcateg']['iteration']++;
?>
			<?php if ($this->_tpl_vars['category']['category_id']): ?><li><a href="<?php echo fn_url("categories.view?category_id=".($this->_tpl_vars['category']['category_id'])); ?>
" class="strong"><?php echo $this->_tpl_vars['category']['category']; ?>
</a></li><?php endif; ?>

		<?php endforeach; endif; unset($_from); ?>
		<?php if (count($this->_tpl_vars['subcategories']) >= 6): ?>
				</ul>
			</div>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php if (count($this->_tpl_vars['subcategories']) < 6): ?>
	</ul>
	<?php endif; ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['_REQUEST']['advanced_filter']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/products/components/product_filters_advanced_form.tpl", 'smarty_include_vars' => array('separate_form' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['products']): ?>
<?php $this->assign('layouts', fn_get_products_views("", false, 0), false); ?>
<?php if ($this->_tpl_vars['category_data']['product_columns']): ?>
	<?php $this->assign('product_columns', $this->_tpl_vars['category_data']['product_columns'], false); ?>
<?php else: ?>
	<?php $this->assign('product_columns', $this->_tpl_vars['settings']['Appearance']['columns_in_products_list'], false); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['layouts'][$this->_tpl_vars['selected_layout']]['template']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['layouts'][$this->_tpl_vars['selected_layout']]['template']), 'smarty_include_vars' => array('columns' => ($this->_tpl_vars['product_columns']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php elseif (! $this->_tpl_vars['subcategories']): ?>
<p class="no-items"><?php echo fn_get_lang_var('text_no_products', $this->getLanguage()); ?>
</p>
<?php endif; ?>

<?php ob_start(); ?><?php echo $this->_tpl_vars['category_data']['category']; ?>
<?php $this->_smarty_vars['capture']['mainbox_title'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['addons']['discussion']['status'] == 'A'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/discussion/hooks/categories/view.post.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="views/categories/view.tpl" id="<?php echo smarty_function_set_id(array('name' => "views/categories/view.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>