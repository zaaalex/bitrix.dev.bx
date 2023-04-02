<?php

namespace Up\Tasks\Model;

use Bitrix\Main\Type\DateTime;

class Task
{
	public string $title;
	public string $message;
	public ?int $id;
	public ?DateTime $createdDate;

	public function __construct(string $title, string $message, ?int $id=null, ?DateTime $createdDate=null)
	{
		$this->title = $title;
		$this->message = $message;
		$this->id = $id;
		$this->createdDate = $createdDate;
	}
}