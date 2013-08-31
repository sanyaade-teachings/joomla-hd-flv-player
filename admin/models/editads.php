<?php

/**
 * @version  $Id: editads.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */
// No Access
defined('_JEXEC') or die();

// importing default joomla components
jimport('joomla.application.component.model');

/*
 * Description: Edit & Remove Models 
 * 
 */

class hdflvplayerModeleditads extends JModel {
	
	//Function to get data from database when edit the ads.
    function editadsmodel() {
        $db = & JFactory::getDBO();
        $rs_edit = & JTable::getInstance('hdflvplayerads', 'Table');
        $cid = JRequest::getVar('cid', array(0), '', 'array');
        $id = $cid[0];
        $rs_edit->load($id);
        $lists['published'] = JHTML::_('select.booleanlist', 'published', $rs_edit->published);
        $add = array('rs_ads' => $rs_edit);
        return $add;
    }

    // remove ads functoin call from toolbar.hdflvplayer.html.php
    function removeads() {
        global $mainframe;
        $cid = JRequest::getVar('cid', array(), '', 'array');
        $db = & JFactory::getDBO();
        $cids = implode(',', $cid);
        if (count($cid)) {
            $cids = implode(',', $cid);
            $query = "DELETE FROM #__hdflvplayerads WHERE id IN ( $cids )";
            $db->setQuery($query);
            if (!$db->query()) {
                echo "<script> alert('" . $db->getErrorMsg() . "');window.history.go(-1); </script>\n";
            }
            $query = "update #__hdflvplayerupload SET midrollads=0 where midrollid='$cids'";
            $db->setQuery($query);
            $db->query();
        }
        // Page Redirect
        $link='index.php?option=com_hdflvplayer&task=ads';
        $app =& JFactory::getApplication();
            $app->redirect($link, 'Deleted');

        
    }

}

?>
