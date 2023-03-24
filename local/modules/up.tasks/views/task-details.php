<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Task details");

$APPLICATION->IncludeComponent('up:task.details', '', [
	'ID' => (int)$_REQUEST['id'],
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");