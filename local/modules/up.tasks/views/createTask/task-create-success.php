<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Create task");

$APPLICATION->IncludeComponent('up:task.create', 'create.success', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");