<?php
/**
 * @var CMain $APPLICATION
 */

try
{
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Tasks");

	$APPLICATION->IncludeComponent('up:show.info', 'create.first.task', [
		'DATE_FORMAT' => 'd.M H:i',
		'CURRENT_PAGE' => (is_set($_REQUEST['page']) ? $_REQUEST['page'] : 1),
	]);

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
}
catch (Exception $e)
{
	header("Location: /pageNotFound/");
}