<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.1
 * @package	        Apptha
 * @since	        Joomla 1.5
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2011 Powered by Apptha
 * @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      	com_hdflvplayer installation file.
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
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