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

    protected static $fixturesLoader = null;

    protected static function getFixturesLoader()
    {
        if (is_null(self::$fixturesLoader)) {
            self::$fixturesLoader = new LoadFixtures();
        }

        return self::$fixturesLoader;
    }

    /**
     *@BeforeSuite
     */
    public static function prepare($event){
        $fixturesLoader = self::getFixturesLoader();
        $fixturesLoader->purgeDB();
        $fixturesLoader->load();
    }

    /**
     * @Given /^I load fixtures for plugin "([^"]*)"$/
     */
    public function iLoadFixturesForPlugin($plugin)
    {
        $fixturesLoader = $this->getFixturesLoader();
        $fixturesLoader->loadPlugin($plugin);
    }

}
