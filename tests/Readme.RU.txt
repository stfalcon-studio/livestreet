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


BDD тестирование проекта

Возможности тестирования проекта при помощи BDD(behat+mink)
- Запуск общего теста BDD который находится в директории tests/behat/features/
  (будут исполнятся тести которые лежать в директории tests/behat/features/ и имеют расширение *.feature)
   php  behat.phar

- Запуск теста BDD для отдельного плагина [plugins]/[name_plugin]/[features]
  (будут исполнятся тести которые лежать в директории tests/behat/features/ и имеют расширение *.feature)
   php  behat.phar --paths ../../plugins/[name_plugin]/features
