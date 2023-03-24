<?php

use Bitrix\Main\Routing\Controllers\PublicPageController;
use Bitrix\Main\Routing\RoutingConfigurator;

return static function (RoutingConfigurator $routes) {

	$routes->get('/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->get('/tasks', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->get('/tasks/create', new PublicPageController('/local/modules/up.tasks/views/task-create.php'));
	$routes->get('/tasks/createSuccess', new PublicPageController('/local/modules/up.tasks/views/task-create-success.php'));
	$routes->get('/tasks/createUnsuccessful', new PublicPageController('/local/modules/up.tasks/views/task-create-unsuccessful.php'));
	$routes->get('/tasks/{id}', new PublicPageController('/local/modules/up.tasks/views/task-details.php'));

	$routes->post('/tasks/create', static function () {
		//create task
	});

	$routes->post('/tasks/{id}/delete', static function () {
		// delete task
	});

};