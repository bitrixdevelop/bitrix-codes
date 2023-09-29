<?php
/***
 * Построение дерева с вложенностью из массива меню
 * @param array $arItems
 * @return array
 */
function build_tree(array $arItems): array
{
    $arTree = [];
    $parentId = null;
    $depthLevelOne = 1;

    foreach ($arItems as $arItem) {
        $arItem['CHILDREN'] = [];
        $depthLevel = $arItem['DEPTH_LEVEL'];

        if ($depthLevel === $depthLevelOne) {
            $parentId = $arItem['LINK'];
            $arTree[$parentId] = $arItem;
        } else {
            $arTree[$parentId]['CHILDREN'][] = $arItem;
        }
    }

    return $arTree;
}
