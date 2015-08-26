<?php /* Smarty version 2.6.18, created on 2015-05-06 12:41:49
         compiled from blocks/list_templates/products_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'script', 'blocks/list_templates/products_list.tpl', 3, false),array('function', 'set_id', 'blocks/list_templates/products_list.tpl', 145, false),array('modifier', 'trim', 'blocks/list_templates/products_list.tpl', 11, false),array('modifier', 'fn_url', 'blocks/list_templates/products_list.tpl', 27, false),array('block', 'hook', 'blocks/list_templates/products_list.tpl', 11, false),)), $this); ?>
<?php ob_start(); ?><?php if ($this->_tpl_vars['products']): ?>

<?php echo smarty_function_script(array('src' => "js/exceptions.js"), $this);?>


<?php if (! $this->_tpl_vars['no_pagination']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/pagination.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['products'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['products']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['product']):
        $this->_foreach['products']['iteration']++;
?>
<?php ob_start(); ?><?php $this->_smarty_vars['capture']['capt_options_vs_qty'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['addons']['age_verification']['status'] == 'A'): ?><?php ob_start(); $this->_in_capture[] = '330741dd64785e3278fcc4d7d8c2eea1';
$_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/age_verification/hooks/products/product_block.override.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->_tpl_vars['addon_content'] = ob_get_contents(); ob_end_clean(); array_pop($this->_in_capture); if (!empty($this->_scripts['330741dd64785e3278fcc4d7d8c2eea1'])) { echo implode("\n", $this->_scripts['330741dd64785e3278fcc4d7d8c2eea1']); unset($this->_scripts['330741dd64785e3278fcc4d7d8c2eea1']); }
 ?><?php else: ?><?php $this->assign('addon_content', "", false); ?><?php endif; ?><?php if (trim($this->_tpl_vars['addon_content'])): ?><?php echo $this->_tpl_vars['addon_content']; ?>
<?php else: ?><?php $this->_tag_stack[] = array('hook', array('name' => "products:product_block")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php $this->assign('obj_id', $this->_tpl_vars['product']['product_id'], false); ?>
<?php $this->assign('obj_id_prefix', ($this->_tpl_vars['obj_prefix']).($this->_tpl_vars['product']['product_id']), false); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/product_data.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'],'min_qty' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="product-container clear">
	<?php $this->assign('form_open', "form_open_".($this->_tpl_vars['obj_id']), false); ?>
	<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['form_open']]; ?>

	<?php if ($this->_tpl_vars['bulk_addition']): ?>
	<div class="float-right">
		<input class="cm-item" type="checkbox" id="bulk_addition_<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['product']['product_id']; ?>
" name="product_data[<?php echo $this->_tpl_vars['product']['product_id']; ?>
][amount]" value="<?php if ($this->_tpl_vars['js_product_var']): ?><?php echo $this->_tpl_vars['product']['product_id']; ?>
<?php else: ?>1<?php endif; ?>" <?php if (( $this->_tpl_vars['product']['zero_price_action'] == 'R' && $this->_tpl_vars['product']['price'] == 0 )): ?>disabled="disabled"<?php endif; ?> />
	</div>
	<?php endif; ?>
	
	<div class="float-left product-item-image center">
		<span class="cm-reload-<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['obj_id']; ?>
 image-reload" id="list_image_update_<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['obj_id']; ?>
">
			<?php if (! $this->_tpl_vars['hide_links']): ?>
				<a href="<?php echo fn_url("products.view?product_id=".($this->_tpl_vars['product']['product_id'])); ?>
">
				<input type="hidden" name="image[list_image_update_<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['obj_id']; ?>
][link]" value="<?php echo fn_url("products.view?product_id=".($this->_tpl_vars['product']['product_id'])); ?>
" />
			<?php endif; ?>
			
			<input type="hidden" name="image[list_image_update_<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['obj_id']; ?>
][data]" value="<?php echo $this->_tpl_vars['obj_id_prefix']; ?>
,<?php echo $this->_tpl_vars['settings']['Thumbnails']['product_lists_thumbnail_width']; ?>
,<?php echo $this->_tpl_vars['settings']['Thumbnails']['product_lists_thumbnail_height']; ?>
,product" />
			<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/image.tpl", 'smarty_include_vars' => array('image_width' => $this->_tpl_vars['settings']['Thumbnails']['product_lists_thumbnail_width'],'obj_id' => $this->_tpl_vars['obj_id_prefix'],'images' => $this->_tpl_vars['product']['main_pair'],'object_type' => 'product','show_thumbnail' => 'Y','image_height' => $this->_tpl_vars['settings']['Thumbnails']['product_lists_thumbnail_height'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
			<?php if (! $this->_tpl_vars['hide_links']): ?>
				</a>
			<?php endif; ?>
		<!--list_image_update_<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['obj_id']; ?>
--></span>
		
		<?php $this->assign('rating', "rating_".($this->_tpl_vars['obj_id']), false); ?>
		<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['rating']]; ?>

	</div>
	<div class="product-info">
		<?php if ($this->_tpl_vars['js_product_var']): ?>
			<input type="hidden" id="product_<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['product']['product_id']; ?>
" value="<?php echo $this->_tpl_vars['product']['product']; ?>
" />
		<?php endif; ?>
		<?php if ($this->_tpl_vars['item_number'] == 'Y'): ?><strong><?php echo $this->_foreach['products']['iteration']; ?>
.&nbsp;</strong><?php endif; ?>
		<?php $this->assign('name', "name_".($this->_tpl_vars['obj_id']), false); ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['name']]; ?>

		<?php $this->assign('sku', "sku_".($this->_tpl_vars['obj_id']), false); ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['sku']]; ?>

		
		<div class="float-right right add-product">
			<?php $this->assign('add_to_cart', "add_to_cart_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['add_to_cart']]; ?>

		</div>
		
		<div class="prod-info">
			<div class="prices-container clear">
				<div class="float-left product-prices">
					<?php $this->assign('old_price', "old_price_".($this->_tpl_vars['obj_id']), false); ?>
					<?php if (trim($this->_smarty_vars['capture'][$this->_tpl_vars['old_price']])): ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['old_price']]; ?>
&nbsp;<?php endif; ?>
					
					<?php $this->assign('price', "price_".($this->_tpl_vars['obj_id']), false); ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['price']]; ?>

					
					<?php $this->assign('clean_price', "clean_price_".($this->_tpl_vars['obj_id']), false); ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['clean_price']]; ?>

					
					<?php $this->assign('list_discount', "list_discount_".($this->_tpl_vars['obj_id']), false); ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['list_discount']]; ?>

				</div>
				<div class="float-left">
					<?php $this->assign('discount_label', "discount_label_".($this->_tpl_vars['obj_id']), false); ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['discount_label']]; ?>

				</div>
			</div>
			<?php if ($this->_tpl_vars['settings']['Appearance']['in_stock_field'] == 'N'): ?>
				<?php $this->assign('product_amount', "product_amount_".($this->_tpl_vars['obj_id']), false); ?>
				<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_amount']]; ?>

			<?php endif; ?>
			<div class="product-descr">
				<div class="strong"><?php $this->assign('product_features', "product_features_".($this->_tpl_vars['obj_id']), false); ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_features']]; ?>
</div>
				<?php $this->assign('prod_descr', "prod_descr_".($this->_tpl_vars['obj_id']), false); ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['prod_descr']]; ?>

			</div>
			<?php if ($this->_tpl_vars['settings']['Appearance']['in_stock_field'] == 'Y'): ?>
				<?php $this->assign('product_amount', "product_amount_".($this->_tpl_vars['obj_id']), false); ?>
				<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_amount']]; ?>

			<?php endif; ?>
			
			<?php if (! $this->_smarty_vars['capture']['capt_options_vs_qty']): ?>
			<?php $this->assign('product_options', "product_options_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_options']]; ?>

			
			<?php $this->assign('qty', "qty_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['qty']]; ?>

			<?php endif; ?>
			
			<?php $this->assign('advanced_options', "advanced_options_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['advanced_options']]; ?>

			
			<?php $this->assign('min_qty', "min_qty_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['min_qty']]; ?>

			
			<?php $this->assign('product_edp', "product_edp_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_edp']]; ?>

		</div>
		
	</div>
	<?php if ($this->_tpl_vars['bulk_addition']): ?>
	<script type="text/javascript">
	//<![CDATA[
		$('#opt_' + '<?php echo $this->_tpl_vars['obj_prefix']; ?>
<?php echo $this->_tpl_vars['product']['product_id']; ?>
 :input').each(function () <?php echo $this->_tpl_vars['ldelim']; ?>

			$(this).attr("disabled", true);
		<?php echo $this->_tpl_vars['rdelim']; ?>
);
	//]]>
	</script>
	<?php endif; ?>
	<?php $this->assign('form_close', "form_close_".($this->_tpl_vars['obj_id']), false); ?>
	<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['form_close']]; ?>

</div>
<?php if (! ($this->_foreach['products']['iteration'] == $this->_foreach['products']['total'])): ?>
<hr />
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['bulk_addition']): ?>
<?php echo '
<script type="text/javascript">
//<![CDATA[
	$(\'.cm-item\').click(function () {
		(this.checked) ? disable = false : disable = true;
		
		$(\'#opt_\' + $(this).attr(\'id\').replace(\'bulk_addition_\', \'\')).switchAvailability(disable, false);
	});
//]]>
</script>
'; ?>

<?php endif; ?>

<?php if (! $this->_tpl_vars['no_pagination']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/pagination.tpl", 'smarty_include_vars' => array('force_ajax' => $this->_tpl_vars['force_ajax'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php endif; ?>

<?php ob_start(); ?><?php echo $this->_tpl_vars['title']; ?>
<?php $this->_smarty_vars['capture']['mainbox_title'] = ob_get_contents(); ob_end_clean(); ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/list_templates/products_list.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/list_templates/products_list.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>