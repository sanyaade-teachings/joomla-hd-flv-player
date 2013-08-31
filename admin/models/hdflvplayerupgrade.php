<?php
/**
 * @version		$Id: sortorder.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelhdflvplayerupgrade extends JModel {


    function upgrade()
    {

        $db		=& JFactory::getDBO();
        global $mainframe;
        $msg 		= '';
        // Create tables, dropping them first if they exist

        $qry="update `#__components` set admin_menu_img='components/com_hdflvplayer/images/icon.png' where name='HD FLV Player' and link='option=com_hdflvplayer'";
        $db->setQuery($qry);
        $db->query();

      
        $msg 		.= $this->create__hdflvplayerupload(false);
        $msg 		.= $this->create__hdflvplayersettings(false);
        $msg 		.= $this->create__hdflvplayername(false);
        $msg 		.= $this->create__hdflvplayerlanguage(false);
        $msg 		.= $this->create__hdflvplayerads(false);
        $msg 		.= $this->create__hdflvplayeraddgoogle(true);

        //Upgrade tables if they need it
        $msg 		.= $this->upgrade_hdflvplayersettings();
        $msg 		.= $this->upgrade_hdflvplayerupload();
        $msg 		.= $this->upgrade_hdflvplayerlanguage();
        $msg 		.= $this->upgrade_hdflvplayerads();



        // Check tables are all created and ok!
        $msg 		.= $this->check_table('hdflvplayerupload');
        $msg 		.= $this->check_table('hdflvplayersettings');
        $msg 		.= $this->check_table('hdflvplayername');
        $msg 		.= $this->check_table('hdflvplayerlanguage');
        $msg 		.= $this->check_table('hdflvplayerads');
        $msg 		.= $this->check_table('hdflvaddgoogle');


        // Load default data
        $msg 		.= $this->load_data_hdflvplayersettings();
        $msg 		.= $this->load_data_hdflvplayerlanguage();
        $msg 		.= $this->load_data_hdflvplayergoogleads();

        if (strlen(trim($msg)) > 0) {
            $msg = JText::_('UPGRADE ERROR') . '<br /><br />' . $msg;
        } else {
            $msg = JText::_('SUCCESSFULLY UPGRADED');
        }
        $link="index.php?option=com_hdflvplayer&task=uploadvideos";
        JFactory::getApplication()->redirect($link, $msg);
        //$this->setRedirect('index.php?option=com_hdflvplayer&task=uploadvideos', $msg);


    }

    function create__hdflvplayerupload($drop = false)
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        if ($drop) {
            $query = "DROP TABLE IF EXISTS `#__hdflvplayerupload`;";

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        $query = " CREATE TABLE IF NOT EXISTS `#__hdflvplayerupload` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `times_viewed` int(11) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `ffmpeg` varchar(100) NOT NULL,
  `ffmpeg_videos` varchar(150) NOT NULL,
  `ffmpeg_thumbimages` varchar(150) NOT NULL,
  `ffmpeg_previewimages` varchar(150) NOT NULL,
  `ffmpeg_hd` varchar(150) NOT NULL,
  `filepath` varchar(10) NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `thumburl` varchar(255) NOT NULL,
  `previewurl` varchar(255) NOT NULL,
  `hdurl` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `playlistid` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `ordering` int(11) NOT NULL,
  `streamerpath` varchar(255) NOT NULL,
  `streameroption` varchar(255) NOT NULL,
  `postrollads` tinyint(4) NOT NULL,
  `prerollads` tinyint(4) NOT NULL,
`description` text NOT NULL,
  `targeturl` varchar(255) NOT NULL,
`download` tinyint(4) NOT NULL,
`prerollid` int(11) NOT NULL,
  `postrollid` int(11) NOT NULL,
  `access` int(11) NOT NULL,
`islive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;
"
        ;


        $db->setQuery($query);


        if (!$db->query()) {
            $msg .= $db->stderr() . '<br />';
        }

        return $msg;
    }



    function create__hdflvplayername($drop = false)
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        if ($drop) {
            $query = "DROP TABLE IF EXISTS `#__hdflvplayername`;";

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        $query = " CREATE TABLE IF NOT EXISTS `#__hdflvplayername` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` varchar(255) NOT NULL,
                    `published` tinyint(4) NOT NULL,
                     PRIMARY KEY (`id`)
                     ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;"
        ;


        $db->setQuery($query);


        if (!$db->query()) {
            $msg .= $db->stderr() . '<br />';
        }

        return $msg;
    }



    function create__hdflvplayersettings($drop = false)
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        if ($drop) {
            $query = "DROP TABLE IF EXISTS `#__hdflvplayersettings`;";

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        $query = " CREATE TABLE IF NOT EXISTS `#__hdflvplayersettings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `published` tinyint(4) NOT NULL,
  `buffer` int(10) NOT NULL,
  `normalscale` varchar(100) NOT NULL,
  `fullscreenscale` varchar(100) NOT NULL,
  `autoplay` tinyint(1) NOT NULL,
  `volume` int(10) NOT NULL,
  `logoalign` varchar(10) NOT NULL,
  `logoalpha` int(50) NOT NULL,
  `skin_autohide` tinyint(2) NOT NULL,
  `stagecolor` varchar(20) NOT NULL,
  `skin` varchar(255) NOT NULL,
  `embedpath` varchar(50) NOT NULL,
  `fullscreen` tinyint(1) NOT NULL,
  `zoom` tinyint(1) NOT NULL,
  `width` int(20) NOT NULL,
  `height` int(20) NOT NULL,
  `uploadmaxsize` int(10) NOT NULL,
  `ffmpegpath` varchar(255) NOT NULL,
  `ffmpeg` varchar(20) NOT NULL,
  `related_videos` tinyint(1) NOT NULL,
  `timer` tinyint(1) NOT NULL,
  `logopath` varchar(255) NOT NULL,
  `logourl` varchar(255) NOT NULL,
  `nrelated` int(11) NOT NULL,
  `shareurl` tinyint(1) NOT NULL,
  `playlist_autoplay` int(11) NOT NULL,
  `hddefault` int(1) NOT NULL,
  `ads` tinyint(4) NOT NULL,
  `prerollads` tinyint(4) NOT NULL,
  `postrollads` tinyint(4) NOT NULL,
  `random` tinyint(4) NOT NULL,
  `playlist_open` tinyint(4) NOT NULL,
  `licensekey` varchar(255) NOT NULL,
`vast` tinyint(1) NOT NULL,
  `vast_pid` int(20) NOT NULL,
`api` tinyint(4) NOT NULL,
`description` varchar(255) NOT NULL,
`relatedcolor` text NOT NULL,
  `urllink` varchar(255) NOT NULL,
`scaletohide` varchar(255) NOT NULL,
`title_ovisible` tinyint(4) NOT NULL,
`description_ovisible` tinyint(4) NOT NULL,
 `playlist_dvisible` tinyint(4) NOT NULL,
`embedcode_visible` tinyint(4) NOT NULL,
`viewed_visible` tinyint(4) NOT NULL,
`category_txt` varchar(200) NOT NULL,
`playlistrandom` tinyint(4) NOT NULL,
`vquality` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;"
        ;


        $db->setQuery($query);


        if (!$db->query()) {
            $msg .= $db->stderr() . '<br />';
        }

        return $msg;
    }

    function create__hdflvplayerlanguage($drop = false)
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        if ($drop) {
            $query = "DROP TABLE IF EXISTS `#__hdflvplayerlanguage`;";

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        $query = " CREATE TABLE IF NOT EXISTS `#__hdflvplayerlanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(4) NOT NULL,
  `play` varchar(255) NOT NULL,
  `pause` varchar(255) NOT NULL,
  `hdison` varchar(255) NOT NULL,
  `hdisoff` varchar(255) NOT NULL,
  `zoom` varchar(255) NOT NULL,
  `share` varchar(255) NOT NULL,
  `fullscreen` varchar(255) NOT NULL,
  `relatedvideos` varchar(255) NOT NULL,
  `sharetheword` varchar(255) NOT NULL,
  `sendanemail` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `send` varchar(255) NOT NULL,
  `copylink` varchar(255) NOT NULL,
  `copyembed` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `reddit` varchar(255) NOT NULL,
  `friendfeed` varchar(255) NOT NULL,
  `slashdot` varchar(255) NOT NULL,
  `delicious` varchar(255) NOT NULL,
  `myspace` varchar(255) NOT NULL,
  `wong` varchar(255) NOT NULL,
  `digg` varchar(255) NOT NULL,
  `blinklist` varchar(255) NOT NULL,
  `bebo` varchar(255) NOT NULL,
  `fark` varchar(255) NOT NULL,
  `tweet` varchar(255) NOT NULL,
  `furl` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
`btnname` varchar(255) NOT NULL,
`errormessage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;"
        ;


        $db->setQuery($query);


        if (!$db->query()) {
            $msg .= $db->stderr() . '<br />';
        }

        return $msg;
    }


    function create__hdflvplayerads($drop = false)
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        if ($drop) {
            $query = "DROP TABLE IF EXISTS `#__hdflvplayerads`;";

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        $query = " CREATE TABLE IF NOT EXISTS `#__hdflvplayerads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(4) NOT NULL,
  `adsname` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `postvideopath` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `targeturl` varchar(255) NOT NULL,
  `clickurl` varchar(255) NOT NULL,
  `impressionurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;"
        ;


        $db->setQuery($query);


        if (!$db->query()) {
            $msg .= $db->stderr() . '<br />';
        }

        return $msg;
    }

    function create__hdflvplayeraddgoogle($drop = false)
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        if ($drop) {
            $query = "DROP TABLE IF EXISTS `#__hdflvaddgoogle`;";

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        $query = "CREATE TABLE IF NOT EXISTS `#__hdflvaddgoogle` (
  `id` int(2) NOT NULL,
  `code` text NOT NULL,
  `showoption` tinyint(1) NOT NULL,
  `closeadd` int(6) NOT NULL,
  `reopenadd` tinytext NOT NULL,
  `publish` int(1) NOT NULL,
  `ropen` int(6) NOT NULL,
  `showaddc` tinyint(1) NOT NULL,
  `showaddm` tinytext NOT NULL,
  `showaddp` tinytext NOT NULL
) ENGINE=MyISAM ;"
        ;


        $db->setQuery($query);


        if (!$db->query()) {
            $msg .= $db->stderr() . '<br />';
        }

        return $msg;
    }

    function check_table($table)
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        $query = " SELECT *
                   FROM `#__" . $table . "`
                   LIMIT 1; "
        ;

        $db->setQuery($query);

        $result = $db->loadResult();

        if ($db->getErrorNum()) {
            $msg = $db->getErrorMsg() . '<br />';
        }

        return $msg;
    }
    function load_data_hdflvplayersettings()
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        $query = "SELECT Count(*) FROM `#__hdflvplayersettings`;";

        $db->setQuery($query);
        $result = $db->loadResult();
       if ($db->getErrorNum()) {
            $msg .= $db->getErrorMsg() . '<br />';
        }

        if ((strlen(trim($msg)) == 0) && ((int)$result == 0)) {
            $query = " INSERT INTO `#__hdflvplayersettings` (`published`, `buffer`, `normalscale`, `fullscreenscale`, `autoplay`, `volume`, `logoalign`, `logoalpha`, `skin_autohide`, `stagecolor`, `skin`, `embedpath`, `fullscreen`, `zoom`, `width`, `height`, `uploadmaxsize`, `ffmpegpath`, `ffmpeg`, `related_videos`, `timer`, `logopath`, `logourl`, `nrelated`, `shareurl`, `playlist_autoplay`, `hddefault`, `ads`, `prerollads`, `postrollads`, `random`, `playlist_open`, `licensekey`, `vast`, `vast_pid`,`api`, `relatedcolor`,`scaletohide`,`category_txt`,playlistrandom,vquality) VALUES
(1, 5, '0', '0', 1, 34, 'TL', 35, 1, '000000', 'skin_black.swf', 'http://localhost/joomlatry/', 1, 1, 740, 415, 100, '/usr/bin/ffmpeg/', '0', 1, 1, '', '', 8, 1, 1, 0, 0, 0, 0, 0, 1, '',0,0,1,'Related Videos','1','Choose Playlist Name',0,0);"
            ;
            $db->setQuery($query);
            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }
      if ((strlen(trim($msg)) == 0) && ((int)$result > 0)) {
            $query = "UPDATE `#__hdflvplayersettings` SET title_ovisible=0,description_ovisible=0,embedcode_visible=1,viewed_visible=1,playlist_dvisible=0,api=1,relatedcolor='Related Videos',scaletohide=1,category_txt='Choose Playlist Name',playlistrandom=0,vquality=0 where id=1;";
            $db->setQuery($query);
            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }
        return $msg;
    }


    function load_data_hdflvplayerlanguage()
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        $query = "SELECT Count(*) FROM `#__hdflvplayerlanguage`;";

        $db->setQuery($query);
        $result = $db->loadResult();

        if ($db->getErrorNum()) {
            $msg .= $db->getErrorMsg() . '<br />';
        }

        if ((strlen(trim($msg)) == 0) && ((int)$result == 0)) {
            $query = "INSERT INTO `#__hdflvplayerlanguage` (`published`, `play`, `pause`, `hdison`, `hdisoff`, `zoom`, `share`, `fullscreen`, `relatedvideos`, `sharetheword`, `sendanemail`, `to`, `from`, `send`, `copylink`, `copyembed`, `facebook`, `reddit`, `friendfeed`, `slashdot`, `delicious`, `myspace`, `wong`, `digg`, `blinklist`, `bebo`, `fark`, `tweet`, `furl`, `name`, `home`, `note`,`btnname`,`errormessage`) VALUES
(1, 'Play', 'Pause', 'Hd is on', 'Hd is off', 'Zoom', 'Share', 'Fullscreen', 'Related videos', 'Share the word', 'Send an email', 'To', 'From', 'Send', 'Copy link', 'Copy Embed', 'Facebook', 'Red it', 'Friend Feed', 'Slash Dot', 'Delicious', 'My Space', 'Wong', 'Digg', 'Blink List', 'Bebo', 'Fark', 'Tweet', 'Furl', 'English', 1, 'Note','Click','You are not authorized to view this video');"
            ;

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        return $msg;
    }

    function upgrade_hdflvplayersettings()
    {
        $msg 	= "";

        // Check the GroupId exists, add it if it doesn't!
        if (!$this->check_column('hdflvplayersettings', 'playlist_autoplay', '')) {
            $msg = "error adding 'playlist_autoplay' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'hddefault', '')) {
            $msg = "error adding 'hddefault' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'ads', '','tinyint(4) NOT NULL')) {
            $msg = "error adding 'ads' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'api','','tinyint(4) NOT NULL')) {
            $msg = "error adding 'api' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'description', '','varchar(255) NOT NULL')) {
            $msg = "error adding 'description' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'relatedcolor', '','text NOT NULL')) {
            $msg = "error adding 'relatedcolor' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'urllink', '','varchar(255) NOT NULL')) {
            $msg = "error adding 'urllink' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'scaletohide', '','varchar(255) NOT NULL')) {
            $msg = "error adding 'scaletohide' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'title_ovisible', '','tinyint(4) NOT NULL')) {
            $msg = "error adding 'title_ovisible' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'description_ovisible', '','tinyint(4) NOT NULL')) {
            $msg = "error adding 'description_ovisible' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'playlist_dvisible', '','tinyint(4) NOT NULL')) {
            $msg = "error adding 'playlist_dvisible' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'embedcode_visible', '','tinyint(4) NOT NULL')) {
            $msg = "error adding 'embedcode_visible' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'viewed_visible', '','tinyint(4) NOT NULL')) {
            $msg = "error adding 'viewed_visible' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'category_txt', '','varchar(200) NOT NULL')) {
            $msg = "error adding 'category_txt' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'playlistrandom', '','tinyint(4) NOT NULL')) {
            $msg = "error adding 'playlistrandom' column to 'hdflvplayersettings' table";
        }
        if (!$this->check_column('hdflvplayersettings', 'vquality', '','int(11) NOT NULL')) {
            $msg = "error adding 'vquality' column to 'hdflvplayersettings' table";
        }

        return $msg;
    }
    function upgrade_hdflvplayerupload()
    {
        $msg 	= "";

        // Check the GroupId exists, add it if it doesn't!
        if (!$this->check_column('hdflvplayerupload', 'description', '')) {
            $msg = "error adding 'playlist_autoplay' column to 'hdflvplayerupload' table";
        }
        if (!$this->check_column('hdflvplayerupload', 'targeturl', '')) {
            $msg = "error adding 'hddefault' column to 'hdflvplayerupload' table";
        }
        if (!$this->check_column('hdflvplayerupload', 'download', '')) {
            $msg = "error adding 'ads' column to 'hdflvplayerupload' table";
        }
        if (!$this->check_column('hdflvplayerupload', 'prerollid', '')) {
            $msg = "error adding 'ads' column to 'hdflvplayerupload' table";
        }
        if (!$this->check_column('hdflvplayerupload', 'postrollid', '')) {
            $msg = "error adding 'ads' column to 'hdflvplayerupload' table";
        }
        if (!$this->check_column('hdflvplayerupload', 'access', '')) {
            $msg = "error adding 'ads' column to 'hdflvplayerupload' table";
        }
        if (!$this->check_column('hdflvplayerupload', 'islive', '')) {
            $msg = "error adding 'ads' column to 'hdflvplayerupload' table";
        }


        return $msg;
    }

    function upgrade_hdflvplayerlanguage()
    {
        $msg 	= "";

        // Check the GroupId exists, add it if it doesn't!
        if (!$this->check_column('hdflvplayerlanguage', 'btnname', '')) {
            $msg = "error adding 'btnname' column to 'hdflvplayerlanguage' table";
        }
        if (!$this->check_column('hdflvplayerlanguage', 'errormessage', '')) {
            $msg = "error adding 'errormessage' column to 'hdflvplayerlanguage' table";
        }



        return $msg;
    }

    function upgrade_hdflvplayerads()
    {
        $msg 	= "";

        // Check the GroupId exists, add it if it doesn't!
        if (!$this->check_column('hdflvplayerads', 'targeturl', '')) {
            $msg = "error adding 'targeturl' column to 'hdflvplayerads' table";
        }
        if (!$this->check_column('hdflvplayerads', 'clickurl', '')) {
            $msg = "error adding 'clickurl' column to 'hdflvplayerads' table";
        }
        if (!$this->check_column('hdflvplayerads', 'impressionurl', '')) {
            $msg = "error adding 'impressionurl' column to 'hdflvplayerads' table";
        }




        return $msg;
    }

    function check_column($table, $newcolumn, $newcolumnafter, $newcolumntype = "int(11) 				NOT NULL default '0'")
    {

        $db				=& JFactory::getDBO();
        $msg 			= '';
        $foundcolumn	= false;

        $query 			= " SHOW COLUMNS
                            FROM `#__" . $table . "`; "
        ;

        $db->setQuery($query);

        if (!$db->query()) {
            return false;
        }

        $columns 		= $db->loadObjectList();

        foreach ($columns as $column) {
            if ($column->Field == $newcolumn) {
                $foundcolumn = true;
                break;
            }
        }

        if (!$foundcolumn)
        {
            $query 			= " ALTER TABLE `#__" . $table . "`
                                ADD `" . $newcolumn . "` " . $newcolumntype
            ;

            if (strlen(trim($newcolumnafter)) > 0) {
                $query		.= " AFTER `" . $newcolumnafter . "`";
            }

            $query .= ";";



            $db->setQuery($query);

            if (!$db->query()) {
                return false;
            }
        }

        return true;
    }

function load_data_hdflvplayergoogleads()
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        $query = "SELECT Count(*) FROM `#__hdflvplayerads`;";

        $db->setQuery($query);
        $result = $db->loadResult();

        if ($db->getErrorNum()) {
            $msg .= $db->getErrorMsg() . '<br />';
        }

        if ((strlen(trim($msg)) == 0) && ((int)$result == 0)) {
            $query = "INSERT INTO `#__hdflvaddgoogle` (`id`, `code`, `showoption`, `closeadd`, `reopenadd`, `publish`, `ropen`, `showaddc`, `showaddm`, `showaddp`) VALUES
(1, '', '', '', '', '', '', '', '', '');"
            ;

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        return $msg;
    }


}
?>
