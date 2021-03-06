<?php

use Bitrix\Main\Loader;

IncludeModuleLangFile(__FILE__);
global $APPLICATION;

if (!Loader::includeModule('digitalwand.admin_helper') || !Loader::includeModule('ylab.fruits')) return;

return array(
    'parent_menu'   => 'global_menu_content',
    'sort'          => 300,
    'text'          => GetMessage('YLAB_FRUITS_MENU_TEXT'),
    'title'         => GetMessage('YLAB_FRUITS_MENU_TITLE'),
    'url'           => \ylab\fruits\fruits\admininterface\FruitsListHelper::getUrl(),
    'icon'          => 'learning_menu_icon',
    'items_id'      => 'menu_ylab_fruits',
    'items'         => array()
);