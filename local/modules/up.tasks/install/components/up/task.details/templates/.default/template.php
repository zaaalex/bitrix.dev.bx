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
				<div class="card-header-title">
					<?= $arResult['TASK']['TITLE'] ?>
				</div>
				<button class="card-header-icon" aria-label="more options">
					<a href="/delete/<?= $arResult['TASK']['ID']?>">
						<span class="icon disabled" >
							&#10060;
						</span>
					</a>
				</button>
			</header>
			<div class="card-content">
				<div class="content">
					<?= $arResult['TASK']['MESSAGE']?>
				</div>
			</div>
			<footer class="card-footer">
				<span class="card-footer-item is-4 is-offset-8">
				<strong>
				<?=Loc::getMessage("UP_TASKS_WAS_CREATED")?>
				</strong>:
					<?= $arResult['TASK']['CREATE_DATE']->format($arResult['DATE_FORMAT'])?>
				</span>
			</footer>
		</div>
	</div>
</div>