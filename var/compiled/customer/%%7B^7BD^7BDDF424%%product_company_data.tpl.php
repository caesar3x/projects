<?php /* Smarty version 2.6.18, created on 2015-04-30 22:17:20
         compiled from views/companies/components/product_company_data.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_get_company_name', 'views/companies/components/product_company_data.tpl', 12, false),array('modifier', 'trim', 'views/companies/components/product_company_data.tpl', 15, false),array('function', 'set_id', 'views/companies/components/product_company_data.tpl', 15, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('vendor','supplier'));
?>
<?php  ob_start();  ?><?php ob_start(); ?>
<?php if (@PRODUCT_TYPE == 'MULTIVENDOR'): ?>
<?php $this->assign('lang_vendor_supplier', fn_get_lang_var('vendor', $this->getLanguage()), false); ?>
<?php else: ?>
<?php $this->assign('lang_vendor_supplier', fn_get_lang_var('supplier', $this->getLanguage()), false); ?>
<?php endif; ?>

		<?php if (( $this->_tpl_vars['company_name'] || $this->_tpl_vars['company_id'] ) && $this->_tpl_vars['settings']['Suppliers']['display_supplier'] == 'Y'): ?>
			<div class="form-field<?php if (! $this->_tpl_vars['capture_options_vs_qty']): ?> product-list-field<?php endif; ?>">
				<label><?php echo $this->_tpl_vars['lang_vendor_supplier']; ?>
:</label>
				<?php if ($this->_tpl_vars['company_name']): ?><?php echo $this->_tpl_vars['company_name']; ?>
<?php else: ?><?php echo fn_get_company_name($this->_tpl_vars['company_id']); ?>
<?php endif; ?>
			</div>
		<?php endif; ?>
<?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="views/companies/components/product_company_data.tpl" id="<?php echo smarty_function_set_id(array('name' => "views/companies/components/product_company_data.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>