<?php

namespace Up\Model;

use Bitrix\Main\ObjectPropertyException,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\DatetimeField,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator,
 	Bitrix\Main\ORM\Event,
	Bitrix\Main\ORM\EventResult,
	Bitrix\Main\SystemException,
	Bitrix\Main\Type\DateTime;

/**
 *
 * Fields:
 * <li> ID int mandatory
 * <li> TITLE string(100) mandatory
 * <li> MESSAGE string(1000) mandatory
 * <li> CREATE_DATE datetime mandatory
 *
 **/

class TasksTable extends DataManager
{

	public static function getTableName(): string
	{
		return 'up_tasks_tasks';
	}

	/**
	 * @throws SystemException
	 */
	public static function getMap(): array
	{
		return [
			new IntegerField(
				'ID', [
						'primary' => true,
						'autocomplete' => true,
					]
			),
			new StringField(
				'TITLE', [
								 'required' => true,
								 'validation' => function(){
									return array(
										new LengthValidator(1,100),
									);
								 }
							 ]
			),
			new StringField(
				'MESSAGE', [
								 'required' => true,
								 'validation' => function(){
									 return array(
										 new LengthValidator(1,1000),
									 );
								 }
							 ]
			),
			new DatetimeField(
				'CREATE_DATE', [
								 'required' => true,
								 'default_value' => function()
								 {
									 return new DateTime();
								 },
							 ]
			),
		];
	}

	/**
	 * @throws ObjectPropertyException
	 */
	public static function onBeforeAdd(Event $event): EventResult
	{
		global $DB;
		$result = new EventResult();
		$data = $event->getParameter("fields");
		if (isset($data["TITLE"], $data["MESSAGE"]))
		{
			$validateMessage = $DB->ForSql($data['MESSAGE']);
			$validateTitle = $DB->ForSql($data['TITLE']);
			$result->modifyFields(
				[
					'TITLE'=>$validateTitle,
					'MESSAGE'=>$validateMessage,
				]
			);

			return $result;
		}

		throw new ObjectPropertyException("Failed to validate settings");
	}
}