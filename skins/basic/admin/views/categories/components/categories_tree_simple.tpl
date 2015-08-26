{* --------- CATEGORY TREE --------------*}
{math equation="rand()" assign="rnd_value"}
{assign var="random" value=$random|default:$rnd_value}
{if $parent_id}
<div class="hidden" id="cat_{$parent_id}_{$random}">
{/if}
{foreach from=$categories_tree item=cur_cat}
{assign var="cat_id" value=$cur_cat.category_id}

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table">
{if $header && !$parent_id}
{assign var="header" value=""}
<tr>
	<th class="center first-column" width="20">
	{if $display != "radio"}
		<input type="checkbox" name="check_all" value="Y" title="{$lang.check_uncheck_all}" class="checkbox cm-check-items" />
	{/if}
	</th>
	<th width="97%">
		{if $show_all}
		<div class="float-left">
			<img src="{$images_dir}/plus_minus.gif" width="13" height="12" border="0" id="on_cat" alt="{$lang.expand_collapse_list}" title="{$lang.expand_collapse_list}" class="hand cm-combinations-cat {if $expand_all}hidden{/if}"  />
			<img src="{$images_dir}/minus_plus.gif" width="13" height="12" border="0" id="off_cat" alt="{$lang.expand_collapse_list}" title="{$lang.expand_collapse_list}" class="hand cm-combinations-cat {if !$expand_all}hidden{/if}" />
		</div>
		{/if}
		&nbsp;{$lang.categories}
	</th>
	{if !"COMPANY_ID"|defined}
	<th class="right">{$lang.products}</th>
	{/if}
</tr>
{/if}
{assign var="level" value=$cur_cat.level|default:0}
<tr {if $level != "0"}{cycle values="class=\"table-row\", "}{else}{cycle values="" reset=1}class="manage-root-row"{/if}>
   	{math equation="x*14" x=$level assign="shift"}
	<td class="center first-column" width="20">
		{if $display == "radio"}
		<input type="radio" name="{$checkbox_name}" value="{$cur_cat.category_id}" class="radio cm-item" />
		{else}
		<input type="checkbox" name="{$checkbox_name}[{$cur_cat.category_id}]" value="{$cur_cat.category_id}" class="checkbox cm-item" {if !$expand_all && $disable_checkbox}disabled{/if} />
		{/if}
	</td>
	<td width="97%">
		{if $cur_cat.subcategories}
			{math equation="x+10" x=$shift assign="_shift"}
		{else}
			{math equation="x+21" x=$shift assign="_shift"}
		{/if}
		<table cellpadding="0" cellspacing="0" width="100%"	border="0">
		<tr>
			<td class="nowrap" style="padding-left: {$_shift}px;">
				{if $cur_cat.has_children || $cur_cat.subcategories}
					{if $show_all}
					<img src="{$images_dir}/plus.gif" width="14" height="9" border="0" alt="{$lang.expand_sublist_of_items}" title="{$lang.expand_sublist_of_items}" id="on_cat_{$cur_cat.category_id}_{$random}" class="hand cm-combination-cat cm-uncheck {if isset($path.$cat_id) || $expand_all}hidden{/if}" />
					{else}
					{if $except_id}
						{assign var="_except_id" value="&except_id=`$except_id`"}
					{/if}
					<img src="{$images_dir}/plus.gif" width="14" height="9" border="0" alt="{$lang.expand_sublist_of_items}" title="{$lang.expand_sublist_of_items}" id="on_cat_{$cur_cat.category_id}_{$random}" class="hand cm-combination-cat cm-uncheck {if (isset($path.$cat_id))}hidden{/if}" onclick="if (!$('#cat_{$cur_cat.category_id}_{$random}').children().length) jQuery.ajaxRequest('{"categories.picker?category_id=`$cur_cat.category_id`&random=`$random`&display=`$display`&checkbox_name=`$checkbox_name``$_except_id`"|fn_url:'A':'rel':'&'}', {$ldelim}result_ids: 'cat_{$cur_cat.category_id}_{$random}'{$rdelim})" />
					{/if}
					<img src="{$images_dir}/minus.gif" width="14" height="9" border="0" alt="{$lang.collapse_sublist_of_items}" title="{$lang.collapse_sublist_of_items}" id="off_cat_{$cur_cat.category_id}_{$random}" class="hand cm-combination-cat cm-uncheck {if !isset($path.$cat_id) && (!$expand_all || !$show_all)}hidden{/if}" />
				{else}
					&nbsp;
				{/if}</td>
			<td width="100%">
				<strong id="category_{$cur_cat.category_id}">{$cur_cat.category}</strong>{if $cur_cat.status == "N"}&nbsp;<span class="small-note">-&nbsp;[{$lang.disabled}]</span>{/if}
			</td>
		</tr>
		</table>
	</td>
	{if !"COMPANY_ID"|defined}
	<td class="right">
		{$cur_cat.product_count}&nbsp;&nbsp;&nbsp;
	</td>
	{/if}
</tr>
</table>

{if $cur_cat.has_children || $cur_cat.subcategories}
	<div{if !$expand_all} class="hidden"{/if} id="cat_{$cur_cat.category_id}_{$random}">
	{if $cur_cat.subcategories}
		{include file="views/categories/components/categories_tree_simple.tpl" categories_tree=$cur_cat.subcategories parent_id=false disable_checkbox=true}
	{/if}
	<!--cat_{$cur_cat.category_id}_{$random}--></div>
{/if}
{/foreach}
{if $parent_id}<!--cat_{$parent_id}_{$random}--></div>{/if}
{* --------- /CATEGORY TREE --------------*}
