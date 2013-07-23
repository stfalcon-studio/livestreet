<?php

require_once(realpath((dirname(__FILE__)) . "/../AbstractFixtures.php"));

class CommentFixtures extends AbstractFixtures
{

    /**
     * @return int
     */
    public static function getOrder()
    {
        return 4;
    }

    /**
     * Create Comment
     */
    public function load()
    {
        $oUserFirst = $this->getReference('user-golfer');
        $oBlogGadgets = $this->getReference('blog-gadgets');
        $oTopic = $this->getReference('topic-toshiba');

        $oTopicComment = $this->_createComment($oTopic, $oUserFirst, NULL, 'comment text',
            'comment date');
        $this->addReference('topic-toshiba-comment', $oTopicComment);

    }
}