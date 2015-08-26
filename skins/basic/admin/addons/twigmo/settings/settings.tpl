{* $Id: connect.tpl 1172 2011-10-10 08:37:48Z aelita $ *}

<div id="storefront_settings">

{include file="common_templates/subheader.tpl" title=$lang.tw_manage_storefront_settings}

<fieldset>
	
	<div class="form-field">
		<label class="cm-required" for="elm_tw_company_name">{$lang.company_name}:</label>
		<input type="text" id="elm_tw_company_name" name="tw_settings[companyName]"  value="{if $tw_settings.companyName}{$tw_settings.companyName}{else}{$config.http_host|fn_tw_get_domain_name}{/if}" class="input-text-large" size="60" />
	</div>

	<div class="form-field">
		<label for="elm_tw_display_company_name">{$lang.display_company_name}:</label>
		<input type="hidden" name="tw_settings[displayCompanyName]" value="N" />
		<input type="checkbox" class="checkbox" id="elm_tw_display_company_name" name="tw_settings[displayCompanyName]" value="Y" {if !$tw_settings.displayCompanyName || $tw_settings.displayCompanyName == "Y"}checked="checked"{/if} />
	</div>

	<div class="form-field">
		<label class="cm-required" for="elm_tw_logo_url">{$lang.logo_link}:</label>
		<input type="text" id="elm_tw_logo_url" name="tw_settings[logoURL]" value="{if $tw_settings.logoURL}{$tw_settings.logoURL}{else}http://{$config.http_host}{$images_dir|replace:"admin":"customer"}/{$manifest.Customer_logo.filename}{/if}" class="input-text-large" size="60">
	</div>

	<div class="form-field">
		<label for="elm_tw_currency_prefix">{$lang.currency_prefix}:</label>
		<input type="text" id="elm_tw_currency_prefix" name="tw_settings[currencyPrefix]" value="{$tw_settings.currencyPrefix}" class="input-text-large" size="10">
	</div>

	<div class="form-field">
		<label for="elm_tw_currency_postfix">{$lang.currency_postfix}:</label>
		<input type="text" id="elm_tw_currency_postfix" name="tw_settings[currencyPostfix]" value="{$tw_settings.currencyPostfix}" class="input-text-large" size="10">
	</div>

	<div class="form-field">
		<label for="elm_tw_disable_anonymous_checkout">{$lang.disable_anonymous_checkout}:</label>
		<input type="hidden" name="tw_settings[anonymousCheckoutDisabled]" value="N" />
		<input type="checkbox" class="checkbox" id="elm_tw_disable_anonymous_checkout" name="tw_settings[anonymousCheckoutDisabled]" value="Y" {if $tw_settings.anonymousCheckoutDisabled == "Y"}checked="checked"{/if} />
	</div>

	<div class="form-field">
		<label class="cm-required" for="elm_tw_http_location">{$lang.http_location}:</label>
		<input type="text" id="elm_tw_http_location" name="tw_settings[HTTPLocation]"  value="{if $tw_settings.HTTPLocation}{$tw_settings.HTTPLocation}{else}http://{$config.http_host}{$config.http_path}/{/if}" class="input-text-large" size="60" />
	</div>

	<div class="form-field">
		<label class="cm-required" for="elm_tw_https_location">{$lang.https_location}:</label>
		<input type="text" id="elm_tw_https_location" name="tw_settings[HTTPSLocation]"  value="{if $tw_settings.HTTPSLocation}{$tw_settings.HTTPSLocation}{else}https://{$config.https_host}{$config.https_path}/{/if}" class="input-text-large" size="60" />
	</div>

	<div class="form-field">
		<label class="cm-required" for="elm_tw_customer_index">{$lang.customer_index}:</label>
		<input type="text" id="elm_tw_customer_index" name="tw_settings[customerIndex]"  value="{$tw_settings.customerIndex|default:$config.customer_index}" class="input-text-large" size="60" />
	</div>

	<div class="form-field">
		<label for="elm_tw_enable_direct_requests">{$lang.enable_direct_requests}:</label>
		<input type="hidden" name="tw_settings[directRequestsEnabled]" value="N" />
		<input type="checkbox" class="checkbox" id="elm_tw_enable_direct_requests" name="tw_settings[directRequestsEnabled]" value="Y" {if !$tw_settings.directRequestsEnabled || $tw_settings.directRequestsEnabled == "Y"}checked="checked"{/if} />
	</div>

</fieldset>
<!--storefront_settings--></div>
