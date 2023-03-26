<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Not found");

$APPLICATION->IncludeComponent('up:show.info', 'page.not.found', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");