{if $addons.searchanise.parent_private_key && $addons.searchanise.import_status}

<div class="snize" id="snize_container">
</div>

<script type="text/javascript">
var private_key = '{$addons.searchanise.parent_private_key}';
</script>

{if "HTTPS"|defined}
{assign var="se_service_url" value=$smarty.const.SE_SERVICE_URL|replace:'http://':'https://'}
{else}
{assign var="se_service_url" value=$smarty.const.SE_SERVICE_URL}
{/if}

<script type="text/javascript" src="{$se_service_url}/js/init.js"></script>

{/if}

