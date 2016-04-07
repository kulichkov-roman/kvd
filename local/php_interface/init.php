<?php
require_once 'vendor/QuetzalTools/bootstrap.php';
require_once 'classes/AutoLoader.php';

\spl_autoload_register('\Momentum\AutoLoader::autoLoad');

$environment = \Quetzal\Environment\EnvironmentManager::getInstance();

foreach ($environment->getConfigFileNames() as $fileName) {
	$fileName = sprintf('%s/config/%s.php', __DIR__, $fileName);

	if (file_exists($fileName)) {
		include_once $fileName;
	}
}

AddEventHandler('main', 'OnEpilog', array('RequestHandler', 'Show404IfNeeded'));

AddEventHandler('iblock', 'OnAfterIBlockElementAdd', 'SendingEmailHandler', 100);

function SendingEmailHandler(&$arFields)
{
	$environment = \Quetzal\Environment\EnvironmentManager::getInstance();

	if ($arFields['IBLOCK_ID'] == $environment->get('feedbackBlockId')) {
		$arEventFields = array(
			'NAME' => $arFields['NAME'],
			'PHONE' => $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropPhoneId')],
			'EMAIL' => $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropEmailId')],
			'TIME'  => $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropTimeId')],
		);
		CEvent::Send('FEEDBACK_SENT', SITE_ID, $arEventFields);
	}
}