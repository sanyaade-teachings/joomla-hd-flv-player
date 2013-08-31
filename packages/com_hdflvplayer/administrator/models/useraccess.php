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

jimport('joomla.application.component.model');

class hdflvplayerModeluseraccess extends JModelLegacy {


    function useraccessmodel($id, $access )
    {
       global $mainframe;

	// Check for request forgeries
        
	JRequest::checkToken() or jexit( 'Invalid Token' );

	// Initialize variables
	$db =JFactory::getDBO();
    $id=$id[0];

	$row =JTable::getInstance('hdflvplayerupload', 'Table');
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
