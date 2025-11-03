<?php
namespace Z77\Module\Frontend\Ui\Controllers;

use Z77\Core\Controller\AbstractSecurityController
;

class IndexController extends AbstractSecurityController
{
    protected function preAction() {}

    protected function indexAction()
    {
        debug('stop in Index');
    }
}
