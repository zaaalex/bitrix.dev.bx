<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

/**
 * @var CMain $APPLICATION
 */
$APPLICATION->SetTitle("Unsuccessful");

$APPLICATION->IncludeComponent('up:task.create.unsuccessful', '', []);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");