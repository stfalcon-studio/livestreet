<?php

/**
 * Description of UserFixtures
 *
 * @author user
 */
require_once(realpath((dirname(__FILE__)) . "/../AbstractFixtures.php"));

class UserFixtures extends AbstractFixtures
{
    public function load()
    {
        $oUserStfalcon = Engine::GetEntity('User');
        $oUserStfalcon->setLogin('stfalcon');
        $oUserStfalcon->setPassword(md5('qwerty'));
        $oUserStfalcon->setMail('stepan.tanasiychuk@stfalcon.com');
        $oUserStfalcon->setUserDateRegister(date("Y-m-d H:i:s"));
        $oUserStfalcon->setUserIpRegister('127.0.0.1');
        $oUserStfalcon->setUserActivate('1');
        $oUserStfalcon->setUserActivateKey('0');
        
        $this->oEngine->User_Add($oUserStfalcon); 
        
        $oUserStfalcon->setProfileName('Stepan Tanasiychuk');
        $oUserStfalcon->setProfileAbout('...  описания профиля Stepan Tanasiychuk');
        $oUserStfalcon->setProfileSex('man');
        
        $this->oEngine->User_Update($oUserStfalcon);
        
        $this->aReferences['user-stfalcon'] = $oUserStfalcon;

        $oUserGolfer = Engine::GetEntity('User');
        $oUserGolfer->setLogin('Golfer');
        $oUserGolfer->setPassword(md5('qwerty'));
        $oUserGolfer->setMail('golfer@gmail.com');
        
        $oUserGolfer->setUserDateRegister(date("Y-m-d H:i:s"));
        $oUserGolfer->setUserIpRegister('127.0.0.1');
        $oUserGolfer->setUserActivate('1');
        $oUserGolfer->setUserActivateKey('0');

        $this->oEngine->User_Add($oUserGolfer);
        
        $oUserGolfer->setProfileName('Sergey Doryba');
        $oUserGolfer->setProfileAbout('...  описания профиля Сергея Дорыбы');
        $oUserGolfer->setProfileSex('man');
        
        $this->oEngine->User_Update($oUserGolfer);
        
        $this->aReferences['user-golfer'] = $oUserGolfer;
    }

    public static function getOrder()
    {
        return 0;
    }
}

