<?php

class TaskListComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->prepareTemplateParams();
		$this->fetchProjectsList();
		$this->includeComponentTemplate();
	}

	public function onPrepareComponentParams($arParams): array
	{
		$arParams['DATE_FORMAT'] = $arParams['DATE_FORMAT'] ?? 'd.m.Y';

		return $arParams;
	}

	protected function prepareTemplateParams(): void
	{
		$this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
	}

	protected function fetchProjectsList(): void
	{
		// db connect
		// select * from projects
		$projects = [
			[
				'id' => 1,
				'name' => 'Bitrix University Demo',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis commodi cum dicta ex excepturi in ipsa, iusto maxime molestiae nobis non officia officiis porro sunt, tempore vel vero, voluptates!',
				'last_activity' => new DateTime(),
			],
			[
				'id' => 2,
				'name' => 'Projector - simple tool for managing issues',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'last_activity' => new DateTime(),
			],
			[
				'id' => 3,
				'name' => 'Bitrix University Demo',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis commodi cum dicta ex excepturi in ipsa, iusto maxime molestiae nobis non officia officiis porro sunt, tempore vel vero, voluptates!',
				'last_activity' => new DateTime(),
			],
			[
				'id' => 4,
				'name' => 'Projector - simple tool for managing issues',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'last_activity' => new DateTime(),
			],
		];

		$this->arResult['TASKS'] = $projects;
	}
}