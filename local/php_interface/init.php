<?php

use Bitrix\Main\Loader;

if (CModule::IncludeModule("up.tasks"))
{
	Loader::includeModule('up.tasks');
}