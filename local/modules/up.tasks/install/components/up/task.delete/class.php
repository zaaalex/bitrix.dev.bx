<?php

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Up\Model\TasksTable;

class TaskDeleteComponent extends CBitrixComponent
{
	/**
	 * @throws ObjectPropertyException
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	public function executeComponent()
	{
		$this->prepareTemplateParams();
		$this->fetchTaskById();
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
			$id=$this->arParams['ID'];
			header ("Location: /delete/$id/unsuccessful/");
			return;
		}

		$this->arResult['TASK'] = $task;
	}
}