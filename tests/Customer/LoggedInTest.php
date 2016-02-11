<?php

namespace MyTests\Customer;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Customer\NavigateAndLogin;

class LoggedInTest extends AbstractMagentoTestCase
{

    /**
     * The purpose of this test is to ensure that a default user (used for checkouts, order navigation and such) is
     * able to log in to the site.  If this page does not work you will need to set the customer login information by
     * overriding the properties $this->emailAddress  and $this->password in the file
     * {projectRoot}/configuration/Magium/Magento/Identities/Customer.php
     */

    public function testNavigateAndLogin()
    {
        $this->getLogger()->notice('Testing default customer authentication');
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->getAction(NavigateAndLogin::ACTION)->login();
    }
}