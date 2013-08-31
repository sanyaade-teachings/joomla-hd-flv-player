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
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

//imports joomla libraries
jimport('joomla.application.component.model');
jimport('joomla.application.component.modellist');
jimport('joomla.html.parameter');

/*
 * hdflvplayer model Class for generate playxml
 */

class hdflvplayerModelplayxml extends HdflvplayerModel {

    function playgetrecords() {

        //Variable declarations here
        $db = JFactory::getDBO();
        $playlistid = $mid = $itemid = $moduleid = $id = $videoid = 0;
        $rs_modulesettings = '';
        $playlistautoplay = $postrollads = $prerollads = $home_bol = $playlistrandom = 'false';
        $hddefault = '';
        //Getting necessary inputs
        $moduleid = JRequest::getvar('mid', '', 'get', 'int');
        $playlistid = JRequest::getvar('playid', '', 'get', 'var');
        $videoid = JRequest::getvar('id', '', 'get', 'int');
        $compid = JRequest::getvar('compid', '', 'get', 'int');

        if (version_compare(JVERSION, '3.0.0', 'ge')){
            $moduleid = JRequest::getvar('mid');
        $playlistid = JRequest::getvar('playid');
        $videoid = JRequest::getvar('id');
        $compid = JRequest::getvar('compid');
        }
        //Fetch player settings
        $qry_settings = 'SELECT `playlist_autoplay`, `description_ovisible`,`hddefault`
        			  FROM `#__hdflvplayersettings`';
        $db->setQuery($qry_settings);
        $rs_settings = $db->loadObject();

        //Fetch autoplay, description visibility settings
        if (!empty($rs_settings)) {
            $playlistautoplay = ($rs_settings->playlist_autoplay == 1) ? $playlistautoplay = 'true' : $playlistautoplay = 'false';
            $descriptionenabled = ($rs_settings->description_ovisible == 1) ? $description_ovisible = 'true' : $description_ovisible = 'false';
            $hddefault = ($rs_settings->hddefault);
        }

        //Checks whether Module's video then, fetch settings from module params.
        if ($moduleid != 0) {
            $moduleid = $moduleid;
            $query = 'SELECT params FROM `#__modules`
                		WHERE id=' . $moduleid;
            $db->setQuery($query);
            $rs_modulesettings = $db->loadResult();
            $app = JFactory::getApplication();
            $params = $app->getParams('mod_hdflvplayer');
            if(!version_compare(JVERSION, '3.0.0', 'ge')) {
            $aparams = new JParameter($rs_modulesettings);
            }else{
                 $aparams = new JRegistry($rs_modulesettings);
            }
            $params->merge($aparams);
            $playlist = $params->get('playlistauto');
            ($playlist == 0) ? $playlistautoplay = 'false' : $playlistautoplay = 'true';
            $descripbelow = $params->get('descripbelow');
            ($descripbelow == 0) ? $description_ovisible = 'false' : $description_ovisible = 'true';
        }

        //getting playlist id
        if ($compid) {
            $playlistid = $compid;
        }

        //Fetch video details
        if ($videoid != '') {
             $query = 'SELECT a.`id`, a.`title`, a.`filepath`, a.`videourl`,a.`thumburl`, a.`previewurl`, a.`hdurl`,
			a.`playlistid`,a.`streamerpath`, a.`streameroption`, a.`postrollads`, a.`prerollads`, a.`midrollads`,
			a.`description`,a.`targeturl`, a.`download`, a.`prerollid`, a.`postrollid`, a.`access`, a.`islive`,
                        b.`name`,c.`adsname`,c.`typeofadd`
                        FROM `#__hdflvplayerupload` as a
                        LEFT JOIN #__hdflvplayername as b on a.playlistid=b.id
                        LEFT JOIN #__hdflvplayerads AS c ON a.prerollid = c.id
                        LEFT JOIN #__hdflvplayerads AS d ON a.postrollid = d.id
			WHERE a.published=1 AND a.id=' . $videoid;

            $db->setQuery($query);
            $rows = $db->loadObjectList();
            if (count($rows) > 0) {
                 $query = 'SELECT a.`id`, a.`title`, a.`filepath`, a.`videourl`,a.`thumburl`, a.`previewurl`, a.`hdurl`,
			a.`playlistid`,a.`streamerpath`, a.`streameroption`, a.`postrollads`, a.`prerollads`, a.`midrollads`,
			a.`description`,a.`targeturl`, a.`download`, a.`prerollid`, a.`postrollid`, a.`access`, a.`islive`,
			b.`name`,c.`adsname`,c.`typeofadd`
            FROM `#__hdflvplayerupload` as a LEFT JOIN #__hdflvplayername as b on a.playlistid=b.id
            LEFT JOIN #__hdflvplayerads AS c ON a.prerollid = c.id
            LEFT JOIN #__hdflvplayerads AS d ON a.postrollid = d.id
            WHERE a.published=1 AND a.id !=' . $videoid . ' AND b.id=' . $rows[0]->playlistid;

                $db->setQuery($query);
                $playlist = $db->loadObjectList();
            }
        }

        //if playlist id exist, fetch the vidoes and their details of the playlist
        else if ($playlistid != '') {
            if ($playlistid == 0) {
                $where = ' ORDER BY ordering ASC';
            } else {
                $where = ' AND a.playlistid=' . $playlistid . ' ORDER BY ordering ASC';
            }
             $query = 'SELECT a.`id`,  a.`title`, a.`filepath`, a.`videourl`, a.`thumburl`, a.`previewurl`, a.`hdurl`,
			a.`playlistid`,a.`streamerpath`, a.`streameroption`, a.`postrollads`, a.`prerollads`, a.`midrollads`,
			a.`description`,a.`targeturl`, a.`download`, a.`prerollid`, a.`postrollid`, a.`access`, a.`islive`,
			b.`name`,c.`adsname`,c.`typeofadd`
            FROM `#__hdflvplayerupload` as a LEFT JOIN #__hdflvplayername as b on a.playlistid=b.id
            LEFT JOIN #__hdflvplayerads AS c ON a.prerollid = c.id
            LEFT JOIN #__hdflvplayerads AS d ON a.postrollid = d.id
            WHERE a.published=1 ' . $where;

            $db->setQuery($query);
            $playlist = $db->loadObjectList();
        } else {
            //Query to fetch default video
               $query = 'SELECT a.`id`,  a.`title`, a.`filepath`, a.`videourl`, a.`thumburl`, a.`previewurl`, a.`hdurl`,
			a.`playlistid`,a.`streamerpath`, a.`streameroption`, a.`postrollads`, a.`prerollads`, a.`midrollads`,
			a.`description`,a.`targeturl`, a.`download`, a.`prerollid`, a.`postrollid`, a.`access`, a.`islive`,
			b.`name`,c.`adsname`,c.`typeofadd`
            FROM `#__hdflvplayerupload` as a LEFT JOIN #__hdflvplayername as b on a.playlistid=b.id
            LEFT JOIN #__hdflvplayerads AS c ON a.prerollid = c.id
            LEFT JOIN #__hdflvplayerads AS d ON a.postrollid = d.id
            WHERE a.published=1  AND a.home=1';
            $db->setQuery($query);
            $rows = $db->loadObjectList();

            //If default video not exist then, fetch 1st video
             if (empty($rows)) {
                 $query = 'SELECT a.`id`,  a.`title`, a.`filepath`, a.`videourl`, a.`thumburl`, a.`previewurl`, a.`hdurl`,
			a.`playlistid`,a.`streamerpath`, a.`streameroption`, a.`postrollads`, a.`prerollads`, a.`midrollads`,
			a.`description`,a.`targeturl`, a.`download`, a.`prerollid`, a.`postrollid`, a.`access`, a.`islive`,
			b.`name`,c.`adsname`,c.`typeofadd`
            FROM `#__hdflvplayerupload` as a LEFT JOIN #__hdflvplayername as b on a.playlistid=b.id
            LEFT JOIN #__hdflvplayerads AS c ON a.prerollid = c.id
            LEFT JOIN #__hdflvplayerads AS d ON a.postrollid = d.id
            WHERE a.published=1  ORDER BY a.ordering ASC';
                $db->setQuery($query);
                $rows = $db->loadObjectList();

            }
            if (count($rows) > 0) {
                 $query = 'SELECT a.`id`, a.`title`, a.`filepath`, a.`videourl`,a.`thumburl`, a.`previewurl`, a.`hdurl`,
			a.`playlistid`,a.`streamerpath`, a.`streameroption`, a.`postrollads`, a.`prerollads`, a.`midrollads`,
			a.`description`,a.`targeturl`, a.`download`, a.`prerollid`, a.`postrollid`, a.`access`, a.`islive`,
			b.`name`,c.`adsname`,c.`typeofadd`
            FROM `#__hdflvplayerupload` as a LEFT JOIN #__hdflvplayername as b on a.playlistid=b.id
            LEFT JOIN #__hdflvplayerads AS c ON a.prerollid = c.id
            LEFT JOIN #__hdflvplayerads AS d ON a.postrollid = d.id
            WHERE a.published=1 AND a.id !=' . $rows[0]->id . ' AND b.id=' . $rows[0]->playlistid;

                $db->setQuery($query);
                $playlist = $db->loadObjectList();
            }
        }
        //assigns the video details into common variable, if playlist exist or video exist.
        if (count($rows) > 0) {
            $rs_video = array_merge($rows, $playlist);

        } else {
            $rs_video = $playlist;
        }

        //function calling for generate playxml
        $this->showxml($rs_video, $playlistautoplay, $protected, $description_ovisible, $hddefault);
    }

    //Function to generate playxml
    function showxml($rs_video, $playlistautoplay, $protected, $description_ovisible, $hddefault) {
        //xml file header displaying here
        ob_clean();
        header("content-type: text/xml");
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<playlist autoplay="' . $playlistautoplay . '" random="false">';
        $current_path = 'components/com_hdflvplayer/videos/';
        $hdvideo = $video = '';

        $db = JFactory::getDBO();

        $query_ads = "SELECT count(id) FROM #__hdflvplayerads WHERE published=1 AND typeofadd='mid' "; //and home=1";//and id=11;";
        $db->setQuery($query_ads);
        $midadsCount = $db->loadResult();


        //Check whether or not, video available
        if (count($rs_video) > 0) {

            foreach ($rs_video as $rows) {
                $timage = '';
                $streamername = '';

                //If file option for video FIle or FFmpeg means, the Video URL, thumb URL, Preview URL,HD URL from Videos folder
                if ($rows->filepath == 'File' || $rows->filepath == 'FFmpeg') {

                    if ($rows->videourl != '') {
                        $video = JURI::base() . $current_path . $rows->videourl;
                     } else {
                        $video = '';
                    }
                    ($rows->hdurl != '') ? $hdvideo = JURI::base() . $current_path . $rows->hdurl : $hdvideo = '';
                    $previewimage = JURI::base() . $current_path . $rows->previewurl;
                    $timage = JURI::base() . $current_path . $rows->thumburl;
                    if ($rows->hdurl) {
                        $hd_bol = 'true';
                    } else {
                        $hd_bol = 'false';
                    }
                }

                //Else, the video option for URL means, fetch the Video URL, thumb URL, Preview URL,HD URL in table
                elseif ($rows->filepath == 'Url') {
                    $video = $rows->videourl;

                    $previewimage = $rows->previewurl;
                    $timage = $rows->thumburl;
                    if ($rows->hdurl) {
                        $hd_bol = 'true';
                    } else {
                        $hd_bol = 'false';
                    }
                    $hdvideo = $rows->hdurl;
                }

                //If File option Youtube then fetch Video URL, thumb URL, Preview URL,HD URL
                elseif ($rows->filepath == 'Youtube') {
                    $video = $rows->videourl;
                    $previewimage = $rows->previewurl;
                    $timage = $rows->thumburl;
                    if ($rows->hdurl) {
                        $hd_bol = 'true';
                    } else {
                        $hd_bol = 'false';
                    }

                    if ($rows->hdurl != '') {
                        $hdvideo = $rows->hdurl;
                    }
                }

                //Checks for streamer option
                ($rows->streameroption == 'lighttpd') ? $streamername = $rows->streameroption : $streamername = $rows->streamerpath;
                ($rows->streameroption == 'rtmp') ? $streamername = $rows->streamerpath : $streamername = '';
                $rs_ads = $rows->adsname;

                //Checks for postroll ads enabled
                if ($rows->postrollid != '') {
                    ($rows->postrollads == 0) ? $postrollads = 'false' : $postrollads = 'true';
                } else {
                    $postrollads = 'false';
                }

                //Checks for preroll ads enabled
                if ($rows->prerollid != '') {
                    ($rows->prerollads == 0) ? $prerollads = "false" : $prerollads = "true";
                } else {
                    $prerollads = "false";
                }

                //Checks for Mid-roll ad
                $rs_ads = $rows->typeofadd;
                if ($midadsCount > 0) {

                    ($rows->midrollads == 0) ? $midrollads = 'false' : $midrollads = 'true';
                } else {
                    $midrollads = 'false';
                }

                //Fetches for Download, trget URL, Post-roll Ads, Pre-roll Ad Id, Pre-roll Ad Id
                ($rows->download == 0) ? $download = 'false' : $download = 'true';
                ($rows->targeturl == '') ? $targeturl = '' : $targeturl = $rows->targeturl;
                ($rows->postrollads == '1') ? $postrollid = $rows->postrollid : $postrollid = 0;
                ($rows->prerollads == '1') ? $prerollid = $rows->prerollid : $prerollid = 0;

                //Checks for member Access
                $session = JFactory::getSession();
                $user = JFactory::getUser();
                $memberid = $user->get('id');

                if (version_compare(JVERSION, '1.6.0', 'ge')) {
			$uid = $user->get('id');
			if ($uid) {
				$query = $db->getQuery(true);
				$query->select('g.id AS group_id')
				->from('#__usergroups AS g')
				->leftJoin('#__user_usergroup_map AS map ON map.group_id = g.id')
				->where('map.user_id = ' . (int) $uid);
				$db->setQuery($query);
				$message = $db->loadObjectList();
				foreach ($message as $mess) {
					$accessid[] = $mess->group_id;
				}
			} else {
				$accessid[] = 1;
			}
		} else {
			$accessid = $user->get('aid');
		}

                if (version_compare(JVERSION, '1.6.0', 'ge')) {
					$query = $db->getQuery(true);
					if($rows->access == 0) $rows->access = 1;
					$query->select('rules as rule')
					->from('#__viewlevels AS view')
					->where('id = ' . (int) $rows->access);
					$db->setQuery($query);
					$message = $db->loadResult();
					$accessLevel = json_decode($message);
				}

                $member = "true";

				if (version_compare(JVERSION, '1.6.0', 'ge')) {
					$member = "false";
					foreach ($accessLevel as $useracess) {
						if (in_array("$useracess", $accessid) || $useracess == 1) {
							$member = "true";
							break;
                }
               }
				} else {
					if ($rows->access != 0) {
						if ($accessid != $rows->access && $accessid != 2) {
							$member = "false";
                }
               }
				}

                //Checks for Islive
                $islive = 'false';
                if ($streamername != '') {
                    ($rows->islive == 1) ? $islive = 'true' : $islive = 'false';
                }
                if (!preg_match('/vimeo/', $video)) {
                    echo '<mainvideo member="' . $member . '" uid="'.$memberid.'" category="' . $rows->name . '" url="' . $video . '" isLive ="' . $islive;
                    //Checks for download
                    if ($rows->filepath != "Youtube") {
                        echo '" allow_download="' . $download;
                    }
                    echo '" preroll_id="' . $prerollid . '" postroll_id="' . $postrollid . '" postroll="' . $postrollads . '" midroll="' . $midrollads . '" preroll="' . $prerollads . '" streamer="' . $streamername . '" Preview="' . $previewimage . '" hdpath="' . $hdvideo . '" thu_image="' . $timage . '" id="' . $rows->id . '" hd="' . $hd_bol . '" >';

                    //Title of video
                    echo '<title>';
                    echo '<![CDATA[' . $rows->title . ']]>';
                    echo '</title>';
                    echo '<tagline targeturl="' . $targeturl . '">';

                    //Description shows here
                    if ($rows->description != '')
                        echo '<![CDATA[<b>' . $rows->description . '</b>]]>';

                    echo '</tagline>';
                    echo '</mainvideo>';
                }
            }
        }
        echo '</playlist>';

        exit();
    }

}