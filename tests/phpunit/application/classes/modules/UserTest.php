<?php

/**
 * Description of testSimilar
 *
 * @author user
 */

class SimilarTest extends AbstractTestCase
{

    /**
     * @dataProvider providerUserStats
     */
    public function testUserStats($aStatsTest) {
        $aStats = $this->oEngine->User_GetStatUsers();


        $this->assertEquals($aStats, $aStatsTest);
    }
    
    public function providerUserStats() {
        $data = array(
            array(
                array(
                    'count_all' => 4,
                    'count_active' => 0,
                    'count_inactive' => 4,
                    'count_sex_man' => 0,
                    'count_sex_woman' => 0,
                    'count_sex_other' => 4,
                )
            ),
        );
        return $data;
    }
    
    /**
     * @dataProvider providerUserCurrent
     * @param type $sMail
     */
    public function testUserCurrent($sMail) {
        $this->loginUser($sMail);
        
        $oUser = $this->oEngine->User_GetUserByMail($sMail);
        $oUserCurrent = $this->oEngine->User_GetUserCurrent();
        
        $this->assertFalse(is_null($oUserCurrent));
        $this->assertEquals($oUser->getId(), $oUserCurrent->getId());
    }
    
    public function providerUserCurrent() {
        $data = array(
            array('sMail' => 'example@example.com')
        );
        
        return $data;
    }
}