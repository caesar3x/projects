<?php /* Smarty version 2.6.18, created on 2015-04-30 22:04:39
         compiled from common_templates/pagination.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'common_templates/pagination.tpl', 3, false),array('modifier', 'fn_query_remove', 'common_templates/pagination.tpl', 4, false),array('modifier', 'escape', 'common_templates/pagination.tpl', 43, false),array('modifier', 'fn_url', 'common_templates/pagination.tpl', 56, false),array('modifier', 'fn_check_view_permissions', 'common_templates/pagination.tpl', 87, false),array('modifier', 'substr_count', 'common_templates/pagination.tpl', 91, false),array('modifier', 'replace', 'common_templates/pagination.tpl', 92, false),array('modifier', 'defined', 'common_templates/pagination.tpl', 104, false),array('function', 'script', 'common_templates/pagination.tpl', 12, false),array('function', 'math', 'common_templates/pagination.tpl', 84, false),)), $this); ?>
<?php
fn_preload_lang_vars(array('go_to_page','go','go','go_to_page','previous','next','total_items','items_per_page','or','tools','add'));
?>
<?php  ob_start();  ?>
<?php $this->assign('id', smarty_modifier_default(@$this->_tpl_vars['div_id'], 'pagination_contents'), false); ?>
<?php $this->assign('qstring', fn_query_remove($_SERVER['QUERY_STRING'], 'page', 'result_ids'), false); ?>

<?php if ($this->_smarty_vars['capture']['pagination_open'] != 'Y'): ?>
<div id="<?php echo $this->_tpl_vars['id']; ?>
">
<?php endif; ?>

<?php if ($this->_tpl_vars['pagination']): ?>
	<?php if ($this->_tpl_vars['settings']['DHTML']['admin_ajax_based_pagination'] == 'Y'): ?>
		<?php echo smarty_function_script(array('src' => "lib/js/history/jquery.history.js"), $this);?>

		<?php echo '
			<script type="text/javascript">
			//<![CDATA[
				jQuery.initHistory();
			//]]>
			</script>
		'; ?>

	<?php endif; ?>

	<?php if ($this->_tpl_vars['save_current_page']): ?>
		<input type="hidden" name="page" value="<?php echo smarty_modifier_default(smarty_modifier_default(@$this->_tpl_vars['search']['page'], @$this->_tpl_vars['_REQUEST']['page']), 1); ?>
" />
	<?php endif; ?>

	<?php if ($this->_tpl_vars['save_current_url']): ?>
		<input type="hidden" name="redirect_url" value="<?php echo $this->_tpl_vars['config']['current_url']; ?>
" />
	<?php endif; ?>

	<?php if ($this->_tpl_vars['settings']['DHTML']['admin_ajax_based_pagination'] == 'Y'): ?>
		<?php $this->assign('ajax_class', "cm-ajax force", false); ?>
	<?php endif; ?>

	<?php if (! $this->_tpl_vars['disable_history']): ?>
		<?php $this->assign('history_class', " cm-history", false); ?>
	<?php else: ?>
		<?php $this->assign('history_class', " cm-ajax-cache", false); ?>
	<?php endif; ?>

	<div class="pagination clear cm-pagination-wraper<?php if ($this->_smarty_vars['capture']['pagination_open'] != 'Y'): ?> top-pagination<?php endif; ?>">
		<?php if ($this->_tpl_vars['pagination']['total_pages'] > 1): ?>
		<div class="float-left">
			<label><?php echo smarty_modifier_escape(fn_get_lang_var('go_to_page', $this->getLanguage()), 'html'); ?>
:</label>
			<input type="text" class="input-text-short valign cm-pagination<?php echo $this->_tpl_vars['history_class']; ?>
" value="<?php if ($this->_tpl_vars['_REQUEST']['page'] > $this->_tpl_vars['pagination']['total_pages']): ?>1<?php else: ?><?php echo smarty_modifier_default(@$this->_tpl_vars['_REQUEST']['page'], 1); ?>
<?php endif; ?>" />
			<img src="<?php echo $this->_tpl_vars['images_dir']; ?>
/icons/pg_right_arrow.gif" class="pagination-go-button hand cm-pagination-button" alt="<?php echo smarty_modifier_escape(fn_get_lang_var('go', $this->getLanguage()), 'html'); ?>
" title="<?php echo smarty_modifier_escape(fn_get_lang_var('go', $this->getLanguage()), 'html'); ?>
" />
		</div>
		<?php else: ?>
		<div class="float-left pagination-disabled">
			<label><?php echo smarty_modifier_escape(fn_get_lang_var('go_to_page', $this->getLanguage()), 'html'); ?>
:</label>
			<span>1</span>
		</div>
		<?php endif; ?>

		<div class="float-right">
		<?php if ($this->_tpl_vars['pagination']['current_page'] != 'full_list' && $this->_tpl_vars['pagination']['total_pages'] > 1): ?>
			<span class="lowercase"><a name="pagination" class="<?php if ($this->_tpl_vars['pagination']['prev_page']): ?><?php echo $this->_tpl_vars['ajax_class']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['history_class']; ?>
" <?php if ($this->_tpl_vars['pagination']['prev_page']): ?>href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['qstring'])."&amp;page=".($this->_tpl_vars['pagination']['prev_page'])); ?>
" rel="<?php echo $this->_tpl_vars['pagination']['prev_page']; ?>
" rev="<?php echo $this->_tpl_vars['id']; ?>
"<?php endif; ?>>&laquo;&nbsp;<?php echo fn_get_lang_var('previous', $this->getLanguage()); ?>
</a></span>

			<?php $_from = $this->_tpl_vars['pagination']['navi_pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['f_pg'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['f_pg']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pg']):
        $this->_foreach['f_pg']['iteration']++;
?>
				<?php if (($this->_foreach['f_pg']['iteration'] <= 1) && $this->_tpl_vars['pg'] > 1): ?>
				<a name="pagination" class="<?php echo $this->_tpl_vars['ajax_class']; ?>
<?php echo $this->_tpl_vars['history_class']; ?>
" href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['qstring'])."&amp;page=1`"); ?>
" rel="1" rev="<?php echo $this->_tpl_vars['id']; ?>
">1</a>
				<?php if ($this->_tpl_vars['pg'] != 2): ?><a name="pagination" class="<?php if ($this->_tpl_vars['pagination']['prev_range']): ?><?php echo $this->_tpl_vars['ajax_class']; ?>
<?php endif; ?> prev-range<?php echo $this->_tpl_vars['history_class']; ?>
" <?php if ($this->_tpl_vars['pagination']['prev_range']): ?>href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['qstring'])."&amp;page=".($this->_tpl_vars['pagination']['prev_range'])); ?>
" rel="<?php echo $this->_tpl_vars['pagination']['prev_range']; ?>
" rev="<?php echo $this->_tpl_vars['id']; ?>
"<?php endif; ?>>&nbsp;...&nbsp;</a><?php endif; ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['pg'] != $this->_tpl_vars['pagination']['current_page']): ?><a name="pagination" class="<?php echo $this->_tpl_vars['ajax_class']; ?>
<?php echo $this->_tpl_vars['history_class']; ?>
" href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['qstring'])."&amp;page=".($this->_tpl_vars['pg'])); ?>
" rel="<?php echo $this->_tpl_vars['pg']; ?>
" rev="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['pg']; ?>
</a><?php else: ?><span class="strong"><?php echo $this->_tpl_vars['pg']; ?>
</span><?php endif; ?>
				<?php if (($this->_foreach['f_pg']['iteration'] == $this->_foreach['f_pg']['total']) && $this->_tpl_vars['pg'] < $this->_tpl_vars['pagination']['total_pages']): ?>
				<?php if ($this->_tpl_vars['pg'] != $this->_tpl_vars['pagination']['total_pages']-1): ?><a name="pagination" class="<?php if ($this->_tpl_vars['pagination']['next_range']): ?><?php echo $this->_tpl_vars['ajax_class']; ?>
<?php endif; ?> next-range<?php echo $this->_tpl_vars['history_class']; ?>
" <?php if ($this->_tpl_vars['pagination']['next_range']): ?>href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['qstring'])."&amp;page=".($this->_tpl_vars['pagination']['next_range'])); ?>
" rel="<?php echo $this->_tpl_vars['pagination']['next_range']; ?>
" rev="<?php echo $this->_tpl_vars['id']; ?>
"<?php endif; ?>>&nbsp;...&nbsp;</a><?php endif; ?><a name="pagination" class="<?php echo $this->_tpl_vars['ajax_class']; ?>
<?php echo $this->_tpl_vars['history_class']; ?>
" href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['qstring'])."&amp;page=".($this->_tpl_vars['pagination']['total_pages'])); ?>
" rel="<?php echo $this->_tpl_vars['pagination']['total_pages']; ?>
" rev="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['pagination']['total_pages']; ?>
</a>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>

			<span class="lowercase"><a name="pagination" class="<?php if ($this->_tpl_vars['pagination']['next_page']): ?><?php echo $this->_tpl_vars['ajax_class']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['history_class']; ?>
" <?php if ($this->_tpl_vars['pagination']['next_page']): ?>href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['qstring'])."&amp;page=".($this->_tpl_vars['pagination']['next_page'])); ?>
" rel="<?php echo $this->_tpl_vars['pagination']['next_page']; ?>
" rev="<?php echo $this->_tpl_vars['id']; ?>
"<?php endif; ?>><?php echo fn_get_lang_var('next', $this->getLanguage()); ?>
&nbsp;&raquo;</a></span>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['pagination']['total_items']): ?>
			<span class="pagination-total-items">&nbsp;<?php echo fn_get_lang_var('total_items', $this->getLanguage()); ?>
:&nbsp;</span><span><?php echo $this->_tpl_vars['pagination']['total_items']; ?>
&nbsp;/</span>
			
			<?php ob_start(); ?>
				<ul>
					<li class="strong"><?php echo fn_get_lang_var('items_per_page', $this->getLanguage()); ?>
:</li>
					<?php $this->assign('range_url', fn_query_remove($this->_tpl_vars['qstring'], 'items_per_page'), false); ?>
					<?php $_from = $this->_tpl_vars['pagination']['per_page_range']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['step']):
?>
						<li><a name="pagination" class="<?php echo $this->_tpl_vars['ajax_class']; ?>
" href="<?php echo fn_url(($this->_tpl_vars['index_script'])."?".($this->_tpl_vars['range_url'])."&amp;items_per_page=".($this->_tpl_vars['step'])); ?>
" rev="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['step']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			<?php $this->_smarty_vars['capture']['pagination_list'] = ob_get_contents(); ob_end_clean(); ?>
			<?php echo smarty_function_math(array('equation' => "rand()",'assign' => 'rnd'), $this);?>

			<?php $__parent_tpl_vars = $this->_tpl_vars;$this->_tpl_vars = array_merge($this->_tpl_vars, array('prefix' => "pagination_".($this->_tpl_vars['rnd']), 'hide_actions' => true, 'tools_list' => $this->_smarty_vars['capture']['pagination_list'], 'display' => 'inline', 'link_text' => $this->_tpl_vars['pagination']['items_per_page'], 'override_meta' => "pagination-selector", 'skip_check_permissions' => 'true', )); ?>

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

		</div>
	</div>
<?php endif; ?>


<?php if ($this->_smarty_vars['capture']['pagination_open'] == 'Y'): ?>
	<!--<?php echo $this->_tpl_vars['id']; ?>
--></div>
	<?php ob_start(); ?>N<?php $this->_smarty_vars['capture']['pagination_open'] = ob_get_contents(); ob_end_clean(); ?>
<?php elseif ($this->_smarty_vars['capture']['pagination_open'] != 'Y'): ?>
	<?php ob_start(); ?>Y<?php $this->_smarty_vars['capture']['pagination_open'] = ob_get_contents(); ob_end_clean(); ?>
<?php endif; ?>
<?php  ob_end_flush();  ?>