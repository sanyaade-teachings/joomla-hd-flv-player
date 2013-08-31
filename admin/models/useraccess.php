<?php
/**
 * @version	$Id: useraccess.php 1.5,  28-Feb-2011 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModeluseraccess extends JModel {


    function useraccessmodel($id, $access )
    {
       global $mainframe;

	// Check for request forgeries
        
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db =& JFactory::getDBO();
    $id=$id[0];

	$row =& JTable::getInstance('hdflvplayerupload', 'Table');
	$row->load( $id );
	$row->access = $access;

	if ( !$row->check() ) {
		return $row->getError();
	}
	if ( !$row->store() ) {
		return $row->getError();
	}
        $link= 'index.php?option=com_hdflvplayer&task=uploadvideos';
        JFactory::getApplication()->redirect($link, $msg);
	

    }


    
}
?>
