{* $Id$ *}

{include file="views/statuses/update.tpl" privilege="manage_rma" item=$lang.request_statuses title=$lang.rma_request_statuses status_type=$smarty.const.STATUSES_RETURN extra_fields="<input type=\"hidden\" name=\"redirect_mode\" value=\"`$smarty.request.mode`\" />" }
