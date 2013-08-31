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

//importing defalut joomla components
jimport('joomla.application.component.model');

/*
 * HDFLV player Model class to publish,unpublish videos, playlists,ads.
 */
class hdflvplayerModelpublish extends JModelLegacy {

	//Function to publish,unpublish videos,ads, playlists 
	function publishmodel($task)
    {
            //Assigns component into option variable
            $option = 'com_hdflvplayer';
            
            //Fetch the selected rows for publish or unpublish
            $cid = JRequest::getVar( 'cid', array(), '', 'array' );
            $msg = '';
            $tblname = '';
            $taskname = '';
            
            //Assigns publish variable based on selection of task. 
            if( $task == 'publish')
            {
                $publish = 1;
            }
            else if($task == 'trash')
            {
                $publish = -2;
                $msg = 'Trashed successfully';
            }
            else{
            	$publish = 0;
            }
			
            $taskname=JRequest::getvar('task','','get','var');
			
            //Checks taskname and assign table names based on task
            if($taskname == 'uploadvideos')
            {
                $tblname = 'hdflvplayerupload';
            }
            elseif($taskname == 'ads')
            {
                $tblname = 'hdflvplayerads';
            }
            elseif($taskname == 'playlistname')
            {
                $tblname = 'hdflvplayername';
            }
			
            //Initialize table name for publish or unpublish
            $reviewTable = JTable::getInstance($tblname, 'Table');
                      
            //Calls publish function with selected row(s) set, publish or unpublish flag 
            $reviewTable->publish($cid, $publish);
            
            //Redirects with message
            $link = 'index.php?option=' . $option.'&task='.$taskname;
            
            JFactory::getApplication()->redirect($link, $msg);
      }
  }
?>