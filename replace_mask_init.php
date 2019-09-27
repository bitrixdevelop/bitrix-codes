<?php

AddEventHandler("main", "OnBeforeChangeFile", "MyBeforeChangeFile");

function MyBeforeChangeFile($abs_path, &$content)
{
    if (strpos($content, "#GALLERY_") !== false) {
        if (strpos($content, "#GALLERY_#") !== false) {
            $GLOBALS['APPLICATION']->ThrowException("Не введен ID галереи! Удалите сниппет #GALLERY_# или введите ID после знака '_'");
            return false;
        } else {
            $content = preg_replace('|#GALLERY_(.*)#|isU', '<?$APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "content-gallery",
                Array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "BROWSER_TITLE" => "-",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "N",
                    "CHECK_DATES" => "Y",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "DETAIL_URL" => "",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_CODE" => "",
                    "ELEMENT_ID" => $1,
                    "FIELD_CODE" => array("", ""),
                    "IBLOCK_ID" => "17",
                    "IBLOCK_TYPE" => "flats",
                    "IBLOCK_URL" => "",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "MESSAGE_404" => "",
                    "META_DESCRIPTION" => "-",
                    "META_KEYWORDS" => "-",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Страница",
                    "PROPERTY_CODE" => array("images"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_CANONICAL_URL" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "STRICT_SECTION_CHECK" => "N",
                    "USE_PERMISSIONS" => "N",
                    "USE_SHARE" => "N"
                )
            );?>', $content);

        }
    }
    return true;
}
