<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
?>

<section class="hero is-warning">
	<div class="hero-body">
		<p class="title">
			<?=Loc::getMessage("UP_TASKS_PAGE_NOT_FOUND_FIRST_ROW_TEXT")?>
		</p>
		<p class="subtitle">
			<?=Loc::getMessage("UP_TASKS_PAGE_NOT_FOUND_SECOND_ROW_TEXT")?>
		</p>
	</div>
</section>
<div class="columns mb-6" style="margin-top: 10px">
	<div class="column">
		<a class="button is-success is-pulled-right" href="/">
			<?=Loc::getMessage("UP_TASKS_PAGE_NOT_FOUND_TEXT_IN_BUTTON")?>
		</a>
	</div>
</div>