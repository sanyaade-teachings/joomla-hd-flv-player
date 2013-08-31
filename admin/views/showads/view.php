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
 * HDFLV player view class to call model functions to diplay Ads list
 */
class hdflvplayerViewshowads extends JView
{
	
	//Function to display submenu and model function calling for show Ads
	function showads()
	{
			
        //Model function calling and assign result set to display
        $model = $this->getModel();
        $showads = $model->showadsmodel();
		$this->assignRef('showads', $showads);
		parent::display();
	}
    
}
?>   
