{* $Id$ *}

{if $auth.user_id}
<li><a href="{"reward_points.userlog"|fn_url}" rel="nofollow">{$lang.my_points}:&nbsp;<strong>{$user_info.points|default:"0"}</strong></a></li>
{/if}