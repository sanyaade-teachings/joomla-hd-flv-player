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
// To execute the files outside joomla
defined('_JEXEC') or die();

// importing default joomla component
jimport('joomla.application.component.model');
jimport('joomla.application.component.modellist');
jimport('joomla.html.parameter');

/*
 * Class for generating player configuration xml
 */

class hdflvplayerModelconfigxml extends JModel {

    //Function to get player settings
    function configgetrecords() {
        $base = JURI::base();
        $playid = $playid_playlistname = $mid = $moduleid = $comppid = 0;
        $rs_moduleparams = '';

        $db = JFactory::getDBO();
        $query = 'SELECT `id`, `published`, `buffer`, `normalscale`, `fullscreenscale`, `autoplay`,
						 `volume`, `logoalign`, `logoalpha`, `skin_autohide`, `stagecolor`, `skin`,
						 `embedpath`, `fullscreen`, `zoom`, `width`, `height`, `uploadmaxsize`, `ffmpegpath`,
						 `ffmpeg`, `related_videos`, `timer`, `logopath`, `logourl`, `nrelated`, `shareurl`,
						 `playlist_autoplay`, `hddefault`, `ads`, `prerollads`, `postrollads`, `random`, `midrollads`,
						 `midbegin`, `midinterval`, `midrandom`, `googleanalyticsID`, `googleana_visible`, `midadrotate`,
						 `playlist_open`, `licensekey`, `vast`, `vast_pid`, `api`, `description`, `urllink`, `scaletohide`,
						 `title_ovisible`, `description_ovisible`, `playlist_dvisible`, `embedcode_visible`, `viewed_visible`,
						  `playlistrandom`, `vquality` FROM `#__hdflvplayersettings`';
        $db->setQuery($query);
        $settingsrows = $db->loadObject();

        $midrollads = true;

        //Playlist id
        $playid_playlistname = JRequest::getvar('playid', '', 'get', 'var');

        // Video id;
        $id = JRequest::getvar('id', '', 'get', 'int');
        if ($id) {
            $playid = $id;
        }

        // Module video id
        $videoid = JRequest::getvar('videoid', '', 'get', 'int');
        if ($videoid) {
            $playid = $videoid;
        }

        //fetch playlist id from URL parameter
        $comppid = JRequest::getvar('compid', '', 'get', 'int');

        //Fetch module id and the parameter settings
        $moduleid = JRequest::getvar('mid', '', 'get', 'int');
         if ($moduleid) {
            $moduleid = $moduleid;
            $query = "SELECT id,params FROM `#__modules`
                where id=$moduleid and module='mod_hdflvplayer'";
            $db->setQuery($query);
            $rs_moduleparams = $db->loadObjectList();
                  $midrollads=false;

        }

        $current_path = 'components/com_hdflvplayer/videos/';

        $this->configxml($rs_moduleparams, $settingsrows, $playid, $playid_playlistname, $moduleid, $comppid, $base, $midrollads);
    }

    //function to generate configxml
    function configxml($rs_moduleparams, $settingsrows, $playid, $playid_playlistname, $moduleid, $comppid, $base, $allowmidrollads) {

        //Declaration here
        $skin = $base . 'components/com_hdflvplayer/hdflvplayer/skin/' . $settingsrows->skin;
        $playerdb = JFactory::getDBO();
        $playlist_open = $postrollads = $prerollads = $ads = $vast = $autoplay = $zoom = $fullscreen = $skin_autohide = $timer = $share = $playlist_autoplay = $hddefault = $playlist = false;
        $playlistxml = $vquality = $videoid = '';
        $vast_pid = $playid_playlistname = 0;

        //Check whether the mid-roll ad enabled or not.
        if ($allowmidrollads == 'true') {
            if (($settingsrows->midrollads == 0)) {
                $midrollads = 'false';
            } else {
                $midrollads = 'true';
            }
        } else {
            $midrollads = 'false';
        }

        //Fetch Player settings and assigns into variable.
        $stagecolor = "0x" . $settingsrows->stagecolor;

        ($settingsrows->autoplay == 1) ? $autoplay = 'true' : $autoplay = 'false';

        ($settingsrows->zoom == 1) ? $zoom = 'true' : $zoom = 'false';

        ($settingsrows->fullscreen == 1) ? $fullscreen = 'true' : $fullscreen = 'false';

        ($settingsrows->skin_autohide == 1) ? $skin_autohide = 'true' : $skin_autohide = 'false';

        ($settingsrows->timer == 1) ? $timer = 'true' : $timer = 'false';

        ($settingsrows->shareurl == 1) ? $share = 'true' : $share = 'false';

        ($settingsrows->playlist_autoplay == 1) ? $playlist_autoplay = 'true' : $playlist_autoplay = 'false';

        ($settingsrows->hddefault == 1) ? $hddefault = 'true' : $hddefault = 'false';

        ($settingsrows->related_videos == '1' || $settingsrows->related_videos == '3') ? $playlist = 'true' : $playlist = 'false';

        ($settingsrows->licensekey != '') ? $license = $settingsrows->licensekey : $license = '';

        ($settingsrows->playlist_open == 1) ? $playlist_open = 'true' : $playlist_open = 'false';

        ($settingsrows->postrollads == 0) ? $postrollads = 'false' : $postrollads = 'true';

        ($settingsrows->prerollads == 0) ? $prerollads = 'false' : $prerollads = 'true';

        ($settingsrows->ads == 0) ? $ads = 'false' : $ads = 'true';

        ($settingsrows->vast == 0) ? $vast = 'false' : $vast = 'true';

        ($settingsrows->midrollads == 0) ? $midrollads = 'false' : $midrollads = 'true';

        ($settingsrows->scaletohide == 0) ? $scaletohide = 'false' : $scaletohide = 'true';

        ($settingsrows->embedcode_visible == 0) ? $embedcode_visible = 'false' : $embedcode_visible = 'true';

        ($settingsrows->vquality == 1) ? $vquality = 'small' : $vquality = 'medium';

        $api = 'php';
        ($settingsrows->api == 0) ? $api = 'php' : $api = 'flash';

        //Fetch buffer,screen scale, volume
        $buffer = $settingsrows->buffer;
        $normalscale = $settingsrows->normalscale;
        $fullscreenscale = $settingsrows->fullscreenscale;
        $volume = $settingsrows->volume;

        $vast_pid = $settingsrows->vast_pid;

        $playlistxml = $base . 'components/com_hdflvplayer/models/playxml.php';
        if ($rs_moduleparams != '') {
            $app = JFactory::getApplication();
            $params = $app->getParams('mod_hdflvplayer');
            $aparams = new JParameter($rs_moduleparams[0]->params,'');
            $params->merge($aparams);


            $playlist = $params->get('enablexml');
            ($playlist == 0) ? $playlist = 'false' : $playlist = 'true';

            //Getting admin param settings
            $videocat = $params->get('videocat');
            $videoId = $params->get('videoid');
            $playlistId = $params->get('playlistid');
            $autoplay = $params->get('autoplay');
            $playlist_autoplay = $params->get('playlistauto');
            $buffer = $params->get('buffer');
            $height = $params->get('height');
            $width = $params->get('width');
            $normalscale = $params->get('normalscrenscale');
            $fullscreenscale = $params->get('fullscrenscale');
            $volume = $params->get('volume');
            $skinautohide = $params->get('skinautohide');
            $fullscreen = $params->get('fullscreen');
            $zoom = $params->get('zoom');
            $timer = $params->get('timer');
            $share = $params->get('share');
            $playlistopen = $params->get('playlist_open');
            $stagecolor = "0x" . $params->get('stagecolor');

            ($videocat['videocat'] == 1) ? $videoid = $videoId['videoid'] : $playid_playlistname = $playlistId['playlistid'];

            ($autoplay == 0) ? $autoplay = "false" : $autoplay = 'true';

            ($playlist_autoplay == 0) ? $playlist_autoplay = 'false' : $playlist_autoplay = 'true';

            ($skinautohide == 0) ? $skin_autohide = 'false' : $skin_autohide = 'true';

            ($fullscreen == 0) ? $fullscreen = 'false' : $fullscreen = 'true';

            ($zoom == 0) ? $zoom = 'false' : $zoom = 'true';

            ($timer == 0) ? $timer = 'false' : $timer = 'true';

            ($share == 0) ? $share = 'false' : $share = 'true';

            ($playlistopen == 0) ? $playlist_open = 'false' : $playlist_open = 'true';
        }

        $playlistxml = $base . 'index.php?option=com_hdflvplayer&task=playxml';

        if ($moduleid != '') {
            if ($playid != '') {
                $playlistxml = $base . 'index.php?option=com_hdflvplayer&task=playxml&id=' . $playid . '&mid=' . $moduleid;
            } else {
                $playlistxml = $base . 'index.php?option=com_hdflvplayer&task=playxml&playid=' . $playid_playlistname . '&mid=' . $moduleid;
            }
        } elseif ($playid_playlistname != '' && $playid != 0) {
            $playlistxml = $base . 'index.php?option=com_hdflvplayer&task=playxml&playid=' . $playid_playlistname . '&id=' . $playid;
        } elseif ($playid != 0) {
            $playlistxml = $base . 'index.php?option=com_hdflvplayer&task=playxml&id=' . $playid;
        }

        if ($playid_playlistname == 'true' && $moduleid == '') {
            $playlistxml = $base . 'index.php?option=com_hdflvplayer&task=playxml&id=' . $playid . '&playid=true';
        }
        if ($comppid != '') {
            $playlistxml = $base . 'index.php?option=com_hdflvplayer&task=playxml&compid=' . $comppid . '&id=' . $playid;
        }

        $midadsxml = $base . 'index.php?option=com_hdflvplayer&task=midrollxml';

        $emailpath = $base . 'components/com_hdflvplayer/hdflvplayer/email.php';
        $logopath = $base . 'components/com_hdflvplayer/videos/' . $settingsrows->logopath;
        $languagexml = $base . 'index.php?option=com_hdflvplayer&task=languagexml';
        $adsxml = $base . 'index.php?option=com_hdflvplayer&task=adsxml';

        $videoshareurl = $base . 'index.php?option=com_hdflvplayer&task=videourl';
        $locaiton = $base . 'index.php?option=com_hdflvplayer';
        $cssurl = $base . 'components/com_hdflvplayer/hdflvplayer/css/midrollformat.css';
        $language = JRequest::getVar('lang');
        $app = JFactory::getApplication();
        $router = $app->getRouter();
        $sefURL = $router->getMode();

        //Check whether SEF enabled or not
        if ($sefURL != 1) {
            if ($language != '') {
                $language = '&lang=' . $language;
            }
        }

        //Generates configxml here
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
              logo_target="' . $settingsrows->logourl . '"
              logoalign="' . $settingsrows->logoalign . '"
              Volume="' . $settingsrows->volume . '"
              preroll_ads="' . $prerollads . '"
              midroll_ads="' . $midrollads . '"
              postroll_ads="' . $postrollads . '"
              HD_default="' . $hddefault . '"
              Download="false"
              logoalpha="' . $settingsrows->logoalpha . '"
              skin_autohide="' . $skin_autohide . '"
              stagecolor="' . $stagecolor . '"
              skin="' . $skin . '"
              embed_visible="' . $embedcode_visible . '"
              playlistXML="' . $playlistxml . '"
              adXML="' . JRoute::_($adsxml) . '"
              midrollXML="' . $midadsxml . '"
              languageXML="' . JRoute::_($languagexml) . '"
              cssURL="' . $cssurl . '"
              debug="true"
              shareURL="' . $emailpath . '"
              videoshareURL="' . JRoute::_($videoshareurl) . '"
              showPlaylist="' . $playlist . '"
               vast_partnerid="' . $vast_pid . '"
              vast="' . $vast . '"
              UseYouTubeApi="' . $api . '"
              registerpage="' . $settingsrows->urllink . '"
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