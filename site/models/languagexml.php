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

// implementing default component libraries
jimport( 'joomla.application.component.model' );

/*
 * Model class for generating languagexml
 */
class hdflvplayerModellanguagexml extends HdflvplayerModel
{
	//Function to fetch language settings
	function getlanguage()
	{
		$db =JFactory::getDBO();
		$query = "SELECT `not_permission`,`youtube_video_notallow`,`youtube_video_url_incorrect`,`youtube_video_removed`,`login`,`id`, `published`, `play`, `pause`, `hdison`, `hdisoff`, `zoom`, `share`, `fullscreen`, `relatedvideos`, `sharetheword`, `sendanemail`, `to`, `from`, `send`, `copylink`, `copyembed`, `facebook`, `googleplus`, `tumblr`, `tweet`, `name`, `home`, `note`, `btnname`, `errormessage`, `volume`, `download`, `skipadd`, `adindicator` FROM `#__hdflvplayerlanguage`  WHERE published='1' AND home=1";
		$db->setQuery( $query );
		$rows = $db->loadObject();
		return $rows;
	}
}