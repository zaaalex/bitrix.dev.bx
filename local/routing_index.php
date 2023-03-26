<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/routing_index.php');
if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/modules/up.tasks/views/page-not-found.php'))
{
	include_once($_SERVER['DOCUMENT_ROOT'] . '/local/modules/up.tasks/views/page-not-found.php');
}