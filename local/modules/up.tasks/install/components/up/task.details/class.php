<?php

class ProjectDetailsComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->prepareTemplateParams();
		$this->fetchProjectsList();
		$this->includeComponentTemplate();
	}

	public function onPrepareComponentParams($arParams)
	{
		$arParams['ID'] = (int)$arParams['ID'];
		if ($arParams['ID'] <= 0)
		{
			throw new Exception('Invalid project ID');
		}
		$arParams['DATE_FORMAT'] = $arParams['DATE_FORMAT'] ?? 'd.m.Y';

		return $arParams;
	}

	protected function prepareTemplateParams(): void
	{
		$this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
	}

	protected function fetchProjectsList()
	{
		// db connect
		// select * from projects
		$project =
			[
				'id' => 1,
				'name' => 'Bitrix University Demo',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis commodi cum dicta ex excepturi in ipsa, iusto maxime molestiae nobis non officia officiis porro sunt, tempore vel vero, voluptates!',
				'last_activity' => new DateTime()
			];

		$this->arResult['TASK'] = $project;
	}
}