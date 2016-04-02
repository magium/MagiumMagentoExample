<?php

namespace MyTests\Cart;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Actions\Cart\AddItemToCart;
use Magium\Magento\Actions\Cart\AddSimpleProductToCart;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProduct;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;

class BasicAddToCart extends AbstractMagentoTestCase
{

    /**
     * This method exists so that any settings that need to be can be overridden by custom logic without making
     * changes to the test as a whole.  Each test method will call this method prior to requiring the category
     * and product information.
     */

    protected function overrideDefaultConfiguration()
    {

    }

    /**
     * This test uses a class that uses a combination of navigators and actions to accomplish the add-to-cart action.
     * If this test fails check to ensure that the default product and category navigators are working.  Note that
     * Ajax-based add-to-cart operations may require additional customization of the Cart actions.
     *
     * That said, the add-to-cart event is triggered by a mouse click, but does not require that the page be reloaded.
     * It will wait until the success message is displayed.  So if your customization uses a different add-to-cart
     * method consider modifying the property $this->addToCartSuccessXpath in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php.
     */

    public function testDefaultAddToCartFullBatch()
    {
        $this->getLogger()->notice('Testing add-to-cart functionality with defaults');
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->overrideDefaultConfiguration();
        $this->getAction(AddItemToCart::ACTION)->addSimpleItemToCartFromProductPage();
    }
    /**
     * This test uses a combination of navigators and actions to accomplish the add-to-cart action.  It is essentially
     * the same as the testDefaultAddToCartFullBatch() method except that it manually executes each step.
     */

    public function testDefaultAddToCartFullInStages()
    {
        $this->getLogger()->notice('Testing add-to-cart functionality with individual actions ');
        $this->commandOpen($this->getTheme()->getBaseUrl());
        $this->overrideDefaultConfiguration();
        $this->getNavigator(DefaultSimpleProductCategory::NAVIGATOR)->navigateTo();
        $this->getNavigator(DefaultSimpleProduct::NAVIGATOR)->navigateTo();
        $this->getAction(AddSimpleProductToCart::ACTION)->execute();
    }

}