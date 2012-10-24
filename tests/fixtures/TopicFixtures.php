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
        $oTopic->setText('Toshiba is to add a new Android 4.0 ICS to the mass which is known as Toshiba AT330. The device is equipped with a multi-touch capacitive touch display that packs a resolution of 1920 x 1200 pixels. The Toshiba AT330 tablet is currently at its prototype stage. We have very little details about the tablet, knowing that it’ll come equipped with HDMI port, on-board 32GB storage that’s expandable via an full-sized SD card slot. It’ll also have a built-in TV tuner and a collapsible antenna.It’ll also run an NVIDIA Tegra 3 quad-core processor. Other goodies will be a 1.3MP front-facing camera and a 5MP rear-facing camera. Currently, there is no information about its price and availability. A clip is included below showing it in action.');
        $oTopic->setTextShort('Toshiba is to add a new Android 4.0 ICS to the mass which is known as Toshiba AT330. The device is equipped with a multi-touch capacitive touch display that packs a resolution of 1920 x 1200 pixels. ');
        $oTopic->setTextSource('Toshiba is to add a new Android 4.0 ICS to the mass which is known as Toshiba AT330. The device is equipped with a multi-touch capacitive touch display that packs a resolution of 1920 x 1200 pixels. ');
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Gadgets, Toshiba-AT330');

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
        $oTopic->setText('As well as new line of tablets and all-in-one desktop PCs, Toshiba are revamping their laptop range. Just about every end of the market has been covered, with budget, consumer, and gaming laptops all seeing a refresh. The common link is that all of them will be seeing an upgrade to the third generation of Intel Core processors, or what you’ll better know as Ivy Bridge.Let’s start with the gaming laptops. Toshiba are introducing two new Qosmio laptops, the X875 and X875 3D. Both will feature Ivy Bridge processors and dedicated NVIDIA GTX 670M GPUs with 3GB of dedicated memory. Screens will be 17.3-inches with a 1600×900 TruBrite display, or you can choose to upgrade to a 1080p 3D capable screen. Storage wise, there will be hybrid hard drive options, and space for two drives, so you can feasibly get up to 2TB packed in there. There will be four memory slots (although only two that are user accessible) for DDR3 1600Mhz memory, and four USB 3.0 ports for high speed transfers. Toshiba say the laptops will be available in Q3, and start at $1,299.');
        $oTopic->setTextShort('As well as new line of tablets and all-in-one desktop PCs, Toshiba are revamping their laptop range. Just about every end of the market has been covered, with budget, consumer, and gaming laptops all seeing a refresh. The common link is that all of them will be seeing an upgrade to the third generation of Intel Core processors, or what you’ll better know as Ivy Bridge. ');
        $oTopic->setTextSource('As well as new line of tablets and all-in-one desktop PCs, Toshiba are revamping their laptop range. Just about every end of the market has been covered, with budget, consumer, and gaming laptops all seeing a refresh. The common link is that all of them will be seeing an upgrade to the third generation of Intel Core processors, or what you’ll better know as Ivy Bridge. ');
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Gadgets, Toshiba-laptops');

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
        $oTopic->setText('Another rumor for the iPad 3 has surfaced with some details given by Bloomberg, claiming that the iPad 3 production is already underway and will be ready for a launch as early as March.The new details also indicate that the iPad 3 to pack 4G LTE connectivity and a more powerful quad-core processor. Currently, it’s still unknown if the iPad 3 will ride on both the 4G LTE networks of Verizon and AT&T, while the iPad 2 is on the 3G network of both operators.The recently released iOS 5.1 BETA has also some indication that it supports the quad-core A6 processor. Other goodies of the iPad 3 will be the double in resolution of the current iPad 2′s Retina display. Anyway, all these are just rumors so you’re advisable to take it as a pinch of salt.');
        $oTopic->setTextShort('Another rumor for the iPad 3 has surfaced with some details given by Bloomberg, claiming that the iPad 3 production is already underway and will be ready for a launch as early as March. ');
        $oTopic->setTextSource('Another rumor for the iPad 3 has surfaced with some details given by Bloomberg, claiming that the iPad 3 production is already underway and will be ready for a launch as early as March. ');
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
        $oTopic->setText('A new Linux tablet known as Spark has surfaced and has some details and its launch date unveiled. The Spark Linux tablet will retail for $265 and it’ll be packed with a 1 GHz AMLogic ARM Cortex-A9 CPU, a 512MB RAM, and a Mali 400 graphics which powers its 7-inch capacitive multi-touch display that offers a resolution of 800×480 pixels.The tablet will also come with a small internal storage of 4GB only but you have a choice to expand it via microSD card slot. It’ll also have a 1.3MP front-facing camera and support WiFi connectivity.The Spark tablet will run Mer, a community-version of MeeGo Linux offering KDE Plasma Active software environment. Its intention is to make this tablet as open as possible with all the software open source. If neither iOS nor Android is your choice, and you prefer Linux, then this should suit you.It’ll start shipping in Europe and be followed by global launches. The price tag of $265 sounds too deep while considering you’d get Android 4.0 ICS tablets that’re lower than the $200 price point.');
        $oTopic->setTextShort('A new Linux tablet known as Spark has surfaced and has some details and its launch date unveiled. The Spark Linux tablet will retail for $265 and it’ll be packed with a 1 GHz AMLogic ARM Cortex-A9 CPU, a 512MB RAM, and a Mali 400 graphics which powers its 7-inch capacitive multi-touch display that offers a resolution of 800×480 pixels. ');
        $oTopic->setTextSource('A new Linux tablet known as Spark has surfaced and has some details and its launch date unveiled. The Spark Linux tablet will retail for $265 and it’ll be packed with a 1 GHz AMLogic ARM Cortex-A9 CPU, a 512MB RAM, and a Mali 400 graphics which powers its 7-inch capacitive multi-touch display that offers a resolution of 800×480 pixels. ');
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
        $oTopic->setText('Both the flipCHARGE burst and flipCHARGE rogue sport a flush folding USB cable for synching, a blue LED battery level indicator, a convenient carabiner clip and work with Scosche’s free reVIVE App for advanced power management.The flipCHARGE rogue sports a powerful 1800mAh lithium polymer battery that’s capable of fully charging a dead iPhone or iPod. While flipCHARGE burst offers an emergency 30% power burst for your iPhone and can charge an iPod to 70% full.The flipCharge burst and rogue can be had from Scosche.com for $50 and $60 respectively.');
        $oTopic->setTextShort('Scosche has announced the availability of its two new iOS accessories – the flipCHARGE burst (pictured above) and flipCHARGE rogue (pictured below), which are a back-up battery and charger for your iPhone and iPod Touch, to ensure them never short of juice while on the go. ');
        $oTopic->setTextSource('Scosche has announced the availability of its two new iOS accessories – the flipCHARGE burst (pictured above) and flipCHARGE rogue (pictured below), which are a back-up battery and charger for your iPhone and iPod Touch, to ensure them never short of juice while on the go. ');
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
        $oTopic->setText('Want more speeds and better protection for your data? The Sony MicroVault Mach flash USB 3.0 drive is what you need. It offers the USB 3.0 interface that delivers data at super high speeds of up to 5Gbps. It’s also backward compatible with USB 2.0.The Sony MicroVault Mach USB 3.0 drive offers read and write speeds of 120Mbps and 90Mbps respectively. It’s available in a number of storage capacities including 8GB, 16GB, 32GB and 64GB.It also comes in solid aluminum body that provides better protection for your important data on the go. Unfortunately, it doesn’t offer any encryption for your data. So far, there is no no pricing info or availability.');
        $oTopic->setTextShort('Want more speeds and better protection for your data? The Sony MicroVault Mach flash USB 3.0 drive is what you need. It offers the USB 3.0 interface that delivers data at super high speeds of up to 5Gbps. It’s also backward compatible with USB 2.0. ');
        $oTopic->setTextSource('Want more speeds and better protection for your data? The Sony MicroVault Mach flash USB 3.0 drive is what you need. It offers the USB 3.0 interface that delivers data at super high speeds of up to 5Gbps. It’s also backward compatible with USB 2.0. ');
        $oTopic->setTextHash(md5($oTopic->getType() . $oTopic->getTextSource() .$oTopic->getTitle()));
        $oTopic->setTags('Gadgets, flash, drive');

        $this->oEngine->Topic_AddTopic($oTopic);
        $this->aReferences['Sony-MicroVault'] = $oTopic;
        
        
    }

    public static function getOrder()
    {
        return 2;
    }
}

