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
defined( '_JEXEC' ) or die( 'Restricted access' );

//importing default joomla components
jimport( 'joomla.application.component.view');

/*
 * HDFLV player view class to call model functions for video details
 */
class hdflvplayerVieweditvideoupload extends JView
{
	//Function for displaying submenus in edit view
	function editvideouploadview()
	{
		$model = $this->getModel();
        $editvideo = $model->editvideouploadmodel();//Fetch Playlist,User Group, Pre roll, Post roll, Mid roll ads list
		$this->assignRef('editvideo', $editvideo);
		parent::display();
	}
	
    //Function for displaying submenus in add view
    function addvideouploadview()
	{
		    
        $model = $this->getModel();
        $addvideo = $model->addvideouploadmodel();//Fetch Playlist,User Group, Pre roll, Post roll, Mid roll ads list
		$this->assignRef('editvideo', $addvideo);
		parent::display();
	}

}
?>   
