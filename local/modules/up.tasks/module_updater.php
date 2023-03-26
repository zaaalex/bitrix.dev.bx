<?php

use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;

function __projectorMigrate(int $nextVersion, callable $callback): void
{
	global $DB;
	$moduleId = 'up.tasks';

	if (!ModuleManager::isModuleInstalled($moduleId))
	{
		return;
	}

	$currentVersion = (int)Option::get($moduleId, '~database_schema_version', 0);

	if ($currentVersion < $nextVersion)
	{
		include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/update_class.php');
		$updater = new \CUpdater();
		$updater->Init('', 'mysql', '', '', $moduleId, 'DB');

		$callback($updater, $DB, 'mysql');
		Option::set($moduleId, '~database_schema_version', $nextVersion);
	}
}

__projectorMigrate(2, static function($updater, $DB)
{
	if ($updater->CanUpdateDatabase() && !$updater->TableExists('up_tasks_tasks'))
	{
		$DB->query('CREATE TABLE IF NOT EXISTS up_tasks_tasks
		(
		ID INT NOT NULL auto_increment,
		TITLE VARCHAR (100) NOT NULL,
		MESSAGE VARCHAR(1000) NOT NULL,
		CREATE_DATE DATETIME NOT NULL,
		PRIMARY KEY(ID)
		)');

	}
});