<?php

namespace ylab\fruits\fruits\admininterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\NumberWidget;
use DigitalWand\AdminHelper\Widget\StringWidget;

Loc::loadMessages(__FILE__);

class FruitsAdminInterface extends AdminInterface
{
    public function fields()
    {
        return array(
            'MAIN' => array(
                'NAME' => Loc::getMessage('YLAB_FRUITS_EDIT'),
                'FIELDS' => array(
                    /*'ID' => array(
                        'WIDGET' => new NumberWidget(),
                        'READONLY' => true,
                        'FILTER' => true,
                        'HIDE_WHEN_CREATE' => true
                    ),*/
                    'TITLE' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => '60',
                        'FILTER' => '%',
                        'REQUIRED' => true
                    )
                )
            )
        );
    }
    public function helpers()
    {
        return array(
            FruitsListHelper::class,
            FruitsEditHelper::class
        );
    }
}