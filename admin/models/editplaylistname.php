<?php

/**
 * @version  $Id: editplaylistname.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */
//No direct acesss
defined('_JEXEC') or die();

//importing default joomla components
jimport('joomla.application.component.model');

class hdflvplayerModeleditplaylistname extends JModel {
	
	//Function to get data for edit playlist name.
    function editplaylistmodel() {
        $db = & JFactory::getDBO();
        $rs_editplaylistname = & JTable::getInstance('hdflvplayername', 'Table');
        $cid = JRequest::getVar('cid', array(0), '', 'array');
        $id = $cid[0];      // To get the id no to be edited...
        $rs_editplaylistname->load($id);
        $lists['published'] = JHTML::_('select.booleanlist', 'published', $rs_editplaylistname->published);
        return $rs_editplaylistname;
        // To call html function class name: HTML_player function name:editUpload
    }
	
    //Function to get data for creating new playlist name.
    function playlistnameadd() {
        $rs_addplaylist = & JTable::getInstance('hdflvplayername', 'Table');
        return $rs_addplaylist;
    }
	
    //Function to save the playlist name.
    function saveplaylistname($task) {
        $option = 'com_hdflvplayer';
        global $mainframe;
        $db = & JFactory::getDBO();
        $rs_saveplaylistname = & JTable::getInstance('hdflvplayername', 'Table');
        $cid = JRequest::getVar('cid', array(0), '', 'array');
        $id = $cid[0];
        $rs_saveplaylistname->load($id);
        if (!$rs_saveplaylistname->bind(JRequest::get('post'))) {
            echo "<script> alert('" . $rs_saveplaylistname->getError() . "');window.history.go(-1); </script>\n";
            exit();
        }
        if (!$rs_saveplaylistname->store()) {
            echo "<script> alert('" . $rs_saveplaylistname->getError() . "'); window.history.go(-1); </script>\n";
            exit();
        }
        switch ($task) {
            case 'applyplaylistname':
                $msg = 'Changes Saved';
                $link = 'index.php?option=' . $option . '&task=editplaylistname&cid[]=' . $rs_saveplaylistname->id;
                break;
            case 'saveplaylistname':
            default:
                $msg = 'Saved';
                $link = 'index.php?option=' . $option . '&task=playlistname';
                break;
        }
        // page redirect
          $app =& JFactory::getApplication();
            $app->redirect($link, 'Saved');


    }
	
    //Function to remove the selected playlist name from the list.
    function removeplaylistname() {
        $option = 'com_hdflvplayer';
        global $mainframe;
        $cid = JRequest::getVar('cid', array(), '', 'array');
        $db = & JFactory::getDBO();
        $cids = implode(',', $cid);
        if (count($cid)) {
        if($cids == 1) {
         echo "<script> alert('cannot deleted default playlist'); </script>\n";
        // JError::raiseError(403, 'You are not authorized to view this');
        }
        $cids = implode(',', $cid);
        $query = "DELETE FROM #__hdflvplayername WHERE id IN ( $cids )";
        $qryRes=$db->setQuery($query);
        //echo $qryRes;
        
            if (!$db->query()) {
                //echo "<script> alert('" . $db->getErrorMsg() . "');window.history.go(-1); </script>\n";
                echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
            }
        }
        // page redirec
        $link='index.php?option=' . $option . '&task=playlistname';
          $app =& JFactory::getApplication();
            $app->redirect($link, 'Deleted');
        
    }

}

?>
