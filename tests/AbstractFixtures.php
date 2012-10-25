<?php

abstract class AbstractFixtures
{
    protected $oEngine;

    private $aReferences = array();

    /**
     *
     * @param type $oEngine
     * @param type $aReferences
     */
    public function __construct($oEngine, $aReferences)
    {
        $this->oEngine = $oEngine;
        $this->aReferences = $aReferences;
    }

    /**
     *
     * @param type $name
     * @param type $data
     *
     * Добавление фикстур 
     */
    public function addReference($name, $data)
    {
        $this->aReferences[$name] = $data;
    }

    /**
     *
     * @param type $name
     * @return type
     * Вызов фикстур по их названиию
     *
     */
    public function getReference($name)
    {
        if (isset($this->aReferences[$name])) {
            return $this->aReferences[$name];
        }

        throw new Exception("Fixture reference \"$name\" is not exist");
    }


    public function getReferences()
    {
        return $this->aReferences;
    }

    abstract public function load();

    abstract public static function getOrder();
}

