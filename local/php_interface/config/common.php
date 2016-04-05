<?php
/**
 * Общая конфигурация для всех сайтов и окружений
 */
\Quetzal\Environment\EnvironmentManager::getInstance()->addConfig(
	new \Quetzal\Environment\Configuration\CommonConfiguration(
		array(
			// id ИБ "Слайдер"
			'sliderMainIBlockId' => 1,
			// id ИБ "Обратная связь"
			'feedbackIBlockId' => 7,
			// id ИБ "Контакты"
			'contactsSliderIBlockId' => 8,
			// заглушка для слайдера
			'sliderMainPlugId' => 3,
		)
	)
);

/**
 * Перерезатор
 */
\Bitrix\Main\Loader::includeModule("itconstruct.resizer");

/**
 * Патерны для перерезатора
 */
itc\Resizer::addPreset('sliderMain', array(
		'mode' => 'crop',
		'width' => '1920',
		'height' => '620',
		'type' => 'jpg'
	)
);
