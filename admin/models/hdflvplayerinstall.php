<?php
/**
 * @version  $Id: sortorder.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();
jimport('joomla.application.component.modelist');


class hdflvplayerModelhdflvplayerinstall extends JModelist {


    function install()
    {
        
        $db		=& JFactory::getDBO();
        global $mainframe;
        $msg 		= '';

        $qry="update `#__extensions` set name='HD FLV Player' and element='com_hdflvplayer'";
        $db->setQuery($qry);
        $db->query();

        // Create tables, dropping them first if they exist
        $msg 		.= $this->create__hdflvplayerupload(true);
        $msg 		.= $this->create__hdflvplayersettings(true);
        $msg 		.= $this->create__hdflvplayername(true);
        $msg 		.= $this->create__hdflvplayerlanguage(true);
        $msg 		.= $this->create__hdflvplayerads(true);
        $msg 		.= $this->create__hdflvplayeraddgoogle(true);


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
        $msg 		.= $this->load_data_hdflvplayername();

        if (strlen(trim($msg)) > 0) {
            $msg = JText::_('ERROR_INSTALL') . '<br /><br />' . $msg;
        } else {
            $msg = JText::_('SUCCESSFULLY INSTALLED');
        }
        $link="index.php?option=com_hdflvplayer&task=uploadvideos";
        //JFactory::getApplication()->redirect($link, $msg);
          $app =& JFactory::getApplication();
            $app->redirect($link, 'Saved');

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
  `midrollads`	tinyint(4) NOT NULL,
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
  `midrollads`	tinyint(4) NOT NULL,
  `midbegin`	tinyint(4) NOT NULL,
  `midinterval`	tinyint(4) NOT NULL,
  `midrandom`	tinyint(4) NOT NULL,
  `midadrotate`	tinyint(4) NOT NULL,
  `playlist_open` tinyint(4) NOT NULL,
  `licensekey` varchar(255) NOT NULL,
  `vast` tinyint(1) NOT NULL,
  `vast_pid` int(20) NOT NULL,
  `api` tinyint(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `urllink` varchar(255) NOT NULL,
  `scaletohide` varchar(255) NOT NULL,
  `title_ovisible` tinyint(4) NOT NULL,
  `description_ovisible` tinyint(4) NOT NULL,
  `playlist_dvisible` tinyint(4) NOT NULL,
  `embedcode_visible` tinyint(4) NOT NULL,
  `viewed_visible` tinyint(4) NOT NULL,
  `playlistrandom` tinyint(4) NOT NULL,
  `vquality` int(11) NOT NULL,
  `vquality1` int(11) NOT NULL,
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
  `impressionurl` varchar(255) NOT NULL ,
`impressioncounts` INT NOT NULL Default '0',
`clickcounts` INT NOT NULL Default '0',
  `adsdesc` varchar(500) NOT NULL,
  `typeofadd` varchar(50) NOT NULL,
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

        print_r($result);

        if ($db->getErrorNum()) {
            $msg .= $db->getErrorMsg() . '<br />';
        }

        if ((strlen(trim($msg)) == 0) && ((int)$result == 0)) {




            $query = "INSERT INTO `#__hdflvplayersettings` (`published`, `buffer`, `normalscale`, `fullscreenscale`, `autoplay`, `volume`, `logoalign`, `logoalpha`, `skin_autohide`, `stagecolor`, `skin`, `embedpath`, `fullscreen`, `zoom`, `width`, `height`, `uploadmaxsize`, `ffmpegpath`, `ffmpeg`, `related_videos`, `timer`, `logopath`, `logourl`, `nrelated`, `shareurl`, `playlist_autoplay`, `hddefault`, `ads`, `prerollads`, `postrollads`, `random`, `midrollads`, `midbegin`, `midinterval`, `midrandom`, `midadrotate`, `playlist_open`, `licensekey`, `vast`, `vast_pid`, `api`, `description`, `urllink`, `scaletohide`, `title_ovisible`, `description_ovisible`, `playlist_dvisible`, `embedcode_visible`, `viewed_visible`, `playlistrandom`, `vquality`, `vquality1`)
                VALUES ('1', '5', '0', '0', '1', '34', 'TL', '35', '1', '000000', 'skin_black.swf', 'http://localhost/joomlatry/', '1', '1', '740', '415', '100', '/usr/bin/ffmpeg/', '0', '1', '1', '', '', '8', '1', '1', '0', '1', '0', '0', '0', '0', '1', '5', '1', '1', '1', '', '0', '0', '1', '', '', '1', '0', '0', '0', '0', '0', '0', '0', '0');";

/*  $query = " INSERT INTO `#__hdflvplayersettings` (`published`, `buffer`, `normalscale`, `fullscreenscale`, `autoplay`, `volume`, `logoalign`, `logoalpha`, `skin_autohide`, `stagecolor`, `skin`, `embedpath`, `fullscreen`, `zoom`, `width`, `height`, `uploadmaxsize`, `ffmpegpath`, `ffmpeg`, `related_videos`, `timer`, `logopath`, `logourl`, `nrelated`, `shareurl`, `playlist_autoplay`, `hddefault`, `ads`, `prerollads`, `postrollads`, `random`, `midrollads`, `midbegin`,`midinterval`,`midrandom`,`midadrotate`, `playlist_open`, `licensekey`, `vast`, `vast_pid`,`api`, `relatedcolor`,`scaletohide`,`category_txt`,playlistrandom,vquality) VALUES
(1, 5, '0', '0', 1, 34, 'TL', 35, 1, '000000', 'skin_black.swf', 'http://localhost/joomlatry/', 1, 1, 740, 415, 100, '/usr/bin/ffmpeg/', '0', 1, 1, '', '', 8, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1,'',0,0,1,'1',,0,0);"
            ;*/
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

function load_data_hdflvplayername()
    {
        $db		=& JFactory::getDBO();
        $msg 	= '';

        $query = "SELECT Count(*) FROM `#__hdflvplayername`;";

        $db->setQuery($query);
        $result = $db->loadResult();

        if ($db->getErrorNum()) {
            $msg .= $db->getErrorMsg() . '<br />';
        }

        if ((strlen(trim($msg)) == 0) && ((int)$result == 0)) {
            $query = "INSERT INTO `#__hdflvplayername` (`id`, `name`,`published`) VALUES
                (1, 'None', 1);" ;

            $db->setQuery($query);

            if (!$db->query()) {
                $msg .= $db->stderr() . '<br />';
            }
        }

        return $msg;
    }




}
?>
