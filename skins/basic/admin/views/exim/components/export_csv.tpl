{* $Id$ *}
{if $fields}{$delimiter|implode:$fields|unescape}{$eol}{/if}{foreach from=$export_data item=data}{$delimiter|implode:$data|unescape}{$eol}{/foreach}