<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Delete task");

$APPLICATION->IncludeComponent('up:show.info', 'delete.success', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");