<?php
/**
 * @version  $Id: addgoogle.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModeladdgoogle extends JModel {

	//Function to get data from hdflvaddgoogle table.
    function addgooglemodel() {
        $db =& JFactory::getDBO();
        $rs_addgoogle =& JTable::getInstance('hdflvaddgoogle', 'Table');
        //$cid = JRequest::getVar( 'cid', array(0), '', 'array' );

        // To get the id no to be edited...
        $id = 1;
        $rs_addgoogle->load($id);
        $lists['published'] = JHTML::_('select.booleanlist','published',$rs_addgoogle->publish);

        return $rs_addgoogle;
    }

	//Function to save the google adsense data.
    function saveaddgoogle($task) {
        $option = 'com_hdflvplayer';
        global $mainframe;
        $db =& JFactory::getDBO();
        $rs_saveaddgoogle =& JTable::getInstance('hdflvaddgoogle', 'Table');
        $id = 1;

        if(JRequest::getVar('showoption') == '0') {
            JRequest::setVar('closeadd','','post');
        }
        if(JRequest::getVar('reopenadd')) {
            JRequest::setVar('reopenadd','1','post');
            JRequest::setVar('ropen','','post');
        }
        if(JRequest::getVar('showaddc')) {
            JRequest::setVar('showaddc','0','post');
        }
        if(JRequest::getVar('showaddm')) {
            JRequest::setVar('showaddm','0','post');
        }
        if(JRequest::getVar('showaddp')) {
            JRequest::setVar('showaddp','0','post');
        }

        $rs_saveaddgoogle->load($id);
        
      


        if (!$rs_saveaddgoogle->bind(JRequest::get('post'))) {
            echo "<script> alert('".$rs_saveaddgoogle->getError()."');window.history.go(-1); </script>\n";
            exit();
        }
        if (!$rs_saveaddgoogle->store()) {
            echo "<script> alert('".$rs_saveaddgoogle->getError()."'); window.history.go(-1); </script>\n";
            exit();
        }
        switch ($task) {
            case 'applyaddgoogle':
                $msg = 'Changes Saved';
                $link = 'index.php?option=' . $option .'&task=addgoogle';
                break;
            //case 'saveaddgoogle':
                //default:
                    //$msg = 'Saved';
                    //$link = 'index.php?option=' . $option.'&task=addgoogle';
                    //break;
            }
            // page redirect
            $app =& JFactory::getApplication();
            $app->redirect($link, 'Saved');
        }
    }
    ?>
