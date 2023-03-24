<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
?>


<section class="section is-medium">
	<h1 class="title">	<?=Loc::getMessage("UP_TASKS_TEXT_SECOND_ROW")?></h1>
	<h2 class="subtitle">
		<?=Loc::getMessage("UP_TASKS_TEXT_SECOND_ROW")?>
	</h2>
</section>

<div class="columns mb-6">
	<div class="column">
		<a class="button is-success is-pulled-right" href="/tasks/create">
			<?=Loc::getMessage("UP_TASKS_TEXT_IN_BUTTON")?>
		</a>
	</div>
</div>