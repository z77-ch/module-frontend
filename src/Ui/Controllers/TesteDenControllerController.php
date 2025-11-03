<?php

namespace Z77\App\Frontend\Controller;

use Z77\Core\Controller\AbstractSecurityController,
    Z77\Core\DI
;

class TesteDenControllerController extends AbstractSecurityController
{
    protected function testInArbeitAction()
    {
        $this->addContext('title', 'hello hier ist der testInArbeit.....');
    }
}
