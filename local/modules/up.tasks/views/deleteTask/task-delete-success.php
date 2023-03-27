<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Delete task");

$APPLICATION->IncludeComponent('up:task.delete', 'delete.success', [
	'IS_INFO' => true,
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");