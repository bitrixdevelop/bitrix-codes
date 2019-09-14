<?php
use \Bitrix\Main\Localization\Loc;

if (isset($arResult) && count($arResult['ITEMS']) > 0):
    Loc::loadLanguageFile(__FILE__);
    $arItemsListByYear = [];
    foreach($arResult['ITEMS'] as $arItem):
        $dateTimestamp = MakeTimeStamp($arItem['ACTIVE_FROM']);
        $arItem['MONTH'] = Loc::getMessage("MON_".FormatDate("m", $dateTimestamp));
        $arItemsListByYear[FormatDate("Y", $dateTimestamp)][] = $arItem;
    endforeach;
    $arResult['ItemsByYear'] = $arItemsListByYear;
endif;

