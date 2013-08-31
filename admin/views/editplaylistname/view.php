<?php

/**
 * @name 	        hdflvplayer
 * @version	        2.0
 * @package	        Apptha
 * @since	        Joomla 1.5
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2011 Powered by Apptha
 * @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      	com_hdflvplayer installation file.
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

//importing default joomla component
jimport('joomla.application.component.view');

/*
 * HDFLV player view class to call model functions for playlist details
 */
class hdflvplayerVieweditplaylistname extends JView {
	
	//function for edit playlistname
    function editplaylistview() {
		
    	$model = $this->getModel();
        $editplaylist = $model->editplaylistmodel();
        $this->assignRef('editplaylist', $editplaylist);
        parent::display();
    }
	
    //function for add playlistname
    function playlistnameadd() {
    	    	
        $model = $this->getModel();
        $addplaylist = $model->playlistnameadd();
        $this->assignRef('editplaylist', $addplaylist);
        parent::display();
    }

}

?>
