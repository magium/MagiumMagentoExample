# Quickstart Magium Magento Test Scenarios

This is the same (or similar) code that is used with the [Magium Quick Start](http://www.magiumlib.com/quickstart).  It's purpose is to give you a head start when creating Magium tests.

[Find much more information at magiumlib.com](http://www.magiumlib.com/?utm_source=github&utm_medium=website&utm_campaign=social)

One of the big problems that many useful, but ultimately failed, projects is that they require you to really get to know the software before you can start being useful.  But I believe that the best way of using software is to start with small wins.  When trying out new software, the longer it takes to have even minimal success, the less likely that software will be used in the long run.  This quick start gives you a starting point where just over a dozen Selenium tests are written to work with your Magento installation.

The net effect of this is that you should, within a few minutes of downloading this, be able to

1. Be able to navigate around the site
2. Do basic add-to-cart functions
3. Log in as a customer
4. Log in as admin

This should be enough for some basic smoke tests, and enough to get you started when creating tests of your own.

Each tests is documented with some of the options that you may need to change in order to make it work with your implementation.  In addition, most value changes, and all files, are already included in the /configuration directory.

You will need to run `composer update` prior to running any of the tests.

## Typical Problems

### Navigation

The biggest problem you are likely to face is that of category navigation.  If you use the default Magento navigation this should work without any problems.  But if you are using some kind of customization for your navigation you might have some difficulty.

But that difficulty is not insurmountable.  There are two parts of the standard category navigator.

1. Base Xpath - This is used to establish the root element of the category menu display
2. Child Xpath - This is an Xpath that is recursively appended onto the baseXpath and parent childXpaths to build the correct Xpath for a particular category.

Getting the Base Xpath right is easy.  Getting the Child Xpath right is a little more difficult.  It needs to find both a clickable element and an element that it can use to navigate to the next level of category.  Look at the ThemeConfiguration classes for more information.

If the base menu doesn't work you can try the `Magium\Extractors\Navigation\Menu` extractor.  It will try and figure out what the best Xpath is for the category navigation.

Failing that you can try using the `Magium\Navigators\LinkSequence` navigator.  You provide the category you want to navigate to and it will follow the `a` tags to get there.  It's not as precise as the `BaseMenu` navigator (and therefore more prone to error) but it often works easier out of the box.

### Add To Cart

The other issue that you may run into is adding a product to the cart.  Usually a lot of the Xpath is the same but the success message is different.  To manage that you will need to change the Xpath for the success method.  The Xpath does not need to have a
