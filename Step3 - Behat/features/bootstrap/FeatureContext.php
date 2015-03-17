<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $provider_place_id;
    private $provider_name;
    private $sonar_place_id;
    private $service_result;
    
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^I am a provider called "([^"]*)"$/
     */
    public function iAmAProviderCalled($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I have a identifier "([^"]*)"$/
     */
    public function iHaveAIdentifier($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When /^I call add New Place$/
     */
    public function iCallAddNewPlace()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I see "([^"]*)"$/
     */
    public function iSee($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^I have an place for the indentifier$/
     */
    public function iHaveAnPlaceForTheIndentifier()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I not have an place for the indentifier$/
     */
    public function iNotHaveAnPlaceForTheIndentifier()
    {
        throw new PendingException();
    }

    /**
     * @When /^I call delete Place$/
     */
    public function iCallDeletePlace()
    {
        throw new PendingException();
    }

    /**
     * @When /^I call get Place$/
     */
    public function iCallGetPlace()
    {
        throw new PendingException();
    }

    /**
     * @Given /^I have a place indentifier in sonar for this other$/
     */
    public function iHaveAPlaceIndentifierInSonarForThisOther()
    {
        throw new PendingException();
    }

    /**
     * @When /^I call get Place By Sonar PlaceId$/
     */
    public function iCallGetPlaceBySonarPlaceid()
    {
        throw new PendingException();
    }
}










