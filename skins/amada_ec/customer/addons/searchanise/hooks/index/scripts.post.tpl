{assign var="_se_api_key" value="api_key_`$smarty.const.CART_LANGUAGE`"}
{assign var="se_api_key" value=$addons.searchanise[$_se_api_key]}

{if $se_api_key && $addons.searchanise.import_status == "done"}
{if "HTTPS"|defined}
	{assign var="se_servise_url" value=$smarty.const.SE_SERVICE_URL|replace:'http://':'https://'}
{else}
	{assign var="se_servise_url" value=$smarty.const.SE_SERVICE_URL}
{/if}

<script type="text/javascript">
//<![CDATA[
	Searchanise = {ldelim}{rdelim};
	Searchanise.host = '{$se_servise_url}';
	Searchanise.api_key = '{$se_api_key}';

	Searchanise.AutoCmpParams = {ldelim}{rdelim};
	Searchanise.AutoCmpParams.restrictBy = {ldelim}{rdelim};
	Searchanise.AutoCmpParams.restrictBy.status = 'A';
	Searchanise.AutoCmpParams.restrictBy.usergroup_ids = '{'|'|join:$auth.usergroup_ids}';
{if $settings.General.inventory_tracking == 'Y' && $settings.General.show_out_of_stock_products == 'N' && $smarty.const.AREA == 'C'}
	Searchanise.AutoCmpParams.restrictBy.amount = '1|';
{/if}
{if $se_active_companies|fn_strlen}
	Searchanise.AutoCmpParams.restrictBy.company_id = '{$se_active_companies}';
{/if}
	Searchanise.SearchInput = '#snize-input';

	(function() {ldelim}
		var __se = document.createElement('script');
		__se.src = '{$se_servise_url}/widgets/v1.0/init.js';
		__se.setAttribute('async', 'true');
		document.documentElement.firstChild.appendChild(__se);
	{rdelim})();
//]]>
</script>

{/if}
<script type="text/javascript">
//<![CDATA[
	$(window).ready(function() {ldelim}
		jQuery.get('{'searchanise.async?no_session=Y'|fn_url:'C':'current':'&'}');
	{rdelim});
//]]>
</script>
