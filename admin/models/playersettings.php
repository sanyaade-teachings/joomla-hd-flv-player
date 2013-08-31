<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.0
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
//No direct acesss
defined('_JEXEC') or die();

//importing defalut joomla components
jimport('joomla.application.component.model');

//importing defalut joomla file system libraries
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/*
 * HDFLV player Model class to change/show player settings
 */
class hdflvplayerModelplayersettings extends JModel {

	//Fetch player settings
	function playersettingsmodel()
	{
		$db = JFactory::getDBO();
		$settingResult = array();
		
		//Query to display player settings
		$query = 'SELECT `id`, `published`, `buffer`, `normalscale`, `fullscreenscale`, `autoplay`,`volume`, `logoalign`, `logoalpha`, `skin_autohide`, `stagecolor`, `skin`,
						 `embedpath`, `fullscreen`, `zoom`, `width`, `height`, `uploadmaxsize`, `ffmpegpath`, `ffmpeg`, `related_videos`, `timer`, `logopath`, `logourl`, `nrelated`, 
						 `shareurl`,`playlist_autoplay`, `hddefault`, `ads`, `prerollads`, `postrollads`, `random`, `midrollads`,`midbegin`, `midinterval`, `midrandom`, `googleanalyticsID`, 
						 `googleana_visible`, `midadrotate`, `playlist_open`, `licensekey`, `vast`, `vast_pid`, `api`, `description`, `urllink`, `scaletohide`, `title_ovisible`, `description_ovisible`, 
						 `playlist_dvisible`, `embedcode_visible`, `viewed_visible`, `playlistrandom`, `vquality` FROM `#__hdflvplayersettings`';
		$db->setQuery($query);
		$settingResult = $db->loadObject();

		// Get player settings from table
		return($settingResult);
	}

	//Save player settings
	function saveplayersettings($task)
	{
		$option = 'com_hdflvplayer';
		$db = JFactory::getDBO();
		$rs_savesettings = JTable::getInstance('hdflvplayer', 'Table');

		//Loads record from table
		$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
		$id = $cid[0];
		$rs_savesettings->load($id);
		
		$settingsResult  = JRequest::get('post');
		
		if($settingsResult['vast'] == '0')
		{
			$settingsResult['vast_pid'] = '';
		}
		
		
		
			$settingsResult['width'] = $settingsResult['playerwidth'];
			$settingsResult['height'] = $settingsResult['playerheight'];
		
		//Binds the given input fields with table columns
		if (!$rs_savesettings->bind($settingsResult))
		{
			JError::raiseError(500, JText::_($rs_savesettings->getError()));
		}

		//Stores the given input in appropriate fields in the table
		if (!$rs_savesettings->store()) {
			JError::raiseError(500, JText::_($rs_savesettings->getError()));
		}

		//Uploads logo file
		$file = JRequest::getVar('logopath', null, 'files', 'array');
		$logo_name  = JFile::makeSafe($file['name']);
		$src        = $file['tmp_name'];//Getting source path to upload
		$exts       = JFile::getExt($logo_name);//Getting extension of file to upload


		if($logo_name != '')
		{
			$vpath = VPATH.'/';
			$target_path_logo = $vpath.$logo_name;
				
			// Validation for logopath extensions
			if(($exts != "png") && ($exts != "gif") && ($exts!="jpeg") && ($exts!="jpg")) // To check file type
			{
				JError::raiseWarning(406, JText::_('File Extensions:Allowed Extensions for image file is .jpg,.jpeg,.png'));
				
			}
				
			// To store images to a directory called components/com_hdflvplayer/videos
			else if (JFile::upload($src,$target_path_logo))
			{
				$query = 'UPDATE #__hdflvplayersettings SET logopath=\''.$logo_name.'\'';
				$db->setQuery($query);
				$db->query();
			}
		}

		//After changes, redirect based on task.
		switch ($task)
		{
			case 'applyplayersettings':
				$msg  = 'Changes Saved';
				$link = 'index.php?option=' . $option .'&task=editplayersettings&cid[]='. $rs_savesettings->id;
				break;
			case 'saveplayersettings':
			default:
				$msg  = 'Saved';
				$link = 'index.php?option=' . $option.'&task=playersettings';
				break;
		}

		// page redirect
		JFactory::getApplication()->redirect($link, $msg);
	}
}
?>