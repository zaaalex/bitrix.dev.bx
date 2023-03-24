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

	<div class="columns">
	<div class="column">
		<div class="card project-card">
			<header class="card-header">
				<a class="card-header-title" href="/tasks/<?= $arResult['TASK']['id']?>/">
					<?= $arResult['TASK']['name'] ?>
				</a>
				<button class="card-header-icon" aria-label="more options" >
					<a href="/tasks/<?= $arResult['TASK']['id']?>/">
						<span class="icon disabled">
							&#10060;
						</span>
					</a>
				</button>
			</header>
			<div class="card-content" style="height: 200px;">
				<div class="content">
					<?= $arResult['TASK']['description']?>
				</div>
			</div>
			<footer class="card-footer">
				<span class="card-footer-item is-4 is-offset-8">
				<strong>
				<?=Loc::getMessage("UP_TASKS_WAS_CREATED")?>
				</strong>:
					<?= $arResult['TASK']['last_activity']->format($arResult['DATE_FORMAT'])?>
				</span>
			</footer>
		</div>
	</div>
	</div>