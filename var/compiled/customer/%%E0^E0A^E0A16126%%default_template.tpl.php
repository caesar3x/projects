<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:19
         compiled from /home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'script', '/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl', 3, false),array('function', 'block', '/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl', 102, false),array('function', 'set_id', '/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl', 139, false),array('modifier', 'trim', '/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl', 6, false),array('modifier', 'unescape', '/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl', 21, false),array('block', 'hook', '/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl', 6, false),)), $this); ?>
<?php ob_start(); ?>
<?php echo smarty_function_script(array('src' => "js/exceptions.js"), $this);?>


<div class="product-main-info">
<?php if ($this->_tpl_vars['addons']['product_configurator']['status'] == 'A'): ?><?php ob_start(); $this->_in_capture[] = 'a75b6ab6647a1fd9ff7dfbe1b2d3dd66';
$_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/product_configurator/hooks/products/view_main_info.override.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->_tpl_vars['addon_content'] = ob_get_contents(); ob_end_clean(); array_pop($this->_in_capture); if (!empty($this->_scripts['a75b6ab6647a1fd9ff7dfbe1b2d3dd66'])) { echo implode("\n", $this->_scripts['a75b6ab6647a1fd9ff7dfbe1b2d3dd66']); unset($this->_scripts['a75b6ab6647a1fd9ff7dfbe1b2d3dd66']); }
 ?><?php else: ?><?php $this->assign('addon_content', "", false); ?><?php endif; ?><?php if (trim($this->_tpl_vars['addon_content'])): ?><?php echo $this->_tpl_vars['addon_content']; ?>
<?php else: ?><?php $this->_tag_stack[] = array('hook', array('name' => "products:view_main_info")); $_block_repeat=true;smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>

	<?php if ($this->_tpl_vars['product']): ?>
	<?php $this->assign('obj_id', $this->_tpl_vars['product']['product_id'], false); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/product_data.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $this->assign('form_open', "form_open_".($this->_tpl_vars['obj_id']), false); ?>
	<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['form_open']]; ?>

	<div class="clear">
		<?php if (! $this->_tpl_vars['no_images']): ?>
			<div class="image-border float-left center cm-reload-<?php echo $this->_tpl_vars['product']['product_id']; ?>
" id="product_images_<?php echo $this->_tpl_vars['product']['product_id']; ?>
_update">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/products/components/product_images.tpl", 'smarty_include_vars' => array('product' => $this->_tpl_vars['product'],'show_detailed_link' => 'Y')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!--product_images_<?php echo $this->_tpl_vars['product']['product_id']; ?>
_update--></div>
		<?php endif; ?>
		
		<div class="product-info">
			<h1 class="mainbox-title"><?php echo smarty_modifier_unescape($this->_tpl_vars['product']['product']); ?>
</h1>
			<?php $this->assign('rating', "rating_".($this->_tpl_vars['obj_id']), false); ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['rating']]; ?>

			<?php $this->assign('sku', "sku_".($this->_tpl_vars['obj_id']), false); ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['sku']]; ?>

			<hr class="dashed clear-both" />
		
			<?php $this->assign('old_price', "old_price_".($this->_tpl_vars['obj_id']), false); ?>
			<?php $this->assign('price', "price_".($this->_tpl_vars['obj_id']), false); ?>
			<?php $this->assign('clean_price', "clean_price_".($this->_tpl_vars['obj_id']), false); ?>
			<?php $this->assign('list_discount', "list_discount_".($this->_tpl_vars['obj_id']), false); ?>
			<?php $this->assign('discount_label', "discount_label_".($this->_tpl_vars['obj_id']), false); ?>
			<div class="<?php if (trim($this->_smarty_vars['capture'][$this->_tpl_vars['old_price']]) || trim($this->_smarty_vars['capture'][$this->_tpl_vars['clean_price']]) || trim($this->_smarty_vars['capture'][$this->_tpl_vars['list_discount']])): ?>prices-container <?php endif; ?>clear">
			<?php if (trim($this->_smarty_vars['capture'][$this->_tpl_vars['old_price']]) || trim($this->_smarty_vars['capture'][$this->_tpl_vars['clean_price']]) || trim($this->_smarty_vars['capture'][$this->_tpl_vars['list_discount']])): ?>
				<div class="float-left product-prices">
					<?php if (trim($this->_smarty_vars['capture'][$this->_tpl_vars['old_price']])): ?><?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['old_price']]; ?>
&nbsp;<?php endif; ?>
			<?php endif; ?>
			
			<?php if (! trim($this->_smarty_vars['capture'][$this->_tpl_vars['old_price']]) || $this->_tpl_vars['details_page']): ?><p><?php endif; ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['price']]; ?>

			<?php if (! trim($this->_smarty_vars['capture'][$this->_tpl_vars['old_price']]) || $this->_tpl_vars['details_page']): ?></p><?php endif; ?>
		
			<?php if (trim($this->_smarty_vars['capture'][$this->_tpl_vars['old_price']]) || trim($this->_smarty_vars['capture'][$this->_tpl_vars['clean_price']]) || trim($this->_smarty_vars['capture'][$this->_tpl_vars['list_discount']])): ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['clean_price']]; ?>

					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['list_discount']]; ?>

				</div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['show_discount_label'] && trim($this->_smarty_vars['capture'][$this->_tpl_vars['discount_label']])): ?>
				<div class="float-left">
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['discount_label']]; ?>

				</div>
			<?php endif; ?>
			</div>
		
			<?php if ($this->_tpl_vars['capture_options_vs_qty']): ?><?php ob_start(); ?><?php endif; ?>
			
			<?php $this->assign('product_amount', "product_amount_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_amount']]; ?>

			
			<?php $this->assign('product_options', "product_options_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_options']]; ?>

			
			<?php $this->assign('qty', "qty_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['qty']]; ?>

			
			<?php $this->assign('advanced_options', "advanced_options_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['advanced_options']]; ?>

			<?php if ($this->_tpl_vars['capture_options_vs_qty']): ?><?php $this->_smarty_vars['capture']['product_options'] = ob_get_contents(); ob_end_clean(); ?><?php endif; ?>
		
			<?php $this->assign('min_qty', "min_qty_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['min_qty']]; ?>

			
			<?php $this->assign('product_edp', "product_edp_".($this->_tpl_vars['obj_id']), false); ?>
			<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['product_edp']]; ?>


			<?php if ($this->_tpl_vars['capture_buttons']): ?><?php ob_start(); ?><?php endif; ?>
				<div class="buttons-container nowrap">
					<?php $this->assign('add_to_cart', "add_to_cart_".($this->_tpl_vars['obj_id']), false); ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['add_to_cart']]; ?>

					
					<?php $this->assign('list_buttons', "list_buttons_".($this->_tpl_vars['obj_id']), false); ?>
					<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['list_buttons']]; ?>

				</div>
			<?php if ($this->_tpl_vars['capture_buttons']): ?><?php $this->_smarty_vars['capture']['buttons'] = ob_get_contents(); ob_end_clean(); ?><?php endif; ?>
		</div>
	</div>
	<?php $this->assign('form_close', "form_close_".($this->_tpl_vars['obj_id']), false); ?>
	<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['form_close']]; ?>

	<?php endif; ?>
	
<?php if ($this->_tpl_vars['addons']['recurring_billing']['status'] == 'A'): ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "addons/recurring_billing/hooks/products/view_main_info.post.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
	
<?php if ($this->_smarty_vars['capture']['hide_form_changed'] == 'Y'): ?>
	<?php $this->assign('hide_form', $this->_smarty_vars['capture']['orig_val_hide_form'], false); ?>
<?php endif; ?>

<?php ob_start(); ?>
	<?php $this->assign('but_role', "", false); ?>
	<?php $this->assign('tabs_block_orientation', $this->_tpl_vars['blocks'][$this->_tpl_vars['tabs_block_id']]['properties']['block_order'], false); ?>
	<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block_id'] => $this->_tpl_vars['block']):
?>
		<?php if ($this->_tpl_vars['block']['group_id'] == $this->_tpl_vars['tabs_block_id']): ?>
			<?php $this->assign('tabs_capture_name', "tab_".($this->_tpl_vars['block_id']), false); ?>
			<?php ob_start(); ?>
				<?php echo smarty_function_block(array('id' => $this->_tpl_vars['block_id'],'no_box' => true), $this);?>

			<?php $this->_smarty_vars['capture'][$this->_tpl_vars['tabs_capture_name']] = ob_get_contents(); ob_end_clean(); ?>
			<?php $this->assign('nav_block_id', "block_".($this->_tpl_vars['block_id']), false); ?>
			<?php if (trim($this->_smarty_vars['capture'][$this->_tpl_vars['tabs_capture_name']])): ?>
				<?php if ($this->_tpl_vars['tabs_block_orientation'] == 'V'): ?>
					<h1 class="tab-list-title"><?php echo $this->_tpl_vars['navigation']['tabs'][$this->_tpl_vars['nav_block_id']]['title']; ?>
</h1>
				<?php endif; ?>
			<?php endif; ?>

			<div id="content_block_<?php echo $this->_tpl_vars['block_id']; ?>
" class="wysiwyg-content<?php if ($this->_tpl_vars['hide_tab'] && $this->_tpl_vars['tabs_block_orientation'] == 'H'): ?> hidden<?php endif; ?>">
				<?php echo $this->_smarty_vars['capture'][$this->_tpl_vars['tabs_capture_name']]; ?>

			</div>
			<?php if (trim($this->_smarty_vars['capture'][$this->_tpl_vars['tabs_capture_name']])): ?>
				<?php $this->assign('hide_tab', true, false); ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['tabsbox'] = ob_get_contents(); ob_end_clean(); ?>

<?php ob_start(); ?>
<?php if ($this->_tpl_vars['tabs_block_orientation'] == 'V'): ?>
	<?php echo $this->_smarty_vars['capture']['tabsbox']; ?>

<?php else: ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/tabsbox.tpl", 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['tabsbox'],'active_tab' => "block_".($this->_tpl_vars['_REQUEST']['selected_section']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php $this->_smarty_vars['capture']['tabsbox_content'] = ob_get_contents(); ob_end_clean(); ?>

<?php if ($this->_tpl_vars['blocks'][$this->_tpl_vars['tabs_block_id']]['properties']['wrapper']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['blocks'][$this->_tpl_vars['tabs_block_id']]['properties']['wrapper'], 'smarty_include_vars' => array('content' => $this->_smarty_vars['capture']['tabsbox_content'],'title' => $this->_tpl_vars['blocks'][$this->_tpl_vars['tabs_block_id']]['description'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<?php echo $this->_smarty_vars['capture']['tabsbox_content']; ?>

<?php endif; ?>
</div>

<div class="product-details">
</div>

<?php ob_start(); ?><?php $this->assign('details_page', true, false); ?><?php $this->_smarty_vars['capture']['mainbox_title'] = ob_get_contents(); ob_end_clean(); ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl" id="<?php echo smarty_function_set_id(array('name' => "/home/amadamt/public_html/development/skins/amada/customer/blocks/product_templates/default_template.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>