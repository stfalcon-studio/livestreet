<?php

require_once(realpath((dirname(__FILE__)) . "/../AbstractFixtures.php"));

class CategoryFixtures extends AbstractFixtures
{
    /**
     * @return int
     */
    public static function getOrder()
    {
        return 1;
    }

    /**
     * Create Category
     */
    public function load()
    {
        $oCategory = Engine::GetEntity('ModuleBlog_EntityBlogCategory');
        $oBlogCategory = $this->_createCategory($oCategory);
        $this->addReference('blog-category', $oBlogCategory);
    }
}