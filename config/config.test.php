<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/
/**
 * Настройки для локального сервера.
 * Для использования - переименовать файл в config.local.php
 */

/**
 * Настройка базы данных
 */
$config['db']['params']['host'] = 'localhost';
$config['db']['params']['port'] = '3306';
$config['db']['params']['user'] = 'root';
$config['db']['params']['pass'] = '';
$config['db']['params']['type']   = 'mysql';
$config['db']['params']['dbname'] = 'social_test';
$config['db']['table']['prefix'] = 'prefix_';

$config['sys']['cache']['use']    = false;               // использовать кеширование или нет
$config['sys']['cache']['solid']  = false;

return $config;
?>