<?php
/**
 * Created by PhpStorm.
 * User: ЗахаровМА
 * Date: 20.11.2017
 * Time: 9:23
 */

namespace ylab\fruits\fruits\admininterface;


use DigitalWand\AdminHelper\Helper\AdminListHelper;
use ylab\fruits\fruits\FruitsTable;

class FruitsListHelper extends AdminListHelper
{
    protected static $model = FruitsTable::class;
}