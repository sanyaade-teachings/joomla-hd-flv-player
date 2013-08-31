<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.1
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

// Check to ensure this file is included in Joomla! No Direct Access
defined('_JEXEC') or die();

// Importing Default Joomla Component
jimport('joomla.application.component.model');

/*
 * Model class for generating adsxml
 */
class hdflvplayerModeladsxml extends HdflvplayerModel {

    function getads() {
        $db = JFactory::getDBO();
        
        //Fetch all Pre/Post Ads here
        $query_ads = 'SELECT `id`, `published`, `adsname`, `filepath`, `postvideopath`, `home`, `targeturl`, `clickurl`,
        `impressionurl`, `impressioncounts`, `clickcounts`, `adsdesc`, `typeofadd` FROM `#__hdflvplayerads`
        WHERE published=1 and typeofadd=\'prepost\''; //and home=1";//and id=11;";
        $db->setQuery($query_ads);
        $rs_ads = $db->loadObjectList();
        
        //Fetch Random from Player settings. 
        $qry_settings = "select random from #__hdflvplayersettings"; //and home=1";//and id=11;";
        $db->setQuery($qry_settings);
        $random = $db->loadResult();
        
        //Checks if random enabled or not. 
        ($random == 1) ? $random = "true" : $random = "false";
        $this->showadsxml($rs_ads, $random);
    }
	
    //Function to generate Adsxml for Pre-roll/Post-roll Ads
    function showadsxml($rs_ads, $random) {
        ob_clean();
        header("content-type: text/xml");
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<ads random="' . $random . '">';
        $current_path = "components/com_hdflvplayer/videos/";
        $clickpath = JURI::base() . '?option=com_hdflvplayer&task=impressionclicks&click=click';
        $impressionpath = JURI::base() . '?option=com_hdflvplayer&task=impressionclicks&click=impression';

        if (count($rs_ads) > 0) {
            foreach ($rs_ads as $rows) {
                //Checks for Ads file is from URL or File
                if ($rows->filepath == "File") {
                    $postvideo = JURI::base() . $current_path . $rows->postvideopath;
                    
                } elseif ($rows->filepath == "Url") {
                    $postvideo = $rows->postvideopath;
                    
                }
                //Generates XML tags for Ads here
                echo '<ad id="' . $rows->id . '" url="' . $postvideo . '" targeturl="' . $rows->targeturl . '" clickurl="' . $clickpath . '" impressionurl="' . $impressionpath . '">';
                echo '<![CDATA[' . $rows->adsname . ']]>';
                echo '</ad>';
            }
        }
        echo '</ads>';

        exit();
    }

}