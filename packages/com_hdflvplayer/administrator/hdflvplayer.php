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
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
$jlang = JFactory::getLanguage();
$jlang->load('com_hdflvplayer', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_hdflvplayer', JPATH_COMPONENT_ADMINISTRATOR, 'en-GB', true);

$componentPath  =  JPATH_COMPONENT;
$sitePath 		= str_replace(DS.'administrator','',$componentPath);
$videoPath 		= $sitePath.DS.'videos';
$currentDirectory = $componentPath.DS.'images'.DS.'uploads';
$file = $componentPath.DS.'index.html';
$newfile = $componentPath.DS.'images'.DS.'uploads'.DS.'index.html';
if(!is_dir($currentDirectory))
{
	if(!mkdir($currentDirectory, 0777))
	echo 'failed to create folder';
	if (!copy($file, $newfile)) {
		echo "failed to copy $file...\n";
	}
}

$newfile = $videoPath .DS.'index.html';
if (!is_dir($videoPath)) {
	if (!mkdir($videoPath, 0777))
	echo 'failed to create folder';
	if (!copy($file, $newfile)) {
		echo "failed to copy $file...\n";
	}

}
// To get videos path from localhost/components/com_hdflvplayer/videos

define('VPATH', $videoPath );

// To get current path
define('FVPATH', $componentPath);
define('YOUTUBEPATH', $sitePath.DS.'hdflvplayer');
$present_task=JRequest::getVar('task');

if($present_task == "hdflvplayerinstall")
{
	require_once( JPATH_COMPONENT.DS.'hdflvplayerinstall.php' );
	$controller = new hdflvplayerinstall();
}
elseif ($present_task == "hdflvplayerupgrade")
{
	require_once( JPATH_COMPONENT.DS.'hdflvplayerupgrade.php' );
	$controller = new Hdflvplayerupgrade();
}
elseif ($present_task == "hdflvplayeruninstall")
{
	require_once( JPATH_COMPONENT.DS.'hdflvplayeruninstall.php' );
	$controller = new Hdflvplayeruninstall();
}
else
{
	require_once( JPATH_COMPONENT.DS.'hdflvplayerController.php' );
	$controller   = new hdflvplayerController();
	$controller->execute( JRequest::getVar('task','uploadvideos') );

	//Submenu coding here
	$controllerName = JRequest::getCmd('task','uploadvideos');
	if($controllerName == '')
	{
	$controllerName = JRequest::getVar('task','','GET');
	}
	
	if($controllerName != 'controlpanel')
	{
		
	$uploadvideos = $editplayersettings = $playlistname = $checklist = $settings_active = $editlanguagesetup = $ads_active = $addgoogle = false;
	switch ($controllerName)
	{
		case "uploadvideos":
		case "addvideoupload":
		case "editvideoupload":
		case "UPLOADVIDEOCANCEL":
			$uploadvideos = true;
			break;
		case "editplayersettings":
			$editplayersettings = true;
			break;
		case "playlistname":
		case "addplaylistname":
		case "editplaylistname":
		case "PLAYLISTNAMECANCEL":
			$playlistname = true;
			break;
		case "checklist":
			$checklist = true;
			break;
		case "settings":
			$settings_active = true;
			break;
		case "editlanguagesetup":
			$editlanguagesetup = true;
			break;
		case "ads":
		case "editads":
		case "CANCELADS":
		case "addads":
			$ads_active = true;
			break;
		case "addgoogle":
			$addgoogle = true;
			break;
	}

	//Submenu display
	JSubMenuHelper::addEntry(JText::_('Videos'), 'index.php?option=com_hdflvplayer&task=uploadvideos',$uploadvideos);
	JSubMenuHelper::addEntry(JText::_('Player Settings'), 'index.php?option=com_hdflvplayer&task=editplayersettings',$editplayersettings);
	JSubMenuHelper::addEntry(JText::_('Playlist'), 'index.php?option=com_hdflvplayer&task=playlistname',$playlistname);
	JSubMenuHelper::addEntry(JText::_('Checklist '), 'index.php?option=com_hdflvplayer&task=checklist',$checklist);
	JSubMenuHelper::addEntry(JText::_('Language Settings '), 'index.php?option=com_hdflvplayer&task=editlanguagesetup',$editlanguagesetup);
	JSubMenuHelper::addEntry(JText::_('Video Ads '), 'index.php?option=com_hdflvplayer&task=ads',$ads_active);
	JSubMenuHelper::addEntry(JText::_('Google AdSense'), 'index.php?option=com_hdflvplayer&task=addgoogle',$addgoogle);
	}
	$document = JFactory::getDocument();
	$document->addStyleSheet('components/com_hdflvplayer/css/styles.css');
	// Redirect if set by the controller
	$controller->redirect();
}
?>