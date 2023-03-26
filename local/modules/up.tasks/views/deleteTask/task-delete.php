<?php

try
{
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

	/**
	 * @var CMain $APPLICATION
	 */
	$APPLICATION->SetTitle("Delete task");

	$APPLICATION->IncludeComponent('up:task.details', 'without.cross', [
		'ID' => (int)$_REQUEST['id'],
		'DATE_FORMAT' => 'd.M H:i',
	]);

	$APPLICATION->IncludeComponent('up:task.delete', '', [
		'ID' => (int)$_REQUEST['id'],
	]);

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
}
catch (Exception $e)
{
	header("Location: /pageNotFound/");
}