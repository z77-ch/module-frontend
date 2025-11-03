<?php

namespace Z77\Setup\Controller;

use Z77\Core\Controller\AbstractSecurityController,
    Z77\Setup\Core\Config\DoctrineDefaultConfigWriter,
    Z77\Setup\Core\Config\ApplicationConfigWriter
;

class SetupController extends AbstractSecurityController
{

    private $securityState = 'setup';
    protected $urlOrigin = '';
    protected const DOCTRINE_DEFAULT_CONFIG_FILEPATH = ABS_BASE_PATH.'/config/doctrineDefaultConfig.php';
    protected const WEBDREAMS_APPLICATION_CONFIG_FILEPATH = ABS_BASE_PATH.'/config/webdreamsApplicationConfig.php';

    protected function preAction() {
        $this->urlOrigin = url_origin($_SERVER);

        if ($this->configFilesExist()) {
            $this->securityState = 'update';
        }
    }

    protected function selectionAction()
    {
        if ($this->request->isPost()) {
            $action = $this->request->getPostParameter('action');
            $this->execute($action);
        } else {
            $configExists = $this->configFilesExist();
            include 'templates/selection.tpl.php';
        }
    }

    /*protected function schemaUpdateAction() {
        $manager = new SetupManager();
        $messages = $manager->updateDoctrineSchema();
        include 'templates/result.tpl.php';
    }*/

    /*protected function setupFormAction() {
        if ($this->request->isPost()) {
            $manager = new SetupManager();
            $messages = $manager->createConfigFiles();
            $messages = array_merge($messages, $manager->createCacheDirectory());
            $messages[] = ['type' => 'info', 'message' => "Bitte laden Sie die Seite neu, um das Datenbank-Setup zu starten."];
            include 'templates/result.tpl.php';
        } else {
            include 'templates/form.tpl.php';
        }
    }*/

    protected function createConfigAction()
    {

        if ($this->request->isPost()) {

            $configWriter = new DoctrineDefaultConfigWriter($_POST);
            $configWriter->writeDoctrineDefaultConfig(self::DOCTRINE_DEFAULT_CONFIG_FILEPATH);

            $this->createApplicationConfig($isGet = true);
        } else {
            $configWriter = new DoctrineDefaultConfigWriter();
        }
        $data = $configWriter->getConfigDataAsObject();

        include 'templates/editConfig.tpl.php';
    }

    protected function createApplicationConfig($isGet = false)
    {
        $configWriter = new ApplicationConfigWriter();
        include 'templates/editApplicationConfig.tpl.php';
    }


    protected function render404()
    {
        http_response_code(404);
        echo 'Error 404';
        exit;
    }
}
