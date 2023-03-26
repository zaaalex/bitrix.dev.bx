<?php

try
{
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	/**
	 * @var CMain $APPLICATION
	 */
	$APPLICATION->SetTitle("Task details");

	$APPLICATION->IncludeComponent('up:task.details', '', [
		'ID' => (int)$_REQUEST['id'],
		'DATE_FORMAT' => 'd.M H:i',
	]);

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
}
catch (Exception $e)
{
	header("Location: /pageNotFound/");
}