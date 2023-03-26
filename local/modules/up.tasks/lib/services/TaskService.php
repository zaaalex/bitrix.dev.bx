<?php

namespace Up\Services;

use Bitrix\Main\Context;
use Exception;
use Up\Model\TasksTable;

class TaskService
{
	public static function createTask($title, $message): void
	{
		try
		{
			$result = TasksTable::add([
										  'TITLE' => $title,
										  'MESSAGE' => $message,
									  ]);

			if ($result->isSuccess())
			{
				header("Location: /create/success/");
			}
			else
			{
				header("Location: /create/unsuccessful/");
			}
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
			}
			else
			{
				header("Location:  /delete/$id/unsuccessful/");
			}
		}
		catch (Exception $e){
			header("Location: /delete/$id/unsuccessful/");
		}
	}
}