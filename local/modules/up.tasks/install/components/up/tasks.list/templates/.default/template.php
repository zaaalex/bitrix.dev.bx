<?php

/**
 * @var array $arResult
 */

use Bitrix\Main\Localization\Loc;
use Up\Tasks\Config\Config;
use Up\Tasks\Services\FormattingServices;

Loc::loadMessages(__FILE__);

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
?>

<div class="columns mb-6">
	<div class="column">
		<a class="button is-success is-pulled-right" href="/create/">
			<?= Loc::getMessage("UP_TASKS_CREATE_TASK") ?>
		</a>
	</div>
</div>

<div class="columns">
	<?php foreach ($arResult['TASKS'] as $task): ?>

		<div class="column">
			<div class="card project-card">
				<header class="card-header">
					<a class="card-header-title" href="/task/<?= (int)$task['ID'] ?>">
						<?= htmlspecialchars(FormattingServices::decreaseDescription($task['TITLE'],20)) ?>
					</a>
					<button class="card-header-icon" aria-label="more options">
						<a href="/delete/<?= (int)$task['ID'] ?>">
						<span class="icon disabled">
							&#10060;
						</span>
						</a>
					</button>
				</header>
				<div class="card-content" style="min-height: 200px; min-width: 250px">
					<div class="content">
						<?= htmlspecialchars(FormattingServices::decreaseDescription($task['MESSAGE'])) ?>
					</div>
				</div>
				<footer class="card-footer">
				<span class="card-footer-item is-4 is-offset-8">
				<strong>
				<?= Loc::getMessage("UP_TASKS_WAS_CREATED") ?>
				</strong>:
					<?= $task['CREATE_DATE']->format($arResult['DATE_FORMAT']) ?>
				</span>
				</footer>
			</div>
		</div>

	<?php endforeach; ?>
</div>

<ul class="pagination">
	<li class="pagination-item <?= ($arResult['CURRENT_PAGE'] === Config::FIRST_PAGE_ON_PAGINATION) ? 'pagination-item-no-active' : '' ?>">
		<a href="/<?= Config::FIRST_PAGE_ON_PAGINATION ?>"><?= "<<" ?></a>
	</li>

	<?php foreach ($arResult['PAGES'] as $page): ?>
		<li class="pagination-item <?= ($arResult['CURRENT_PAGE'] === $page) ? 'pagination-item-active' : '' ?>">
			<a href="/<?= $page ?>"><?= $page ?></a>
		</li>
	<?php endforeach ?>

	<li class="pagination-item <?= ($arResult['CURRENT_PAGE'] === $arResult['LAST_PAGE']) ? 'pagination-item-no-active' : '' ?>">
		<a href="/<?= $arResult['LAST_PAGE'] ?>"><?= ">>"?></a>
	</li>
</ul>