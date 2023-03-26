<?php

use Bitrix\Main\ArgumentException,
	Bitrix\Main\ObjectPropertyException,
	Bitrix\Main\SystemException,
	Up\Model\TasksTable;

class TaskDetailsComponent extends CBitrixComponent
{
	/**
	 * @throws ObjectPropertyException
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	public function executeComponent()
	{
		$this->fetchTaskById();
		$this->prepareTemplateParams();
		$this->includeComponentTemplate();
	}

	protected function prepareTemplateParams(): void
	{
		$this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
	}

	/**
	 * @throws ObjectPropertyException
	 */
	public function onPrepareComponentParams($arParams): array
	{
		$arParams['DATE_FORMAT'] = $arParams['DATE_FORMAT'] ?? 'd.m.Y';
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
		$task = TasksTable::query()->setSelect(['*'])->where('ID', $this->arParams['ID'])->fetchObject();

		if (is_null($task))
		{
			throw new ObjectPropertyException('Invalid task ID');
		}

		$this->arResult['TASK'] = $task;
	}
}