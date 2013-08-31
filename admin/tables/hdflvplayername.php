<?php
/**
 * @version  $Id: hdflvplayername.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
 */
defined('_JEXEC') or die('Restricted access');
class Tablehdflvplayername extends JTable
{
    var $id = null;
    var $name=null;
    var $published=null;
   
    function __construct(&$db)
    {
        parent::__construct( '#__hdflvplayername', 'id', $db );

    }
}
?>