<?php

namespace MyTests\Customer;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Customer\NavigateAndLogin;
use Magium\Magento\Actions\Customer\Register;

class CreateCustomerTest extends AbstractMagentoTestCase
{

    /**
     * The purpose of this test is to ensure that a default user (used for checkouts, order navigation and such) is
     * able to log in to the site.  If this page does not work there are several different possible issues.  Make sure
     * that the other tests in the MyTests\Customer namespace are working.  If your site significantly changes the
     * customer login page then you might need to edit various properties for the class
     * Magium\Magento\Themes\Magento19\Customer\ThemeConfiguration in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/Magento19/Customer/ThemeConfiguration.php
     */

    public function testNavigateAndLogin()
    {
        $this->getLogger()->notice('Testing account registration');
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->getIdentity()->generateUniqueEmailAddress();
        $this->getAction(Register::ACTION)->register();
    }
}