<?php

namespace Up\Services;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\SystemException;
use Up\Config\Config;

class PaginationService
{
	private DataManager $model;

	public function __construct(DataManager $model)
	{
		$this->model = $model;
	}

	/**
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	public function getLastPageForPagination():int
	{
		$countTasks=$this->getAvailableCount();
		return (int)ceil($countTasks/Config::COUNT_TASKS_ON_PAGE);
	}

	/**
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	private function getAvailableCount():int
	{
		return $this->model::query()->setSelect(['*'])->queryCountTotal();
	}

	/**
	 * @throws SystemException
	 * @throws ArgumentException
	 */
	public function getPagesForPaginationByPage(int $currentPage): ?array
	{
		$pages=[];
		$lastPage=$this->getLastPageForPagination();

		if ($currentPage>$lastPage || $currentPage<Config::FIRST_PAGE_ON_PAGINATION)
		{
			return null;
		}

		$pages[]=$currentPage;

		$indentInOnePart=intdiv(Config::COUNT_PAGES_ON_PAGINATION,2);

		$leftIndent=0;
		$rightIndent=0;
		for ($indent=1; $indent<=Config::COUNT_PAGES_ON_PAGINATION-1; ++$indent){
			$pageLeft=$currentPage-$indent;
			$pageRight=$currentPage+$indent;
			if ($pageLeft>=Config::FIRST_PAGE_ON_PAGINATION)
			{
				$pages[]=$pageLeft;
				$leftIndent=$indent;
			}
			if ($pageRight<=$lastPage)
			{
				$pages[]=$pageRight;
				$rightIndent=$indent;
			}
		}

		$checkLeftPart=false;
		$checkRightPart=false;
		if ($leftIndent>=$indentInOnePart)
		{
			$checkLeftPart = true;
		}
		if ($rightIndent>=$indentInOnePart)
		{
			$checkRightPart = true;
		}

		sort($pages);

		if ($checkLeftPart && $checkRightPart)
		{
			$pages=array_slice($pages, $leftIndent-$indentInOnePart);

			if ($rightIndent-$indentInOnePart!==0)
			{
				array_splice($pages, -($rightIndent - $indentInOnePart));
			}
		}

		return $pages;
	}
}