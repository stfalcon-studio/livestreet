<?php

/**
 * Description of UserFixtures
 *
 * @author user
 */
require_once(realpath((dirname(__FILE__)) . "/../AbstractFixtures.php"));

class TopicFixtures extends AbstractFixtures
{
    public function load()
    {
        $oUser = $this->aReferences['user-golfer'];
        $oBlog = $this->aReferences['blog-Gadgets'];
        /* @var $oTopic ModuleTopic_EntityTopic */
        $oTopic = Engine::GetEntity('Topic');
        $oTopic->setBlogId($oBlog->getBlogId());
        $oTopic->setUserId($oUser->getId());
        $oTopic->setUserIp('127.0.0.1');
        $oTopic->setForbidComment(false);
        $oTopic->setType('topic');
        $oTopic->setTitle('Toshiba unveils 13.3-inch AT330 Android ICS 4.0 tablet');
        $oTopic->setPublish(true);
        $oTopic->setPublishIndex(true);
        $oTopic->setPublishDraft(true);
        $oTopic->setDateAdd(date("Y-m-d H:i:s"));
        $oTopic->setTextSource('Toshiba is to add a new Android 4.0 ICS to the mass which is known as Toshiba AT330. The device is equipped with a multi-touch capacitive touch display that packs a resolution of 1920 x 1200 pixels. The Toshiba AT330 tablet is currently at its prototype stage. We have very little details about the tablet, knowing that it’ll come equipped with HDMI port, on-board 32GB storage that’s expandable via an full-sized SD card slot. It’ll also have a built-in TV tuner and a collapsible antenna.It’ll also run an NVIDIA Tegra 3 quad-core processor. Other goodies will be a 1.3MP front-facing camera and a 5MP rear-facing camera. Currently, there is no information about its price and availability. A clip is included below showing it in action.');
        
        list($sTextShort,$sTextNew,$sTextCut) = $this->oEngine->Text_Cut($oTopic->getTextSource());

		$oTopic->setCutText($sTextCut);
		$oTopic->setText($this->oEngine->Text_Parser($sTextNew));
		$oTopic->setTextShort($this->oEngine->Text_Parser($sTextShort));
        
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Gadgets');

        $this->oEngine->Topic_AddTopic($oTopic);
        $this->aReferences['Toshiba-AT330'] = $oTopic;
        
        $oTopic = Engine::GetEntity('Topic');
        $oTopic->setBlogId($oBlog->getBlogId());
        $oTopic->setUserId($oUser->getId());
        $oTopic->setUserIp('127.0.0.11');
        $oTopic->setForbidComment(false);
        $oTopic->setType('topic');
        $oTopic->setTitle('Toshiba refresh Satellite and Qosmio laptops with Ivy Bridge');
        $oTopic->setPublish(true);
        $oTopic->setPublishIndex(false);
        $oTopic->setPublishDraft(true);
        $oTopic->setDateAdd(date("Y-m-d H:i:s"));
        $oTopic->setTextSource('As well as new line of tablets and all-in-one desktop PCs, Toshiba are revamping their laptop range. Just about every end of the market has been covered, with budget, consumer, and gaming laptops all seeing a refresh. The common link is that all of them will be seeing an upgrade to the third generation of Intel Core processors, or what you’ll better know as Ivy Bridge. ');
        
        list($sTextShort,$sTextNew,$sTextCut) = $this->oEngine->Text_Cut($oTopic->getTextSource());

		$oTopic->setCutText($sTextCut);
		$oTopic->setText($this->oEngine->Text_Parser($sTextNew));
		$oTopic->setTextShort($this->oEngine->Text_Parser($sTextShort));
        
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Gadgets');

        $this->oEngine->Topic_AddTopic($oTopic);
        $this->aReferences['Toshiba-laptops'] = $oTopic;


        $oBlog_user = $this->oEngine->Blog_GetPersonalBlogByUserId($oUser->getId());
//        var_dump($oBlog_user); exit;
        $oTopic = Engine::GetEntity('Topic');
        /* @var $oTopic ModuleTopic_EntityTopic */
        $oTopic->setBlogId($oBlog_user->getBlogId());
        $oTopic->setUserId($oUser->getId());
        $oTopic->setUserIp('127.0.0.0');
        $oTopic->setForbidComment(FALSE);
        $oTopic->setType('topic');
        $oTopic->setTitle('iPad 3 rumored to come this March with quad-core chip and 4G LTE');
        $oTopic->setPublish(true);
        $oTopic->setPublishIndex(false);
        $oTopic->setPublishDraft(true);
        $oTopic->setDateAdd(date("Y-m-d H:i:s"));
        $oTopic->setTextSource('Another rumor for the iPad 3 has surfaced with some details given by Bloomberg, claiming that the iPad 3 production is already underway and will be ready for a launch as early as March. ');
        list($sTextShort,$sTextNew,$sTextCut) = $this->oEngine->Text_Cut($oTopic->getTextSource());

		$oTopic->setCutText($sTextCut);
		$oTopic->setText($this->oEngine->Text_Parser($sTextNew));
		$oTopic->setTextShort($this->oEngine->Text_Parser($sTextShort));
        
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('iPad-3');

        $this->oEngine->Topic_AddTopic($oTopic);
        $this->aReferences['iPad-3'] = $oTopic;


        $oTopic = Engine::GetEntity('Topic');
        /* @var $oTopic ModuleTopic_EntityTopic */
        $oTopic->setBlogId($oBlog_user->getBlogId());
        $oTopic->setUserId($oUser->getId());
        $oTopic->setUserIp('127.0.0.0');
        $oTopic->setForbidComment(FALSE);
        $oTopic->setType('topic');
        $oTopic->setTitle('Spark Linux tablet costs $265 and has details and launch date unveiled');
        $oTopic->setPublish(true);
        $oTopic->setPublishIndex(true);
        $oTopic->setPublishDraft(true);
        $oTopic->setDateAdd(date("Y-m-d H:i:s"));
        $oTopic->setTextSource('A new Linux tablet known as Spark has surfaced and has some details and its launch date unveiled. The Spark Linux tablet will retail for $265 and it’ll be packed with a 1 GHz AMLogic ARM Cortex-A9 CPU, a 512MB RAM, and a Mali 400 graphics which powers its 7-inch capacitive multi-touch display that offers a resolution of 800×480 pixels. ');
        list($sTextShort,$sTextNew,$sTextCut) = $this->oEngine->Text_Cut($oTopic->getTextSource());

		$oTopic->setCutText($sTextCut);
		$oTopic->setText($this->oEngine->Text_Parser($sTextNew));
		$oTopic->setTextShort($this->oEngine->Text_Parser($sTextShort));
        
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Spark, tablet');

        $this->oEngine->Topic_AddTopic($oTopic);
        $this->aReferences['Spark-Linux-tablet'] = $oTopic;

        $oTopic = Engine::GetEntity('Topic');
        /* @var $oTopic ModuleTopic_EntityTopic */
        $oTopic->setBlogId($oBlog_user->getBlogId());
        $oTopic->setUserId($oUser->getId());
        $oTopic->setUserIp('127.0.0.5');
        $oTopic->setForbidComment(FALSE);
        $oTopic->setType('topic');
        $oTopic->setTitle('Scosche releases flipCHARGE burst and rogue emergency backup batteries and chargers for your iPhone');
        $oTopic->setPublish(true);
        $oTopic->setPublishIndex(true);
        $oTopic->setPublishDraft(true);
        $oTopic->setDateAdd(date("Y-m-d H:i:s"));
        $oTopic->setTextSource('Scosche has announced the availability of its two new iOS accessories – the flipCHARGE burst (pictured above) and flipCHARGE rogue (pictured below), which are a back-up battery and charger for your iPhone and iPod Touch, to ensure them never short of juice while on the go. ');
        list($sTextShort,$sTextNew,$sTextCut) = $this->oEngine->Text_Cut($oTopic->getTextSource());

		$oTopic->setCutText($sTextCut);
		$oTopic->setText($this->oEngine->Text_Parser($sTextNew));
		$oTopic->setTextShort($this->oEngine->Text_Parser($sTextShort));
        
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Scosche, batteries');

        $this->oEngine->Topic_AddTopic($oTopic);
        $this->aReferences['Scosche-releases-batteries'] = $oTopic;


        $oTopic = Engine::GetEntity('Topic');
        
        /* @var $oTopic ModuleTopic_EntityTopic */
        $oTopic->setBlogId($oBlog_user->getBlogId());
        $oTopic->setUserId($oUser->getId());
        $oTopic->setUserIp('127.0.0.0');
        $oTopic->setForbidComment(FALSE);
        $oTopic->setType('topic');
        $oTopic->setTitle('Sony MicroVault Mach USB 3.0 flash drive');
        $oTopic->setPublish(true);
        $oTopic->setPublishIndex(false);
        $oTopic->setPublishDraft(true);
        $oTopic->setDateAdd(date("Y-m-d H:i:s"));
        $oTopic->setTextSource('Want more speeds and better protection for your data? The Sony MicroVault Mach flash USB 3.0 drive is what you need. It offers the USB 3.0 interface that delivers data at super high speeds of up to 5Gbps. It’s also backward compatible with USB 2.0. ');
        
        list($sTextShort,$sTextNew,$sTextCut) = $this->oEngine->Text_Cut($oTopic->getTextSource());

		$oTopic->setCutText($sTextCut);
		$oTopic->setText($this->oEngine->Text_Parser($sTextNew));
		$oTopic->setTextShort($this->oEngine->Text_Parser($sTextShort));
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Gadgets');

        $this->oEngine->Topic_AddTopic($oTopic);
        $this->aReferences['Sony-MicroVault'] = $oTopic;
        
        
    }

    public static function getOrder()
    {
        return 2;
    }
}

