<?php

namespace MyTests\Admin;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Admin\Login\Login;
use Magium\Magento\Navigators\Admin\AdminMenu;
use Magium\Magento\Navigators\Admin\SystemConfiguration;

class SystemConfigurationTest extends AbstractMagentoTestCase
{

    /*
     * The purpose of this test is to ensure that the OnePageCheckout is enabled.  You may need to either change
     * this test or change the setting to match your environment if this test fails.
     */

    public function testGetCheckoutType()
    {
        $this->getLogger()->notice('Testing System Configuration navigation');
        $this->getAction(Login::ACTION)->login();
        $this->getNavigator(AdminMenu::NAVIGATOR)->navigateTo('System/Configuration');
        $this->getNavigator(SystemConfiguration::NAVIGATOR)->navigateTo('Checkout/Checkout Options');
        self::assertEquals(1, $this->byId('checkout_options_onepage_checkout_enabled')->getAttribute('value'));
    }



}
