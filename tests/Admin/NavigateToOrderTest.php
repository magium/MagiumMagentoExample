<?php

namespace MyTests\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento\Navigators\Admin\AdminMenu;

class NavigateToOrderTest extends AbstractMagentoTestCase
{

    /*
     * The purpose of this test is to ensure that the OnePageCheckout is enabled.  You may need to either change
     * this test or change the setting to match your environment if this test fails.
     */

    public function testOrderPageAccessible()
    {
        $this->getLogger()->notice('Testing navigation to admin orders page');
        $this->getAction(Login::ACTION)->login();
        $this->getNavigator(AdminMenu::NAVIGATOR)->navigateTo('Sales/Orders');
    }



}
