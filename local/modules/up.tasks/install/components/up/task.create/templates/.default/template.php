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


<div class="column is-three-fifths is-offset-one-fifth">
	<form action="/create/" method="post">
		<div class="field">
			<label class="label"><?= Loc::getMessage("UP_TASKS_NAME_TITLE_FIELD") ?></label>
			<div class="control">
				<input class="input" type="text" minlength="1" maxlength="100" name="title" placeholder=
				"<?= Loc::getMessage("UP_TASKS_TITLE_PLACEHOLDER") ?>">
			</div>
		</div>

		<div class="field">
			<label class="label"><?= Loc::getMessage("UP_TASKS_NAME_MESSAGE_FIELD") ?></label>
			<div class="control">
				<textarea class = "textarea" minlength="1" maxlength="1000" name="message" placeholder="<?= Loc::getMessage(
					"UP_TASKS_MESSAGE_PLACEHOLDER"
				) ?>"></textarea>
			</div>
		</div>


		<div class="field is-grouped">
			<p class="control">
				<button class="button is-link" href="/">
					<?= Loc::getMessage("UP_TASKS_TEXT_IN_BUTTON") ?>
				</button>
			</p>
		</div>
	</form>

</div>