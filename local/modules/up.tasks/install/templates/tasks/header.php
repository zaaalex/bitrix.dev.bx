<?php
/**
 * @var CMain $APPLICATION
 */
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

?>

<!doctype html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php $APPLICATION->ShowTitle(); ?></title>

	<?php
	$APPLICATION->ShowHead();
	?>
</head>
<body>
<?php $APPLICATION->ShowPanel(); ?>

<section class="section">
	<div class="container">
		<div class="columns is-vcentered">
			<div class="column">
				<p class="bd-notification is-primary">
					<a class="title is-1" href="/">
						<span>📝</span> TASKS
					</a>
				</p>
			</div>
			<div class="column is-8">
				<p class="title is-3 is-spaced"><?=Loc::getMessage("UP_TASKS_HEADER_DESCRIPTION")?></p>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="container">