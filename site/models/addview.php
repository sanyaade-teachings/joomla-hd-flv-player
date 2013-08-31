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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class hdflvplayerModeladdview extends HdflvplayerModel
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