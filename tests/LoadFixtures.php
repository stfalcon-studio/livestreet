<?php

/**
 * Description of LoadFixtures
 *
 * @author user
 */
require_once("config/loader.php");
require_once("engine/classes/Engine.class.php");

class LoadFixtures
{

    protected $aReferences = array();
    protected $oEngine;
    protected $sDirFixtures;

    public function __construct() {
        if (file_exists(Config::Get('path.root.server') . '/config/config.test.php')) {
            Config::LoadFromFile(Config::Get('path.root.server') . '/config/config.test.php', false);
        }

        $this->oEngine = Engine::getInstance();
        /**
         * Инициализируем ядро
         */
        $this->oEngine->Init();

        $this->sDirFixtures = realpath((dirname(__FILE__)) . "/fixtures/");
    }

    public function load() {
        $this->loadFixtures();
    }
    
    public function purgeDB()
    {
        $this->_purgeDB();
    }

    protected function _purgeDB() {
        $sDbname = Config::Get('db.params.dbname');

        if (mysql_select_db($sDbname)) {
            mysql_query("DROP DATABASE $sDbname");
            echo "DROP DATABASE $sDbname \n";
        } 
        
        if (mysql_query("CREATE DATABASE $sDbname") === false) {
            return mysql_error();
        }
        echo "CREATE DATABASE $sDbname \n";

        if (mysql_select_db($sDbname) === false) {
            return mysql_error();
        }

        echo "SELECTED DATABASE $sDbname \n";

        $result = $this->oEngine->Database_ExportSQL(dirname(__FILE__) . '/fixtures/sql/install_base.sql');

        if (!$result['result']) {
            return $result['errors'];
        }

        $result = $this->oEngine->Database_ExportSQL(dirname(__FILE__) . '/fixtures/sql/geo_base.sql');

        if (!$result['result']) {
            return $result['errors'];
        }

        echo "ExportSQL DATABASE $sDbname \n";
        echo "ExportSQL DATABASE $sDbname -> geo_base \n";

        return true;
    }

    protected function loadFixtures() {

        $aFiles = glob("{$this->sDirFixtures}/*Fixtures.php");
        $aFixtures = array();
        foreach ($aFiles as $sFilePath) {

            require_once "{$sFilePath}";
            $iOrder = BlogFixtures::getOrder();

            preg_match("/([a-zA-Z]+Fixtures).php$/", $sFilePath, $matches);
            $sClassName = $matches[1];
            $iOrder = forward_static_call(array($sClassName, 'getOrder'));
            if (!array_key_exists($iOrder, $aFixtures)) {
                $aFixtures[$iOrder] = $sClassName;
            } else {
                //@todo разруливание одинаковых ордеров
            }
        }
        ksort($aFixtures);

        if (count($aFixtures)) {
            foreach ($aFixtures as $iOrder => $sClassName) {
                $oFixtures = new $sClassName($this->oEngine, $this->aReferences);
                $oFixtures->load();
                $aFixtureReference = $oFixtures->getReferences();
                $this->aReferences = array_merge($this->aReferences, $aFixtureReference);
            }
        }
    }
    
    public function loadPlugin($plugin){
        
        $sPath = Config::Get('path.root.server').'/plugins/' . $plugin . '/tests/fixtures';
        if (!is_dir($sPath)) {
            throw new InvalidArgumentException('Plugin not found by LS directory: ' . $sPath, 10);
        }
        
        $this->sDirFixtures = $sPath;
        
        $this->loadFixtures();
        
    }

}

