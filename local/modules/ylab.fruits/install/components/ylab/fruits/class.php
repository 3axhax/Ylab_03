<?php

use ylab\fruits\fruits\FruitsTable;
use Bitrix\Main\Context;

class FruitsComponent extends CBitrixComponent
{
    private function getFruits()
    {
        return FruitsTable::getList()->fetchAll();
    }
    private function getUniqueFruit($id)
    {
        return ($elem = FruitsTable::getById($id)->fetch()) ? $elem : array('error' => 'no such element');
    }
    public function executeComponent()
    {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        if ($id = Context::getCurrent()->getRequest()->get('id')) $this->arResult = $this->getUniqueFruit($id);
        else $this->arResult = $this->getFruits();
        $this->includeComponentTemplate();
    }
}