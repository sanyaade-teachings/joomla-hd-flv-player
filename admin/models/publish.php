<?php
/**
 * @version		$Id: publish.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class hdflvplayerModelpublish extends JModel {

	//Functon to publish or unpublish the data for front-end display.
	function publishmodel($task)
    {
            $option = 'com_hdflvplayer';
            global $mainframe;
            $cid = JRequest::getVar( 'cid', array(), '', 'array' );
            if( $task == 'publish')
            {
                $publish = 1;
            }
            else
            {
                $publish = 0;
            }

            $tblname="";
            $taskname="";

            $taskname=JRequest::getvar('task','','get','var');

            if($taskname=="uploadvideos")
            {
                $tblname="hdflvplayerupload";
                $taskname="uploadvideos";
            }
            elseif($taskname=="ads")
            {
                $tblname="hdflvplayerads";
                $taskname="ads";
            }
            elseif($taskname=="playlistname")
            {
                $tblname="hdflvplayername";
                $taskname="playlistname";
            }

            $reviewTable =& JTable::getInstance($tblname, 'Table');
            $reviewTable->publish($cid, $publish);
            $link='index.php?option=' . $option.'&task='.$taskname;
            $msg=isset($msg)?$msg:'';
            JFactory::getApplication()->redirect($link, $msg);
       
    }
    
}
?>
