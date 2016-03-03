<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /** @var \Behat\MinkExtension\Context\MinkContext */
    private $minkContext;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /** @BeforeScenario */
    public function gatherContexts(BeforeScenarioScope $scope)
    {
        $environment = $scope->getEnvironment();

        $this->minkContext = $environment->getContext('Behat\MinkExtension\Context\MinkContext');
    }


    /**
     * Checks, that page title contains the specified text
     * Example: Then the page title should contain "LaunchKey Home"
     * Example: And the page title should contain "LaunchKey Home"
     *
     * @Then /^the page title should contain "(?P<text>(?:[^"]|\\")*)"$/
     */
    public function assertTitleContainsText($text)
    {
        $this->minkContext->assertSession()->elementTextContains('xpath', '//head/title', $text);
    }

    /**
     * Opens homepage for the site and verifies
     * Example: Given I am on the site
     * Example: When I go to the site
     * Example: And I go to the site
     *
     * @Given /^(?:|I )am on (?:|the )site/
     * @When /^(?:|I )go to (?:|the )site/
     */
    public function goToSite()
    {
        $this->minkContext->iAmOnHomepage();
        $this->assertTitleContainsText("Food Delivery");
    }
}
