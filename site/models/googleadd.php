<?php
/**
 * @version	$Id: googleadd.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );


class hdflvplayerModelgoogleadd extends JModel
{
	//Function to get google ads from database.
	function googlescript()
	{
            global $db;
            $db =& JFactory::getDBO();
            $query1 = "select * from #__hdflvaddgoogle where publish='1' and id='1'";
            $db->setQuery( $query1 );
            $fields = $db->loadObjectList();
            echo html_entity_decode(stripcslashes($fields[0]->code));
            exit();
	}
}