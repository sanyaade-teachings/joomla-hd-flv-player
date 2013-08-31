<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.0
 * @package	        Apptha
 * @since	        Joomla 3.0
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2012 Powered by Apptha
 * @license 		GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class hdflvplayerModeladdview extends JModelLegacy
{
	function getviewcount()
	{
		$thumbid1="";
		$thumbid1=JRequest::getvar('thumbid','','get','int');
		$db =JFactory::getDBO();
		$query="update #__hdflvplayerupload SET times_viewed=1+times_viewed where id=$thumbid1";
		$db->setQuery($query );
		$db->query();

	}

}