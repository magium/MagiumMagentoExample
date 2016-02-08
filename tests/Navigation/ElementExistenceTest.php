<?php

namespace MyTests\Navigation;

use Magium\Magento\AbstractMagentoTestCase;
use Magium\WebDriver\WebDriver;

class ElementExistenceTest extends AbstractMagentoTestCase
{

    /**
     * The purpose of this test is to ensure that the site visitor has the means to return to the home page.  You will
     * need to set the $this->homeXpath property in
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testHomeLinkElementExists()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());
        $title = $this->webdriver->getTitle();
        $this->assertElementDisplayed($theme->getHomeXpath(), WebDriver::BY_XPATH);
        $this->byXpath($theme->getHomeXpath())->click();
        self::assertEquals($title, $this->webdriver->getTitle());
    }


    /**
     * This test assures that the base navigation element is visible.  This test does not test the navigation, it only
     * ensures that the base navigation element is visible.  While this normally would not require significant
     * modification, there are times, such as if you use a third party navigation module or if your responsive
     * design uses CSS display values to determine which of several navigation menus to use.
     *
     * Changing this behavior to match your site involves changing both the $this->navigationBaseXPathSelector and
     * $this->navigationChildXPathSelector properties in
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testNavigationBaseExists()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());
        $this->assertElementDisplayed($theme->getNavigationBaseXPathSelector(), WebDriver::BY_XPATH);
    }

    /**
     * The purpose of this test is to ensure that the site visitor has a visible means of getting to the checkout page.
     *  No actions are taken, it only tests to see if the element is visible.  You will
     * need to set the $this->cartNavigationInstructions property in
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testBaseCheckoutNavigationInstructionExists()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $instructions = $theme->getCartNavigationInstructions();
        $initialInstruction = array_shift($instructions);

        $this->assertElementDisplayed($initialInstruction[1], WebDriver::BY_XPATH);
    }
    /**
     * The purpose of this test is to ensure that the site visitor has a visible means of getting to the customer page.
     *  No actions are taken, it only tests to see if the element is visible.  You will need to set the
     * $this->navigateToCustomerPageInstructions property in
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testInitialCustomerNavigationInstructionExists()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());

        $instructions = $theme->getNavigateToCustomerPageInstructions();
        $initialInstruction = array_shift($instructions);

        $this->assertElementDisplayed($initialInstruction[1], WebDriver::BY_XPATH);
    }

    /**
     * Some of the more complex tests (particularly JavaScript-based navigation) make use of the WaitForPageLoaded
     * action.  That action makes use of an Xpath query for an element guaranteed to be displayed once the page is
     * completed loaded.  You will need to set the $this->guaranteedPageLoadedElementDisplayedXpath property in
     * {projectRoot}/configuration/Magium/Magento/Themes/{MagentoVersion}/ThemeConfiguration.php
     */

    public function testPageLoadedSuccessfullyElementExists()
    {
        $theme = $this->getTheme();
        $this->commandOpen($theme->getBaseUrl());
        $this->assertElementDisplayed($theme->getGuaranteedPageLoadedElementDisplayedXpath(), WebDriver::BY_XPATH);
    }

}