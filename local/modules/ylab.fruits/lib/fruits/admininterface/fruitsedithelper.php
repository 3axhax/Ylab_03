<?php
/**
 * Created by PhpStorm.
 * User: ЗахаровМА
 * Date: 20.11.2017
 * Time: 9:25
 */

namespace ylab\fruits\fruits\admininterface;


use DigitalWand\AdminHelper\Helper\AdminEditHelper;
use ylab\fruits\fruits\FruitsTable;

class FruitsEditHelper extends AdminEditHelper
{
    protected static $model = FruitsTable::class;
}