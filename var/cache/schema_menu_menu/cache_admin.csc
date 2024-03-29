a:2:{s:4:"data";s:13595:"<orders>
	<item title="view_orders" dispatch="orders.manage" alt="order_management" position="100" />
	<item title="sales_reports" dispatch="sales_reports.reports" position="200" />
	<item title="order_statuses" dispatch="statuses.manage" extra="type=O" position="300" />
	<item title="shipments" dispatch="shipments.manage" active_option="settings.General.use_shipments" position="400" />
	
	<side>
		<item group="sales_reports.reports" title="manage_reports" href="%INDEX_SCRIPT?dispatch=sales_reports.reports_list" />
	</side>
</orders>

<products>
	<item title="categories" dispatch="categories.manage" position="100" />
	<item title="products" dispatch="products.manage" position="200" />
	<item title="product_features" dispatch="product_features.manage" position="300" />
	<item title="product_filters" dispatch="product_filters.manage" position="400" />
	<item title="global_options" dispatch="product_options.manage" position="500" />
	<item title="promotions" dispatch="promotions.manage" position="600" />

	<side>
		<item group="products.manage" title="global_update" href="%INDEX_SCRIPT?dispatch=products.global_update" />
		<item group="products.manage" title="bulk_product_addition" href="%INDEX_SCRIPT?dispatch=products.m_add" />
		<item group="products.manage" title="product_subscriptions" href="%INDEX_SCRIPT?dispatch=products.p_subscr" />
	
		<item group="categories.manage" title="bulk_category_addition" href="%INDEX_SCRIPT?dispatch=categories.m_add" />

		<item group="categories.update" title="add_subcategory" href="%INDEX_SCRIPT?dispatch=categories.add&amp;parent_id=%CATEGORY_ID" />
		<item group="categories.update" title="add_product" href="%INDEX_SCRIPT?dispatch=products.add&amp;category_id=%CATEGORY_ID" />
		<item group="categories.update" title="view_products" href="%INDEX_SCRIPT?dispatch=products.manage&amp;cid=%CATEGORY_ID" />
		<item group="categories.update" title="delete_this_category" href="%INDEX_SCRIPT?dispatch=categories.delete&amp;category_id=%CATEGORY_ID" meta="cm-confirm" />

		<item group="products.update" title="add_product" href="%INDEX_SCRIPT?dispatch=products.add" />
		<item group="products.update" title="clone_this_product" href="%INDEX_SCRIPT?dispatch=products.clone&amp;product_id=%PRODUCT_ID" />
		<item group="products.update" title="delete_this_product" href="%INDEX_SCRIPT?dispatch=products.delete&amp;product_id=%PRODUCT_ID" meta="cm-confirm" />
		
		<item group="product_options.global" title="apply_to_products" href="%INDEX_SCRIPT?dispatch=product_options.global.apply" />
			<item group="promotions.update" title="add_cart_promotion" href="%INDEX_SCRIPT?dispatch=promotions.add&amp;zone=cart" />
			<item group="promotions.update" title="add_catalog_promotion" href="%INDEX_SCRIPT?dispatch=promotions.add&amp;zone=catalog" />
	</side>
</products>

<customers>
	<item title="users" dispatch="profiles.manage" position="100" />
	<item title="administrators" dispatch="profiles.manage" extra="user_type=A" position="200" />
	<item title="customers" dispatch="profiles.manage" extra="user_type=C" position="300" />
	<item title="profile_fields" dispatch="profile_fields.manage" position="600" />
	<item title="users_carts" dispatch="cart.cart_list" position="700" />
	<item title="usergroups" dispatch="usergroups.manage" position="800" />
	
	<side>
		<item group="usergroups.manage" title="user_group_requests" href="%INDEX_SCRIPT?dispatch=usergroups.requests" />
	</side>
</customers>

<website>
	<item title="content" links_group="website" dispatch="pages.manage" extra="get_tree=multi_level" position="100" />
	
	<side>
		<item group="pages.update" title="delete_this_page" href="%INDEX_SCRIPT?dispatch=pages.delete&amp;page_id=%PAGE_ID" meta="cm-confirm" />
		<item group="pages.update" title="clone_this_page" href="%INDEX_SCRIPT?dispatch=pages.clone&amp;page_id=%PAGE_ID" />
		<item group="pages.update" title="add_page" href="%INDEX_SCRIPT?dispatch=pages.add&amp;page_type=T&amp;parent_id=%PAGE_ID" />
		<item group="pages.update" title="add_link" href="%INDEX_SCRIPT?dispatch=pages.add&amp;page_type=L&amp;parent_id=%PAGE_ID" />
			<item group="languages.manage" title="translate_privileges" href="%INDEX_SCRIPT?dispatch=usergroups.privileges" />
		</side>
</website>

<shippings_taxes>
	<item title="shipping_methods" dispatch="shippings.manage" position="100" />
	<item title="taxes" dispatch="taxes.manage" position="200" />
	<item title="states" dispatch="states.manage" position="300" />
	<item title="countries" dispatch="countries.manage" position="400" />
	<item title="locations" dispatch="destinations.manage" position="500" />
	<item title="localizations" dispatch="localizations.manage" position="600" />
	<side>
		<item group="shippings.manage" title="realtime_shippings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Shippings" />
		<item group="shippings.update" title="add_shipping_method" href="%INDEX_SCRIPT?dispatch=shippings.add" />
		<item group="shippings.update" title="shipping_methods" href="%INDEX_SCRIPT?dispatch=shippings.manage" />
		<item group="shippings.update" title="realtime_shippings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Shippings" />
		
		<item group="profiles.update" title="add_user" href="%INDEX_SCRIPT?dispatch=profiles.add" />
		
		<item group="taxes.update" title="add_tax" href="%INDEX_SCRIPT?dispatch=taxes.add" />
		
		<item group="destinations.update" title="add_location" href="%INDEX_SCRIPT?dispatch=destinations.add" />
			<item group="localizations.update" title="add_localization" href="%INDEX_SCRIPT?dispatch=localizations.add" />
		</side>
</shippings_taxes>

<administration>
	<item title="addons" dispatch="addons.manage" position="100" />
	<item title="payment_methods" dispatch="payments.manage" position="200" />
	<item title="database" dispatch="database.manage" position="300" />
	<item title="credit_cards" dispatch="static_data.manage" extra="section=C" position="400" />
	<item title="titles" dispatch="static_data.manage" extra="section=T" position="500" />
	<item title="currencies" dispatch="currencies.manage" position="600" />
	<item title="import_data" dispatch="exim.import" position="700" />
	<item title="export_data" dispatch="exim.export" position="800" />
	<item title="revisions" dispatch="revisions.manage" active_option="settings.General.active_revisions_objects" position="900" />
	<item title="workflow" dispatch="revisions_workflow.manage" active_option="settings.General.active_revisions_objects" position="1000" />
	<item title="logs" dispatch="logs.manage" position="1100" />
	<item title="upgrade_center" dispatch="upgrade_center.manage" position="1200" />
	<item title="languages" dispatch="languages.manage" position="1300" />

	<subitem item="import_data" title="products" href="%INDEX_SCRIPT?dispatch=exim.import&amp;section=products" />
	<subitem item="import_data" title="orders" href="%INDEX_SCRIPT?dispatch=exim.import&amp;section=orders" />
	<subitem item="import_data" title="translations" href="%INDEX_SCRIPT?dispatch=exim.import&amp;section=translations" />
	<subitem item="import_data" title="users" href="%INDEX_SCRIPT?dispatch=exim.import&amp;section=users" />

	<subitem item="export_data" title="products" href="%INDEX_SCRIPT?dispatch=exim.export&amp;section=products" />
	<subitem item="export_data" title="orders" href="%INDEX_SCRIPT?dispatch=exim.export&amp;section=orders" />
	<subitem item="export_data" title="translations" href="%INDEX_SCRIPT?dispatch=exim.export&amp;section=translations" />
	<subitem item="export_data" title="users" href="%INDEX_SCRIPT?dispatch=exim.export&amp;section=users" />
	
	<side>
		<item group="upgrade_center.manage" title="update_edition" href="%INDEX_SCRIPT?dispatch=upgrade_center.manage_editions" />
		<item group="upgrade_center.manage_editions" title="upgrade_packages_list" href="%INDEX_SCRIPT?dispatch=upgrade_center.manage" />
		<item group="upgrade_center.manage_editions" title="settings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Upgrade_center" />
		<item group="upgrade_center.manage" title="settings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Upgrade_center" />
		<item group="upgrade_center.check" title="settings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Upgrade_center" />

		<item group="database.manage" title="logs" href="%INDEX_SCRIPT?dispatch=logs.manage" />
		<item group="database.manage" title="phpinfo" href="%INDEX_SCRIPT?dispatch=tools.phpinfo" target="_blank" />

		<item group="logs.manage" title="db_backup_restore" href="%INDEX_SCRIPT?dispatch=database.manage" />
		<item group="logs.manage" title="phpinfo" href="%INDEX_SCRIPT?dispatch=tools.phpinfo" target="_blank" />
		<item group="logs.manage" title="clean_logs" href="%INDEX_SCRIPT?dispatch=logs.clean" meta="cm-confirm" />
		<item group="logs.manage" title="settings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Logging" />

		<item group="exim.import" title="export" href="%INDEX_SCRIPT?dispatch=exim.export&amp;section=products" />
		<item group="exim.export" title="import" href="%INDEX_SCRIPT?dispatch=exim.import&amp;section=products" />
	</side>
</administration>

<settings>
</settings>

<design>
	<item title="logos" dispatch="site_layout.logos" position="100" />
	<item title="design_mode" dispatch="site_layout.design_mode" position="200" />
	<item title="blocks" dispatch="block_manager.manage" position="300" />
	<item title="quick_links" dispatch="static_data.manage" extra="section=N" position="400" />
	<item title="top_menu" dispatch="static_data.manage" extra="section=A" position="500" />
	<item title="sitemap" dispatch="sitemap.manage" position="600" />
	<item title="template_editor" dispatch="template_editor.manage" position="700" />
	<item title="skin_selector" dispatch="skin_selector.manage" position="800" />
	<side>
		<item group="sitemap" title="sitemap_settings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Sitemap" />
		<item group="sitemap.manage" title="sitemap_settings" href="%INDEX_SCRIPT?dispatch=settings.manage&amp;section_id=Sitemap" />
	</side>
</design>
<website>
	<item title="tags" dispatch="tags.manage" />
</website>
<website>
	<item title="site_news" dispatch="news.manage" />
	<item title="newsletters" dispatch="newsletters.manage" alt="mailing_lists.manage,subscribers.manage" />

	<subitem item="newsletters" title="newsletters" href="%INDEX_SCRIPT?dispatch=newsletters.manage&amp;type=N" />
	<subitem item="newsletters" title="templates" href="%INDEX_SCRIPT?dispatch=newsletters.manage&amp;type=T" />
	<subitem item="newsletters" title="autoresponders" href="%INDEX_SCRIPT?dispatch=newsletters.manage&amp;type=A" />
	<subitem item="newsletters" title="campaigns" href="%INDEX_SCRIPT?dispatch=newsletters.campaigns" />
	<subitem item="newsletters" title="mailing_lists" href="%INDEX_SCRIPT?dispatch=mailing_lists.manage" />
	<subitem item="newsletters" title="subscribers" href="%INDEX_SCRIPT?dispatch=subscribers.manage" />

	<side>
		<item group="news.update" title="add_news" href="%INDEX_SCRIPT?dispatch=news.add" />
		
		<item group="newsletters.update" title="add_newsletter" href="%INDEX_SCRIPT?dispatch=newsletters.add&amp;type=N" />
		<item group="newsletters.update" title="add_template" href="%INDEX_SCRIPT?dispatch=newsletters.add&amp;type=T" />
		<item group="newsletters.update" title="add_autoresponder" href="%INDEX_SCRIPT?dispatch=newsletters.add&amp;type=A" />
	</side>
</website>
<administration>
	<item title="store_locator" privilege="" dispatch="store_locator.manage" position="1260" />
</administration>
<administration>
	<item title="statistics" dispatch="statistics.reports" position="150" />

	<side>
		<item group="statistics" title="users_online" href="%INDEX_SCRIPT?dispatch=statistics.visitors&amp;section=general&amp;report=online" />
		<item group="statistics" title="all_users" href="%INDEX_SCRIPT?dispatch=statistics.visitors&amp;section=general&amp;client_type=U" />
		<item group="statistics" title="remove_statistics" href="%INDEX_SCRIPT?dispatch=statistics.delete" meta="cm-confirm" />
		<item group="banners.manage" title="banners_statistics" href="%INDEX_SCRIPT?dispatch=statistics.banners" />
	</side>

	<subitem item="statistics" title="general" href="%INDEX_SCRIPT?dispatch=statistics.reports&amp;reports_group=general" />
	<subitem item="statistics" title="system" href="%INDEX_SCRIPT?dispatch=statistics.reports&amp;reports_group=system" />
	<subitem item="statistics" title="geography" href="%INDEX_SCRIPT?dispatch=statistics.reports&amp;reports_group=geography" />
	<subitem item="statistics" title="referrers" href="%INDEX_SCRIPT?dispatch=statistics.reports&amp;reports_group=referrers" />
	<subitem item="statistics" title="pages" href="%INDEX_SCRIPT?dispatch=statistics.reports&amp;reports_group=pages" />
	<subitem item="statistics" title="audience" href="%INDEX_SCRIPT?dispatch=statistics.reports&amp;reports_group=audience" />
	<subitem item="statistics" title="products" href="%INDEX_SCRIPT?dispatch=statistics.reports&amp;reports_group=products" />

</administration>
<website>
	<side>
		<item group="pages.update" title="add_form" href="%INDEX_SCRIPT?dispatch=pages.add&amp;page_type=F&amp;parent_id=%PAGE_ID" />
	</side>
</website>
<administration>
	<item title="store_access" dispatch="access_restrictions.manage" position="1250" />
</administration>
<website>
	<item title="banners" dispatch="banners.manage" />
</website>

<administration>
	<subitem item="statistics" title="banners" href="%INDEX_SCRIPT?dispatch=statistics.banners" />
</administration>";s:6:"expiry";i:0;}