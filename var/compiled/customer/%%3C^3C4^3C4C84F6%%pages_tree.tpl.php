<?php /* Smarty version 2.6.18, created on 2015-05-12 17:24:31
         compiled from views/pages/components/pages_tree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'views/pages/components/pages_tree.tpl', 11, false),array('function', 'set_id', 'views/pages/components/pages_tree.tpl', 15, false),array('modifier', 'substr_count', 'views/pages/components/pages_tree.tpl', 12, false),array('modifier', 'fn_url', 'views/pages/components/pages_tree.tpl', 12, false),array('modifier', 'trim', 'views/pages/components/pages_tree.tpl', 15, false),)), $this); ?>
<?php  ob_start();  ?><?php ob_start(); ?><?php if (! $this->_tpl_vars['root']): ?>
<?php $this->assign('not_root', '_', false); ?>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach["fe".($this->_tpl_vars['not_root'])] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach["fe".($this->_tpl_vars['not_root'])]['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['page']):
        $this->_foreach["fe".($this->_tpl_vars['not_root'])]['iteration']++;
?>
	<?php if ($this->_tpl_vars['page']['page_id'] == $this->_tpl_vars['_REQUEST']['page_id']): ?><?php $this->assign('path', $this->_tpl_vars['page']['id_path'], false); ?><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach["fe".($this->_tpl_vars['not_root'])] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach["fe".($this->_tpl_vars['not_root'])]['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['page']):
        $this->_foreach["fe".($this->_tpl_vars['not_root'])]['iteration']++;
?>
	<?php echo smarty_function_math(array('equation' => "x*7",'x' => $this->_tpl_vars['page']['level'],'assign' => 'shift'), $this);?>

	<li class="<?php if ($this->_tpl_vars['page']['has_children'] && substr_count($this->_tpl_vars['path'], $this->_tpl_vars['page']['page_id'])): ?>cm-expanded<?php elseif ($this->_tpl_vars['page']['has_children']): ?>cm-collapsed<?php endif; ?><?php if ($this->_tpl_vars['page']['page_id'] == $this->_tpl_vars['_REQUEST']['page_id']): ?> active<?php if ($this->_tpl_vars['page']['has_children']): ?> has-children<?php endif; ?><?php endif; ?>"><a href="<?php if ($this->_tpl_vars['page']['page_type'] == @PAGE_TYPE_LINK): ?><?php echo fn_url($this->_tpl_vars['page']['link']); ?>
<?php else: ?><?php echo fn_url("pages.view?page_id=".($this->_tpl_vars['page']['page_id'])); ?>
<?php endif; ?>"<?php if ($this->_tpl_vars['page']['new_window']): ?> target="_blank"<?php endif; ?><?php if ($this->_tpl_vars['page']['level'] != '0'): ?> style="padding-left: <?php echo $this->_tpl_vars['shift']; ?>
px;"<?php endif; ?>><?php echo $this->_tpl_vars['page']['page']; ?>
</a>
</li>
<?php if ($this->_tpl_vars['root'] && ! ($this->_foreach['fe']['iteration'] == $this->_foreach['fe']['total']) && ! $this->_tpl_vars['no_delim']): ?><li class="delim"></li><?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->_smarty_vars['capture']['template_content'] = ob_get_contents(); ob_end_clean(); ?><?php if (trim($this->_smarty_vars['capture']['template_content'])): ?><?php if ($this->_tpl_vars['auth']['area'] == 'A'): ?><span class="cm-template-box" template="views/pages/components/pages_tree.tpl" id="<?php echo smarty_function_set_id(array('name' => "views/pages/components/pages_tree.tpl"), $this);?>
"><img class="cm-template-icon hidden" src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/layout_edit.gif" width="16" height="16" alt="" /><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<!--[/tpl_id]--></span><?php else: ?><?php echo $this->_smarty_vars['capture']['template_content']; ?>
<?php endif; ?><?php endif; ?><?php  ob_end_flush();  ?>