<?php /* Smarty version 2.6.18, created on 2015-04-30 21:51:26
         compiled from addons/form_builder/form_body.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'addons/form_builder/form_body.tpl', 27, false),array('modifier', 'date_format', 'addons/form_builder/form_body.tpl', 29, false),array('modifier', 'fn_get_country_name', 'addons/form_builder/form_body.tpl', 31, false),array('modifier', 'escape', 'addons/form_builder/form_body.tpl', 31, false),array('modifier', 'default', 'addons/form_builder/form_body.tpl', 34, false),array('modifier', 'fn_get_state_name', 'addons/form_builder/form_body.tpl', 35, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "letter_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table>
<?php $_from = $this->_tpl_vars['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element_id'] => $this->_tpl_vars['element']):
?>
<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_SEPARATOR): ?>
<tr>
	<td colspan="2"><hr width="100%" /></td>
</tr>
<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_HEADER): ?>
<tr>
	<td colspan="2"><b><?php echo $this->_tpl_vars['element']['description']; ?>
</b></td>
</tr>
<?php elseif ($this->_tpl_vars['element']['element_type'] != 'F'): ?>
<tr>
	<td><?php echo $this->_tpl_vars['element']['description']; ?>
:&nbsp;</td>
	<td>
		<?php $this->assign('value', $this->_tpl_vars['form_values'][$this->_tpl_vars['element_id']], false); ?>
		<?php if ($this->_tpl_vars['element']['element_type'] == @FORM_SELECT || $this->_tpl_vars['element']['element_type'] == @FORM_RADIO): ?>
			<?php echo $this->_tpl_vars['element']['variants'][$this->_tpl_vars['value']]['description']; ?>

		<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_CHECKBOX): ?>
			<?php if ($this->_tpl_vars['value'] == 'Y'): ?><?php echo fn_get_lang_var('yes', $this->getLanguage()); ?>
<?php else: ?><?php echo fn_get_lang_var('no', $this->getLanguage()); ?>
<?php endif; ?>
		<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_MULTIPLE_SB || $this->_tpl_vars['element']['element_type'] == @FORM_MULTIPLE_CB): ?>
			<?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['fe'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['v']):
        $this->_foreach['fe']['iteration']++;
?><?php echo $this->_tpl_vars['element']['variants'][$this->_tpl_vars['v']]['description']; ?>
<?php if (! ($this->_foreach['fe']['iteration'] == $this->_foreach['fe']['total'])): ?>,&nbsp;<?php endif; ?><?php endforeach; endif; unset($_from); ?>
		<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_TEXTAREA): ?>
			<?php echo smarty_modifier_nl2br($this->_tpl_vars['value']); ?>

		<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_DATE): ?>
			<?php echo smarty_modifier_date_format($this->_tpl_vars['value'], $this->_tpl_vars['settings']['Appearance']['date_format']); ?>

		<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_COUNTRIES): ?>
			<?php echo smarty_modifier_escape(fn_get_country_name($this->_tpl_vars['value'])); ?>

			<?php $this->assign('c_code', $this->_tpl_vars['value'], false); ?>
		<?php elseif ($this->_tpl_vars['element']['element_type'] == @FORM_STATES): ?>
			<?php $this->assign('c_code', smarty_modifier_default(@$this->_tpl_vars['c_code'], @$this->_tpl_vars['settings']['General']['default_country']), false); ?>
			<?php $this->assign('state', smarty_modifier_escape(fn_get_state_name($this->_tpl_vars['value'], $this->_tpl_vars['c_code'])), false); ?>
			<?php echo smarty_modifier_default(@$this->_tpl_vars['state'], @$this->_tpl_vars['value']); ?>

		<?php else: ?>
			<?php echo $this->_tpl_vars['value']; ?>

		<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "letter_footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>