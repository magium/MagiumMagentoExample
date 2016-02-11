<?php

namespace MyTests\Customer;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\Customer\AccountHome;

class NavigationTest extends AbstractMagentoTestCase
{

    /**
     * The purpose of this test is to ensure that a site visitor can navigate to the login page.  It will not log in as
     * a customer.  If this page does not work you will need to set the navigation instructions by overriding the
     * property $this->navigateToCustomerPageInstructions in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testNavigateToLogin()
    {
        $this->getLogger()->notice('Testing account login navigation instructions');
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->getNavigator(AccountHome::NAVIGATOR)->navigateTo();
    }


}