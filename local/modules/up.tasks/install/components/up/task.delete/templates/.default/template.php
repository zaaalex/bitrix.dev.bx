<?php

/**
 * @var array $arResult
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
?>

<section class="hero is-danger">
	<div class="hero-body">
		<p class="title">
			<?= Loc::getMessage("UP_DELETE_TASK_TEXT_FIRST_ROW") ?>
		</p>
		<p class="subtitle">
			<?= Loc::getMessage("UP_DELETE_TASK_TEXT_SECOND_ROW") ?>
		</p>
	</div>
</section>

<div class="column is-offset-5">
	<form action="/delete/<?= $arResult['ID'] ?>" method="post">
		<div class="field is-grouped">
			<p class="control">
				<button class="button is-fullwidth">
					<?= Loc::getMessage("UP_DELETE_TASK_TEXT_IN_BUTTON") ?>
				</button>
			</p>
		</div>
	</form>
</div>