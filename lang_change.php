<?php
use \Bitrix\Main\Application;
$context = Application::getInstance()->getContext();

$strPage = $APPLICATION->GetCurDir();
$strLang = $context->getLanguage();
$strUrl = str_replace('/'.$strLang,'',$strPage);

$arResult['URL'] = $strUrl;
