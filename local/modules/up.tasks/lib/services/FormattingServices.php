<?php

namespace Up\Tasks\Services;

class FormattingServices
{
	public static function decreaseDescription(string $description, int $len = 200): string
	{
		if (strlen($description) > $len)
		{
			$pos = strrpos(mb_strcut($description, 0, $len), " ", 0);
			$description = mb_strcut($description, 0, $pos) . "..";
		}
		return $description;
	}
}