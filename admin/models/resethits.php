<?php
/**
 * @version		$Id: resethits.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelresethits extends JModel {
	
	//Function to reset the view hits of video in database.
    function resethitsmodel($task)
    {
        global $mainframe;
        $db	= & JFactory::getDBO();
        $rs_reset =& JTable::getInstance('hdflvplayerupload', 'Table');
        $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
        $id = $cid[0];
        $cids = implode( ',', $cid );

        $query = "update #__hdflvplayerupload set times_viewed=0 WHERE id IN ( $cids )";
        $db->setQuery( $query );
        $db->query();
        $msg = JText::_('Successfully Reset viewed count');
        $link = 'index.php?option=com_hdflvplayer&task=uploadvideos';
        JFactory::getApplication()->redirect($link, $msg);
        
    }

}
?>
