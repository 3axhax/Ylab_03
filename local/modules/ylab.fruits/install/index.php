<?php

IncludeModuleLangFile(__FILE__);

class ylab_fruits extends CModule
{
    var $MODULE_ID = 'ylab.fruits';
    var $MODULE_GROUP_RIGHTS = 'Y';
    var $PARTNER_NAME = 'YLab';
    var $PARTNER_URI = 'http://ylab.io';

    public function __construct()
    {
        $arModuleVersion = array();

        $path = str_replace('\\','/', __FILE__);
        $path = substr($path, 0, strlen($path) - strlen('/index.php'));
        include ($path.'/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_NAME = getMessage('YLAB_FRUITS_MODULE_NAME');
        $this->MODULE_DESCRIPTION = getMessage('YLAB_FRUITS_MODULE_NAME_DESCRIPTION');
    }

    public function doInstall()
    {
        global $APPLICATION;

        $this->installFiles();
        $this->installDB();

        $APPLICATION->IncludeAdminFile(getMessage('YLAB_FRUITS_INSTALL_TITLE'), __DIR__ . '/step1.php');
    }

    public function installDB()
    {
        global $DB;
        $DB->RunSQLBatch(__DIR__.'/db/mysql/install.sql');
        RegisterModule($this->MODULE_ID);
        return true;
    }

    public function installEvents()
    {
        return true;
    }

    public function installFiles()
    {
        CopyDirFiles(
            __DIR__.'/admin',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin',
            true,
            true
        );
        CopyDirFiles(
            __DIR__.'/components',
            $_SERVER['DOCUMENT_ROOT'] . '/local/components',
            true,
            true
        );
        return true;
    }

    public function doUninstall()
    {
        global $APPLICATION;
        $this->uninstallDB();
        $this->uninstallFiles();
        $APPLICATION->IncludeAdminFile(getMessage('YLAB_FRUITS_UNINSTALL_TITLE'), __DIR__ . '/unstep1.php');
    }

    public function uninstallDB()
    {
        global $DB;
        $DB->runSQLBatch(__DIR__.'/db/mysql/uninstall.sql');
        UnRegisterModule($this->MODULE_ID);
        return true;
    }

    public function uninstallEvents()
    {
        return true;
    }

    public function uninstallFiles()
    {
        DeleteDirFiles(
            __DIR__.'/admin',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin'
        );
        DeleteDirFiles(
            __DIR__.'/components',
            $_SERVER['DOCUMENT_ROOT'] . '/local/components'
        );
        return true;
    }
}