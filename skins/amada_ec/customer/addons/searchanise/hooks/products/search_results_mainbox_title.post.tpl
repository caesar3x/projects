{assign var="product_q_lower" value=$search.q|strtolower}
{if $search.suggestion && 0 < $product_count && $product_count < 3 && $search.suggestion != $product_q_lower}
	{assign var="did_you_mean_link" value=$config.current_url|fn_link_attach:"q=`$search.suggestion`"}
	{capture name="mainbox_title"}<span class="float-right">{$title_extra}, {$lang.did_you_mean}: <a href="{$did_you_mean_link}">{$search.suggestion}</a>?</span>{$_title}{/capture}
{/if}