{* $Id$ *}

{$settings.Company.company_name|unescape}: {$reason.amount} {$lang.points} {if $reason.action == 'A'}{$lang.reward_points_subj_added_to}{elseif $reason.action == 'S'}{$lang.reward_points_subj_subtracted_from}{/if}