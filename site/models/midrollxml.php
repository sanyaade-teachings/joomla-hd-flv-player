<?php

/**
 * @version  $Id:playxml.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// implementing default component
jimport('joomla.application.component.model');

class hdflvplayerModelmidrollxml extends JModel {

	//Funtion to get ads from the database.
    function getads() {

        global $mainframe;
        $db =& JFactory::getDBO();
        $playlistid=0;
        $mid=0;
        $itemid=0;
        $rs_modulesettings="";
        $moduleid=0;
        $id=0;
        $playlistautoplay="false";
        $postrollads="false";
        $prerollads="false";
        $videoid=0;
        $home_bol="false";
        $playlistrandom="false";


 $query="SELECT a.* FROM `#__hdflvplayerads` as a WHERE a.published=1 and typeofadd='mid' ";
 $db->setQuery($query);

$rs_modulesettings = $db->loadObjectList();

     $qry_settings = "select * from #__hdflvplayersettings LIMIT 1 "; //and home=1";//and id=11;";
        $db->setQuery($qry_settings);

            $rs_random = $db->loadObjectList();
            $random = $rs_random[0]->random;
            $adrotate = $rs_random[0]->midadrotate;
            $interval = $rs_random[0]->midinterval;
            $begin = $rs_random[0]->midbegin;
            ($random == 1) ? $random = "true" : $random = "false";
            ($adrotate == 1) ? $adrotate = "true" : $adrotate = "false";
            //print_r($rs_modulesettings);
            //exit();

            if($rs_modulesettings)
            {
            $this->showadsxml($rs_modulesettings, $random, $begin, $interval, $adrotate);
            }

        }
    
	//Function to display the ads in the video.
    function showadsxml($midroll_video, $random, $begin, $interval, $adrotate) {
        ob_clean();
        header("content-type: text/xml");
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<midrollad begin="' . $begin . '" adinterval="' . $interval . '" random="' . $random . '" adrotate="' . $adrotate . '">';
        $current_path = "components/com_hdflvplayer/videos/";
       if (count($midroll_video) > 0) {
            foreach ($midroll_video as $rows) {
if($rows->clickurl=='')
       $clickpath = JURI::base() . '?option=com_hdflvplayer&task=impressionclicks&click=click&id='.$rows->id;
else
$clickpath = $rows->clickurl;

if($rows->impressionurl=='')
        $impressionpath = JURI::base() . '?option=com_hdflvplayer&task=impressionclicks&click=impression&id='.$rows->id;
else
$impressionpath = $rows->impressionurl;

                //echo '<midroll videoid="' . $rows->vid . '" targeturl="' . $rows->targeturl . '" clickurl="' . $clickpath . '" impressionurl="' . $impressionpath . '">';
                echo '<midroll targeturl="' . $rows->targeturl . '" clickurl="' . $clickpath . '" impressionurl="' . $impressionpath . '" >';
                echo '<![CDATA[';
                echo '<span class="heading">' . $rows->adsname;
                echo '</span><br><span class="midroll">' . $rows->adsdesc;
                echo '</span><br><span class="webaddress">'. $rows->targeturl;
                echo '</span>]]>';
                echo '</midroll>';
            }
        }
        echo '</midrollad>';
        exit();
    }
}