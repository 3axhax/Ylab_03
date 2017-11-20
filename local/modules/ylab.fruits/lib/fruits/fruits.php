<?php

namespace ylab\fruits\fruits;

use Bitrix\Main\Entity;
use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Localization\Loc;


class FruitsTable extends DataManager
{
    public static function getTableName()
    {
        return 'ylab_fruit';
    }

    public static function getMap()
    {
        return [
            new Entity\IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('YLAB_FRUITS_ID')
            ]),
            new Entity\StringField ('TITLE', [
                'site' => 255,
                'title' => Loc::getMessage('YLAB_FRUITS_TITLE'),
            ]),
        ];
    }
}