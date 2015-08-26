<?php /* Smarty version 2.6.18, created on 2015-05-06 12:41:49
         compiled from blocks/product_list_templates/products.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'blocks/product_list_templates/products.tpl', 3, false),array('modifier', 'trim', 'blocks/product_list_templates/products.tpl', 24, false),array('function', 'set_id', 'blocks/product_list_templates/products.tpl', 24, false),)), $this); ?>
<?php ob_start(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "blocks/list_templates/products_list.tpl", 'smarty_include_vars' => array('show_name' => true,'show_sku' => true,'show_rating' => true,'show_features' => true,'show_prod_descr' => true,'show_old_price' => true,'show_price' => true,'show_clean_price' => true,'show_list_discount' => true,'show_discount_label' => true,'show_product_amount' => true,'show_product_options' => smarty_modifier_default(@$this->_tpl_vars['show_product_options'], true),'show_qty' => true,'show_min_qty' => true,'show_product_edp' => true,'show_add_to_cart' => smarty_modifier_default(@$this->_tpl_vars['show_add_to_cart'], true),'show_list_buttons' => true,'show_descr' => true,'but_role' => 'action','separate_buttons' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="blocks/product_list_templates/products.tpl" id="<?php echo smarty_function_set_id(array('name' => "blocks/product_list_templates/products.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?>