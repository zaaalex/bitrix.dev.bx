<?php

namespace Up\Tasks\Services;

use Exception;
use Up\Tasks\Model\Task;
use Up\Tasks\Model\TasksTable;

class TaskService
{
	public static function createTask(Task $task): void
	{
		try
		{
			$result = TasksTable::add([
										  'TITLE' => $task->title,
										  'MESSAGE' => $task->message,
									  ]);

			if ($result->isSuccess())
			{
				header("Location: /create/success/");
				return;
			}

			header("Location: /create/unsuccessful/");

		}
		catch (Exception $e)
		{
			header("Location: /create/unsuccessful/");
		}
	}

	public static function deleteTaskById(int $id):void
	{
		try
		{
			$result = TasksTable::delete($id);

			if ($result->isSuccess())
			{
				header("Location: /delete/success/");
				return;
			}

			header("Location:  /delete/$id/unsuccessful/");

		}
		catch (Exception $e){
			header("Location: /delete/$id/unsuccessful/");
		}
	}
}