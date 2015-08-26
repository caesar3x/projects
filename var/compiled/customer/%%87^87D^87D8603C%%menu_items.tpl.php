<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:05
         compiled from views/categories/components/menu_items.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'fn_url', 'views/categories/components/menu_items.tpl', 11, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('foreach_name', "cats_".($this->_tpl_vars['cid']), false); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach[$this->_tpl_vars['foreach_name']] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach[$this->_tpl_vars['foreach_name']]['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category']):
        $this->_foreach[$this->_tpl_vars['foreach_name']]['iteration']++;
?><?php echo '<li '; ?><?php if ($this->_tpl_vars['category']['subcategories']): ?><?php echo 'class="dir"'; ?><?php endif; ?><?php echo '>'; ?><?php if ($this->_tpl_vars['category']['subcategories']): ?><?php echo '<ul>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;$this->_smarty_include(array('smarty_include_tpl_file' => "views/categories/components/menu_items.tpl", 'smarty_include_vars' => array('items' => $this->_tpl_vars['category']['subcategories'],'separated' => true,'submenu' => true,'cid' => $this->_tpl_vars['category']['category_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</ul>'; ?><?php endif; ?><?php echo '<a href="'; ?><?php echo fn_url("categories.view?category_id=".($this->_tpl_vars['category']['category_id'])); ?><?php echo '">'; ?><?php echo $this->_tpl_vars['category']['category']; ?><?php echo '</a></li>'; ?><?php if ($this->_tpl_vars['separated'] && ! ($this->_foreach[$this->_tpl_vars['foreach_name']]['iteration'] == $this->_foreach[$this->_tpl_vars['foreach_name']]['total'])): ?><?php echo '<li class="h-sep">&nbsp;</li>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
