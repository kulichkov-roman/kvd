<?php
/**
 * Общая конфигурация для всех сайтов и окружений
 */
\Quetzal\Environment\EnvironmentManager::getInstance()->addConfig(
	new \Quetzal\Environment\Configuration\CommonConfiguration(
		array(
			'sliderMainIBlockId' => 1,
			'productsBlockId'    => 2,
			'projectsBlockId'    => 3,
			'feedbackBlockId'    => 4,
			'sliderMainPlugId'   => 3,
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
itc\Resizer::addPreset('projectsPreview', array(
		'mode' => 'crop',
		'width' => '344',
		'height' => '344',
		'type' => 'jpg'
	)
);
itc\Resizer::addPreset('projectsDetail', array(
		'mode' => 'width',
		'width' => '1024',
		'height' => null,
		'type' => 'jpg'
	)
);
