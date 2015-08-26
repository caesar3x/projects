{* $Id$ *}
{** block-description:text_links **}

{if $items}
<ul>
	{foreach from=$items item="category"}
	<li><a href="{"categories.view?category_id=`$category.category_id`"|fn_url}">{$category.category}</a></li>
	{/foreach}
</ul>
{/if}