<?php

use Bitrix\Main\Context;
use Bitrix\Main\Routing\Controllers\PublicPageController;
use Bitrix\Main\Routing\RoutingConfigurator;
use Up\Model\Task;
use Up\Services\TaskService;

return static function (RoutingConfigurator $routes) {

	$routes->get('/', new PublicPageController('/local/modules/up.tasks/views/mainPage/tasks-list.php'));
	$routes->get('/{page}', new PublicPageController('/local/modules/up.tasks/views/mainPage/tasks-list.php'));
	$routes->get('/createFirstTask/', new PublicPageController('/local/modules/up.tasks/views/mainPage/create-first-task.php'));

	$routes->get('/task/{id}', new PublicPageController('/local/modules/up.tasks/views/detailPage/task-details.php'));

	$routes->get('/create/', new PublicPageController('/local/modules/up.tasks/views/createTask/task-create.php'));
	$routes->get('/create/success/', new PublicPageController('/local/modules/up.tasks/views/createTask/task-create-success.php'));
	$routes->get('/create/unsuccessful/', new PublicPageController('/local/modules/up.tasks/views/createTask/task-create-unsuccessful.php'));

	$routes->get('/delete/{id}', new PublicPageController('/local/modules/up.tasks/views/deleteTask/task-delete.php'));
	$routes->get('/delete/success/', new PublicPageController('/local/modules/up.tasks/views/deleteTask/task-delete-success.php'));
	$routes->get('/delete/{id}/unsuccessful/', new PublicPageController('/local/modules/up.tasks/views/deleteTask/task-delete-unsuccessful.php'));

	$routes->get('/pageNotFound/', new PublicPageController('/local/modules/up.tasks/views/page-not-found.php'));


	$routes->post('/create/', static function () {
		$title = Context::getCurrent()->getRequest()->getPost('title');
		$message = Context::getCurrent()->getRequest()->getPost('message');
		$task = new Task($title, $message);
		TaskService::createTask($task);
	});

	$routes->post('/delete/{id}', static function () {
		$id = Context::getCurrent()->getRequest()->get('id');
		TaskService::deleteTaskById($id);
	});

};