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
// Check to ensure this file is included in Joomla! No Direct Access
defined('_JEXEC') or die();

// Importing Default Joomla Component
jimport( 'joomla.application.component.model' );

/*
 * Model class for play skin
 */
class hdflvplayerModelplayerbase extends JModelLegacy
{
    
    function playerskin()
    {
        
        $playerpath = realpath(dirname(__FILE__) . '/../hdflvplayer/hdplayer.swf');
        $this->showplayer($playerpath);
       
    }

    function showplayer($playerpath)
    {
        
        ob_clean();
        header("content-type:application/x-shockwave-flash");
        readfile($playerpath);
        exit();
        
    }
}