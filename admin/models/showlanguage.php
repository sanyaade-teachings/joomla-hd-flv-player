<?php
/**
 * @version		$Id: showlanguage.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelshowlanguage extends JModel {


	function showlanguagemodel()
    {
        
        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__hdflvplayerlanguage";
        $db->setQuery( $query);
        $rs_showlanguagesetup = $db->loadObjectList();

        return $rs_showlanguagesetup;

	}

    function savelanguagesetup($task)
    {
        global $option,$mainframe;
        $option= 'com_hdflvplayer';
        $db =& JFactory::getDBO();
        $rs_save =& JTable::getInstance('hdflvplayerlanguage', 'Table');
        $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
        $id = $cid[0];
        $rs_save->load($id);
        if (!$rs_save->bind(JRequest::get('post')))
        {
            echo "<script> alert('".$rs_save->getError()."');window.history.go(-1); </script>\n";
            exit();
        }
        if (!$rs_save->store()) {
            echo "<script> alert('".$rs_save->getError()."'); window.history.go(-1); </script>\n";
            exit();
        }
        switch ($task)
        {
            case 'applylanguagesetup':
                $msg = 'Changes Saved';
                $link = 'index.php?option=' . $option .'&task=editlanguagesetup&cid[]='. $rs_save->id;
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
