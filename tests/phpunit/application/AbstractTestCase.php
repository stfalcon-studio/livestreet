<?php


require_once("config/loader.php");
require_once("engine/classes/Engine.class.php");

/**
 * абстрактный класс тестов
 *
 * @PHPUnit_Framework_TestCase
 */
abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{
    
    /**
     *
     * @var Engine
     */
    protected $oEngine;
    
    /**
     * Начальная инициализация
     */
    public function setUp() {
        
        // Подгружаем конфиг-тест
        if (file_exists(Config::Get('path.root.server') . '/config/config.test.php')) {
            Config::LoadFromFile(Config::Get('path.root.server') . '/config/config.test.php', false);
        }
        
        // Получаем объект движка
        $this->oEngine = Engine::getInstance();
        
        // Инициализация движка
        $this->oEngine->Init();
    }
    
    /**
     * Авторизация пользователя по его майлу
     * 
     * @param string $sMail
     * 
     * @throws InvalidArgumentException
     */
    public function loginUser($sMail) {
        $oUser = $this->oEngine->User_GetUserByMail($sMail);
        
        if (!$oUser){
            throw new InvalidArgumentException('Login user: user not found by email: ' . $sMail, 10);
        }
        
        $this->oEngine->User_Authorization($oUser, false);
    }
    
    /**
     * Авторизация админа
     */
    public function loginUserAsAdministrator(){
        $this->loginUser('admin@admin.adm');
    }

}

