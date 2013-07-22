<?php

require_once(realpath((dirname(__FILE__)) . "/../AbstractFixtures.php"));

class CategoryFixtures extends AbstractFixtures
{
    public static function getOrder()
    {
        return 0;
    }

    public function load()
    {
        $oCategory = Engine::GetEntity('ModuleBlog_EntityBlogCategory');

        $oCategory->setTitle('title');
        $oCategory->setUrl('url');
        $oCategory->setUrlFull('url_full');
        $oCategory->setSort(2);

        $iCategoryId =  $this->oEngine->Blog_AddCategory($oCategory);
        $oCategory = $this->oEngine->Blog_GetCategoryById($iCategoryId);
        $this->addReference('blog-category', $oCategory);
    }
}