{* $Id$ *}

{section name="full_star" loop=$stars.full}<img src="{$images_dir}/icons/star_full.png" width="16" height="16" alt="*" />{/section}
{if $stars.part}<img src="{$images_dir}/icons/star_{$stars.part}.png" width="16" height="16" alt="X" />{/if}{section name="full_star" loop=$stars.empty}<img src="{$images_dir}/icons/star_empty.png" width="16" height="16" alt="o" />{/section}
