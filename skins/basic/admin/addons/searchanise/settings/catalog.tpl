{assign var="_se_api_key" value="api_key_`$smarty.const.CART_LANGUAGE`"}
{assign var="se_api_key" value=$addons.searchanise[$_se_api_key]}
{if $se_api_key}
<div class="form-field">
	<strong>{$lang.text_se_connected}</strong>
</div>

<div class="form-field">
	<label></label>

	{if $addons.searchanise.import_status == "queued"}
	{$lang.text_se_import_status_queued}
	{elseif $addons.searchanise.import_status == "processing"}
	{$lang.text_se_import_status_processing}
	{elseif $addons.searchanise.import_status == "done"}
	{$lang.text_se_import_status_done}
	{else}
	{$lang.text_se_import_status_none}
	{/if}

	<div class="buttons-container">
	{include file="buttons/button.tpl" but_name="dispatch[searchanise.export]" but_text=$lang.se_sync}
	</div>

</div>
{else}

<div class="form-field">
	<label></label>

	{$lang.text_se_signup}
</div>

<div class="form-field">
	<div class="buttons-container">
	{include file="buttons/button.tpl" but_name="dispatch[searchanise.signup]" but_text=$lang.signup}
	</div>

</div>
{/if}

<p>
{$lang.text_se_data_update}
</p>
