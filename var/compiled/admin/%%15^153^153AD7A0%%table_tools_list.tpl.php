<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:39
         compiled from common_templates/table_tools_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_check_view_permissions', 'common_templates/table_tools_list.tpl', 4, false),array('modifier', 'fn_url', 'common_templates/table_tools_list.tpl', 8, false),array('modifier', 'default', 'common_templates/table_tools_list.tpl', 12, false),array('modifier', 'strpos', 'common_templates/table_tools_list.tpl', 15, false),array('modifier', 'substr_count', 'common_templates/table_tools_list.tpl', 22, false),array('modifier', 'replace', 'common_templates/table_tools_list.tpl', 23, false),array('modifier', 'defined', 'common_templates/table_tools_list.tpl', 35, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('view','edit','more','or','tools','add'));
?>

<?php if ($this->_tpl_vars['popup']): ?>
	<?php if ($this->_tpl_vars['skip_check_permissions'] || fn_check_view_permissions($this->_tpl_vars['href'])): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "common_templates/popupbox.tpl", 'smarty_include_vars' => array('id' => $this->_tpl_vars['id'],'text' => $this->_tpl_vars['text'],'link_text' => $this->_tpl_vars['link_text'],'act' => $this->_tpl_vars['act'],'href' => $this->_tpl_vars['href'],'link_class' => $this->_tpl_vars['link_class'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php elseif ($this->_tpl_vars['href']): ?>
<?php $this->assign('_href', fn_url($this->_tpl_vars['href']), false); ?>
<?php if (! fn_check_view_permissions($this->_tpl_vars['_href'])): ?>
	<?php $this->assign('link_text', fn_get_lang_var('view', $this->getLanguage()), false); ?>
<?php endif; ?>
	<a class="tool-link" href="<?php echo $this->_tpl_vars['_href']; ?>
"><?php echo smarty_modifier_default(@$this->_tpl_vars['link_text'], fn_get_lang_var('edit', $this->getLanguage())); ?>
</a>
<?php endif; ?>
<?php if ($this->_tpl_vars['skip_check_permissions'] || fn_check_view_permissions($this->_tpl_vars['tools_list'])): ?>
	<?php if (strpos($this->_tpl_vars['tools_list'], "<li")): ?><?php if ($this->_tpl_vars['href']): ?>&nbsp;&nbsp;|<?php elseif ($this->_tpl_vars['separate']): ?>|<?php endif; ?>
		<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('prefix' => $this->_tpl_vars['prefix'], 'hide_actions' => true, 'tools_list' => "<ul>".($this->_tpl_vars['tools_list'])."</ul>", 'display' => 'inline', 'link_text' => fn_get_lang_var('more', $this->getLanguage()), 'link_meta' => 'lowercase', 'skip_check_permissions' => $this->_tpl_vars['skip_check_permissions'], )); ?>

<?php if ($this->_tpl_vars['skip_check_permissions'] || fn_check_view_permissions($this->_tpl_vars['tools_list'])): ?>

<?php if ($this->_tpl_vars['tools_list'] && $this->_tpl_vars['prefix'] == 'main' && ! $this->_tpl_vars['only_popup']): ?> <?php echo fn_get_lang_var('or', $this->getLanguage()); ?>
 <?php endif; ?>

<?php if (substr_count($this->_tpl_vars['tools_list'], "<li") == 1): ?>
	<?php echo smarty_modifier_replace($this->_tpl_vars['tools_list'], "<ul>", "<ul class=\"cm-tools-list tools-list\">"); ?>

<?php else: ?>
	<div class="tools-container<?php if ($this->_tpl_vars['display']): ?> <?php echo $this->_tpl_vars['display']; ?>
<?php endif; ?>">
		<?php if (! $this->_tpl_vars['hide_tools'] && $this->_tpl_vars['tools_list']): ?>
		<div class="tools-content<?php if ($this->_tpl_vars['display']): ?> <?php echo $this->_tpl_vars['display']; ?>
<?php endif; ?>">
			<a class="cm-combo-on cm-combination <?php if ($this->_tpl_vars['override_meta']): ?><?php echo $this->_tpl_vars['override_meta']; ?>
<?php else: ?>select-button<?php endif; ?><?php if ($this->_tpl_vars['link_meta']): ?> <?php echo $this->_tpl_vars['link_meta']; ?>
<?php endif; ?>" id="sw_tools_list_<?php echo $this->_tpl_vars['prefix']; ?>
"><?php echo smarty_modifier_default(@$this->_tpl_vars['link_text'], fn_get_lang_var('tools', $this->getLanguage())); ?>
</a>
			<div id="tools_list_<?php echo $this->_tpl_vars['prefix']; ?>
" class="cm-tools-list popup-tools hidden cm-popup-box cm-smart-position">
					<?php echo $this->_tpl_vars['tools_list']; ?>

			</div>
		</div>
		<?php endif; ?>
		<?php if (! $this->_tpl_vars['hide_actions']): ?>
			<?php if (! ( defined('COMPANY_ID') && ! fn_check_view_permissions($this->_tpl_vars['tool_href']) )): ?>
		<span class="action-add">
			<a<?php if ($this->_tpl_vars['tool_id']): ?> id="<?php echo $this->_tpl_vars['tool_id']; ?>
"<?php endif; ?><?php if ($this->_tpl_vars['tool_href']): ?> href="<?php echo fn_url($this->_tpl_vars['tool_href']); ?>
"<?php endif; ?><?php if ($this->_tpl_vars['tool_onclick']): ?> onclick="<?php echo $this->_tpl_vars['tool_onclick']; ?>
; return false;"<?php endif; ?>><?php echo smarty_modifier_default(@$this->_tpl_vars['link_text'], fn_get_lang_var('add', $this->getLanguage())); ?>
</a>
		</span>
			<?php else: ?><?php endif; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php else: ?><?php endif; ?>
<?php if (isset($__parent_tpl_vars)) { $this->_tpl_vars = $__parent_tpl_vars; unset($__parent_tpl_vars);} ?>
	<?php endif; ?>
<?php endif; ?>