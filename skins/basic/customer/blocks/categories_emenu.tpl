{* $Id$ *}
{** block-description:emenu **}

<div class="clear">
	<ul id="vmenu_{$block.block_id}" class="dropdown dropdown-vertical">
		{include file="views/categories/components/menu_items.tpl" items=$items separated=true submenu=false}
	</ul>
</div>
