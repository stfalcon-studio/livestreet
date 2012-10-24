<?php
//@todo fix
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['HTTP_HOST'] = 'http://livestreet.test/';
$sDirRoot = dirname(realpath((dirname(__FILE__)) . "/../"));

set_include_path(get_include_path().PATH_SEPARATOR.$sDirRoot);
chdir(dirname(__FILE__));

require_once 'AbstractTestCase.php';
require_once '/test/LoadFixtures.php';

$fixturesLoader = new LoadFixtures();

$fixturesLoader->load();
