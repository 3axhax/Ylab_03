<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
\Bitrix\Main\Loader::includeModule('ylab.fruits');
global $APPLICATION;

$APPLICATION->IncludeComponent('ylab:fruits','');