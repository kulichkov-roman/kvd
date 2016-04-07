<?php

/**
 * Class SendingEmailHandler
 */
class SendingEmailHandler
{
    public static function SendFeedbackForm(&$arFields)
    {
        $environment = \Quetzal\Environment\EnvironmentManager::getInstance();

        if($arFields["IBLOCK_ID"]== $environment->get('feedbackBlockId'))
        {
            $arPropCode = array(
                'TIME',
            );

            $bpe = new CIBlockPropertyEnum;

            $arOrder = array(
                "property_id"=>"ASC",
                "VALUE"=>"ASC"
            );

            $arTypeEnum = array();
            foreach($arPropCode as $propCode)
            {
                $arFilter = array(
                    "IBLOCK_ID" => $environment->get('feedbackBlockId'),
                    "CODE" => $propCode
                );

                $rsPropertyEnums = $bpe->GetList(
                    $arOrder,
                    $arFilter
                );

                while($arItem = $rsPropertyEnums->GetNext())
                {
                    $arTypeEnum[$propCode][$arItem['ID']] = $arItem;
                }
            }

            if ($arFields['IBLOCK_ID'] == $environment->get('feedbackBlockId')) {
                $arEventFields = array(
                    'NAME' => $arFields['NAME'],
                    'PHONE' => $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropPhoneId')] <> '' ? $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropPhoneId')] : '-',
                    'EMAIL' => $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropEmailId')] <> '' ? $arFields['PROPERTY_VALUES'][$environment->get('feedbackPropEmailId')] : '-',
                    'TIME'  => $arTypeEnum['TIME'][$arFields['PROPERTY_VALUES'][$environment->get('feedbackPropTimeId')]]['VALUE'] <> '' ? $arTypeEnum['TIME'][$arFields['PROPERTY_VALUES'][$environment->get('feedbackPropTimeId')]]['VALUE'] : '-',
                );
                CEvent::Send('FEEDBACK_SENT', SITE_ID, $arEventFields);
            }
        }
    }
}
?>