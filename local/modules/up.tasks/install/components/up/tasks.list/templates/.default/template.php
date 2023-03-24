<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

use Bitrix\Main\Localization\Loc;
use Up\Services\FormattingServices;

Loc::loadMessages(__FILE__);

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
?>

<div class="columns mb-6">
	<div class="column">
		<a class="button is-success is-pulled-right" href="/tasks/create">
			<?= Loc::getMessage("UP_TASKS_CREATE_TASK") ?>
		</a>
	</div>
</div>

<div class="columns">
	<?php foreach ($arResult['TASKS'] as $task): ?>

		<div class="column">
			<div class="card project-card">
				<header class="card-header">
					<a class="card-header-title" href="/tasks/<?= $task['id'] ?>">
						<?= $task['name'] ?>
					</a>
					<button class="card-header-icon" aria-label="more options">
						<a href="/tasks/<?= $task['id'] ?>">
						<span class="icon disabled">
							&#10060;
						</span>
						</a>
					</button>
				</header>
				<div class="card-content" style="height: 200px;">
					<div class="content">
						<?= FormattingServices::decreaseDescription($task['description']) ?>
					</div>
				</div>
				<footer class="card-footer">
				<span class="card-footer-item is-4 is-offset-8">
				<strong>
				<?= Loc::getMessage("UP_TASKS_WAS_CREATED") ?>
				</strong>:
					<?= $task['last_activity']->format($arResult['DATE_FORMAT']) ?>
				</span>
				</footer>
			</div>
		</div>

	<?php endforeach; ?>
</div>

<nav class="pagination is-centered" role="navigation" aria-label="pagination">
	<a class="pagination-previous">Previous</a>
	<a class="pagination-next">Next page</a>
	<ul class="pagination-list">
		<li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
		<li><span class="pagination-ellipsis">&hellip;</span></li>
		<li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
		<li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
		<li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
		<li><span class="pagination-ellipsis">&hellip;</span></li>
		<li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
	</ul>
</nav>