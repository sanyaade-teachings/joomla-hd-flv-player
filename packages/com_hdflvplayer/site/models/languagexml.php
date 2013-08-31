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

// implementing default component libraries
jimport( 'joomla.application.component.model' );

/*
 * Model class for generating languagexml
 */
class hdflvplayerModellanguagexml extends JModelLegacy
{
	//Function to fetch language settings
	function getlanguage()
	{
		$db =JFactory::getDBO();
		$query = "SELECT `id`, `published`, `play`, `pause`, `hdison`, `hdisoff`, `zoom`, `share`, `fullscreen`, `relatedvideos`, `sharetheword`, `sendanemail`, `to`, `from`, `send`, `copylink`, `copyembed`, `facebook`, `reddit`, `friendfeed`, `slashdot`, `delicious`, `myspace`, `wong`, `digg`, `blinklist`, `bebo`, `fark`, `tweet`, `furl`, `name`, `home`, `note`, `btnname`, `errormessage`, `volume`, `download`, `skipadd`, `adindicator` FROM `#__hdflvplayerlanguage`  WHERE published='1' AND home=1";
		$db->setQuery( $query );
		$rows = $db->loadObject();
		return $rows;
	}
}