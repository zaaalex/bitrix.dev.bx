# Bitrix module example

Clone repository to `${doc_root}/local/modules`

Install module using admin panel

Set `Projector template` as your primary site template

## Setup modern Bitrix routing

Add `projector.php` in `routing` section of `${doc_root}/bitrix/.settings.php` file:

```php
'routing' => ['value' => [
	'config' => ['tasks.php']
]],
```

Put following content into your `${doc_root}/index.php` file:

```php
<?php
require_once __DIR__ . '/bitrix/routing_index.php';
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
local/components/up -> local/modules/up.projector/install/components/up
local/templates/projector -> local/modules/up.projector/install/templates/projector
local/routes/projector.php -> local/modules/up.projector/install/routes/projector.php
```