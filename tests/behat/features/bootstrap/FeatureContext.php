<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;


$sDirRoot = dirname(realpath((dirname(__FILE__)) . "/../../../"));
set_include_path(get_include_path().PATH_SEPARATOR.$sDirRoot);

require_once("tests/LoadFixtures.php");
/**
 * Features context.
 */
class FeatureContext extends MinkContext
{

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters) {
        
        
    }
    
    /**
     *@BeforeSuite
     */
    public static function prepare($event){
        $fixturesLoader = new LoadFixtures();
        
        $fixturesLoader->purgeDB();
        
        $fixturesLoader->load();
        
    }
    
    
    
//    /**
//     * @Then /^I should see Status code homepage$/
//     */
//    public function iShouldSeeStatusCodeHomepage()
//    {
//        $driver = new \Behat\Mink\Driver\GoutteDriver();
//        // init session:
//        $session = new \Behat\Mink\Session($driver);
//        // start session:
//        $session->start();
//        
//        // open some page in browser:
//        $session->visit("http://livestreet_101.ru.work/");
//
//        // get the current page URL:
//        echo "Page   => " . $session->getCurrentUrl()."\n";
//
//        // get the response status code:
//        echo "Status => " . $session->getStatusCode()."\n";
//    }
    

}
