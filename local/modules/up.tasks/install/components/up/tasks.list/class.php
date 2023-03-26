<?php

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Up\Model\TasksTable;
use Up\Config\Config;
use Up\Services\PaginationService;

class TaskListComponent extends CBitrixComponent
{
	/**
	 * @throws ObjectPropertyException
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	public function executeComponent()
	{
		$this->prepareTemplateParams();
		$this->fetchProjectsList();
		$this->includeComponentTemplate();
	}

	/**
	 * @throws ObjectPropertyException
	 */
	public function onPrepareComponentParams($arParams): array
	{
		$arParams['DATE_FORMAT'] = $arParams['DATE_FORMAT'] ?? 'd.m.Y';

		$arParams['CURRENT_PAGE'] = (int)$arParams['CURRENT_PAGE'];
		if ($arParams['CURRENT_PAGE'] <= 0)
		{
			throw new ObjectPropertyException('Invalid page');
		}

		return $arParams;
	}

	/**
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	protected function prepareTemplateParams(): void
	{
		$paginationService = new PaginationService(new TasksTable());

		$this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
		$this->arResult['CURRENT_PAGE'] = $this->arParams['CURRENT_PAGE'];
		$this->arResult['PAGES'] = $paginationService
			->getPagesForPaginationByPage($this->arParams['CURRENT_PAGE']);
		$this->arResult['LAST_PAGE'] = $paginationService->getLastPageForPagination();
	}

	/**
	 * @throws ObjectPropertyException
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	protected function fetchProjectsList(): void
	{
		$offset = ($this->arParams['CURRENT_PAGE'] - 1) * Config::COUNT_TASKS_ON_PAGE;

		$tasks = TasksTable::query()
						   ->setSelect(['*'])
						   ->setOffset($offset)
						   ->setLimit(Config::COUNT_TASKS_ON_PAGE)
						   ->fetchCollection();

		if (empty($tasks->getIdList()))
		{
			$taskExist = TasksTable::query()->setSelect(['*'])->setLimit(1)->fetchObject();

			if (is_null($taskExist))
			{
				header("Location: /createFirstTask/");
				return;
			}
			header("Location: /pageNotFound/");
		}

		$this->arResult['TASKS'] = $tasks;
	}
}