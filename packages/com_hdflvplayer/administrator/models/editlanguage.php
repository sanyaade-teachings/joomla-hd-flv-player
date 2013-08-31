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
//No direct acesss
defined('_JEXEC') or die();

//importing default joomla components
jimport('joomla.application.component.model');

/*
 * HDFLV player Model class to save functions,fetch language settings while edit.
 */
class hdflvplayerModeleditlanguage extends JModelLegacy {

	//Function to fetch language details
	function editlanguagemodel()
	{
		$db = JFactory::getDBO();
		$showlanguage = array();
		
		//Fetch language settings details
		$query = 'SELECT `id`, `published`, `play`, `pause`, `hdison`, `hdisoff`, `zoom`, `share`, `fullscreen`, `relatedvideos`, `sharetheword`, `sendanemail`, `to`, `from`, `send`, `copylink`, `copyembed`, `facebook`, `reddit`, `friendfeed`, `slashdot`, `delicious`, `myspace`, `wong`, `digg`, `blinklist`, `bebo`, `fark`, `tweet`, `furl`, `name`, `home`, `note`, `btnname`, `errormessage`, `volume`, `download`, `skipadd`, `adindicator` FROM `#__hdflvplayerlanguage`';
		$db->setQuery( $query);
		$showlanguage = $db->loadObject();
		return $showlanguage;
	}

	//Function to store language details
	function savelanguagesetup($task)
	{
		global $option;
		$option 	= 'com_hdflvplayer';
		$langsettings 	= JTable::getInstance('hdflvplayerlanguage', 'Table');
		$langsettings->load();//to load the the record from table
		
		if (!$langsettings->bind(JRequest::get('post')))
		{
			JError::raiseError(500, JText::_($langsettings->getError()));
		}
		
		//Save language settings into table.
		if (!$langsettings->store()) {
			JError::raiseError(500, JText::_($langsettings->getError()));
		}
		
		//set message with redirect link
		switch ($task)
		{
			case 'applylanguagesetup':
				$msg = 'Changes Saved';
				$link = 'index.php?option=' . $option .'&task=editlanguagesetup';
				break;
			case 'savelanguagesetup':
			default:
				$msg = 'Saved';
				$link = 'index.php?option=' . $option.'&task=languagesetup';
				break;
		}
		
		// page redirect
		JFactory::getApplication()->redirect($link, $msg);
	}
}
?>
