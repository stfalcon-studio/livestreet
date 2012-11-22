<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Mink\Exception\ExpectationException,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

$sDirRoot = dirname(realpath((dirname(__FILE__)) . "/../../../"));
set_include_path(get_include_path().PATH_SEPARATOR.$sDirRoot);

require_once("tests/LoadFixtures.php");

/**
 * LiveStreet custom feature context
 */
class BaseFeatureContext extends BehatContext
{
    protected  $oEngine;
    protected $fixturesLoader = null;

    public function __construct()
    {
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        $this->oEngine = Engine::getInstance();
        $this->oEngine->Init();
    }

    public function getEngine()
    {
        return $this->oEngine;
    }

    /**
     * Get fixtures loader
     * @return LoadFixtures
     */
    protected function getFixturesLoader()
    {
        if (is_null($this->fixturesLoader)) {
            $this->fixturesLoader = new LoadFixtures( $this->oEngine );
        }

        return $this->fixturesLoader;
    }

    public function getMinkContext()
    {
        return $this->getMainContext();
    }

    /**
     * Purge DB and load fixtures before running each test
     *
     * @BeforeScenario
     */
    public function prepare($event){
        $fixturesLoader = $this->getFixturesLoader();
        $fixturesLoader->purgeDB();
        $fixturesLoader->load();
    }

    /**
     * Loading fixture for plugin
     *
     * @Given /^I load fixtures for plugin "([^"]*)"$/
     */
    public function loadFixturesForPlugin($plugin)
    {
        $fixturesLoader = $this->getFixturesLoader();
        $fixturesLoader->loadPluginFixtures($plugin);
    }


    /**
     * @Given /^I am activated plugin "([^"]*)"$/
     */
    public function ActivatedPlugin($sPlugin)
    {
        $this->getEngine()->ModulePlugin_Toggle($sPlugin,'activate');
    }

    /**
     * @Given /^I am deactivate plugin "([^"]*)"$/
     */
    public function DeactivatedPlugin($sPlugin)
    {
        $this->getEngine()->ModulePlugin_Toggle($sPlugin,'deactivate');
    }

    /**
     * @Then /^I wait "([^"]*)"$/
     */
    public function iWait($time_wait)
    {
        $this->getMinkContext()->getSession()->wait($time_wait);
    }


    /**
     * @Then /^I want to login administrator$/
     */
    public function iWantToLoginAdministrator()
    {
        // Заполняем форму
        $this->getMinkContext()->getSession()->getPage()->findById("login")->setValue("admin@admin.adm");
        $this->getMinkContext()->getSession()->getPage()->findById("password")->setValue("qwerty");

        // Сабмитим форму
        $this->pressButton("login-form-submit");
    }

    /**
     * Try to login user
     *
     * @Then /^I want to login as "([^"]*)"$/
     */
    public function iWantToLoginAs($sUserLogin)
    {
        $moduleUser = $this->getEngine()->GetModuleObject('ModuleUser');

        $oUser = $moduleUser->GetUserByLogin($sUserLogin);
        if (!$oUser) {
            throw new ExpectationException( sprintf('User %s not found', $sUserLogin), $this->getMinkContext()->getSession());
        }

        $moduleUser->User_Authorization($oUser, true);
        $sSessionKey = $moduleUser->GetSessionByUserId($oUser->getId())->getKey();

        $this->getMinkContext()->getSession()->getDriver()->setCookie("key", $sSessionKey);
    }



    /**
     * Check is sets are present in content
     *
     * @Then /^the response have sets:$/
     */
    public function ResponseHaveSets(TableNode $table)
    {
        $actual = $this->getMainContext()->getSession()->getPage()->getContent();

        foreach ($table->getHash() as $genreHash) {
            $regex  = '/'.preg_quote($genreHash['value'], '/').'/ui';
            if (!preg_match($regex, $actual)) {
                $message = sprintf('The string "%s" was not found anywhere in the HTML response of the current page.', $genreHash['value']);
                throw new ExpectationException($message, $this->getMainContext()->getSession());
            }
        }
    }

    /**
     * Get content type and compare with set
     *
     * @Then /^content type is "([^"]*)"$/
     */
    public function contentTypeIs($contentType)
    {
        $header = $this->getMinkContext()->getSession()->getResponseHeaders();

        if ($contentType != $header['Content-Type']) {
            $message = sprintf('Current content type is "%s", but "%s" expected.', $header['Content-Type'], $contentType);
            throw new ExpectationException($message, $this->getSession());
        }
    }

    /**
     * Checking for activity of plugin
     *
     * @Then /^check is plugin active "([^"]*)"$/
     */
    public function CheckIsPluginActive($sPluginName)
    {
        $activePlugins = $this->getEngine()->Plugin_GetActivePlugins();

        if (!in_array($sPluginName, $activePlugins)) {
            throw new ExpectationException( sprintf('Plugin %s is not active', $sPluginName), $this->getMinkContext()->getSession());
        }
    }

}
