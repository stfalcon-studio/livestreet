<?php

require_once("config/loader.php");
require_once("engine/classes/Engine.class.php");

/**
 * Class for load fixtures
 */
class LoadFixtures
{

    /**
     * Main objects references array
     *
     * @var array $aReferences
     */
    private $aReferences = array();

    /**
    * @var Engine
    */
    private $oEngine;

    /**
     * The directory of the fixtures for tests
     *
     * @var string $sDirFixtures
     */
    private $sDirFixtures;

    public function __construct() {
        if (file_exists(Config::Get('path.root.server') . '/config/config.test.php')) {
            Config::LoadFromFile(Config::Get('path.root.server') . '/config/config.test.php', false);
        }

        $this->oEngine = Engine::getInstance();
        $this->oEngine->Init();
        $this->sDirFixtures = realpath((dirname(__FILE__)) . "/fixtures/");
    }

    public function load() {
        $this->loadFixtures();
    }

    /**
     * Call function purge DB
     *
     * @return purge DB
     */
    public function purgeDB()
    {
        $this->_purgeDB();
    }

    /**
     * Function purge DB
     *
     * @return void
     */
    private function _purgeDB() {
        $sDbname = Config::Get('db.params.dbname');
        //DROP DATABASE
        if (mysql_select_db($sDbname)) {
            mysql_query("DROP DATABASE $sDbname");
            echo "DROP DATABASE $sDbname \n";
        }
        //CREATE DATABASE
        if (mysql_query("CREATE DATABASE $sDbname") === false) {
            return mysql_error();
        }
        echo "CREATE DATABASE $sDbname \n";
        // SELECTED DATABASE
        if (mysql_select_db($sDbname) === false) {
            return mysql_error();
        }

        echo "SELECTED DATABASE $sDbname \n";
        // ExportSQL dump DB install_base.sql
        $result = $this->oEngine->Database_ExportSQL(dirname(__FILE__) . '/fixtures/sql/install_base.sql');

        if (!$result['result']) {
            return $result['errors'];
        }
        // ExportSQL dump DB geo_base.sql
        $result = $this->oEngine->Database_ExportSQL(dirname(__FILE__) . '/fixtures/sql/geo_base.sql');

        if (!$result['result']) {
            return $result['errors'];
        }

        echo "ExportSQL DATABASE $sDbname \n";
        echo "ExportSQL DATABASE $sDbname -> geo_base \n";

        return true;
    }

    /**
     * Function of loading fixture with the directory tests/fixtures/
     *
     * @var array $aFiles
     * @var array $iOrder
     */
    private function loadFixtures() {
        $aFiles = glob("{$this->sDirFixtures}/*Fixtures.php");
        $aFixtures = array();
        foreach ($aFiles as $sFilePath) {
            require_once "{$sFilePath}";
//            $iOrder = BlogFixtures::getOrder();
            preg_match("/([a-zA-Z]+Fixtures).php$/", $sFilePath, $matches);
            $sClassName = $matches[1];
            $iOrder = forward_static_call(array($sClassName, 'getOrder')) * 100;

            /*while (array_key_exists($aFixtures[$iOrder])) {
                $iOrder++;
            }
            $aFixtures[$iOrder] = $sClassName;*/

            if (!array_key_exists($iOrder, $aFixtures)) {
                $iOrder = $iOrder+100;
                $aFixtures[$iOrder] = $sClassName;
                var_dump($aFixtures);
            } else {
                
            }

        }
        ksort($aFixtures);

        if (count($aFixtures)) {
            foreach ($aFixtures as $iOrder => $sClassName) {
                // @todo референсы дублируются в каждом объекте фиксту + в этом объекте
                $oFixtures = new $sClassName($this->oEngine, $this->aReferences);
                $oFixtures->load();
                $aFixtureReference = $oFixtures->getReferences();
                $this->aReferences = array_merge($this->aReferences, $aFixtureReference);
            }
        }
    }

    /**
     * Function of loading fixture with the plugin
     *
     * @param string $plugin
     */
    public function loadPluginFixtures($plugin){
        $sPath = Config::Get('path.root.server').'/plugins/' . $plugin . '/tests/fixtures';
        if (!is_dir($sPath)) {
            throw new InvalidArgumentException('Plugin not found by LS directory: ' . $sPath, 10);
        }

        $this->sDirFixtures = $sPath;
        $this->loadFixtures();
    }

}

