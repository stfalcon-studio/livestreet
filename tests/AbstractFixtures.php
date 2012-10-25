<?php

/**
 * AbstractFixtures
 *
 * @author user
 */
abstract class AbstractFixtures
{
    protected $oEngine;
    
    protected $aReferences = array();
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
    
    abstract public function load();

    public function getReferences()
    {
        return $this->aReferences;
    }
    
    abstract public static function getOrder();
}

