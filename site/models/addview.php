<?php
/**
 * @version	$Id: addview.php 1.5,  2011-Mar-11 $
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

class hdflvplayerModeladdview extends JModel
{
    //Function to get view count for video.
    function getviewcount()
    {
    $thumbid1="";
    $thumbid1=JRequest::getvar('thumbid','','get','int');
    $db =& JFactory::getDBO();
    $query="update #__hdflvplayerupload SET times_viewed=1+times_viewed where id=$thumbid1";
    $db->setQuery($query );
    $db->query();
    
    }
    
}