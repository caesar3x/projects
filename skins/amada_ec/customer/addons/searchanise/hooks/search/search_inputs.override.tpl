{strip}
{if !$settings.General.search_objects}
<input type="hidden" name="cid" value="0" />

<input type="text" name="q" value="{$search.q}" id="snize-input" class="search-input snize-input-style" />

{include file="buttons/go.tpl" but_name="products.search" alt=$lang.search}

{if !$hide_advanced_search}
<a href="{"products.search"|fn_url}" class="search-advanced">{$lang.advanced_search}</a>
{/if}

{/if}
{/strip}