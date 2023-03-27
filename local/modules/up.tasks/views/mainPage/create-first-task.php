<?php
/**
 * @var CMain $APPLICATION
 */

try
{
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Tasks");

	$APPLICATION->IncludeComponent('up:tasks.list', 'create.first.task', [
		'IS_INFO' => true,
	]);

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
}
catch (Exception $e)
{
	header("Location: /pageNotFound/");
}