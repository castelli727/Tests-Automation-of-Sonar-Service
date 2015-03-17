<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

include("SonarService.php");
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
    public function iAmAProviderCalled($provider_name)
    {
        $this->provider_name = $provider_name;
    }

    /**
     * @Given /^I have a identifier "([^"]*)"$/
     */
    public function iHaveAIdentifier($provider_place_id)
    {
        $this->provider_place_id = $provider_place_id;
    }

    /**
     * @Given /^I have an place for the indentifier$/
     */
    public function iHaveAnPlaceForTheIndentifier()
    {
        $sonarService = new SonarService();
        $sonarService -> addNewPlace($this->provider_name,$this->provider_place_id);
    } 
    
    /**
     * @Given /^I not have an place for the indentifier$/
     */
    public function iNotHaveAnPlaceForTheIndentifier()
    {
        $sonarService = new SonarService();
        $sonarService->deletePlace($this->provider_name,$this->provider_place_id);
    }

    /**
     * @Given /^I have a place indentifier in sonar for this other$/
     */
    public function iHaveAPlaceIndentifierInSonarForThisOther()
    {
        $sonarService = new SonarService();
        $this->service_result = $sonarService->addNewPlace($this->provider_name,$this->provider_place_id);
        //Obtaining the position of the first carcater of "sonar_place_id" in the result
        $id_start_index = strpos($this->service_result,'"id"') + 5;
        //Obtaining the position of the last carcater of "sonar_place_id" in the result
        $id_end_index = strpos($this->service_result,'"name"') - 1;
        //Obtaining of sonar_place_id
        $this->sonar_place_id = substr($this->service_result, $id_start_index,$id_end_index);
    } 

    /**
     * @When /^I call add New Place$/
     */
    public function iCallAddNewPlace()
    {
        $sonarService = new SonarService();
        $this->service_result = $sonarService->addNewPlace($this->provider_name,$this->provider_place_id);
        if(strpos($this->service_result, '"data"')) { 
            $this->service_result = "Place obtained";
        } else {
            $this->service_result = "Place not obtained";
        }
    }

    /**
     * @When /^I call get Place$/
     */
    public function iCallGetPlace()
    {
        $sonarService = new SonarService();
        $this->service_result = $sonarService->getPlace($this->provider_name,$this->provider_place_id);
        if(strpos($this->service_result, '"data"')) { 
            $this->service_result = "Place obtained";
        } else {
            $this->service_result = "Place not obtained";
        }
    }

    /**
     * @When /^I call delete Place$/
     */
    public function iCallDeletePlace()
    {
        $sonarService = new SonarService();
        $this->service_result = $sonarService->deletePlace($this->provider_name,$this->provider_place_id);
        if(!strpos($this->service_result, '"error"')) {
            $this->service_result = "Place deleted";
        } else {
            $this->service_result = "Place not deleted";
        }
    }

    /**
     * @When /^I call get Place By Sonar PlaceId$/
     */
    public function iCallGetPlaceBySonarPlaceid()
    {
        $sonarService = new SonarService();
        $this->service_result = $sonarService->getPlaceBySonarPlaceId($this->provider_place_id);
        if(strpos($this->service_result, '"data"')) {
            $this->service_result = "Place obtained";
        } else {
            $this->service_result = "Place not obtained";
        }
    }

    /**
     * @Then /^I see "([^"]*)"$/
     */
    public function iSee($message)
    {
        if($message !== $this->service_result){
            throw new Exception($this->service_result);
        } else {
            print($this->service_result);
        }
    }
}










