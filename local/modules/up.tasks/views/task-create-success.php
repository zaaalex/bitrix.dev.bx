<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Success");

$APPLICATION->IncludeComponent('up:task.create.success', '', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");