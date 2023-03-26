<?php

try
{
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

	/**
	 * @var CMain $APPLICATION
	 */
	$APPLICATION->SetTitle("Delete task");

	$APPLICATION->IncludeComponent('up:task.delete', 'delete.unsuccessful', [
		'ID' => (int)$_REQUEST['id'],
	]);

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
}
catch (Exception $e)
{
	header("Location: /pageNotFound/");
}