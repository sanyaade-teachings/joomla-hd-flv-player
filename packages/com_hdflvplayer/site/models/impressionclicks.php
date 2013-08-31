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

// implementing default component libraries
jimport('joomla.application.component.model');

/*
 * HDFLV player component class for Update Impression and clicks count 
 */
class hdflvplayerModelimpressionclicks extends JModelLegacy {

	//Function to update impression and click count for video
    function impressionclicks()
    {
        
        $db = JFactory::getDBO();
        $click = JRequest::getVar( 'click', 'get' , '', 'string' );
        $id = JRequest::getVar( 'id', 'get' , '', 'int' );
		
        //Update Clicks count here
        if($click != 'click')
        {
        $query = "UPDATE #__hdflvplayerads SET clickcounts = clickcounts+1  WHERE `id` = $id";
        }
        //Update Impression count here
        else
        {
        $query = "UPDATE #__hdflvplayerads SET impressioncounts= impressioncounts+1 WHERE `id` = $id";
        }
        
        $db->setQuery($query );
        $db->query();

        exit();

    }
}
?>
