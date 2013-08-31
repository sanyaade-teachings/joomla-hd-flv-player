<?php

/**
 * @version  $Id: configxml.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
// To execute the files outside joomla
defined('_JEXEC') or die();

// importing default joomla component
jimport('joomla.application.component.model');
jimport('joomla.application.component.modellist');
jimport( 'joomla.html.parameter' );

// generating player configuration file
class hdflvplayerModelconfigxml extends JModelList {

    var $current_path = "/";
    var $base;

    function configgetrecords() {
        global $mainframe;
        $base = JURI::base();
        $playid = 0;
        $playid_playlistname = 0;
        $mid = 0;
        $moduleid = 0;
        $comppid = 0;
        $this->$base = str_replace('components/com_hdflvplayer/models/', '', $base);
        $db = & JFactory::getDBO();
        $query = "select * from #__hdflvplayersettings";
        $db->setQuery($query);
        $settingsrows = $db->loadObjectList();
         $midrollads=true;

       

        //Playlist name id
        $playid_playlistname = JRequest::getvar('playid', '', 'get', 'var');
        if ($playid_playlistname)
            $playid_playlistname = $playid_playlistname;
        // Video id;
        $id = JRequest::getvar('id', '', 'get', 'int');
        if ($id)
            $playid = $id;
        // Module video id
        $videoid = JRequest::getvar('videoid', '', 'get', 'int');
        if ($videoid)
            $playid = $videoid;
        $comppid1 = JRequest::getvar('compid', '', 'get', 'int');
        if ($comppid1) {
            $comppid = $comppid1;
        }
        $itemid = 0;
        $rs_modulesettings = "";
        $moduleid = JRequest::getvar('mid', '', 'get', 'int');
        if ($moduleid) {
            $moduleid = $moduleid;
            $query = "SELECT id,params FROM `#__modules`
                where id=$moduleid and module='mod_hdflvplayer'";
            $db->setQuery($query);
            $rs_modulesettings = $db->loadObjectList();
                  $midrollads=false;

        }


        $current_path = "components/com_hdflvplayer/videos/";
        $hdvideo = "";
        $video = "";
        $previewimage = "";
        $hd_bol = "false";
       // echo $midadssrows[0]->midrollads;


       


        $this->configxml($rs_modulesettings, $settingsrows, $video, $previewimage, $hdvideo, $hd_bol, $playid, $itemid, $playid_playlistname, $moduleid, $comppid, $this->$base, $midrollads);
    }

      function configxml($rs_modulesettings, $settingsrows, $video, $previewimage, $hdvideo, $hd_bol, $playid, $itemid, $playid_playlistname, $moduleid, $comppid, $base, $allowmidrollads) {
        global $mainframe;
        $skin = $base . "/components/com_hdflvplayer/hdflvplayer/skin/" . $settingsrows[0]->skin;
        $playerdb = & JFactory::getDBO();
        $query = "select * from #__hdflvplayerupload where id=$playid";
        $playerdb->setQuery($query);
        $midadssrows = $playerdb->loadObjectList();

//        echo $playid.$settingsrows[0]->midrollads.'----'.$midadssrows[0]->midrollads.$midadssrows[0]->midrollid;
//        exit();

if($allowmidrollads==true)
{
   
       if(($settingsrows[0]->midrollads==0))
       {
           $midrollads="false";
       }
       else
       {
           $midrollads="true";
       }
       
}
else
{ 
    
       $midrollads="false";
}
       $stagecolor = "0x" . $settingsrows[0]->stagecolor;
         if ($settingsrows[0]->autoplay == 1)
            $autoplay = "true";
        else
            $autoplay="false";
        if ($settingsrows[0]->zoom == 1)
            $zoom = "true";
        else
            $zoom="false";
        if ($settingsrows[0]->fullscreen == 1)
            $fullscreen = "true";
        else
            $fullscreen="false";
        if ($settingsrows[0]->skin_autohide == 1)
            $skin_autohide = "true";
        else
            $skin_autohide="false";
        if ($settingsrows[0]->timer == 1)
            $timer = "true";
        else
            $timer="false";
        if ($settingsrows[0]->shareurl == 1)
            $share = "true";
        else
            $share="false";
        if ($settingsrows[0]->playlist_autoplay == 1)
            $playlist_autoplay = "true";
        else
            $playlist_autoplay="false";
        if ($settingsrows[0]->hddefault == 1)
            $hddefault = "true";
        else
            $hddefault="false";
        $playlistxml = "";
        $playlist = "false";
        if ($settingsrows[0]->related_videos == "1" || $settingsrows[0]->related_videos == "3") {
            $playlist = "true";
        }
        $license = "";
        if ($settingsrows[0]->licensekey != '')
            $license = $settingsrows[0]->licensekey;
        else
            $license="";
        $api = "php";
        ($settingsrows[0]->api == 0) ? $api = "php" : $api = "flash";
        $buffer = $settingsrows[0]->buffer;
        $normalscale = $settingsrows[0]->normalscale;
        $fullscreenscale = $settingsrows[0]->fullscreenscale;
        $volume = $settingsrows[0]->volume;
        $video1 = "";
        $playlist_open = "false";
        $postrollads = "false";
        $prerollads = "false";
        //$midrollads= "false";
        $ads = "false";
        $vast = "false";
        $vast_pid = 0;
        $vquality = "small";
        ($settingsrows[0]->playlist_open == 1) ? $playlist_open = "true" : $playlist_open = "false";
        ($settingsrows[0]->postrollads == 0) ? $postrollads = "false" : $postrollads = "true";
        ($settingsrows[0]->prerollads == 0) ? $prerollads = "false" : $prerollads = "true";
        ($settingsrows[0]->ads == 0) ? $ads = "false" : $ads = "true";
        ($settingsrows[0]->vast == 0) ? $vast = "false" : $vast = "true";
        
        ($settingsrows[0]->scaletohide == 0) ? $scaletohide = "false" : $scaletohide = "true";
        ($settingsrows[0]->embedcode_visible == 0) ? $embedcode_visible = "false" : $embedcode_visible = "true";
        ($settingsrows[0]->vquality == 1) ? $vquality = "small" : $vquality = "medium";
        $vast_pid = $settingsrows[0]->vast_pid;
        if ($rs_modulesettings != "") {
            $app = JFactory::getApplication();
            $params = $app->getParams('mod_hdflvplayer');
           
            $aparams = new JParameter($rs_modulesettings[0]->params,'');
            $params->merge($aparams);
             
            $playlist = $params->get('enablexml');
            ($playlist == 0) ? $playlist = "false" : $playlist = "true";
            $video1 = "";
            $videoid = "";
            $playid_playlistname = 0;
             $videocat = $params->get('videocat');
             $videoId = $params->get('videoid');
             $playlistId = $params->get('playlistid');
            ($videocat['videocat'] == 1) ? $videoid =$videoId['videoid'] : $playid_playlistname =$playlistId['playlistid'];
           
           
           
            $autoplay = $params->get('autoplay');
            ($autoplay == 0) ? $autoplay = "false" : $autoplay = "true";
            $playlistauto = $params->get('playlistauto');
            ($playlistauto == 0) ? $playlist_autoplay = "false" : $playlist_autoplay = "true";
            $buffer = $params->get('buffer');
            $height = $params->get('height');
            $width = $params->get('width');
            $normalscale = $params->get('normalscrenscale');
            $fullscreenscale = $params->get('fullscrenscale');
            $volume = $params->get('volume');
            $skinautohide = $params->get('skinautohide');
            ($skinautohide == 0) ? $skin_autohide = "false" : $skin_autohide = "true";
            $stagecolor = "0x" . $params->get('stagecolor');
            $fullscreen = $params->get('fullscreen');
            ($fullscreen == 0) ? $fullscreen = "false" : $fullscreen = "true";
            $zoom = $params->get('zoom');
            ($zoom == 0) ? $zoom = "false" : $zoom = "true";
            $timer = $params->get('timer');
            ($timer == 0) ? $timer = "false" : $timer = "true";
            $share = $params->get('share');
            ($share == 0) ? $share = "false" : $share = "true";
            $playlistopen = $params->get('playlist_open');
            ($playlistopen == 0) ? $playlist_open = "false" : $playlist_open = "true";
        }
        $playlistxml ="index.php?option=com_hdflvplayer&task=playxml";
        if ($moduleid != "") {
            if ($playid != "")
                $playlistxml = "index.php?option=com_hdflvplayer&task=playxml&id=$playid&mid=$moduleid";
            else
                
               $playlistxml="index.php?option=com_hdflvplayer&task=playxml&playid=$playid_playlistname&mid=$moduleid";
        }
        elseif ($playid_playlistname != "" && $playid != 0) {
            $playlistxml =  "index.php?option=com_hdflvplayer&task=playxml&playid=$playid_playlistname&id=$playid";
        } elseif ($playid != 0) {
            $playlistxml =  "index.php?option=com_hdflvplayer&task=playxml&id=$playid";
        }

        if ($playid_playlistname == "true" && $moduleid == "") {
            $playlistxml =  "index.php?option=com_hdflvplayer&task=playxml&id=$playid&playid=true";
        }
        if ($comppid != '') {
            $playlistxml = "index.php?option=com_hdflvplayer&task=playxml&compid=$comppid&id=$playid";
        }
   

// mid ads


         $midadsxml = "index.php?option=com_hdflvplayer&task=midrollxml";
       








//compid=$comppid&id=$playid&
        $emailpath = $base . "components/com_hdflvplayer/hdflvplayer/email.php";
        $logopath = $base . "/components/com_hdflvplayer/videos/" . $settingsrows[0]->logopath;
        $languagexml = "index.php?option=com_hdflvplayer&task=languagexml";
        $adsxml = "index.php?option=com_hdflvplayer&task=adsxml";
        //$midadsxml = $base . "index.php?option=com_hdflvplayer&task=midrollxml";
        $videoshareurl = "index.php?option=com_hdflvplayer&task=videourl";
        $locaiton = $base . "index.php?option=com_hdflvplayer";
        $cssurl = $base . "components/com_hdflvplayer/hdflvplayer/css/midrollformat.css";
        $language = JRequest::getVar('lang');
        $app = JFactory::getApplication();
        $router = $app->getRouter();
        $sefURL = $router->getMode();
        if($sefURL!=1)
        {
            if ($language != '') {
           $language ='&lang='. $language;
            }
        }

        //ob_clean();
        header("content-type:text/xml;charset=utf-8");
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<config
              license="' . $license . '"
              autoplay="' . $autoplay . '"
              playlist_open="' . $playlist_open . '"
              playlist_autoplay="' . $playlist_autoplay . '"
              buffer="' . $buffer . '"
              normalscale="' . $normalscale . '"
              fullscreenscale="' . $fullscreenscale . '"
              logopath="' . $logopath . '"
              logo_target="' . $settingsrows[0]->logourl . '"
              logoalign="' . $settingsrows[0]->logoalign . '"
              Volume="' . $settingsrows[0]->volume . '"
              preroll_ads="' . $prerollads . '"
              midroll_ads="' . $midrollads . '"
              postroll_ads="' . $postrollads . '"
              HD_default="' . $hddefault . '"
              Download="false"
              logoalpha="' . $settingsrows[0]->logoalpha . '"
              skin_autohide="' . $skin_autohide . '"
              stagecolor="' . $stagecolor . '"
              skin="' . $skin . '"
              embed_visible="' . $embedcode_visible . '"
              playlistXML="' . $playlistxml . '"
              adXML="' . JRoute::_($adsxml) . '"
              midrollXML="' .JRoute::_($midadsxml). '"
              languageXML="' . JRoute::_($languagexml) . '"
              cssURL="' . $cssurl . '"
              debug="true"
              shareURL="' . $emailpath . '"
              videoshareURL="' . JRoute::_($videoshareurl) . '"
              showPlaylist="' . $playlist . '"
               vast_partnerid="' . $vast_pid . '"
              vast="' . $vast . '"
              location="' . $locaiton . '"
              UseYouTubeApi="' . $api . '"
              registerpage="' . $settingsrows[0]->urllink . '"
              scaleToHideLogo="' . $scaletohide . '"
              suggestedquality="' . $vquality . '"
              location="' . $locaiton . '">';
        echo '<timer>' . $timer . '</timer>';
        echo '<zoom>' . $zoom . '</zoom>';
        echo '<email>' . $share . '</email>';
        echo '<fullscreen>' . $fullscreen . '</fullscreen>';
        echo '</config>';
        exit();
    }
}
?>