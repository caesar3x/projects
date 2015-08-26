{* $Id$ *}
{hook name="index:top_links"}
<p class="quick-links">&nbsp;
	{foreach from=$quick_links item="link"}
		<a href="{$link.param|fn_url}">{$link.descr}</a>
	{/foreach}
</p>
{/hook}
