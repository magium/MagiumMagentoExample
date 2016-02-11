<?php

namespace MyTests\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;

class LoginTest extends AbstractMagentoTestCase
{

    /*
     * The purpose of this test is to ensure that the admin login works.  If this test does not work then you will
     * need to set your login information for the Admin identity.  This is done by editing the file
     * {projectRoot}/configuration/Magium/Magento/Identities/Admin.php and changing the $this->username and
     * $this->password properties.  You may also need to set the base URL in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/Admin/ThemeConfiguration.php
     */

    public function testLogin()
    {
        $this->getLogger()->notice('Testing administrative login', ['type' => 'summary']);
        $this->getAction(Login::ACTION)->login();
    }

}
