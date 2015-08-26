{* $Id$ *}
{if $anchor}
<a name="{$anchor}"></a>
{/if}
<div class="mainbox-container{if $details_page} details-page{/if}">
	{if $title}
	<h1 class="mainbox-title"><span>{$title}</span></h1>
	{/if}
	<div class="mainbox-body">{$content}</div>
</div>
