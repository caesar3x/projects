{* $Id$ *}

{if $product.product_type == "C" && !$product.configuration_mode}
	<div class="buttons-container">
		{include file="buttons/button.tpl" but_text=$lang.configure but_role="text" but_href="products.view?product_id=`$product.product_id`"}
	</div>
{/if}