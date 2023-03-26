<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Create task");

$APPLICATION->IncludeComponent('up:show.info', 'create.unsuccessful', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");