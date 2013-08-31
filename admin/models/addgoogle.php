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


    function saveaddgoogle($task) {
        $option = 'com_hdflvplayer';
        global $mainframe;
        $db =& JFactory::getDBO();
        $rs_saveaddgoogle =& JTable::getInstance('hdflvaddgoogle', 'Table');
        $id = 1;

        if($_POST['showoption'] == '0') {
            $_POST['closeadd'] = '';
        }
        if(!isset($_POST['reopenadd'])) {
            $_POST['reopenadd'] = '1';
            $_POST['ropen'] = '';
        }
        if(!isset($_POST['showaddc'])) {
            $_POST['showaddc'] ='0';
        }
        if(!isset($_POST['showaddm'])) {
            $_POST['showaddm'] ='0';
        }
        if(!isset($_POST['showaddp'])) {
            $_POST['showaddp'] ='0';
        }

        $rs_saveaddgoogle->load($id);
        
      


        if (!$rs_saveaddgoogle->bind($_POST)) {
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
            case 'saveaddgoogle':
                default:
                    $msg = 'Saved';
                    $link = 'index.php?option=' . $option.'&task=addgoogle';
                    break;
            }
            // page redirect
            $app =& JFactory::getApplication();
            $app->redirect($link, 'Saved');
        }
    }
    ?>
