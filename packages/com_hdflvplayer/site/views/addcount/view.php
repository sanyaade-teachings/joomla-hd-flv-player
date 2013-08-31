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

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

//Imports for joomla libraries 
jimport( 'joomla.application.component.view');

/*
 * HDFLV player view class for Add count for videos
 */
class hdflvplayerViewaddcount extends JViewLegacy
{

	function getaddview()
	{
        $model =$this->getModel();
		$detail = $model->getviewcount();
       
	}

}
?>   
