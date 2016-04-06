<?php
/**
 * Миграция добавляет свойства к инфоблоку «Обратная связь»
 */
ignore_user_abort(true);
set_time_limit(0);

define('BX_BUFFER_USED', true);
define('NO_KEEP_STATISTIC', true);
define('NOT_CHECK_PERMISSIONS', true);
define('NO_AGENT_STATISTIC', true);
define('STOP_STATISTICS', true);

if (!defined('SITE_ID')) {
    define('SITE_ID', 's1');
}

if (empty($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['HTTP_HOST'] = 'kvd.cv24440.tmweb.ru';
    $_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/../../');
}

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
ini_set('display_errors', 1);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

if (!CModule::IncludeModule('iblock')) {
    echo 'Unable to include iblock module';
    exit;
}

use Quetzal\Tools\Data\Migration\Bitrix\AbstractIBlockPropertyMigration;

/**
 * Class AddPropertiesToSMSPromoRequestsIBlockMigration
 */
class AddPropertiesToSMSPromoRequestsIBlockMigration extends AbstractIBlockPropertyMigration
{
    /**
     * @var array
     */
    protected $properties;

    public function __construct()
    {
        $iBlockId = \Quetzal\Environment\EnvironmentManager::getInstance()->get('feedbackBlockId');

        parent::__construct($iBlockId);

        $this->properties = array(
            'TIME' => 'Удобное время звонка'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $logger = new \Quetzal\Tools\Logger\EchoLogger();

        try {
            $this->createStringProperty(
                'Телефон',
                'PHONE'
            );

            $this->createStringProperty(
                'E-MAIL',
                'EMAIL'
            );

            foreach ($this->properties as $code => $name) {
                $arAdditionalFields = array(
                    'ACTIVE' => 'Y',
                    'SEARCHABLE' => 'N',
                    'FILTRABLE' => 'N',
                    'MULTIPLE' => 'N',
                );

                $arValues = array(
                    Array(
                        "VALUE" => "9.00 – 10.00",
                        "SORT" => "100",
                    ),
                    Array(
                        "VALUE" => "9.00 – 10.00",
                        "SORT" => "200",
                    ),
                    Array(
                        "VALUE" => "9.00 – 10.00",
                        "SORT" => "300",
                    )
                );

                $this->createSelectProperty(
                    $name,
                    $code,
                    $arAdditionalFields,
                    $arValues
                );

                echo sprintf('Property "%s" has been added', $code) . PHP_EOL;
            }

            $logger->log('Properties have been created successfully');
        } catch (\Quetzal\Exception\Data\Migration\MigrationException $exception) {
            $logger->log(sprintf('ERROR: %s', $exception->getMessage()));
        }
    }

    /**
     * @throws \Quetzal\Exception\Common\NotImplementedException
     */
    public function down()
    {
        throw new \Quetzal\Exception\Common\NotImplementedException('Method down was not implemented');
    }
}

$iBlockMigrations = new AddPropertiesToSMSPromoRequestsIBlockMigration(
    $environment->get('feedbackBlockId')
);

$iBlockMigrations->up();
