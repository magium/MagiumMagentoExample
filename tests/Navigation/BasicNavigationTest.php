<?php

namespace MyTests\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\Magento\Navigators\BaseMenu;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProduct;
use Magium\Magento\Navigators\Catalog\DefaultSimpleProductCategory;
use Magium\Magento\Navigators\Catalog\Product;

class BasicNavigationTest extends AbstractMagentoTestCase
{

    protected $categoryNavigation = 'Accessories/Jewelry';
    protected $productName = 'Blue Horizons Bracelets';

    /**
     * This method exists so that the category can be overridden by custom logic without making changes to the test as
     * a whole.  Each test method will call this method prior to requiring the category
     */

    protected function overrideDefaultCategory()
    {

    }
    /**
     * This method exists so that the product can be overridden by custom logic without making changes to the test as
     * a whole.  Each test method will call this method prior to requiring the product
     */

    protected function overrideDefaultProduct()
    {

    }

    /**
     * This test ensures that the category navigator is working when providing a specific value.  If this test fails
     * you will need to make changes to the $this->navigationBaseXPathSelector and $this->navigationChildXPathSelector
     * properties in the file {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testSpecificCategoryNavigationSucceeds()
    {
        $this->getLogger()->notice('Testing specific category navigator');
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $this->overrideDefaultCategory();
        $this->getNavigator(BaseMenu::NAVIGATOR)->navigateTo($this->categoryNavigation);
    }


    /**
     * This test ensures that the category navigator is working when providing a specific value.  If this test fails
     * you will need to make changes to the $this->categorySpecificProductPageXpath
     * property in the file {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testSpecificProductNavigationSucceeds()
    {
        $this->getLogger()->notice('Testing specific product navigator');
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $this->overrideDefaultCategory();
        $this->getNavigator(BaseMenu::NAVIGATOR)->navigateTo($this->categoryNavigation);
        $this->overrideDefaultProduct();
        $this->getNavigator(Product::NAVIGATOR)->navigateTo($this->productName);
    }


    /**
     * This test ensures that the default category navigator is working.  If this test fails
     * you will need to make changes to the $this->navigationPathToSimpleProductCategory property in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testDefaultCategoryNavigationSucceeds()
    {
        $this->getLogger()->notice('Testing simple product navigator');
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $this->overrideDefaultCategory();
        $this->getNavigator(DefaultSimpleProductCategory::NAVIGATOR)->navigateTo();
    }

    /**
     * This test ensures that the product navigator is working with the default category for simple products.  If this test fails
     * you will need to make changes to the $this->defaultSimpleProductName property in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php.
     *
     * Another problem could be that the Xpath for your product name is slightly different from the default theme.
     * There are two ways around that issue.  The first is to use $this->byText('My product title') from within the
     * test case.  This is not ideal because it's not really re-usable.  A better option would be to modify the property
     * $this->categorySpecificProductPageXpath to match the Xpath on your category page in the file
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php.
     */

    public function testDefaultProductNavigationSucceeds()
    {
        $this->getLogger()->notice('Testing default category and product navigation');
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $this->overrideDefaultCategory();
        // The default simple category is required because the default simple product navigator does not do category navigation
        $this->getNavigator(DefaultSimpleProductCategory::NAVIGATOR)->navigateTo();
        $this->overrideDefaultProduct();
        $this->getNavigator(DefaultSimpleProduct::NAVIGATOR)->navigateTo();
    }

}