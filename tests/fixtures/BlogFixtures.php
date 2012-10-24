<?php

/**
 * Description of UserFixtures
 *
 * @author user
 */
require_once(realpath((dirname(__FILE__)) . "/../AbstractFixtures.php"));

class BlogFixtures extends AbstractFixtures
{
    public function load()
    {
        $oUserStfalcon = $this->aReferences['user-stfalcon'];
        
        /* @var $oBlogGadgets ModuleBlog_EntityBlog */
        $oBlogGadgets = Engine::GetEntity('Blog');
        $oBlogGadgets->setOwnerId($oUserStfalcon->getId());
        $oBlogGadgets->setTitle("Gadgets");
        $oBlogGadgets->setDescription('Offers latest gadget reviews');
        $oBlogGadgets->setType('open');
        $oBlogGadgets->setDateAdd(date("Y-m-d H:i:s"));
        $oBlogGadgets->setUrl('gadgets');
        $oBlogGadgets->setLimitRatingTopic(0);
        
        $this->oEngine->Blog_AddBlog($oBlogGadgets);

        $this->aReferences['blog-Gadgets'] = $oBlogGadgets;
    }

    public static function getOrder()
    {
        return 1;
    }
}

