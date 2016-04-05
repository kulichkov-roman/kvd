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
		)
	)
);
