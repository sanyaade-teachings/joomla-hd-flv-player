<?php

/**
 * @version  $Id: adsxml.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */

/*
 * Description : getads()
 *  This Function Call To UserDefined Ads Function
 */

// Check to ensure this file is included in Joomla! No Direct Access
defined('_JEXEC') or die();

// Importing Default Joomla Component
jimport('joomla.application.component.model');

class hdflvplayerModeladsxml extends JModel {

    //Function to get ads content from database.
    function getads() {
        $db = & JFactory::getDBO();
        $query_ads = "select * from #__hdflvplayerads where published=1 and typeofadd='prepost' "; //and home=1";//and id=11;";
        $db->setQuery($query_ads);
        $rs_ads = $db->loadObjectList();
        $qry_settings = "select * from #__hdflvplayersettings LIMIT 1 "; //and home=1";//and id=11;";
        $db->setQuery($qry_settings);
        $rs_random = $db->loadObjectList();
        $random = $rs_random[0]->random;
       ($random == 1) ? $random = "true" : $random = "false";
        $this->showadsxml($rs_ads, $random);
    }
	
    //Function to display the ads content.
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
                $timage = "";
                if ($rows->filepath == "File") {
                    $postvideo = JURI::base() . $current_path . $rows->postvideopath;
                    //$prevideo=JURI::base().$current_path.$rows->prevideopath;
                } elseif ($rows->filepath == "Url") {
                    $postvideo = $rows->postvideopath;
                    // $prevideo=$rows->prevideopath;
                }
                echo '<ad id="' . $rows->id . '" url="' . $postvideo . '" targeturl="' . $rows->targeturl . '" clickurl="' . $clickpath . '" impressionurl="' . $impressionpath . '">';
                echo '<![CDATA[' . $rows->adsname . ']]>';
                echo '</ad>';
            }
        }
        echo '</ads>';

        exit();
    }

}