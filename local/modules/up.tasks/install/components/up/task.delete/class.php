<?php

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Up\Tasks\Model\TasksTable;

class TaskDeleteComponent extends CBitrixComponent
{
	/**
	 * @throws ObjectPropertyException
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	public function executeComponent()
	{
		if (!$this->arParams['IS_INFO'])
		{
			$this->prepareTemplateParams();
			$this->fetchTaskById();
		}

		$this->includeComponentTemplate();
	}

	protected function prepareTemplateParams(): void
	{
		$this->arResult['ID'] = $this->arParams['ID'];
	}

	/**
	 * @throws ObjectPropertyException
	 */
	public function onPrepareComponentParams($arParams): array
	{
		$arParams['IS_INFO'] = $arParams['IS_INFO'] ?? false;

		if ($arParams['IS_INFO'])
		{
			return $arParams;
		}

		$arParams['ID'] = (int)$arParams['ID'];
		if ($arParams['ID'] <= 0)
		{
			throw new ObjectPropertyException('Invalid task ID');
		}

		return $arParams;
	}

	/**
	 * @throws ArgumentException
	 * @throws ObjectPropertyException
	 * @throws SystemException
	 */
	protected function fetchTaskById(): void
	{
		$task = TasksTable::query()
						  ->setSelect(['*'])
						  ->where('ID',$this->arParams['ID'])
						  ->fetchObject();

		if (is_null($task))
		{
			throw new ObjectPropertyException('Invalid task ID');
		}

		$this->arResult['TASK'] = $task;
	}
}