{assign var="product_q_lower" value=$search.q|strtolower}
{if $search.suggestion && !$product_count && $search.suggestion != $product_q_lower}
	{assign var="did_you_mean_link" value=$config.current_url|fn_link_attach:"q=`$search.suggestion`"}
	<p class="no-items">{$lang.text_no_matching_products_found}<br /><br /> {$lang.did_you_mean}: <a href="{$did_you_mean_link}">{$search.suggestion}</a>?</p>
{else}
	<p class="no-items">{$lang.text_no_matching_products_found}</p>
{/if}