{* $Id$ *}

<td>{if $person.type == "chat"}{assign var="person_ip" value=$person.ip|escape:url}<a href="{"statistics.visitors?report=by_ip&amp;ip=`$person_ip`"|fn_url}">{$lang.view}&nbsp;&raquo;</a>{else}&nbsp;{/if}</td>