<?php
/**
 * @version		$Id: removelanguage.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelremovelanguage extends JModel {


	function removelanguage()
    {
        global $mainframe;
        $option= 'com_hdflvplayer';
        $cid = JRequest::getVar( 'cid', array(), '', 'array' );
        $db =& JFactory::getDBO();
        $cids = implode( ',', $cid );
        if(count($cid))
        {
            $cids = implode( ',', $cid );
            $query = "DELETE FROM #__hdflvplayerlanguage WHERE id IN ( $cids )";
            $db->setQuery( $query );
            if (!$db->query())
            {
                echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
            }
        }
        // page redirec
        $link='index.php?option=' . $option.'&task=languagesetup';
         JFactory::getApplication()->redirect($link, $msg);
        
    }
}
?>
