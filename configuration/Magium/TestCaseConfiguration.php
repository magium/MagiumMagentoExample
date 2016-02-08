<?php
/* @var $this \Magium\TestCaseConfiguration */

$this->capabilities = \Magium\TestCaseConfiguration::CAPABILITIES_CHROME;
//$this->capabilities = \Magium\TestCaseConfiguration::CAPABILITIES_FIREFOX;
//$this->capabilities = \Magium\TestCaseConfiguration::CAPABILITIES_PHANTOMJS;

$this->webDriverRemote = 'http://localhost:4444/wd/hub';