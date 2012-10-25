<?php

/**
 * Test ModuleTopic
 *
 */
class TopicTest extends AbstractTestCase
{

    /**
     * @dataProvider providerCountTopicsPersonalByUser
     */
    public function testCountTopicsPersonalByUser($sMail, $iTopicCount) {
        
        $oUser = $this->oEngine->User_GetUserByMail($sMail);
        $iCount = $this->oEngine->Topic_GetCountTopicsPersonalByUser($oUser->getId(), true);


        $this->assertEquals($iCount, $iTopicCount);
    }

    public function providerCountTopicsPersonalByUser() {
        $data = array(
            array(
                'sMail' => 'example2@example.com',
                'iTopicCount' => 5,
            ),
            array(
                'sMail' => 'example@example.com',
                'iTopicCount' => 0,
            ),
        );
        return $data;
    }

}