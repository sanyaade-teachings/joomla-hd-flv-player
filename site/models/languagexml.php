<?php
/**
 * @version	$Id: languagexml.php 1.5,  2011-Mar-11 $
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


class hdflvplayerModellanguagexml extends JModel
{
	/**
	 * Gets the greeting
	 * 
	 * @return string The greeting to be displayed to the user
	 */
        function getlanguage()
        {

          $db =& JFactory::getDBO();
          $query = "select * from #__hdflvplayerlanguage where published='1' and home=1";//and id=2";
            $db->setQuery( $query );
            $rows = $db->loadObjectList();
            return $rows;
        }
}