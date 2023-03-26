# Bitrix module example

Clone repository to `${doc_root}/local`

Install module using admin panel

Set `Tasks template` as your primary site template

## Setup modern Bitrix routing

Add `task.php` in `routing` section of `${doc_root}/bitrix/.settings.php` file:

```php
'routing' => ['value' => [
	'config' => ['tasks.php']
]],
```

Change content into your `${doc_root}/index.php` file:

```php
<?php

	require_once $_SERVER["DOCUMENT_ROOT"] . '/bitrix/routing_index.php';
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

	/**
	 * @var CMain $APPLICATION
	 */
	$APPLICATION->SetTitle("Not found");

	$APPLICATION->IncludeComponent('up:show.info', 'page.not.found', []);

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");';
```

Replace following lines in your `${doc_root}/.htaccess` file:

```
-RewriteCond %{REQUEST_FILENAME} !/bitrix/urlrewrite.php$
-RewriteRule ^(.*)$ /bitrix/urlrewrite.php [L]

+RewriteCond %{REQUEST_FILENAME} !/index.php$
+RewriteRule ^(.*)$ /index.php [L]
```

## Symlinks for handy development

You probably want to make following symlinks:

```
local/components/up -> local/modules/up.tasks/install/components/up
local/templates/tasks -> local/modules/up.tasks/install/templates/tasks
local/routes/tasks.php -> local/modules/up.tasks/install/routes/tasks.php
```