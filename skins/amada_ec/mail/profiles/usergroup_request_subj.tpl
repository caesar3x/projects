{* $Id$ *}

{$settings.Company.company_name|unescape}: {$lang.usergroup_request_by_customer} "{if $settings.General.use_email_as_login != "Y"}{$user_data.user_login}{else}{$user_data.email}{/if}"